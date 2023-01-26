<?php

class Dashboard extends CI_Controller{
    
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
        $data['title'] = "Dashboard";

        $buku = json_decode($this->client->simple_get(API_BUKU));
        $pengguna = json_decode($this->client->simple_get(API_PENGGUNA));
        // $pinjam = json_decode($this->client->simple_get(API_PINJAM));
        $siswa = json_decode($this->client->simple_get(API_SISWA));

        $data['buku'] = $buku->buku_jumlah;
        $data['pengguna'] = $pengguna->pengguna_jumlah;
        $data['pinjam'] = 0;
        $data['siswa'] = $siswa->siswa_jumlah;

        $this->load->view('templates/header',$data);
        // $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard',$data);
        // $this->load->view('admin/dashboard',$data);
        $this->load->view('templates/footer');
    }
}

?>