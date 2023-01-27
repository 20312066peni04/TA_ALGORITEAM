<?php

class DataPinjam extends CI_Controller{
    
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
        $data['title'] = "Data Pengguna";
        $pinjam = json_decode($this->client->simple_get(API_PINJAM . 'Update'));
        $data['pinjam'] = $pinjam->pinjam;

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('data_pinjam',$data);
        $this->load->view('templates/footer');
    }

    public function tambah_data()
    {
        $data['title'] = "Tambah Data Peminjam";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('tambah_peminjam',$data);
        $this->load->view('templates/footer');
    }

    public function tambah_data_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE){
            $this->tambah_data();
        } else {
            $data = array(
                'id_siswa' => $this->input->post('id_siswa'),
                'id_buku' => $this->input->post('id_buku'),
                'id_pengguna' => $this->session->userdata('id'),
                'status' => "1"
            );

            $response = json_decode($this->client->simple_post(API_PINJAM, $data));
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
        $send = array('id' => $id);
        $response = json_decode($this->client->simple_get(API_PINJAM, $send));

        $data = array(
            'id' => $id,
            'id_siswa' => $response->pinjam[0]->id_siswa,
            'id_buku' => $response->pinjam[0]->id_buku,
            'id_pengguna' => $this->session->userdata('id'),
            'status' => "0"
        );

        $response = json_decode($this->client->simple_post(API_PINJAM . 'Update', $data));
        if ($response->pesan){
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil disimpan</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data gagal disimpan</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        }


        $this->index();
    }

    public function _rules(){
        $this->form_validation->set_rules('id_buku', 'ID Buku', 'required');
        $this->form_validation->set_rules('id_siswa', 'ID Siswa/Siswi', 'required');
    }
}

?>