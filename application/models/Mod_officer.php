<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_officer extends CI_Model {

  public function OfficerRelate()
  {
    $this->db->join('attribute_prefix', 'officer.PREFIXID = attribute_prefix.PREFIXID');
		$this->db->join('attribute_faculty', 'officer.FACULTYID = attribute_faculty.FACULTYID');
		$this->db->join('attribute_department', 'officer.DEPARTMENTID = attribute_department.DEPARTMENTID');
  }
  public function OfficerAll() {
    $this->OfficerRelate();
    $query = $this->db->get('officer');
    return $query->result_array();
  }
  public function AdviserListsByStudentID($value) {
    $this->db->where('relate_appiont_adviser_officer.STUDENTID', $value);
    $this->db->where( "student_master.procedure_study_id NOT BETWEEN 8 AND 10", NULL, FALSE );
    $this->db->join('student_master', 'relate_appiont_adviser_officer.STUDENTID = student_master.STUDENTID');
    $this->db->join('officer', 'relate_appiont_adviser_officer.OFFICERID = officer.OFFICERID');
    $this->OfficerRelate();
    $this->db->order_by('ADVISERTYPE', 'ASC');
    $query = $this->db->get('relate_appiont_adviser_officer');
    //$this->debuger->prevalue($query->result_array());
    return $query->result_array();
  }
  //นับ วิทยานิพนธ์ ทั้งหมด
  public function WorkAdviserThesisByOfficerID($value){
    $this->db->where('relate_appiont_adviser_officer.OFFICERID', $value);
    $this->db->where('student_master.levelid != 81');
    $this->db->where( "student_master.procedure_study_id NOT BETWEEN 8 AND 10", NULL, FALSE );
    $this->db->join('doc_adviser', 'relate_appiont_adviser_officer.STUDENTID  = doc_adviser.STUDENTID');
    $this->db->join('student_master', 'relate_appiont_adviser_officer.STUDENTID = student_master.STUDENTID');
    $query = $this->db->get('relate_appiont_adviser_officer');
    return $query->num_rows();
  }
  //นับ อิสระ ทั้งหมด
  public function WorkAdviserIsByOfficerID($value){
    $this->db->where('relate_appiont_adviser_officer.OFFICERID', $value);
    $this->db->where('student_master.levelid = 81');
    $this->db->where( "student_master.procedure_study_id NOT BETWEEN 8 AND 10", NULL, FALSE );
    $this->db->join('doc_adviser', 'relate_appiont_adviser_officer.STUDENTID  = doc_adviser.STUDENTID');
    $this->db->join('student_master', 'relate_appiont_adviser_officer.STUDENTID = student_master.STUDENTID');
    $query = $this->db->get('relate_appiont_adviser_officer');
    return $query->num_rows();
  }

}
