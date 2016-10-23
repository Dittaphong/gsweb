<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mod_program extends CI_Model {
  public function OfficerRelate()
  {
    $this->db->join('attribute_prefix', 'officer.PREFIXID = attribute_prefix.PREFIXID');
    $this->db->join('attribute_faculty', 'officer.FACULTYID = attribute_faculty.FACULTYID');
    $this->db->join('attribute_department', 'officer.DEPARTMENTID = attribute_department.DEPARTMENTID');
  }
  public function OfficerByProgram($value) {
      $this->db->where('PROGRAMID =',$value);
      $this->db->join('officer', 'relate_program_officer.OFFICERID= officer.OFFICERID');
      $this->OfficerRelate();
      $query = $this->db->get('relate_program_officer');
      return $query->result_array();
  }

}
