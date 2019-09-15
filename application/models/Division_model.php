<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Division_model extends CI_Model {

  public function all_division()
  {
    return $this->db->get('division')->result_array();
  }

  public function insert_division($params)
  {
    $current = $this->db->get_where('division', $params)->result_array();

    if (count($current) > 0) {
      return false;
    }

    return $this->db->insert('division', $params);
  }

  public function delete_division($id)
  {
    return $this->db->delete('division', array('id' => $id));
  }
}
