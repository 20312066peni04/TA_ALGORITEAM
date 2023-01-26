<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
