<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CtrlAdmin extends CI_Controller {
	public function __construct(){
		parent::__construct(); 
		if($this->session->userdata("GROUPTYPE")!="ADMIN" &&  $this->session->userdata("GROUPTYPE")!="FACULTY"){
			redirect('CtrlAuthen/');
		} 
		$this->GROUPTYPE=$this->session->userdata("GROUPTYPE");
	}

	public function loadpage($StrQuery,$data){ 
		$data['user'] = $this->session->userdata("USERCODE"); 
		$data['user_group'] = $this->session->userdata("GROUPTYPE");
		$this->load->view('/Template/Header', $data);
		$this->load->view($StrQuery['View']);
		$this->load->view('/Template/Footer');
	}

	public function index(){
		$StrQuery = array('View' => 'Admin/Dashboard');
		$data['req_adviser'] = "20";
		$data['qe_ce'] = "12";
		$this->loadpage($StrQuery,$data);
	}

	public function DocAdviserLists(){
		if(!$_POST){
			$StrQuery = array( 
				'View' => 'Admin/DocAdviserLists'
			); 
			$data['keyword'] = array(
				'STUCODE' => '',
				'STUNAME' => ''
			);
			$data['DocAdviserLists'] = $this->mod_admin->DocAdviserLists($this->GROUPTYPE);
			$this->loadpage($StrQuery,$data);
		}else{
			$StrQuery = array( 
				'View' => 'Admin/DocAdviserLists'
			);
			$data['keyword'] = array(
				'STUCODE' => $_POST['STUDENTCODE'],
				'STUNAME' => $_POST['STUDENTFULLNAME']
			);
			$data['DocAdviserLists'] = $this->mod_admin->DocAdviserSearch($this->GROUPTYPE,$data['keyword']);
			$this->loadpage($StrQuery,$data);
		}
	}

	public function DocExamLists(){

		$EXAM_TYPE = $this->uri->segment(3);
		if ($EXAM_TYPE=='QECE') {
			$data['PageName'] = "ขอสอบ QE/CE";
		}else if($EXAM_TYPE=='PROP'){
			$data['PageName'] = "ขอสอบเค้าโครง";
		}else if($EXAM_TYPE=='THES'){
			$data['PageName'] = "ขอสอบวิทยานิพนธ์";
		}else{
			redirect('CtrlAuthen/');
		} 

		if(!$_POST){ 
			$StrQuery = array('View'   => 'Admin/DocExamLists');
			$data['keyword'] = array(
				'STUCODE' => '',
				'STUNAME' => ''
			); 
			$data['EXAM_TYPE'] = $EXAM_TYPE;
			$data['DocExamLists'] = $this->mod_admin->DocExamLists($EXAM_TYPE, $data['keyword']);
			$this->loadpage($StrQuery,$data);
		}else{ 
			$StrQuery = array('View'   => 'Admin/DocExamLists');
			$data['keyword'] = array(
				'STUCODE' => $_POST['STUDENTCODE'],
				'STUNAME' => $_POST['STUDENTFULLNAME']
			);
			$data['EXAM_TYPE'] = $EXAM_TYPE;
			$data['DocExamLists'] = $this->mod_admin->DocExamListsSearch($EXAM_TYPE, $data['keyword']);
			$this->loadpage($StrQuery,$data);
		}
	}

	public function SearchStudent(){
		if(!$_POST){ 
			$data['keyword'] = array('STUCODE' => '','STUNAME' => ''); 
			$data['StudentLists'] = $this->mod_admin->StudentSearch($data['keyword']); 
		}else{ 
			$data['keyword'] = array('STUCODE' => $_POST['STUDENTCODE'],'STUNAME' => $_POST['STUDENTFULLNAME']); 
			$data['StudentLists'] = $this->mod_admin->StudentSearch($data['keyword']); 
		}
			$StrQuery = array('View' => 'Admin/StudentLists'); 
			$data['PageName'] = "ข้อมูลนักศึกษา"; 
			$this->loadpage($StrQuery,$data); 
	}

	public function SearchOfficer(){
		if(!$_POST){ 
			$data['keyword'] = array('CODE' => '','NAME' => '');  
		}else{ 
			$data['keyword'] = array('CODE' => $_POST['CODE'],'NAME' => $_POST['FULLNAME']); 
		} 
			$data['Lists'] = $this->mod_admin->OfficerSearch($data['keyword']); 
			$StrQuery = array('View' => 'Admin/OfficerLists'); 
			$data['PageName'] = "ข้อมูลนักศึกษา";
			$this->loadpage($StrQuery,$data); 
	}

	public function ApprovedPatition(){
 
		// รหัส นักศึกษา
		$StudentID = $this->uri->segment(3);
		$Student = $this->mod_student->StudentInfoByID($StudentID);

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
		$en = 0;
		foreach ($DocXam as $ExamStatus) {
			$DocExamStatus[$ExamStatus['EXAM_TYPE']]['DEAN'] = $this->db
																			->where('doc_approved_ref', $ExamStatus['EXAM_ID'])
																			->where('doc_approved_type !=', 'ADVI')
																			->where('doc_approved_by', 'DEAN')
																			->get('relate_doc_approved')->result_array();
			$DocExamStatus[$ExamStatus['EXAM_TYPE']]['FACU'] = $this->db
																			->where('doc_approved_ref', $ExamStatus['EXAM_ID'])
																			->where('doc_approved_type !=', 'ADVI')
																			->where('doc_approved_by', 'FACU')
																			->get('relate_doc_approved')->result_array();
			$en++;
		}



		$ThesisName = $this->db->where('STUDENTID',$StudentID)->get('thesis_name')->result_array();
		$ExamOfficer = $this->db->where('EXAM_REF', @$DocXam[0]['EXAM_ID'])->get('relate_officer_exam')->result_array();
		$DocAdviser = $this->db->where('STUDENTID', $StudentID)->get('doc_adviser')->result_array();
		if ($_SESSION['GROUPTYPE']=='FACULTY') {
			$GROUPTYPE = 'FACU';
		} if ($_SESSION['GROUPTYPE']=='ADMIN') {
			$GROUPTYPE = 'DEAN';
		}
		$DocAdviserNum = $this->db->where('relate_doc_ref', $DocAdviser[0]['APPOINT_AVISER_ID'])
											->where('relate_doc_type', 'ADVI')
											->where('relate_doc_by', $GROUPTYPE)
											->get('relate_doc_no')->result_array();
		for ($ad = 0; $ad < count($DocAdviser); $ad++) {
			$DocAdviserID = $DocAdviser[0]['APPOINT_AVISER_ID'];

			$DocAdviserStatus['DEAN'] = $this->db
																			->where('doc_approved_ref', $DocAdviserID)
																			->where('doc_approved_type', 'ADVI')
																			->where('doc_approved_by', 'DEAN')
																			->get('relate_doc_approved')->result_array();
			$DocAdviserStatus['FACU'] = $this->db
																			->where('doc_approved_ref', $DocAdviserID)
																			->where('doc_approved_type', 'ADVI')
																			->where('doc_approved_by', 'FACU')
																			->get('relate_doc_approved')->result_array();

		}
		$StrQuery = array(
				// ข้อมูล
				'Result' => array(
					'Student' => $Student,
						// 'Transcript' => $Transcript,
						// 'ProgramOfficer' => $ProgramOfficer,
						'DocAdviserNum' => $DocAdviserNum,
						'DocName' => $DocName,
						'DocAdviser' => $DocAdviser,
						'DocAdviserStatus' => $DocAdviserStatus,
						'AdviserLists' => $AdviserLists,
						'AdviserApprovedLock' => $AdviserApprovedLock,
						'WorkLimit' => $WorkLimit,
						'limitThesis' => $limitThesis,
						'limitIS' => $limitIS,
						'DocExam' => $DocXam,
						'DocExamStatus' => @$DocExamStatus,
						'ExamOfficer' =>$ExamOfficer,
						'ThesisName' => $ThesisName),
				'View' => 'Admin/ApprovedPatition'
			);
			// $this->debuger->prevalue($StrQuery);
			// Load หน้าจอ
			$this->loadpage($StrQuery);
	}
	public function SaveApproved(){
		$DocType = $this->uri->segment(3);
		$DocID = $_POST['DocID'];
		$ApprovedBy = $_POST['ApprovedBy'];
		date_default_timezone_set('Asia/Bangkok');
		$input = array(
					'doc_approved_status' => 1,
					'doc_approved_date' => date("Y-m-d H:i:s"),
					);
					// $this->debuger->prevalue($input);
		$this->db->where('doc_approved_by', $ApprovedBy);
		$this->db->where('doc_approved_ref', $DocID);
		$this->db->where('doc_approved_type', $DocType);
		$this->db->update('relate_doc_approved', $input);

		$DocNum = $this->db->get('relate_doc_no', $input)->result_array();
		$NewDocNum = count($DocNum)+1;
		if ($NewDocNum<10) {
			$NewDocNum = "000".$NewDocNum;
		} elseif ($NewDocNum<100) {
			$NewDocNum = "00".$NewDocNum;
		} elseif ($NewDocNum<1000) {
			$NewDocNum = "0".$NewDocNum;
		} else {
			$NewDocNum =$NewDocNum;
		}

		$input = array(
					'relate_doc_type' => $DocType,
					'relate_doc_num' => $NewDocNum,
					'relate_doc_ref' => $DocID,
					'relate_doc_fac' => 10,
					'relate_doc_by' => $ApprovedBy,);
	  $this->db->insert('relate_doc_no', $input);
		// relate_doc_no
		redirect($this->agent->referrer(), 'refresh');
	}
	public function SaveExamAppointment(){
		$input = array(
		'EXAM_ID' => $_POST['docid'],
		'EXAM_DATE' => date($_POST['exam_date']),
		'EXAM_BUILD' => $_POST['exam_build'],
		'EXAM_ROOM' => $_POST['exam_room'],
	  );

		$this->db->where('EXAM_ID', $input['EXAM_ID']);
		$this->db->update('doc_exam_qece', $input);
		redirect($this->agent->referrer(), 'refresh');
	}
	public function SaveExamOfficer(){
		$input = array(
			'OFFICERID' => $_POST['OFFICERID'],
			'OFFICER_POSITION' => $_POST['OFFICER_POSITION'],
			'EXAM_TYPE' => $_POST['EXAM_TYPE'],
			'EXAMREF' => $_POST['EXAMREF'], );
			// $this->debuger->prevalue($input);
			$this->db->insert('relate_officer_exam', $input);
			redirect($this->agent->referrer(), 'refresh');
	}
}
