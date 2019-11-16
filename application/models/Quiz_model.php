<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz_model extends CI_Model {

  public function all_quiz()
  {
    return $this->db->get('quiz')->result_array();
  }

  public function get_quiz($id)
  {
    return $this->db->get_where('quiz', [
                                  'id' => $id,
                                ])->result_array()[0];
  }

  public function all_quiz_category()
  {
    return $this->db->get('quiz_category')->result_array();
  }

  public function get_quiz_category($id)
  {
    return $this->db->get_where('quiz_category', [
                                  'id' => $id,
                                ])->result_array()[0];
  }

  public function insert_quiz($params)
  {
    $current = $this->db->get_where('quiz', $params)->result_array();

    if (count($current) > 0) {
      return false;
    }

    return $this->db->insert('quiz', $params);
  }

  public function update_quiz($params, $id)
  {
    $current = $this->db->get_where('quiz', $params)->result_array();

    if (count($current) > 0) {
      return false;
    }

    return $this->db->where('id', $id)->set($params)->update('quiz');
  }

  public function delete_quiz($id)
  {
    return $this->db->delete('quiz', array('id' => $id));
  }
}
