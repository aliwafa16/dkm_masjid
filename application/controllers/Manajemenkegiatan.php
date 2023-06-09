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
        

        if ($this->form_validation->run() == FALSE) {
            $getData = $this->db->get('tbl_kegiatan')->result_array();
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
                'id_qris' => $this->input->post('id_qris')
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
        $this->db->where('id_kegiatan', $id);
        $this->db->delete('tbl_kegiatan');
        $this->session->set_flashdata('msg', 'Berhasil hapus data');
        redirect('Manajemenkegiatan');
    }

}