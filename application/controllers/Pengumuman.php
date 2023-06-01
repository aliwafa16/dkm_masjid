<?php
class Pengumuman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect('Forbidden');
        }

        $this->load->library('form_validation');
    }

    public function index()
    {

        $this->form_validation->set_rules('text', 'Pengumuman', 'trim');
        if ($this->form_validation->run() == false) {
            $getData = $this->db->get('tbl_pengumuman')->result_array();
            $data = [
                'title' => 'Pengumuman',
                'data' => $getData
            ];
            $this->load->view('template_admin/header', $data);
            $this->load->view('Pengumuman/index', $data);
            $this->load->view('template_admin/footer');
        } else {
            $data = [
                'text' => $this->input->post('text'),
                'status' => $this->input->post('status')
            ];
    
            $result = $this->db->insert('tbl_pengumuman', $data);
    
                if ($result > 0) {
                    $this->session->set_flashdata('msg', 'Berhasil tambah data');
                } else {
                    $this->session->set_flashdata('msg', 'Gagal tambah data');
                }
    
                redirect('Pengumuman');
        }
    }


    public function edit($id)
    {

        $this->form_validation->set_rules('text', 'Pengumuman', 'trim');
        if ($this->form_validation->run() == false) {
            $getData = $this->db->get('tbl_pengumuman')->result_array();
            $data = [
                'title' => 'Pengumuman',
                'data' => $getData
            ];
            $this->load->view('template_admin/header', $data);
            $this->load->view('Pengumuman/index', $data);
            $this->load->view('template_admin/footer');
        } else {
            $data = [
                'text' => $this->input->post('text'),
                'status' => $this->input->post('status')
            ];
            $this->db->where('id', $id);
            $this->db->update('tbl_pengumuman', $data);
            $this->session->set_flashdata('msg', 'Berhasil edit data');
            redirect('Pengumuman');
        }

    }


    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_pengumuman');
        $this->session->set_flashdata('msg', 'Berhasil hapus data');
        redirect('Pengumuman');
    }
}
?>