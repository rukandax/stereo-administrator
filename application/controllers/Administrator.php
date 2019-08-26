<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends MY_Controller {

	public function index()
	{
    $this->use_style([
      '/public/css/administrator.css',
    ]);

    $this->use_script([
      '/public/js/administrator.js',
    ]);

    $this->load->model('user_model');
    $administrator = $this->user_model->all_administrator();

    $this->set_data([
      'administrator' => $administrator,
    ]);

    $this->render('administrator');
	}
}
