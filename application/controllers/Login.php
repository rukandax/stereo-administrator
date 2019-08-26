<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function index()
	{
    $this->set_title('Login Administrator');
    $this->set_layout('focus');
    $this->render('login');
	}
}
