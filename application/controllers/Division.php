<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Division extends MY_Controller {

	public function index()
	{
    $this->use_style([
      '/public/css/division/index.css',
    ]);

    $this->use_script([
      '/public/js/division/index.js',
    ]);

    $this->load->model('division_model');
    $division = $this->division_model->all_division();

    $this->set_data([
      'division' => $division,
    ]);

    $this->render('division/index');
  }

  public function new()
	{
    $this->render('division/new');
  }

  public function create()
	{
    $this->load->model('division_model');
    $insert = $this->division_model->insert_division([
      'name' => $this->input->post('name'),
    ]);

    if ($insert) {
      $_SESSION['notify'] = [
        'text' => 'Division inserted successfully',
        'type' => 'success'
      ];

      redirect('/division');
    }

    $_SESSION['notify'] = [
      'text' => 'Division already exist',
      'type' => 'danger'
    ];

    redirect('/division/new');
  }

  public function edit($id)
	{
    if (empty($id)) {
      $_SESSION['notify'] = [
        'text' => "Division doesn't exist",
        'type' => 'danger'
      ];

      redirect('/division');
    }

    $this->load->model('division_model');
    $division = $this->division_model->get_division($id);

    if (count($division) <= 0) {
      $_SESSION['notify'] = [
        'text' => "Division doesn't exist",
        'type' => 'danger'
      ];

      redirect('/division');
    }

    $this->set_data([
      'division' => $division,
    ]);

    $this->render('division/edit');
  }

  public function update()
	{
    $this->load->model('division_model');
    $update = $this->division_model->update_division([
      'name' => $this->input->post('name'),
    ], $this->input->post('id'));

    if ($update) {
      $_SESSION['notify'] = [
        'text' => 'Division updated successfully',
        'type' => 'success'
      ];

      redirect('/division');
    }

    $_SESSION['notify'] = [
      'text' => 'There is something wrong',
      'type' => 'danger'
    ];

    redirect('/division/new');
  }

  public function delete($id)
	{
    if (empty($id)) {
      $_SESSION['notify'] = [
        'text' => "Division doesn't exist",
        'type' => 'danger'
      ];

      redirect('/division');
    }

    $this->load->model('division_model');
    $delete = $this->division_model->delete_division($id);

    if ($delete) {
      $_SESSION['notify'] = [
        'text' => 'Division deleted successfully',
        'type' => 'success'
      ];

      redirect('/division');
    }

    $_SESSION['notify'] = [
      'text' => 'There is something wrong',
      'type' => 'danger'
    ];

    redirect('/division/new');
  }
}
