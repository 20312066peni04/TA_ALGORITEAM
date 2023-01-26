<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH."libraries/Server.php";

class DataSiswaUpdate extends Server {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("ModelSiswa","model",TRUE);
    }
    
    function service_post()
    {
        $data = array(
            "nis" => $this->post("nis"),
            "nama_siswa" => $this->post("nama_siswa"),
            "hapus" => $this->post("hapus")
        );

        $this->response(array("pesan" => $this->model->update_data($data, $this->post("id"))),200);
    }
}