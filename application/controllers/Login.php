<?php
class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {

        $this->load->view('login/index');
    }


    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');


        $getData = $this->db->get_where('tbl_user', ['username' => $username])->row_array();

        if ($getData) {
            if (md5($password) == $getData['password']) {
                $data_session = [
                    'username' => $getData['username'],
                    'email' => $getData['email'],
                    'is_login' => true
                ];
                $this->session->set_userdata($data_session);
                redirect('Dashboard');
            } else {
                $this->session->set_flashdata('msg', 'Gagal masuk');
                redirect('Login');
            }
        } else {
            $this->session->set_flashdata('msg', 'Gagal masuk');
            redirect('Login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }
}
