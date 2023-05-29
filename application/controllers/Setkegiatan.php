<?php
class Setkegiatan extends CI_Controller
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


        $this->form_validation->set_rules('id_kegiatan', 'Nama Kegiatan', 'required|trim', [
            'required' => 'Nama Kegiatan harus dipilih !!'
        ]);

        if ($this->form_validation->run() == false) {
            $getData = $this->db->get('tbl_kegiatan')->result_array();
            $data = [
                'title' => 'Kegiatan',
                'data' => $getData
            ];
            $this->load->view('template_admin/header', $data);
            $this->load->view('set_kegiatan/index', $data);
            $this->load->view('template_admin/footer');
        } else {

            $namaKegiatan = $this->input->post('id_kegiatan');
            $gambarKegiatan = $this->input->post('id_fotokegiatan');

            if (!empty($gambarKegiatan)) {
                foreach ($gambarKegiatan as $key) {
                    $result = $this->db->query("INSERT INTO `tbl_set_kegiatan`(`id_kegiatan`, `id_fotokegiatan`)VALUE('" . $namaKegiatan . "', '" . $key . "')");
                }
            }

            if ($result > 0) {
                $this->session->set_flashdata('msg', 'Berhasil tambah data');
            } else {
                $this->session->set_flashdata('msg', 'Gagal tambah data');
            }

            redirect('Setkegiatan');
        }
    }


    public function hapus($id)
    {
        $this->db->where('id_setkegiatan', $id);
        $this->db->delete('tbl_set_kegiatan');
        $this->session->set_flashdata('msg', 'Berhasil hapus data');
        redirect('Setkegiatan');
    }
}
