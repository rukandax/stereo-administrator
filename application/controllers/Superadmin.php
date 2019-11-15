<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends MY_Controller {

	public function index()
	{
    $this->set_title('List Super Admin');

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
    $this->set_title('Add New Super Admin');

    $this->render('superadmin/new');
  }

  public function create()
	{
    if ($this->input->post('password') == '') {
      $_SESSION['notify'] = [
        'text' => "Password empty",
        'type' => 'danger'
      ];

      redirect('/superadmin/new');
    }

    if ($this->input->post('password') != $this->input->post('confirmpassword')) {
      $_SESSION['notify'] = [
        'text' => "Password & Confirm Password doesn't match",
        'type' => 'danger'
      ];

      redirect('/superadmin/new');
    }

    $this->load->model('user_model');
    $insert = $this->user_model->insert_user([
      'nip' => $this->input->post('nip'),
      'name' => $this->input->post('name'),
      'password' => $this->input->post('password'),
      'role' => 'SUPERADMIN'
    ]);

    if ($insert) {
      $_SESSION['notify'] = [
        'text' => 'Super Admin added successfully',
        'type' => 'success'
      ];

      redirect('/superadmin');
    }

    $_SESSION['notify'] = [
      'text' => 'Super Admin already exist',
      'type' => 'danger'
    ];

    redirect('/superadmin/new');
  }

  public function edit($id)
	{
    $this->set_title('Edit Super Admin');

    if (empty($id)) {
      $_SESSION['notify'] = [
        'text' => "Super Admin doesn't exist",
        'type' => 'danger'
      ];

      redirect('/superadmin');
    }

    $this->load->model('user_model');
    $superadmin = $this->user_model->get_superadmin($id)[0];

    if (count($superadmin) <= 0) {
      $_SESSION['notify'] = [
        'text' => "Super Admin doesn't exist",
        'type' => 'danger'
      ];

      redirect('/superadmin');
    }

    $this->set_data([
      'superadmin' => $superadmin,
    ]);

    $this->render('superadmin/edit');
  }

  public function update($id)
	{
    if ($this->input->post('password') != $this->input->post('confirmpassword')) {
      $_SESSION['notify'] = [
        'text' => "Password & Confirm Password doesn't match",
        'type' => 'danger'
      ];

      redirect('/superadmin/edit/' . $id);
    }

    if (empty($id)) {
      $_SESSION['notify'] = [
        'text' => "Super Admin doesn't exist",
        'type' => 'danger'
      ];

      redirect('/superadmin');
    }

    $params = [
      'nip' => $this->input->post('nip'),
      'name' => $this->input->post('name'),
    ];

    if ($this->input->post('password') != '') {
      if ($this->input->post('password') != $this->input->post('confirmpassword')) {
        $_SESSION['notify'] = [
          'text' => "Password & Confirm Password doesn't match",
          'type' => 'danger'
        ];

        redirect('/superadmin/edit/' . $id);
      }

      $params['password'] = $this->input->post('password');
    }

    $this->load->model('user_model');
    $update = $this->user_model->update_user($params, $id);

    if ($update) {
      $_SESSION['notify'] = [
        'text' => 'Super Admin updated successfully',
        'type' => 'success'
      ];

      redirect('/superadmin');
    }

    $_SESSION['notify'] = [
      'text' => 'There is something wrong',
      'type' => 'danger'
    ];

    redirect('/superadmin/edit/' . $id);
  }

  public function delete($id)
	{
    if (empty($id)) {
      $_SESSION['notify'] = [
        'text' => "Super Admin doesn't exist",
        'type' => 'danger'
      ];

      redirect('/superadmin');
    }

    $this->load->model('user_model');
    $delete = $this->user_model->delete_user($id);

    if ($delete) {
      $_SESSION['notify'] = [
        'text' => 'Super Admin deleted successfully',
        'type' => 'success'
      ];

      redirect('/superadmin');
    }

    $_SESSION['notify'] = [
      'text' => 'There is something wrong',
      'type' => 'danger'
    ];

    redirect('/superadmin');
  }
}
