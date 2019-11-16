<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function index()
	{
    $this->set_title('List User');

    $this->use_style([
      '/public/css/user/index.css',
    ]);

    $this->use_script([
      '/public/js/user/index.js',
    ]);

    $this->load->model('user_model');
    $user = $this->user_model->all_user();

    $this->set_data([
      'user' => $user,
    ]);

    $this->render('user/index');
  }

  public function new()
	{
    $this->set_title('Add New User');

    $this->use_script([
      '/public/js/user/new.js',
    ]);

    $this->load->model('division_model');
    $division = $this->division_model->all_division();

    $this->set_data([
      'division' => $division,
    ]);

    $this->render('user/new');
  }

  public function create()
	{
    if ($this->input->post('password') == '') {
      $_SESSION['notify'] = [
        'text' => "Password empty",
        'type' => 'danger'
      ];

      redirect('/user/new');
    }

    if ($this->input->post('password') != $this->input->post('confirmpassword')) {
      $_SESSION['notify'] = [
        'text' => "Password & Confirm Password doesn't match",
        'type' => 'danger'
      ];

      redirect('/user/new');
    }

    $this->load->model('user_model');
    $insert = $this->user_model->insert_user([
      'nip' => $this->input->post('nip'),
      'name' => $this->input->post('name'),
      'password' => md5($this->input->post('password')),
      'role' => 'USER',
      'departement' => $this->input->post('departement'),
    ]);

    if ($insert) {
      $_SESSION['notify'] = [
        'text' => 'User added successfully',
        'type' => 'success'
      ];

      redirect('/user');
    }

    $_SESSION['notify'] = [
      'text' => 'User already exist',
      'type' => 'danger'
    ];

    redirect('/user/new');
  }

  public function import()
  {
    $config['upload_path'] = __DIR__ . '/../../upload/user_file';
    $config['allowed_types'] = 'csv|xls|xlsx';
    $config['encrypt_name'] = TRUE;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('user_file')) {
      $error = array('error' => $this->upload->display_errors());
    } else {
      $data = array('upload_data' => $this->upload->data());
    }

    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($data['upload_data']['full_path']);
    $worksheet = $spreadsheet->getActiveSheet();
    $skip_row = 1;

    foreach ($worksheet->getRowIterator() as $key => $row) {
      if ($key <= $skip_row) {
        continue;
      }

      $cellIterator = $row->getCellIterator();
      $cellIterator->setIterateOnlyExistingCells(FALSE);
      $cells = [];

      foreach ($cellIterator as $cell) {
        $cells[] = $cell->getValue();
      }

      $this->load->model('user_model');
      $insert = $this->user_model->insert_user([
        'nip' => $cells[2],
        'name' => $cells[1],
        'password' => md5($cells[4]),
        'email' => '',
        'role' => 'USER',
        'departement' => $cells[0],
        'gender' => $cells[3] === 'L' ? 'MALE' : 'FEMALE',
      ]);
    }

    redirect('/user');
  }

  public function edit($id)
	{
    $this->set_title('Edit User');

    $this->use_script([
      '/public/js/user/edit.js',
    ]);

    if (empty($id)) {
      $_SESSION['notify'] = [
        'text' => "User doesn't exist",
        'type' => 'danger'
      ];

      redirect('/user');
    }

    $this->load->model('user_model');
    $user = $this->user_model->get_user($id);

    if (count($user) <= 0) {
      $_SESSION['notify'] = [
        'text' => "User doesn't exist",
        'type' => 'danger'
      ];

      redirect('/user');
    }

    $this->load->model('division_model');
    $division = $this->division_model->all_division();

    $this->set_data([
      'user' => $user,
      'division' => $division,
    ]);

    $this->render('user/edit');
  }

  public function update($id)
	{
    if ($this->input->post('password') != $this->input->post('confirmpassword')) {
      $_SESSION['notify'] = [
        'text' => "Password & Confirm Password doesn't match",
        'type' => 'danger'
      ];

      redirect('/user/edit/' . $id);
    }

    if (empty($id)) {
      $_SESSION['notify'] = [
        'text' => "User doesn't exist",
        'type' => 'danger'
      ];

      redirect('/user');
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

        redirect('/user/edit/' . $id);
      }

      $params['password'] = $this->input->post('password');
    }

    $this->load->model('user_model');
    $update = $this->user_model->update_user($params, $id);

    if ($update) {
      $_SESSION['notify'] = [
        'text' => 'User updated successfully',
        'type' => 'success'
      ];

      redirect('/user');
    }

    $_SESSION['notify'] = [
      'text' => 'There is something wrong',
      'type' => 'danger'
    ];

    redirect('/user/edit/' . $id);
  }

  public function delete($id)
	{
    if (empty($id)) {
      $_SESSION['notify'] = [
        'text' => "User doesn't exist",
        'type' => 'danger'
      ];

      redirect('/user');
    }

    $this->load->model('user_model');
    $delete = $this->user_model->delete_user($id);

    if ($delete) {
      $_SESSION['notify'] = [
        'text' => 'User deleted successfully',
        'type' => 'success'
      ];

      redirect('/user');
    }

    $_SESSION['notify'] = [
      'text' => 'There is something wrong',
      'type' => 'danger'
    ];

    redirect('/user');
  }
}
