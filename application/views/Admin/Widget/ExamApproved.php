<?php
$ExamType=$this->uri->segment(4);
$StudentType = $Result['Student'][0]['LEVELID'];
if ($ExamType=='ADVI') {
  $this->load->view('Admin/Widget/ApprovedDean');
} elseif ($ExamType=='QECE') {
  // $this->load->view('Admin/Widget/ApprovedPresident');
  $this->load->view('Admin/Widget/ApprovedDean');
  $this->load->view('Admin/Widget/ApprovedAssociate');
  // $this->load->view('Admin/Widget/ApprovedOfficer');
} elseif ($ExamType=='PROP'||$ExamType=='THES') {
  // $this->load->view('Admin/Widget/ApprovedPresident');
}
?>
