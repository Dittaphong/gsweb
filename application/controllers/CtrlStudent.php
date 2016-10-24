<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CtrlStudent extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// session_start();
<<<<<<< HEAD
	}
=======
		if($this->session->userdata("GROUPTYPE")!="STUDENT"){
			redirect('CtrlAuthen/');
		}  
	} 
>>>>>>> origin/master
	public function loadpage($StrQuery){
		$data['Result'] = $StrQuery['Result'];
		$this->load->view('/Template/Header', $data);
		$this->load->view($StrQuery['View']);
		$this->load->view('/Template/Footer');
	}
	public function index(){
		$Student = $this->mod_student->StudentProfile($_SESSION['USERCODE']);
		$_SESSION['STUDENTID'] = $Student[0]['STUDENTID'];
		$Transcript = $this->mod_student->Transcript($_SESSION['STUDENTID']);
		$StrQuery = array(
			'Result' => array(
				'Student' => $Student,
				'Transcript' => $Transcript,
				),
			'View' => 'Student/StudentProfile'
			);
		$this->loadpage($StrQuery);
	}
	public function Patition() {
		$Student = $this->mod_student->StudentProfile($_SESSION['USERCODE']);
		$ProgramOfficer = $this->mod_program->OfficerByProgram($Student[0]['PROGRAMID']);
		// $OfficerAll = $this->mod_officer->OfficerAll($Student[0]['PROGRAMID']);
		$OfficerAll = $this->mod_officer->OfficerAll();

		// รหัส นักศึกษา
		$StudentID = $this->uri->segment(3);
		//$StudentInfo = $this->mod_student->StudentInfoByID($StudentID);

		// ประเภทเอกสาร
		$ExamType = $this->uri->segment(4);
		$DocName = $this->debuger->DocName($ExamType, $Student[0]['LEVELID']);

		// รายชื่ออาจารย์ที่ปรึกษา
		$AdviserLists = $this->mod_officer->AdviserListsByStudentID($StudentID);
		$AdviserArray = 0;

		// ภาระงานของอาจารย์ที่ปรึกษา
		for ($i = 1; $i <= count($AdviserLists); $i++) {
			$OfficerID = $AdviserLists[$AdviserArray]['OFFICERID'];
			//วิทยานิพนธ์ 5
			$AdviserLists[$AdviserArray]['WorkAdviserThesis'] = $this->mod_officer->WorkAdviserThesisByOfficerID($OfficerID);
			//ค้นคว้าอิสระ 15
			$AdviserLists[$AdviserArray]['WorkAdviserIS'] = $this->mod_officer->WorkAdviserIsByOfficerID($OfficerID);
			$AdviserArray++;
		}

		// ภาระงาน เต็ม/ไม่เต็ม
		$AdviserApprovedLock = 0;

		// ภาระงานสูงสุด
		$WorkLimit = $this->db->get('setting_work_limit')->result_array();
		$limitThesis = $WorkLimit[0]['officer_work_limit_thesis'];
		$limitIS = $WorkLimit[0]['officer_work_limit_is'];

		foreach ($AdviserLists as $CheckLimit){
			if($CheckLimit['WorkAdviserThesis']>=$limitThesis || $CheckLimit['WorkAdviserIS']>=$limitIS){
				$AdviserApprovedLock = 1;
			}
		}

		// เอกสาร
		$DocXam = $this->db->where('STUDENTID', $StudentID)->get('doc_exam')->result_array();
		$ThesisName = $this->db->where('STUDENTID',$StudentID)->get('thesis_name')->result_array();
		$DocAdviser = $this->db->where('STUDENTID', $StudentID)->get('doc_adviser')->result_array();

		if ($ExamType=='ADVI') {
			$DocPage = 'AppointAdviser';
			$getProgramOfficer = $this->mod_student->getProgramOfficer($Student[0]['PROGRAMID']);
		} elseif($ExamType=='QECE' ||$ExamType=='PROP' ||$ExamType=='THES') {
			$DocPage = 'ExamReqSubmit';
		}
		$Transcript = $this->mod_student->Transcript($_SESSION['STUDENTID']);

		$StrQuery = array(
			'Result' => array(
				'Student' => $Student,
				'Transcript' => $Transcript,
				'ProgramOfficer' => $ProgramOfficer,
				'OfficerAll' => $OfficerAll,
				'DocName' => $DocName,
				'DocAdviser' => $DocAdviser,
				'AdviserLists' => $AdviserLists,
				'AdviserApprovedLock' => $AdviserApprovedLock,
				'WorkLimit' => $WorkLimit,
				'limitThesis' => $limitThesis,
				'limitIS' => $limitIS,
				'DocExam' => $DocXam,
				'ThesisName' => $ThesisName,
				'getProgramOfficer' => $getProgramOfficer,
				),
			'View' => 'Student/'.$DocPage
			);
		$this->loadpage($StrQuery);
	}
	public function PetitionSave() {
		$studentId = $_SESSION['STUDENTID'];
		$DocExam = $this->db->where('STUDENTID', $studentId)->where('EXAM_TYPE', $_POST['examtype'])->get('doc_exam')->result_array();
		if (count($DocExam)>0) {
			redirect($this->agent->referrer(), 'refresh');
		}
		if ($_POST['examtype']=="QECE") {
			$input = array(
				'STUDENTID' => $studentId,
				'EXAM_TYPE' =>$_POST['examtype'],	);
		} else {
			$input = array(
				'STUDENTID' => $studentId,
				'EXAM_TYPE' =>$_POST['examtype'],
				'thesis_name_id' =>$_POST['name_id'],);
		}
		$this->db->insert('doc_exam', $input);
		$DocExam = $this->db->where('STUDENTID', $studentId)->where('EXAM_TYPE', $_POST['examtype'])->get('doc_exam')->result_array();

		$doc_approved[1] = 'FACU';
		$doc_approved[2] = 'DEAN';
		for ($e=1; $e < 3; $e++) {
			$input = array(
				'doc_approved_type' => $_POST['examtype'],
				'doc_approved_ref' => $DocExam[0]['EXAM_ID'],
				'doc_approved_by' => 	$doc_approved[$e], );
			$this->db->insert('relate_doc_approved',$input);
		}
		redirect($this->agent->referrer()."/success", 'refresh');
	}

	public function SaveDocAdviser(){

		$DocAdviser = $this->db->where('STUDENTID', $_SESSION['STUDENTID'])->get('doc_adviser')->result_array();
		if (count($DocAdviser)>0) {
			$this->db->where('STUDENTID', $_SESSION['STUDENTID'])->delete('doc_adviser');
			$this->db->where('doc_approved_type', 'ADVI')->where('doc_approved_type',$DocAdviser[0]['APPOINT_AVISER_ID'])->delete('relate_doc_approved');
		}
		$AdviserLists = $this->mod_officer->AdviserListsByStudentID($_SESSION['STUDENTID']);
		if (count($AdviserLists)>0) {
			$this->db->where('STUDENTID', $_SESSION['STUDENTID'])->delete('relate_appiont_adviser_officer');
		}


		$data = array(
			'STUDENTID' => $_SESSION['STUDENTID'], );
		$this->db->insert('doc_adviser', $data);
		$DocAdviser = $this->db->where('STUDENTID', $_SESSION['STUDENTID'])->get('doc_adviser')->result_array();
		$doc_approved[1] = 'FACU';
		$doc_approved[2] = 'DEAN';
		for ($e=1; $e < 3; $e++) {
			$input = array(
				'doc_approved_type' => 'ADVI',
				'doc_approved_ref' => $DocAdviser[0]['APPOINT_AVISER_ID'],
				'doc_approved_by' => 	$doc_approved[$e], );
			$this->db->insert('relate_doc_approved',$input);
		}
		$officer[0] = $_POST['MainAdviser'];
		$officer[1] = $_POST['SubAdviser1'];
		$officer[2] = $_POST['SubAdviser2'];
		for ($i=0; $i <count($officer) ; $i++) {
			if($officer[$i]!="") {
				if($i==0) {
					$type = 1;
				} else {
					$type = 2;
				}
				$input = array(
					'OFFICERID' => $officer[$i],
					'ADVISERTYPE' => $type,
					'STUDENTID' => $_SESSION['STUDENTID'], );
				$this->db->insert('relate_appiont_adviser_officer',$input);
			}
		}
		redirect($this->agent->referrer()."/success", 'refresh');
	}
}
