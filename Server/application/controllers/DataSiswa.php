<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH."libraries/Server.php";

class DataSiswa extends Server {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("ModelSiswa","model",TRUE);
    }
    
    function service_post()
    {
        $data = array(
            "nis" => $this->input->post("nis"),
            "nama_siswa" => $this->input->post("nama_siswa"),
            "hapus" => $this->input->post("hapus")
        );

        $this->response(array("pesan" => $this->model->save_data($data)),200);
    }
}