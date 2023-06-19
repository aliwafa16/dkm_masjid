<?php
class Manajemenhalawal extends CI_Controller
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
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

        if ($this->form_validation->run() == false) {
            $getData = $this->db->get('tbl_hal_awal')->result_array();
            $data = [
                'title' => 'Manajemen Halaman Awal',
                'data' => $getData
            ];

            $this->load->view('template_admin/header', $data);
            $this->load->view('manajemen_hal_awal/index', $data);
            $this->load->view('template_admin/footer');
        } else {
            $data = [
                'keterangan' => $this->input->post('keterangan'),
                'logo' => $this->_logo(),
                'background' => $this->_background(),
                'status' => $this->input->post('status')
            ];

            $result = $this->db->insert('tbl_hal_awal', $data);

            if ($result > 0) {
                $this->session->set_flashdata('msg', 'Berhasil tambah data');
            } else {
                $this->session->set_flashdata('msg', 'Gagal tambah data');
            }

            redirect('Manajemenhalawal');
        }
    }

    public function edit($id)
    {

        $this->form_validation->set_rules('keterangan', 'Nama penceramah', 'trim');

        if ($this->form_validation->run() == false) {
            $getData = $this->db->get('tbl_hal_awal')->result_array();
            $data = [
                'title' => 'Manajemen Halaman Awal',
                'data' => $getData
            ];
            $this->load->view('template_admin/header', $data);
            $this->load->view('manajemen_hal_awal/index', $data);
            $this->load->view('template_admin/footer');
        } else {
            $new_foto = $_FILES['logo']['name'];
            $result = $this->db->get_where('tbl_hal_awal', ['id' => $id])->row_array();
            $old_image = $result['logo'];

            if ($new_foto != null) {
                @unlink(FCPATH . './assets/halaman_awal/' . $old_image);
                $logo = $this->_logo();
            } else {
                $logo = $old_image;
            }

            $new_bg = $_FILES['background']['name'];
            $resultbg = $this->db->get_where('tbl_hal_awal', ['id' => $id])->row_array();
            $old_bg = $resultbg['background'];

            if ($new_bg != null) {
                @unlink(FCPATH . './assets/halaman_awal/' . $old_bg);
                $background = $this->_background();
            } else {
                $background = $old_bg;
            }

            $data = [
                'keterangan' => $this->input->post('keterangan'),
                'logo' => $logo,
                'background' => $background,
                'status' => $this->input->post('status'),
            ];

            $this->db->where('id', $id);
            $this->db->update('tbl_hal_awal', $data);
            $this->session->set_flashdata('msg', 'Berhasil edit data');
            redirect('Manajemenhalawal');
        }
    }

    public function hapus($id)
    {
        $getData = $this->db->get_where('tbl_hal_awal', ['id' => $id])->row_array();

        if ($getData['logo'] == null) {
        } else {
            unlink(FCPATH . 'assets/halaman_awal/' . $getData['logo']);
        }

        if ($getData['background'] == null) {
        } else {
            unlink(FCPATH . 'assets/halaman_awal/' . $getData['background']);
        }

        $this->db->where('id', $id);
        $this->db->delete('tbl_hal_awal');
        $this->session->set_flashdata('msg', 'Berhasil hapus data');
        redirect('Manajemenhalawal');
    }

    private function _logo()
    {
        $config = [
            'upload_path' => './assets/halaman_awal',
            'allowed_types' => 'jpg|png|jpeg',
            'max_size' => 10048,
            'file_name' => uniqid()
        ];
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('logo')) {
            return 'default.png';
        } else {
            $logo = $this->upload->data('file_name');
            return $logo;
        }
    }

    private function _background()
    {
        $config = [
            'upload_path' => './assets/halaman_awal',
            'allowed_types' => 'jpg|png|jpeg',
            'max_size' => 10048,
            'file_name' => uniqid()
        ];
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('background')) {
            return 'default.png';
        } else {
            $background = $this->upload->data('file_name');
            return $background;
        }
    }
}
