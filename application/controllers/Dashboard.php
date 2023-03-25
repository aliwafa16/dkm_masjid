<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect('Forbidden');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        $this->load->view('template_admin/header', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('template_admin/footer');
    }
}
