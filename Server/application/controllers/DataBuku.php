<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH."libraries/Server.php";

class DataBuku extends Server {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("ModelBuku","model",TRUE);
    }
    
    function service_post()
    {
        $data = array(
            "nama_buku" => $this->post("nama_buku"),
            "gambar" => $this->post("gambar"),
            "hapus" => $this->post("hapus")
        );

        $this->response(array("status" => $this->model->save_data($data)),200);
    }
}