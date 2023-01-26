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
    

    public function _rules(){
        $this->form_validation->set_rules('id_buku', 'ID Buku', 'required');
        $this->form_validation->set_rules('id_siswa', 'ID Siswa/Siswi', 'required');
    }
}

?>