<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends MY_Controller {

	public function index()
	{
    $this->set_title('List Quiz');

    $this->use_style([
      '/public/css/quiz/index.css',
    ]);

    $this->use_script([
      '/public/js/quiz/index.js',
    ]);

    $this->load->model('quiz_model');
    $quiz = $this->quiz_model->all_quiz();

    $this->set_data([
      'quiz' => $quiz,
      'quiz_model' => $this->quiz_model,
    ]);

    $this->render('quiz/index');
  }

  public function new()
	{
    $this->set_title('Add New Quiz');

    $this->load->model('quiz_model');
    $quiz_category = $this->quiz_model->all_quiz_category();

    $this->set_data([
      'quiz_category' => $quiz_category,
    ]);

    $this->render('quiz/new');
  }

  public function create()
	{
    if ($this->input->post('password') == '') {
      $_SESSION['notify'] = [
        'text' => "Password empty",
        'type' => 'danger'
      ];

      redirect('/quiz/new');
    }

    if ($this->input->post('password') != $this->input->post('confirmpassword')) {
      $_SESSION['notify'] = [
        'text' => "Password & Confirm Password doesn't match",
        'type' => 'danger'
      ];

      redirect('/quiz/new');
    }

    $this->load->model('quiz_model');
    $insert = $this->quiz_model->insert_quiz([
      'nip' => $this->input->post('nip'),
      'name' => $this->input->post('name'),
      'password' => $this->input->post('password'),
      'role' => 'USER'
    ]);

    if ($insert) {
      $_SESSION['notify'] = [
        'text' => 'Quiz added successfully',
        'type' => 'success'
      ];

      redirect('/quiz');
    }

    $_SESSION['notify'] = [
      'text' => 'Quiz already exist',
      'type' => 'danger'
    ];

    redirect('/quiz/new');
  }

  public function import()
  {
    $config['upload_path'] = __DIR__ . '/../../upload/quiz_file';
    $config['allowed_types'] = 'csv|xls|xlsx';
    $config['encrypt_name'] = TRUE;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('quiz_file')) {
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

      $this->load->model('quiz_model');
      $insert = $this->quiz_model->insert_quiz([
        'nip' => $cells[2],
        'name' => $cells[1],
        'password' => md5($cells[4]),
        'email' => '',
        'role' => 'USER',
        'departement' => $cells[0],
        'gender' => $cells[3] === 'L' ? 'MALE' : 'FEMALE',
      ]);
    }

    redirect('/quiz');
  }

  public function edit($id)
	{
    $this->set_title('Edit Quiz');

    if (empty($id)) {
      $_SESSION['notify'] = [
        'text' => "Quiz doesn't exist",
        'type' => 'danger'
      ];

      redirect('/quiz');
    }

    $this->load->model('quiz_model');
    $quiz = $this->quiz_model->get_quiz($id);

    if (count($quiz) <= 0) {
      $_SESSION['notify'] = [
        'text' => "Quiz doesn't exist",
        'type' => 'danger'
      ];

      redirect('/quiz');
    }

    $this->load->model('quiz_model');
    $quiz_category = $this->quiz_model->all_quiz_category();

    $this->set_data([
      'quiz' => $quiz,
      'quiz_category' => $quiz_category,
    ]);

    $this->render('quiz/edit');
  }

  public function update($id)
	{
    if (empty($id)) {
      $_SESSION['notify'] = [
        'text' => "Quiz doesn't exist",
        'type' => 'danger'
      ];

      redirect('/quiz');
    }

    $params = [
      'name' => $this->input->post('name'),
      'duration' => $this->input->post('duration'),
      'date' => $this->input->post('schedule'),
    ];

    $total_quiz_data = [];
    foreach($this->input->post('category') as $key => $category) {
      $total_quiz_data[] = [
        'id' => $category,
        'total' => $this->input->post('total')[$key],
      ];
    }

    $params['total_quiz_data'] = json_encode($total_quiz_data);

    $this->load->model('quiz_model');
    $update = $this->quiz_model->update_quiz($params, $id);

    if ($update) {
      $_SESSION['notify'] = [
        'text' => 'Quiz updated successfully',
        'type' => 'success'
      ];

      redirect('/quiz');
    }

    $_SESSION['notify'] = [
      'text' => 'There is something wrong',
      'type' => 'danger'
    ];

    redirect('/quiz/edit/' . $id);
  }

  public function delete($id)
	{
    if (empty($id)) {
      $_SESSION['notify'] = [
        'text' => "Quiz doesn't exist",
        'type' => 'danger'
      ];

      redirect('/quiz');
    }

    $this->load->model('quiz_model');
    $delete = $this->quiz_model->delete_quiz($id);

    if ($delete) {
      $_SESSION['notify'] = [
        'text' => 'Quiz deleted successfully',
        'type' => 'success'
      ];

      redirect('/quiz');
    }

    $_SESSION['notify'] = [
      'text' => 'There is something wrong',
      'type' => 'danger'
    ];

    redirect('/quiz');
  }
}
