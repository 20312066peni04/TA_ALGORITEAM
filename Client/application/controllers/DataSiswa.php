<?php

class DataSiswa extends CI_Controller{
    

    public function _rules(){
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nis', 'NIS', 'required');
    }
}

?>