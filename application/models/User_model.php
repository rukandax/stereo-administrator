<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  public function all_user()
  {
    return $this->db->select('*, user.id as user_id, user.name as user_name, departement.id as departement_id, departement.name as departement_name, division.id as division_id, division.name as division_name')
                    ->join('departement', 'departement.id = user.departement')
                    ->join('division', 'division.id = departement.id')
                    ->get_where('user', [
                      'role' => 'USER',
                    ])->result_array();
  }

  public function get_user($id)
  {
    return $this->db->select('*, user.id as user_id, user.name as user_name, departement.id as departement_id, departement.name as departement_name, division.id as division_id, division.name as division_name')
                    ->join('departement', 'departement.id = user.departement')
                    ->join('division', 'division.id = departement.id')
                    ->get_where('user', [
                      'user.id' => $id,
                      'role' => 'USER'
                    ])->result_array()[0];
  }

  public function all_superadmin()
  {
    return $this->db->get_where('user', [
      'role' => 'SUPERADMIN',
    ])->result_array();
  }

  public function get_superadmin($id)
  {
    return $this->db->get_where('user', [
      'id' => $id,
      'role' => 'SUPERADMIN'
    ])->result_array()[0];
  }

  public function insert_user($params)
  {
    $current = $this->db->get_where('user', $params)->result_array();

    if (count($current) > 0) {
      return false;
    }

    return $this->db->insert('user', $params);
  }

  public function update_user($params, $id)
  {
    $current = $this->db->get_where('user', $params)->result_array();

    if (count($current) > 0) {
      return false;
    }

    return $this->db->where('id', $id)->set($params)->update('user');
  }

  public function delete_user($id)
  {
    return $this->db->delete('user', array('id' => $id));
  }
}
