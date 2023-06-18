<?php
class Manajemenuser extends CI_Controller
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

        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username harus diisi !!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'Email harus diisi !!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password harus diisi !!'
        ]);

        if ($this->form_validation->run() == false) {
            $getData = $this->db->get('tbl_user')->result_array();
            $data = [
                'title' => 'Manajemen User',
                'data' => $getData
            ];
            $this->load->view('template_admin/header', $data);
            $this->load->view('manajemen_user/index', $data);
            $this->load->view('template_admin/footer');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'role' => $this->input->post('role')
            ];
    
            $result = $this->db->insert('tbl_user', $data);
    
                if ($result > 0) {
                    $this->session->set_flashdata('msg', 'Berhasil tambah data');
                } else {
                    $this->session->set_flashdata('msg', 'Gagal tambah data');
                }
    
                redirect('Manajemenuser');
        }
    }
    
    public function edit($id)
    {

        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username harus diisi !!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'Email harus diisi !!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password harus diisi !!'
        ]);

        if ($this->form_validation->run() == false) {
            $getData = $this->db->get('tbl_user')->result_array();
            $data = [
                'title' => 'Manajemen User',
                'data' => $getData
            ];
            $this->load->view('template_admin/header', $data);
            $this->load->view('manajemen_user/index', $data);
            $this->load->view('template_admin/footer');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'role' => $this->input->post('role')
            ];
    
            $this->db->where('id_user', $id);
            $this->db->update('tbl_user', $data);
            $this->session->set_flashdata('msg', 'Berhasil edit data');
            redirect('Manajemenuser');
        }
    }

    public function hapus($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('tbl_user');
        $this->session->set_flashdata('msg', 'Berhasil hapus data');
        redirect('Manajemenuser');
    }

}