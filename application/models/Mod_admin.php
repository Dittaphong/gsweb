<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mod_admin extends CI_Model {

  public function StudentRelate(){
    $this->db->join('attribute_prefix', 'student_master.PREFIXID = attribute_prefix.PREFIXID');
    $this->db->join('attribute_faculty', 'student_master.FACULTYID = attribute_faculty.FACULTYID');
    $this->db->join('attribute_department', 'student_master.DEPARTMENTID = attribute_department.DEPARTMENTID');
    $this->db->join('program', 'student_master.PROGRAMID = program.PROGRAMID');
    $this->db->join('campus', 'student_master.CAMPUSID = campus.CAMPUSID');
    $this->db->join('attribute_level', 'student_master.LEVELID = attribute_level.LEVELID');
    $this->db->join('attribute_procedure_study', 'student_master.procedure_study_id = attribute_procedure_study.procedure_study_id');
    $this->db->join('attribute_student_status', 'student_master.STUDENTID = attribute_student_status.STUDENTID');
  }

  public function DocAdviserLists($value) {
    if ($value=='FACULTY') {
      $this->db->where('doc_approved_by', 'FACU');
      $this->db->where('doc_approved_status', 0);
    } elseif ($value=='ADMIN') {
      $this->db->where('doc_approved_by', 'DEAN');
      $this->db->where('doc_approved_status', 0);
    }

    $this->db->where('doc_approved_type', 'ADVI');
    $this->db->join('relate_doc_approved', 'doc_adviser.APPOINT_AVISER_ID = relate_doc_approved.doc_approved_ref');
    $this->db->join('student_master', 'doc_adviser.STUDENTID = student_master.STUDENTID');
    $this->StudentRelate();
    $query = $this->db->get('doc_adviser');
    return $query->result_array();
  }
  public function DocExamLists($value) {
    if ($_SESSION['GROUPTYPE']=='FACULTY') {
      $this->db->where('doc_approved_by', 'FACU');
      $this->db->where('doc_approved_status', 0);
    } elseif ($_SESSION['GROUPTYPE']=='ADMIN') {
      $this->db->where('doc_approved_by', 'DEAN');
      $this->db->where('doc_approved_status', 0);
    }
    $this->db->where('doc_approved_type', $value);
    $this->db->join('relate_doc_approved', 'doc_exam.EXAM_ID = relate_doc_approved.doc_approved_ref');
    $this->db->join('student_master', 'doc_exam.STUDENTID = student_master.STUDENTID');
    $this->StudentRelate();
    $query = $this->db->get('doc_exam');
    return $query->result_array();
  }
}
