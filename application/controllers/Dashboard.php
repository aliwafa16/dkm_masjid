<?php
class Dashboard extends CI_Controller
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
        $this->db->select('*');
        $this->db->from('tbl_hari');
        $this->db->join('tbl_daily', 'tbl_daily.id_hari = tbl_hari.id_hari', 'left');
        $this->db->join('tbl_penceramah', 'tbl_penceramah.id_penceramah = tbl_daily.id_penceramah', 'left');
        $this->db->join('tbl_kajian', 'tbl_kajian.id_kajian = tbl_daily.id_kajian', 'left');
        $this->db->order_by('tbl_hari.id_hari', 'ASC');
        $getData = $this->db->get()->result_array();



        $result = array();
        foreach ($getData as $element) {
            $result[$element['id_hari']][] = $element;
        }

        $getHari = $this->db->get('tbl_hari')->result_array();
        $getKajian = $this->db->get('tbl_kajian')->result_array();
        $getPenceramah = $this->db->get('tbl_penceramah')->result_array();
        $getBackground = $this->db->get('tbl_background')->result_array();

        $data = [
            'title' => 'Dashboard',
            'hari' => $getHari,
            'data' => $getData,
            'kajian' => $getKajian,
            'penceramah' => $getPenceramah,
            'background' => $getBackground,
            'daily' => $result
        ];


        if (isset($_POST['submit'])) {
            $data = [
                'id_hari' => $this->input->post('id_hari'),
                'id_kajian' => $this->input->post('id_kajian'),
                'id_penceramah' => $this->input->post('id_penceramah'),
                'id_background' => $this->input->post('background')[0]
            ];
            $this->db->insert('tbl_daily', $data);
            $this->session->set_flashdata('msg', 'Berhasil tambah data');
            redirect('Dashboard');
        }


        $this->load->view('template_admin/header', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('template_admin/footer');
    }

    public function edit($id)
    {

        $this->db->select('*');
        $this->db->from('tbl_hari');
        $this->db->join('tbl_daily', 'tbl_daily.id_hari = tbl_hari.id_hari', 'left');
        $this->db->join('tbl_penceramah', 'tbl_penceramah.id_penceramah = tbl_daily.id_penceramah', 'left');
        $this->db->join('tbl_kajian', 'tbl_kajian.id_kajian = tbl_daily.id_kajian', 'left');
        $this->db->order_by('tbl_hari.id_hari', 'ASC');
        $getData = $this->db->get()->result_array();



        $result = array();
        foreach ($getData as $element) {
            $result[$element['id_hari']][] = $element;
        }

        $getHari = $this->db->get('tbl_hari')->result_array();
        $getKajian = $this->db->get('tbl_kajian')->result_array();
        $getPenceramah = $this->db->get('tbl_penceramah')->result_array();
        $getBackground = $this->db->get('tbl_background')->result_array();

        $data = [
            'title' => 'Dashboard',
            'hari' => $getHari,
            'data' => $getData,
            'kajian' => $getKajian,
            'penceramah' => $getPenceramah,
            'background' => $getBackground,
            'daily' => $result
        ];

        $data = [
            'id_hari' => $this->input->post('id_hari'),
            'id_kajian' => $this->input->post('id_kajian'),
            'id_penceramah' => $this->input->post('id_penceramah'),
            'id_background' => $this->input->post('background')[0]
        ];

        $this->db->where('id_daily', $id);
        $this->db->update('tbl_daily', $data);
        $this->session->set_flashdata('msg', 'Berhasil edit data');
        redirect('Dashboard');

    }


    public function hapus($id)
    {
        $this->db->where('id_daily', $id);
        $this->db->delete('tbl_daily');

        $this->session->set_flashdata('msg', 'Berhasil hapus data');
        redirect('Dashboard');
    }
}
