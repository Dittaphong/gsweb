<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CtrlAuthen extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// session_start();
	}
	public function loadpage($StrQuery) {
		//Data
		$data['Result'] = $StrQuery['Result'];
		// View
		$this->load->view('/Template/Header', $data);
		$this->load->view($StrQuery['View']);
		$this->load->view('/Template/Footer');
	}
	public function index() {
	$this->load->view('Public/LoginSelect');

	}
	public function Authen(){

		if (isset($_POST['FacultyID'])) {
				$User = $this->db->where('FACID', $_POST['FacultyID'])
													->where('USERCODE', $_POST['UserName'])
													->where('USERPASS', MD5($_POST['Password']))
													->get('user_group')
													->result_array();
			} else {
				$User = $this->db->where('USERCODE', $_POST['UserName'])
													->where('USERPASS', MD5($_POST['Password']))
													->get('user_group')
													->result_array();
			}

		if(count($User)>0) {
			if ($_POST['FacultyID']!="") {
					$_SESSION['FACID'] = $User[0]['FACID'];
					}
					$_SESSION['USERCODE'] = $User[0]['USERCODE'];
					$_SESSION['GROUPTYPE'] = $User[0]['GROUPTYPE'];
			if($_SESSION['GROUPTYPE']=="TEACHER") {
				redirect('ctrl_officer');
			} else if($_SESSION['GROUPTYPE']=="ADMIN" || $_SESSION['GROUPTYPE']=="FACULTY" ) {
				redirect('CtrlAdmin');
			} else if($_SESSION['GROUPTYPE']=="STUDENT") {
				redirect('CtrlStudent');
			} else {
				redirect('CtrlAuthen');
			}
		} else {
			redirect('CtrlAuthen');
		}
	}
	public function Logout(){
		session_destroy();
		redirect('CtrlAuthen');
	}
	public function LoginPage(){

				$data['FacultyList'] = $this->db->get('attribute_faculty')->result_array();

				$this->load->view('Public/LoginPage', $data);

	}
}
