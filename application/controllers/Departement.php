<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departement extends MY_Controller {

	public function index()
	{
    $this->use_style([
      '/public/css/departement/index.css',
    ]);

    $this->use_script([
      '/public/js/departement/index.js',
    ]);

    $this->load->model('departement_model');
    $departement = $this->departement_model->all_departement();

    $this->set_data([
      'departement' => $departement,
    ]);

    $this->render('departement/index');
  }

  public function new()
	{
    $this->load->model('division_model');
    $division = $this->division_model->all_division();

    $this->set_data([
      'division' => $division,
    ]);

    $this->render('departement/new');
  }

  public function create()
	{
    $this->load->model('departement_model');
    $insert = $this->departement_model->insert_departement([
      'name' => $this->input->post('name'),
      'division' => $this->input->post('division'),
    ]);

    if ($insert) {
      $_SESSION['notify'] = [
        'text' => 'Departement added successfully',
        'type' => 'success'
      ];

      redirect('/departement');
    }

    $_SESSION['notify'] = [
      'text' => 'Departement already exist',
      'type' => 'danger'
    ];

    redirect('/departement/new');
  }

  public function edit($id)
	{
    if (empty($id)) {
      $_SESSION['notify'] = [
        'text' => "Departement doesn't exist",
        'type' => 'danger'
      ];

      redirect('/departement');
    }

    $this->load->model('departement_model');
    $departement = $this->departement_model->get_departement($id);

    if (count($departement) <= 0) {
      $_SESSION['notify'] = [
        'text' => "Departement doesn't exist",
        'type' => 'danger'
      ];

      redirect('/departement');
    }

    $this->set_data([
      'departement' => $departement,
    ]);

    $this->render('departement/edit');
  }

  public function update()
	{
    $this->load->model('departement_model');
    $update = $this->departement_model->update_departement([
      'name' => $this->input->post('name'),
    ], $this->input->post('id'));

    if ($update) {
      $_SESSION['notify'] = [
        'text' => 'Departement updated successfully',
        'type' => 'success'
      ];

      redirect('/departement');
    }

    $_SESSION['notify'] = [
      'text' => 'There is something wrong',
      'type' => 'danger'
    ];

    redirect('/departement/new');
  }

  public function delete($id)
	{
    if (empty($id)) {
      $_SESSION['notify'] = [
        'text' => "Departement doesn't exist",
        'type' => 'danger'
      ];

      redirect('/departement');
    }

    $this->load->model('departement_model');
    $delete = $this->departement_model->delete_departement($id);

    if ($delete) {
      $_SESSION['notify'] = [
        'text' => 'Departement deleted successfully',
        'type' => 'success'
      ];

      redirect('/departement');
    }

    $_SESSION['notify'] = [
      'text' => 'There is something wrong',
      'type' => 'danger'
    ];

    redirect('/departement/new');
  }
}
