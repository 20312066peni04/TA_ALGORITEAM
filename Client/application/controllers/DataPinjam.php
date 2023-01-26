<?php

class DataPinjam extends CI_Controller{
    

    public function _rules(){
        $this->form_validation->set_rules('id_buku', 'ID Buku', 'required');
        $this->form_validation->set_rules('id_siswa', 'ID Siswa/Siswi', 'required');
    }
}

?>