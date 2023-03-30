<?php
class Penceramah extends CI_Controller
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

        $this->form_validation->set_rules('nama_penceramah', 'Nama penceramah', 'required|trim', [
            'required' => 'Nama penceramah harus diisi !!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat penceramah harus diisi !!'
        ]);
        $this->form_validation->set_rules('no_telp', 'Nomor Telp', 'required|trim', [
            'required' => 'Nomor Telepon harus diisi !!'
        ]);
        if ($this->form_validation->run() == false) {
            $getData = $this->db->get('tbl_penceramah')->result_array();
            $data = [
                'title' => 'Penceramah',
                'data' => $getData
            ];
            $this->load->view('template_admin/header', $data);
            $this->load->view('penceramah/index', $data);
            $this->load->view('template_admin/footer');
        } else {
            $data = [
                'nama_penceramah' => $this->input->post('nama_penceramah'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
                'foto' => $this->_foto()
            ];

            $result = $this->db->insert('tbl_penceramah', $data);

            if ($result > 0) {
                $this->session->set_flashdata('msg', 'Berhasil tambah data');
            } else {
                $this->session->set_flashdata('msg', 'Gagal tambah data');
            }

            redirect('Penceramah');
        }
    }


    public function hapus($id)
    {
        $getData = $this->db->get_where('tbl_penceramah', ['id_penceramah' => $id])->row_array();

        if($getData['foto'] == null){
        }else{
            unlink(FCPATH . 'assets/foto_penceramah/' . $getData['foto']);
        }

        $this->db->where('id_penceramah', $id);
        $this->db->delete('tbl_penceramah');
        $this->session->set_flashdata('msg', 'Berhasil hapus data');
        redirect('Penceramah');
    }

    public function edit($id)
    {

        $this->form_validation->set_rules('nama_penceramah', 'Nama penceramah', 'required|trim', [
            'required' => 'Nama penceramah harus diisi !!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat penceramah harus diisi !!'
        ]);
        $this->form_validation->set_rules('no_telp', 'Nomor Telp', 'required|trim', [
            'required' => 'Nomor Telepon harus diisi !!'
        ]);
        if ($this->form_validation->run() == false) {
            $getData = $this->db->get('tbl_penceramah')->result_array();
            $data = [
                'title' => 'Penceramah',
                'data' => $getData
            ];
            $this->load->view('template_admin/header', $data);
            $this->load->view('penceramah/index', $data);
            $this->load->view('template_admin/footer');
        } else {
            $new_foto = $_FILES['foto']['name'];
            $result = $this->db->get_where('tbl_penceramah', ['id_penceramah' => $id])->row_array();
            $old_image = $result['foto'];
    
            if ($new_foto != null) {
                @unlink(FCPATH . './assets/foto_penceramah/' . $old_image);
                $foto_penceramah = $this->_foto();
            } else {
                $foto_penceramah = $old_image;
            }
    
            $data = [
                'nama_penceramah' => $this->input->post('nama_penceramah'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
                'foto' => $foto_penceramah
            ];
    
            $this->db->where('id_penceramah', $id);
            $this->db->update('tbl_penceramah', $data);
            $this->session->set_flashdata('msg', 'Berhasil edit data');
            redirect('Penceramah');
        }

    }


    private function _foto()
    {
        $config = [
            'upload_path' => './assets/foto_penceramah',
            'allowed_types' => 'jpg|png|jpeg',
            'max_size' => 10048,
            'file_name' => uniqid()
        ];
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto')) {
            return 'default.png';
        } else {
            $foto = $this->upload->data('file_name');
            return $foto;
        }
    }
}
