<?php

class DataBuku extends CI_Controller{
    
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
        $data['title'] = "Data Buku";
        $buku = json_decode($this->client->simple_get(API_BUKU, $send));
        $data['buku'] = $buku->buku;

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('data_buku',$data);
        $this->load->view('templates/footer');
    }

    public function _rules(){
        $this->form_validation->set_rules('nama_buku', 'Nama Buku', 'required');
    }
}

?>