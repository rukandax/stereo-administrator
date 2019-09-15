<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departement_model extends CI_Model {

  public function all_departement()
  {
    return $this->db->select('*, departement.name as departement_name, division.name as division_name')
                    ->join('division', 'division.id = departement.division')
                    ->get('departement')
                    ->result_array();
  }

  public function get_departement($id)
  {
    return $this->db->select('*, departement.name as departement_name, division.name as division_name')
                    ->join('division', 'division.id = departement.division')
                    ->get_where('departement', [
                        'departement.id' => $id
                      ])
                    ->result_array();
  }

  public function insert_departement($params)
  {
    $current = $this->db->get_where('departement', $params)
                        ->result_array();

    if (count($current) > 0) {
      return false;
    }

    return $this->db->insert('departement', $params);
  }

  public function update_departement($params, $id)
  {
    $current = $this->db->get_where('departement', $params)
                        ->result_array();

    if (count($current) > 0) {
      return false;
    }

    return $this->db->where('id', $id)
                    ->set($params)
                    ->update('departement');
  }

  public function delete_departement($id)
  {
    return $this->db->delete('departement', array('id' => $id));
  }
}
