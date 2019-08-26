<?php

class MY_Controller extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

    $this->data = [];
    $this->content = '';
    $this->layout = 'application';
    $this->site_name = 'Learning Center';
    $this->style = [];
    $this->script = [];

    $this->set_title('Dashboard Administrator');
  }

  public function set_title($title)
  {
    $this->title = $title . ' | ' . $this->site_name;
  }

  public function render($page, $data = [])
  {
    $optional_data = [
      'title' => $this->title,
      'data' => $this->data,
    ];

    if (strlen($page) > 0) {
      $this->content = $this->load->view("pages/" . $page, array_merge($data, $optional_data), TRUE);
    }
  }

  public function set_layout($layout)
  {
    if (strlen($layout) > 0) {
      $this->layout = $layout;
    }
  }

  public function set_data($data = [])
  {
    $this->data = $data;
  }

  public function use_style($style = [])
  {
    $this->style = $style;
  }

  public function use_script($script = [])
  {
    $this->script = $script;
  }

  public function _output($output)
  {
    $data = [
      "style" => $this->style,
      "script" => $this->script,
      "content" => $this->content,
    ];

    echo $this->load->view("layouts/" . $this->layout . "/index", $data, TRUE);
  }
}
