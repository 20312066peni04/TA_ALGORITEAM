<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH."libraries/Server.php";

class DataBukuUpdate extends Server {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("ModelBuku","model",TRUE);
    }
    
    function service_post()
    {
        if (empty($this->input->post("gambar"))){
            $data = array(
                "nama_buku" => $this->input->post("nama_buku"),
                "hapus" => $this->input->post("hapus")
            );    
        } else {
            $data = array(
                "nama_buku" => $this->input->post("nama_buku"),
                "gambar" => $this->input->post("gambar"),
                "hapus" => $this->input->post("hapus")
            );
        }

        $this->response(array("pesan" => $this->model->update_data($data, $this->input->post("id"))),200);
    }
}