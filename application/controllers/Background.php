<?php
class Background extends CI_Controller
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
        $getData = $this->db->get('tbl_background')->result_array();
        $data = [
            'title' => 'Background',
            'data' => $getData
        ];

        if (isset($_POST['submit'])) {
            $data = [
                'background' => $this->_foto()
            ];

            $this->db->insert('tbl_background', $data);
            $this->session->set_flashdata('msg', 'Berhasil tambah data');
            redirect('Background');
        }

        $this->load->view('template_admin/header', $data);
        $this->load->view('background/index', $data);
        $this->load->view('template_admin/footer');
    }

    public function hapus($id)
    {
        $this->db->where('id_background', $id);
        $this->db->delete('tbl_background');
        $this->session->set_flashdata('msg', 'Berhasil hapus data');
        redirect('Background');
    }

    private function _foto()
    {
        $config = [
            'upload_path' => './assets/background',
            'allowed_types' => 'jpg|png|jpeg',
            'max_size' => 10048,
            'file_name' => uniqid()
        ];
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('background')) {
            return array('error' => $this->upload->display_errors());;
        } else {
            $foto = $this->upload->data('file_name');
            return $foto;
        }
    }
}
