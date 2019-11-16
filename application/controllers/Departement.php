<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departement extends MY_Controller {

	public function index()
	{
    $this->set_title('List Departement');

    $this->use_style([
      '/public/css/departement/index.css',
    ]);

    $this->use_script([
      '/public/js/departement/index.js',
    ]);

    $this->load->model('division_model');
    $division = $this->division_model->all_division();

    $this->load->model('departement_model');
    $departement = $this->departement_model->all_departement();

    $this->set_data([
      'division' => $division,
      'departement' => $departement,
    ]);

    $this->render('departement/index');
  }

  public function new()
	{
    $this->set_title('Add New Departement');

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

  public function import()
  {
    $config['upload_path'] = __DIR__ . '/../../upload/departement_file';
    $config['allowed_types'] = 'csv|xls|xlsx';
    $config['encrypt_name'] = TRUE;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('departement_file')) {
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

      $this->load->model('departement_model');
      $insert = $this->departement_model->insert_departement([
        'id' => $cells[0],
        'name' => $cells[1],
        'division' => 1,
      ]);
    }

    redirect('/departement');
  }

  public function edit($id)
	{
    $this->set_title('Edit Departement');

    if (empty($id)) {
      $_SESSION['notify'] = [
        'text' => "Departement doesn't exist",
        'type' => 'danger'
      ];

      redirect('/departement');
    }

    $this->use_script([
      '/public/js/departement/edit.js',
    ]);

    $this->load->model('departement_model');
    $departement = $this->departement_model->get_departement($id);

    $this->load->model('division_model');
    $division = $this->division_model->all_division();

    if (count($departement) <= 0) {
      $_SESSION['notify'] = [
        'text' => "Departement doesn't exist",
        'type' => 'danger'
      ];

      redirect('/departement');
    }

    $this->set_data([
      'departement' => $departement,
      'division' => $division,
    ]);

    $this->render('departement/edit');
  }

  public function update($id)
	{
    if (empty($id)) {
      $_SESSION['notify'] = [
        'text' => "Departement doesn't exist",
        'type' => 'danger'
      ];

      redirect('/departement');
    }

    $this->load->model('departement_model');
    $update = $this->departement_model->update_departement([
      'name' => $this->input->post('name'),
      'division' => $this->input->post('division'),
    ], $id);

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

    redirect('/departement/edit/' . $id);
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

    redirect('/departement');
  }
}
