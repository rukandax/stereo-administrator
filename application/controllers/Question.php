<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends MY_Controller {

	public function index()
	{
    $this->set_title('List Question');

    $this->use_style([
      '/public/css/question/index.css',
    ]);

    $this->use_script([
      '/public/js/question/index.js',
    ]);

    $this->load->model('question_model');
    $question = $this->question_model->all_question();

    $this->set_data([
      'question' => $question,
      'question_model' => $this->question_model,
    ]);

    $this->render('question/index');
  }

  public function new()
	{
    $this->set_title('Add New Question');

    $this->load->model('question_model');
    $question_category = $this->question_model->all_question_category();

    $this->set_data([
      'question_category' => $question_category,
    ]);

    $this->render('question/new');
  }

  public function create()
	{
    $this->load->model('question_model');

    $params = [
      'name' => $this->input->post('name'),
      'duration' => $this->input->post('duration'),
      'date' => $this->input->post('schedule'),
    ];

    $total_question_data = [];
    foreach($this->input->post('category') as $key => $category) {
      $total_question_data[] = [
        'id' => $category,
        'total' => $this->input->post('total')[$key],
      ];
    }

    $params['total_question_data'] = json_encode($total_question_data);

    $insert = $this->question_model->insert_question($params);

    if ($insert) {
      $_SESSION['notify'] = [
        'text' => 'Question added successfully',
        'type' => 'success'
      ];

      redirect('/question');
    }

    $_SESSION['notify'] = [
      'text' => 'There is something wrong',
      'type' => 'danger'
    ];

    redirect('/question/new');
  }

  public function edit($id)
	{
    $this->set_title('Edit Question');

    if (empty($id)) {
      $_SESSION['notify'] = [
        'text' => "Question doesn't exist",
        'type' => 'danger'
      ];

      redirect('/question');
    }

    $this->load->model('question_model');
    $question = $this->question_model->get_question($id);

    if (count($question) <= 0) {
      $_SESSION['notify'] = [
        'text' => "Question doesn't exist",
        'type' => 'danger'
      ];

      redirect('/question');
    }

    $this->load->model('question_model');
    $question_category = $this->question_model->all_question_category();

    $this->set_data([
      'question' => $question,
      'question_category' => $question_category,
    ]);

    $this->render('question/edit');
  }

  public function update($id)
	{
    if (empty($id)) {
      $_SESSION['notify'] = [
        'text' => "Question doesn't exist",
        'type' => 'danger'
      ];

      redirect('/question');
    }

    $params = [
      'name' => $this->input->post('name'),
      'duration' => $this->input->post('duration'),
      'date' => $this->input->post('schedule'),
    ];

    $total_question_data = [];
    foreach($this->input->post('category') as $key => $category) {
      $total_question_data[] = [
        'id' => $category,
        'total' => $this->input->post('total')[$key],
      ];
    }

    $params['total_question_data'] = json_encode($total_question_data);

    $this->load->model('question_model');
    $update = $this->question_model->update_question($params, $id);

    if ($update) {
      $_SESSION['notify'] = [
        'text' => 'Question updated successfully',
        'type' => 'success'
      ];

      redirect('/question');
    }

    $_SESSION['notify'] = [
      'text' => 'There is something wrong',
      'type' => 'danger'
    ];

    redirect('/question/edit/' . $id);
  }

  public function delete($id)
	{
    if (empty($id)) {
      $_SESSION['notify'] = [
        'text' => "Question doesn't exist",
        'type' => 'danger'
      ];

      redirect('/question');
    }

    $this->load->model('question_model');
    $delete = $this->question_model->delete_question($id);

    if ($delete) {
      $_SESSION['notify'] = [
        'text' => 'Question deleted successfully',
        'type' => 'success'
      ];

      redirect('/question');
    }

    $_SESSION['notify'] = [
      'text' => 'There is something wrong',
      'type' => 'danger'
    ];

    redirect('/question');
  }
}
