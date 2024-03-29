<?php

class DataPengguna extends CI_Controller{
    
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
        $send = array('id' => "");
        $data['title'] = "Data Pengguna";
        $pengguna = json_decode($this->client->simple_get(API_PENGGUNA, $send));
        $data['pengguna'] = $pengguna->pengguna;

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('data_pengguna',$data);
        $this->load->view('templates/footer');
    }

    public function tambah_data()
    {
        $send = array('id' => "");
        $data['title'] = "Tambah Data Pengguna";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('tambah_pengguna',$data);
        $this->load->view('templates/footer');
    }

    public function tambah_data_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE){
            $this->tambah_data();
        } else {
            $data = array(
                'nip' => $this->input->post('nip'),
                'nama_pengguna' => $this->input->post('nama_lengkap'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'hapus'     => '1'
            );

            $response = json_decode($this->client->simple_post(API_PENGGUNA, $data));
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
        $response = json_decode($this->client->simple_get(API_PENGGUNA, $send));
        $data['pengguna'] = $response->pengguna;
        $data['id'] = $id;

        $data['title'] = "Update Data Pengguna " . $response->pengguna[0]->nama_pengguna;
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('update_pengguna',$data);
        $this->load->view('templates/footer');
    }

    public function update_data_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE){
            $this->index();
        } else {
            $data = array(
                'id' => $this->input->post('id'),
                'nip' => $this->input->post('nip'),
                'nama_pengguna' => $this->input->post('nama_lengkap'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'hapus'     => '1'
            );

            $hasil = $this->client->simple_post(API_PENGGUNA . 'Update', $data);
            echo $hasil;
            $response = json_decode($hasil);
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
        $response = json_decode($this->client->simple_get(API_PENGGUNA, $send));
        $response->pengguna[0];

        $data = array(
                'id' => $id,
                'nip' => $response->pengguna[0]->nip,
                'nama_pengguna' => $response->pengguna[0]->nama_pengguna,
                'username' => $response->pengguna[0]->username,
                'password' => $response->pengguna[0]->password,
                'hapus'     => '0'
        );

        $response = json_decode($this->client->simple_post(API_PENGGUNA . 'Update', $data));
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
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    }
}

?>