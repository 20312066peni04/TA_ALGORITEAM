<?php

class DataSiswa extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        if (empty($this->session->userdata('id'))){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Anda belum login!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
			redirect("Login");
        }
    }
    
    public function index()
    {
        $siswa = json_decode($this->client->simple_get(API_SISWA, array('id' => "")));
        $data['title'] = "Data Siswa";
        $data['siswa'] = $siswa->siswa;

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('data_siswa',$data);
        $this->load->view('templates/footer');
    }

    public function tambah_data()
    {
        $data['title'] = "Tambah Data Siswa";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('tambah_siswa',$data);
        $this->load->view('templates/footer');
    }

    public function tambah_data_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE){
            $this->tambah_data();
        } else {
            $response = json_decode($this->client->simple_post(API_SISWA, array('nis' => $this->input->post('nis'), 'nama_siswa' => $this->input->post('nama_lengkap'), 'hapus'=>'1')));
            if ($response->pesan){
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil ditambahkan</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data gagal ditambahkan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            }

            $this->index();
        }
    }

    public function update_data($id)
    {
        $response = json_decode($this->client->simple_get(API_SISWA, array('id' => $id)));
        $data['siswa'] = $response->siswa;
        $data['id'] = $id;

        $data['title'] = "Update Data Siswa " . $response->siswa[0]->nama_siswa;
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('update_siswa',$data);
        $this->load->view('templates/footer');
    }

    public function update_data_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE){
            $this->index();
        } else {
            $response = json_decode($this->client->simple_post(API_SISWA . 'Update', array('id' => $this->input->post('id'), 'nis' => $this->input->post('nis'), 'nama_siswa' => $this->input->post('nama_lengkap'), 'hapus'=>'1')));
            if ($response->pesan){
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diUpdate</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data gagal diUpdate</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            }

            $this->index();
        }
    }

    public function delete_data($id)
    {
        $send = array('id' => $id);
        $response = json_decode($this->client->simple_get(API_SISWA, $send));

        $data = array(
                'id' => $id,
                'nis' => $response->siswa[0]->nis,
                'nama_siswa' => $response->siswa[0]->nama_siswa,
                'hapus'     => '0'
            );

        $response = json_decode($this->client->simple_post(API_SISWA . 'Update', $data));
        if ($response->pesan){
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data gagal dihapus</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        }

        $this->index();
    }

    public function _rules(){
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nis', 'NIS', 'required');
    }
}

?>