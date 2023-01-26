<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH."libraries/Server.php";

class DataPenggunaUpdate extends Server {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("ModelPengguna","model",TRUE);
    }
    
    function service_post()
    {
        $data = array(
            "nip" => $this->input->post("nip"),
            "nama_pengguna" => $this->input->post("nama_pengguna"),
            "username" => $this->input->post("username"),
            "password" => $this->input->post("password"),
            "hapus" => $this->input->post("hapus")
        );
        
        $this->response(array("pesan" => $this->model->update_data($data, $this->input->post("id"))),200);
    }
}