<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH."libraries/Server.php";

class DataPinjam extends Server {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("ModelPinjam","model",TRUE);
    }

    function service_get()
    {
        $this->response(array("pinjam" => $this->model->get_data($this->get("id"))),200);
    }
    
    function service_post()
    {
        $data = array(
            "id_buku" => $this->post("id_buku"),
            "id_siswa" => $this->post("id_siswa"),
            "id_pengguna" => $this->post("id_pengguna"),
            "status" => $this->post("status")
        );

        $this->response(array("status" => $this->model->save_data($data)),200);
    }
}