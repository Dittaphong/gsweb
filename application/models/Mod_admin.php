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
    $sql = "SELECT
                  student_master.STUDENTID,
                  student_master.STUDENTCODE, 
                  attribute_prefix.PREFIXNAME, 
                  student_master.STUDENTNAME, 
                  student_master.STUDENTSURNAME, 
                  attribute_faculty.FACULTYNAME, 
                  doc_adviser.APPOINT_AVISER_DATE, 
                  attribute_level.LEVELNAME, 
                  attribute_level.CURRENTACADYEAR,
                  attribute_procedure_study.procedure_name
              FROM doc_adviser 
              LEFT JOIN student_master ON doc_adviser.STUDENTID=student_master.STUDENTID
              LEFT JOIN relate_doc_approved ON doc_adviser.STUDENTID = student_master.STUDENTID
              LEFT JOIN attribute_prefix ON student_master.PREFIXID = attribute_prefix.PREFIXID
              LEFT JOIN attribute_faculty ON student_master.FACULTYID = attribute_faculty.FACULTYID 
              LEFT JOIN attribute_department ON student_master.DEPARTMENTID = attribute_department.DEPARTMENTID 
              LEFT JOIN program ON student_master.PROGRAMID = program.PROGRAMID
              LEFT JOIN campus ON student_master.CAMPUSID = campus.CAMPUSID 
              LEFT JOIN attribute_level ON student_master.LEVELID = attribute_level.LEVELID
              LEFT JOIN attribute_procedure_study ON student_master.procedure_study_id = attribute_procedure_study.procedure_study_id 
              LEFT JOIN attribute_student_status ON student_master.STUDENTID = attribute_student_status.STUDENTID
              WHERE relate_doc_approved.doc_approved_type='ADVI' "; 

      if ($value=='FACULTY'){ 
        $sql .= " AND relate_doc_approved.doc_approved_by='FACU' "; 
        // $sql .= " AND relate_doc_approved.doc_approved_status=0 ";  
      } else if($value=='ADMIN'){ 
        $sql .= " AND relate_doc_approved.doc_approved_by='DEAN' "; 
        // $sql .= " AND relate_doc_approved.doc_approved_status=0 ";  
      }  
        $sql .= " LIMIT 10 "; 
      $query = $this->db->query($sql); 
      return $query->result_array(); 
    
  }

  public function DocAdviserSearch($value,$key){ 
      $sql = "SELECT
                  student_master.STUDENTID,
                  student_master.STUDENTCODE, 
                  attribute_prefix.PREFIXNAME, 
                  student_master.STUDENTNAME, 
                  student_master.STUDENTSURNAME, 
                  attribute_faculty.FACULTYNAME, 
                  doc_adviser.APPOINT_AVISER_DATE, 
                  attribute_level.LEVELNAME, 
                  attribute_level.CURRENTACADYEAR,
                  attribute_procedure_study.procedure_name
              FROM doc_adviser 
              LEFT JOIN student_master ON doc_adviser.STUDENTID=student_master.STUDENTID
              LEFT JOIN relate_doc_approved ON doc_adviser.STUDENTID = student_master.STUDENTID
              LEFT JOIN attribute_prefix ON student_master.PREFIXID = attribute_prefix.PREFIXID
              LEFT JOIN attribute_faculty ON student_master.FACULTYID = attribute_faculty.FACULTYID 
              LEFT JOIN attribute_department ON student_master.DEPARTMENTID = attribute_department.DEPARTMENTID 
              LEFT JOIN program ON student_master.PROGRAMID = program.PROGRAMID
              LEFT JOIN campus ON student_master.CAMPUSID = campus.CAMPUSID 
              LEFT JOIN attribute_level ON student_master.LEVELID = attribute_level.LEVELID
              LEFT JOIN attribute_procedure_study ON student_master.procedure_study_id = attribute_procedure_study.procedure_study_id 
              LEFT JOIN attribute_student_status ON student_master.STUDENTID = attribute_student_status.STUDENTID
              WHERE relate_doc_approved.doc_approved_type='ADVI' "; 

      if ($value=='FACULTY'){ 
        $sql .= " AND relate_doc_approved.doc_approved_by='FACU' "; 
        // $sql .= " AND relate_doc_approved.doc_approved_status=0 ";  
      } else if($value=='ADMIN'){ 
        $sql .= " AND relate_doc_approved.doc_approved_by='DEAN' "; 
        // $sql .= " AND relate_doc_approved.doc_approved_status=0 ";  
      } 
        $sql .= " AND student_master.STUDENTCODE LIKE '%".$key['STUCODE']."%' "; 
        $sql .= " AND CONCAT(attribute_prefix.PREFIXNAME, student_master.STUDENTNAME, student_master.STUDENTSURNAME) LIKE '%".$key['STUNAME']."%' "; 
   // echo "<pre>".$sql;
      $query = $this->db->query($sql); 
      return $query->result_array(); 
  }

  public function DocExamLists($value){ 
    $sql = "SELECT
                  student_master.STUDENTID,
                  student_master.STUDENTCODE, 
                  attribute_prefix.PREFIXNAME, 
                  student_master.STUDENTNAME, 
                  student_master.STUDENTSURNAME, 
                  attribute_faculty.FACULTYNAME, 
                  doc_exam.EXAM_CREATE_DATE, 
                  attribute_level.LEVELNAME, 
                  attribute_level.CURRENTACADYEAR,
                  attribute_procedure_study.procedure_name 
              FROM doc_exam 
              LEFT JOIN student_master ON doc_exam.STUDENTID=student_master.STUDENTID
              LEFT JOIN relate_doc_approved ON doc_exam.EXAM_ID = relate_doc_approved.doc_approved_ref
              LEFT JOIN attribute_prefix ON student_master.PREFIXID = attribute_prefix.PREFIXID
              LEFT JOIN attribute_faculty ON student_master.FACULTYID = attribute_faculty.FACULTYID 
              LEFT JOIN attribute_department ON student_master.DEPARTMENTID = attribute_department.DEPARTMENTID 
              LEFT JOIN program ON student_master.PROGRAMID = program.PROGRAMID
              LEFT JOIN campus ON student_master.CAMPUSID = campus.CAMPUSID 
              LEFT JOIN attribute_level ON student_master.LEVELID = attribute_level.LEVELID
              LEFT JOIN attribute_procedure_study ON student_master.procedure_study_id = attribute_procedure_study.procedure_study_id 
              LEFT JOIN attribute_student_status ON student_master.STUDENTID = attribute_student_status.STUDENTID
              WHERE relate_doc_approved.doc_approved_type='".$value."'"; 

      if ($_SESSION['GROUPTYPE']=='FACULTY'){ 
        $sql .= " AND relate_doc_approved.doc_approved_by='FACU' "; 
        // $sql .= " AND relate_doc_approved.doc_approved_status=0 ";  
      } else if($_SESSION['GROUPTYPE']=='ADMIN'){ 
        $sql .= " AND relate_doc_approved.doc_approved_by='DEAN' "; 
        // $sql .= " AND relate_doc_approved.doc_approved_status=0 "; 
      } 
        $sql .= " GROUP BY doc_exam.EXAM_ID LIMIT 10 "; 
      $query = $this->db->query($sql); 
      return $query->result_array(); 
  }

  public function DocExamListsSearch($value, $key){

    $sql = "SELECT
                  student_master.STUDENTID,
                  student_master.STUDENTCODE, 
                  attribute_prefix.PREFIXNAME, 
                  student_master.STUDENTNAME, 
                  student_master.STUDENTSURNAME, 
                  attribute_faculty.FACULTYNAME, 
                  doc_exam.EXAM_CREATE_DATE, 
                  attribute_level.LEVELNAME, 
                  attribute_level.CURRENTACADYEAR,
                  attribute_procedure_study.procedure_name
              FROM doc_exam 
              LEFT JOIN student_master ON doc_exam.STUDENTID=student_master.STUDENTID
              LEFT JOIN relate_doc_approved ON doc_exam.EXAM_ID = relate_doc_approved.doc_approved_ref
              LEFT JOIN attribute_prefix ON student_master.PREFIXID = attribute_prefix.PREFIXID
              LEFT JOIN attribute_faculty ON student_master.FACULTYID = attribute_faculty.FACULTYID 
              LEFT JOIN attribute_department ON student_master.DEPARTMENTID = attribute_department.DEPARTMENTID 
              LEFT JOIN program ON student_master.PROGRAMID = program.PROGRAMID
              LEFT JOIN campus ON student_master.CAMPUSID = campus.CAMPUSID 
              LEFT JOIN attribute_level ON student_master.LEVELID = attribute_level.LEVELID
              LEFT JOIN attribute_procedure_study ON student_master.procedure_study_id = attribute_procedure_study.procedure_study_id 
              LEFT JOIN attribute_student_status ON student_master.STUDENTID = attribute_student_status.STUDENTID
              WHERE relate_doc_approved.doc_approved_type='".$value."' "; 

      if ($_SESSION['GROUPTYPE']=='FACULTY'){ 
        $sql .= " AND relate_doc_approved.doc_approved_by='FACU' "; 
        // $sql .= " AND relate_doc_approved.doc_approved_status=0 ";  
      } else if($_SESSION['GROUPTYPE']=='ADMIN'){ 
        $sql .= " AND relate_doc_approved.doc_approved_by='DEAN' "; 
        // $sql .= " AND relate_doc_approved.doc_approved_status=0 ";  
      } 
        $sql .= " AND student_master.STUDENTCODE LIKE '%".$key['STUCODE']."%' "; 
        $sql .= " AND CONCAT(attribute_prefix.PREFIXNAME, student_master.STUDENTNAME, student_master.STUDENTSURNAME) LIKE '%".$key['STUNAME']."%' "; 
        $sql .= " GROUP BY doc_exam.EXAM_ID ";
   // echo "<pre>".$sql;
      $query = $this->db->query($sql); 
      return $query->result_array(); 
  }

  public function StudentSearch($value, $key){

    $sql = "SELECT
                  student_master.STUDENTID,
                  student_master.STUDENTCODE, 
                  attribute_prefix.PREFIXNAME, 
                  student_master.STUDENTNAME, 
                  student_master.STUDENTSURNAME, 
                  attribute_faculty.FACULTYNAME, 
                  doc_exam.EXAM_CREATE_DATE, 
                  attribute_level.LEVELNAME, 
                  attribute_level.CURRENTACADYEAR,
                  attribute_procedure_study.procedure_name
              FROM student_master 
              LEFT JOIN relate_doc_approved ON doc_exam.EXAM_ID = relate_doc_approved.doc_approved_ref
              LEFT JOIN attribute_prefix ON student_master.PREFIXID = attribute_prefix.PREFIXID
              LEFT JOIN attribute_faculty ON student_master.FACULTYID = attribute_faculty.FACULTYID 
              LEFT JOIN attribute_department ON student_master.DEPARTMENTID = attribute_department.DEPARTMENTID 
              LEFT JOIN program ON student_master.PROGRAMID = program.PROGRAMID
              LEFT JOIN campus ON student_master.CAMPUSID = campus.CAMPUSID 
              LEFT JOIN attribute_level ON student_master.LEVELID = attribute_level.LEVELID
              LEFT JOIN attribute_procedure_study ON student_master.procedure_study_id = attribute_procedure_study.procedure_study_id 
              LEFT JOIN attribute_student_status ON student_master.STUDENTID = attribute_student_status.STUDENTID
              WHERE relate_doc_approved.doc_approved_type='".$value."' "; 

      if ($_SESSION['GROUPTYPE']=='FACULTY'){ 
        $sql .= " AND relate_doc_approved.doc_approved_by='FACU' "; 
        // $sql .= " AND relate_doc_approved.doc_approved_status=0 ";  
      } else if($_SESSION['GROUPTYPE']=='ADMIN'){ 
        $sql .= " AND relate_doc_approved.doc_approved_by='DEAN' "; 
        // $sql .= " AND relate_doc_approved.doc_approved_status=0 ";  
      } 
        $sql .= " AND student_master.STUDENTCODE LIKE '%".$key['STUCODE']."%' "; 
        $sql .= " AND CONCAT(attribute_prefix.PREFIXNAME, student_master.STUDENTNAME, student_master.STUDENTSURNAME) LIKE '%".$key['STUNAME']."%' "; 
        $sql .= " GROUP BY doc_exam.EXAM_ID ";
   // echo "<pre>".$sql;
      $query = $this->db->query($sql); 
      return $query->result_array(); 
  }


} ?>
