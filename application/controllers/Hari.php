<?php
class Hari extends CI_Controller
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
        $getData = $this->db->get('tbl_hari')->result_array();
        $data = [
            'title' => 'Hari',
            'data' => $getData
        ];
        $this->load->view('template_admin/header', $data);
        $this->load->view('hari/index', $data);
        $this->load->view('template_admin/footer');
    }
}
