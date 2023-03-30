<?php
class Manajemenkegiatan extends CI_Controller
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

        $this->form_validation->set_rules('judul', 'Nama Kegiatan', 'required|trim', [
            'required' => 'Nama kegiatan harus diisi !!'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Kegiatan', 'required|trim', [
            'required' => 'Deskripsi kegiatan harus diisi !!'
        ]);
        $this->form_validation->set_rules('id_rekening', 'Rekening', 'required|trim', [
            'required' => 'Rekenig harus dipilih !!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $getData = $this->db->query("SELECT * FROM tbl_kegiatan JOIN tbl_rekening ON tbl_rekening.id_rekening = tbl_kegiatan.id_rekening")->result_array();
            $data = [
                'title' => 'Kegiatan Rutin',
                'data' => $getData
            ];
            $this->load->view('template_admin/header', $data);
            $this->load->view('manajemen_kegiatan/index', $data);
            $this->load->view('template_admin/footer');
        }else{
            $data = [
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'id_rekening' => $this->input->post('id_rekening'),
                'foto' => $this->_foto()
            ];

            $result = $this->db->insert('tbl_kegiatan', $data);

            if ($result > 0) {
                $this->session->set_flashdata('msg', 'Berhasil tambah data');
            } else {
                $this->session->set_flashdata('msg', 'Gagal tambah data');
            }

            redirect('Manajemenkegiatan');
        }

    }

    public function hapus($id)
    {

        $getData = $this->db->get_where('tbl_kegiatan', ['id_kegiatan' => $id])->row_array();

            if($getData['foto'] == null){
            }else{
                unlink(FCPATH . 'assets/kegiatan_rutin/' . $getData['foto']);
            }

        $this->db->where('id_kegiatan', $id);
        $this->db->delete('tbl_kegiatan');
        $this->session->set_flashdata('msg', 'Berhasil hapus data');
        redirect('Manajemenkegiatan');
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('judul', 'Nama Kegiatan', 'required|trim', [
            'required' => 'Nama kegiatan harus diisi !!'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Kegiatan', 'required|trim', [
            'required' => 'Deskripsi kegiatan harus diisi !!'
        ]);
        $this->form_validation->set_rules('id_rekening', 'Rekening', 'required|trim', [
            'required' => 'Rekenig harus dipilih !!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $getData = $this->db->query("SELECT * FROM tbl_kegiatan JOIN tbl_rekening ON tbl_rekening.id_rekening = tbl_kegiatan.id_rekening")->result_array();
            $data = [
                'title' => 'Kegiatan Rutin',
                'data' => $getData
            ];
            $this->load->view('template_admin/header', $data);
            $this->load->view('manajemen_kegiatan/index', $data);
            $this->load->view('template_admin/footer');
        }else{

            $new_foto = $_FILES['foto']['name'];
            $result = $this->db->get_where('tbl_kegiatan', ['id_kegiatan' => $id])->row_array();
            $old_image = $result['foto'];

            if ($new_foto != null) {
                @unlink(FCPATH . './assets/kegiatan_rutin/' . $old_image);
                $foto_kegiatan = $this->_foto();
            } else {
                $foto_kegiatan = $old_image;
            }

            $data = [
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'id_rekening' => $this->input->post('id_rekening'),
                'foto' => $foto_kegiatan
            ];

            $this->db->where('id_kegiatan', $id);
            $this->db->update('tbl_kegiatan', $data);
            $this->session->set_flashdata('msg', 'Berhasil edit data');
            redirect('Manajemenkegiatan');
      }
    }

    private function _foto()
    {
        $config = [
            'upload_path' => './assets/kegiatan_rutin',
            'allowed_types' => 'jpg|png|jpeg',
            'max_size' => 10048,
            'file_name' => uniqid()
        ];
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto')) {
            return 'default.png';
        } else {
            $foto = $this->upload->data('file_name');
            return $foto;
        }
    }
}