<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH."libraries/Server.php";

class Login extends Server {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("ModelPengguna","model",TRUE);
    }

    function service_post()
    {
        $this->response($this->model->get_login(array("username" => $this->post("username"), "password" => $this->post("password"))) ,200);
    }
}