<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageError extends MY_Controller {

	public function not_found()
	{
    $this->set_title('Page Not Found');
    $this->set_layout('blank');
    $this->render('not_found');
	}
}
