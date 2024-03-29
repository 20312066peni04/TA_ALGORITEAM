<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH."libraries/Server.php";

class DataPengguna extends Server {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("ModelPengguna","model",TRUE);
    }

    function service_get()
    {
        $hasil = $this->model->get_data($this->input->get("id"));
        $number = sizeof($hasil);
        $this->response(array("pengguna" => $hasil, "pengguna_jumlah" => $number),200);
    }
    
    function service_post()
    {
        $this->response(array("pesan" => $this->model->save_data(array("nip" => $this->input->post("nip"), "nama_pengguna" => $this->input->post("nama_pengguna"), "username" => $this->input->post("username"), "password" => $this->input->post("password"), "hapus" => $this->input->post("hapus")))),200);
    }
}