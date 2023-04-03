<?php
class Fotokegiatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect('Forbidden');
        }
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index()
    {
        $getData = $this->db->get('tbl_foto_kegiatan')->result_array();
        $data = [
            'title' => 'Foto Kegiatan',
            'data' => $getData
        ];

        if (isset($_POST['submit'])) {
            $data = [
                'foto_kegiatan' => $this->_foto()
            ];

            $this->db->insert('tbl_foto_kegiatan', $data);
            $this->session->set_flashdata('msg', 'Berhasil tambah data');
            redirect('Fotokegiatan');
        }

        $this->load->view('template_admin/header', $data);
        $this->load->view('foto_kegiatan/index', $data);
        $this->load->view('template_admin/footer');
    }


    private function _foto()
    {
        $config = [
            'upload_path' => './assets/foto_kegiatan',
            'allowed_types' => 'jpg|png|jpeg',
            'max_size' => 10048,
            'file_name' => uniqid()
        ];
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto_kegiatan')) {
            return 'default.png';
        } else {
            $foto = $this->upload->data('file_name');
            return $foto;
        }
    }

    public function hapus($id)
    {

        $getData = $this->db->get_where('tbl_foto_kegiatan', ['id_fotokegiatan' => $id])->row_array();

        if($getData['foto_kegiatan'] == null){
        }else{
            unlink(FCPATH . 'assets/foto_kegiatan/' . $getData['foto_kegiatan']);
        }

        $this->db->where('id_fotokegiatan', $id);
        $this->db->delete('tbl_foto_kegiatan');
        $this->session->set_flashdata('msg', 'Berhasil hapus data');
        redirect('Fotokegiatan');
    }
}