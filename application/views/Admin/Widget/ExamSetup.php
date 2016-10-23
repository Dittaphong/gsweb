<?php $ExamType=$this->uri->segment(4); ?>

<div class='row '>
  <?php //$this->load->view('Admin/Widget/ExamApproved'); ?>
  <?php //$this->load->view('Admin/Widget/ExamApproved');
  // echo $_SESSION['GROUPTYPE'];
  if ($_SESSION['GROUPTYPE']=='FACULTY') {
    $this->load->view('Admin/Widget/ApprovedExamFaculty');
  } elseif ($_SESSION['GROUPTYPE']=='ADMIN') {
    $this->load->view('Admin/Widget/ApprovedExamDean');
  }
  ?>


   </div>
