<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends MY_Controller {

	public function index()
	{
    $this->use_style([
      '/public/css/superadmin/index.css',
    ]);

    $this->use_script([
      '/public/js/superadmin/index.js',
    ]);

    $this->load->model('user_model');
    $superadmin = $this->user_model->all_superadmin();

    $this->set_data([
      'superadmin' => $superadmin,
    ]);

    $this->render('superadmin/index');
  }

  public function new()
	{
    $this->render('superadmin/new');
  }
}
