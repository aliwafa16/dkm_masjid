<?php
class Qris extends CI_Controller
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
        $getData = $this->db->get('tbl_qris')->result_array();
        $data = [
            'title' => 'Qris',
            'data' => $getData
        ];

        if (isset($_POST['submit'])) {
            $data = [
                'foto_qris' => $this->_foto()
            ];

            $this->db->insert('tbl_qris', $data);
            $this->session->set_flashdata('msg', 'Berhasil tambah data');
            redirect('Qris');
        }

        $this->load->view('template_admin/header', $data);
        $this->load->view('qris/index', $data);
        $this->load->view('template_admin/footer');
    }


    private function _foto()
    {
        $config = [
            'upload_path' => './assets/qris',
            'allowed_types' => 'jpg|png|jpeg',
            'max_size' => 10048,
            'file_name' => uniqid()
        ];
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto_qris')) {
            return 'default.png';
        } else {
            $foto = $this->upload->data('file_name');
            return $foto;
        }
    }

    public function hapus($id)
    {

        $getData = $this->db->get_where('tbl_qris', ['id_qris' => $id])->row_array();

        if($getData['foto_qris'] == null){
        }else{
            unlink(FCPATH . 'assets/qris/' . $getData['foto_qris']);
        }

        $this->db->where('id_qris', $id);
        $this->db->delete('tbl_qris');
        $this->session->set_flashdata('msg', 'Berhasil hapus data');
        redirect('Qris');
    }
}