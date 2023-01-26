<?php

class DataBuku extends CI_Controller{
    

    public function _rules(){
        $this->form_validation->set_rules('nama_buku', 'Nama Buku', 'required');
    }
}

?>