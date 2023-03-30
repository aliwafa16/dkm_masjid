<?php
class Rekening extends CI_Controller
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

        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required|trim', [
            'required' => 'Nama bank harus diisi !!'
        ]);
        $this->form_validation->set_rules('no_rek', 'Nomor Rekening', 'required|trim', [
            'required' => 'Nomor rekening harus diisi !!'
        ]);
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim', [
            'required' => 'keterangan harus diisi !!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $getData = $this->db->get('tbl_rekening')->result_array();
            $data = [
                'title' => 'Rekening',
                'data' => $getData
            ];
            $this->load->view('template_admin/header', $data);
            $this->load->view('rekening/index', $data);
            $this->load->view('template_admin/footer');
        }else{
            $data = [
                'nama_bank' => $this->input->post('nama_bank'),
                'no_rek' => $this->input->post('no_rek'),
                'keterangan' => $this->input->post('keterangan'),
            ];

            $result = $this->db->insert('tbl_rekening', $data);

            if ($result > 0) {
                $this->session->set_flashdata('msg', 'Berhasil tambah data');
            } else {
                $this->session->set_flashdata('msg', 'Gagal tambah data');
            }

            redirect('Rekening');
        }

    }

    public function hapus($id)
    {
        $this->db->where('id_rekening', $id);
        $this->db->delete('tbl_rekening');
        $this->session->set_flashdata('msg', 'Berhasil hapus data');
        redirect('Rekening');
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required|trim', [
            'required' => 'Nama bank harus diisi !!'
        ]);
        $this->form_validation->set_rules('no_rek', 'Nomor Rekening', 'required|trim', [
            'required' => 'Nomor rekening harus diisi !!'
        ]);
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim', [
            'required' => 'keterangan harus diisi !!'
        ]);
        
        if ($this->form_validation->run() == FALSE) {
            $getData = $this->db->get('tbl_rekening')->result_array();
            $data = [
                'title' => 'Rekening',
                'data' => $getData
            ];
            $this->load->view('template_admin/header', $data);
            $this->load->view('rekening/index', $data);
            $this->load->view('template_admin/footer');
        }else{

            $data = [
                'nama_bank' => $this->input->post('nama_bank'),
                'no_rek' => $this->input->post('no_rek'),
                'keterangan' => $this->input->post('keterangan')
            ];
    
            $this->db->where('id_rekening', $id);
            $this->db->update('tbl_rekening', $data);
            $this->session->set_flashdata('msg', 'Berhasil edit data');
            redirect('Rekening');
        }

    }
}
