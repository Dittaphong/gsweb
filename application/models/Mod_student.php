<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mod_student extends CI_Model {
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
	public function StudentProfile($value) {
		$this->db->where('STUDENTCODE', $value);
		$this->StudentRelate();
		return $this->db->get('student_master')->result_array();
	}
	public function Transcript($value) {
		$this->db->where('transcript.STUDENTID',$value);
		$this->db->join('course', 'transcript.COURSEID = course.COURSEID');
		$query = $this->db->get('transcript');
		return $query->result_array();
	}

	public function StudentInfoByID($value) {
		$this->db->where('student_master.STUDENTID', $value);
		$this->StudentRelate();
		return $this->db->get('student_master')->result_array();
	}

	public function getProgramOfficer($programid){	//ดึงข้อมูลอาจารย์ประจำหลักสูตร
		$sql ='
		SELECT *
		FROM  relate_program_officer
		INNER JOIN  officer on relate_program_officer.OFFICERID= officer.OFFICERID
		WHERE relate_program_officer.PROGRAMID ="'.$programid.'"';

		$query = $this->db->query($sql);
		return $query->result_array();
	}
}
