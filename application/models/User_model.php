<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  public function all_superadmin()
  {
    return $this->db->get_where('user', [
      'role' => 'SUPERADMIN',
    ])->result_array();
  }
}
