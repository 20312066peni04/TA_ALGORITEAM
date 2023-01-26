<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE){
			$data['title'] = "Form - Login";
            $this->load->view('templates/header',$data);
			$this->load->view('login',$data);
        } else {
			$send = array('username' => $this->input->post('username'), 'password' => $this->input->post('password'));
			$check = json_decode($this->client->simple_post(API_LOGIN, $send));
			if ($check->login > 0){
				$this->session->set_userdata('id', $check->id);
				redirect("/Dashboard");
			} else {
				$this->session->set_flashdata('pesan', $hasil . '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Username atau password Salah</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
				redirect("/");
			}
		}
        
	}

	public function _rules(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    }

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}
}
