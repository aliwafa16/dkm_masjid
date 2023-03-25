<?php
class Kajian extends CI_Controller
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
        $this->form_validation->set_rules('nama_kajian', 'Nama Kajian', 'required|trim', [
            'required' => 'Nama kajian harus diisi !!'
        ]);
        $this->form_validation->set_rules('mulai', 'Mulai', 'required|trim', [
            'required' => 'Waktu mulai kajian harus diisi !!'
        ]);
        $this->form_validation->set_rules('selesai', 'Selesai', 'required|trim', [
            'required' => 'Waktu selesai harus diisi !!'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $getData = $this->db->get('tbl_kajian')->result_array();
            $data = [
                'title' => 'Kajian',
                'data' => $getData
            ];
            $this->load->view('template_admin/header', $data);
            $this->load->view('kajian/index', $data);
            $this->load->view('template_admin/footer');
        } else {
            $data = [
                'nama_kajian' => $this->input->post('nama_kajian'),
                'mulai' => $this->input->post('mulai'),
                'selesai' => $this->input->post('selesai'),
                'keterangan_waktu' => $this->input->post('keterangan_waktu'),
            ];

            $result = $this->db->insert('tbl_kajian', $data);

            if ($result > 0) {
                $this->session->set_flashdata('msg', 'Berhasil tambah data');
            } else {
                $this->session->set_flashdata('msg', 'Gagal tambah data');
            }

            redirect('Kajian');
        }
    }

    public function hapus($id)
    {
        $this->db->where('id_kajian', $id);
        $this->db->delete('tbl_kajian');
        $this->session->set_flashdata('msg', 'Berhasil hapus data');
        redirect('kajian');
    }

    public function edit($id)
    {

        $data = [
            'nama_kajian' => $this->input->post('nama_kajian'),
            'mulai' => $this->input->post('mulai'),
            'selesai' => $this->input->post('selesai'),
            'keterangan_waktu' => $this->input->post('keterangan_waktu')
        ];

        $this->db->where('id_kajian', $id);
        $this->db->update('tbl_kajian', $data);
        $this->session->set_flashdata('msg', 'Berhasil edit data');
        redirect('Kajian');
    }
}
