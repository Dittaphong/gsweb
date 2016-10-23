<ul class="main-menu">
  <li> <a href="<?php echo site_url('CtrlStudent');?>" > <i class="fa fa-home fa-fw"></i><span class="text">HOME</span></a> </li>
  <li> <a href="<?php echo site_url('CtrlStudent/Patition/'.$_SESSION['STUDENTID']."/ADVI");?>" > <i class="glyphicon glyphicon-link"></i><span class="text">ขอแต่งตั้งอาจารย์ที่ปรึกษา</span></a> </li>
  <li> <a href="<?php echo site_url('CtrlStudent/Patition/'.$_SESSION['STUDENTID']."/QECE");?>" > <i class="glyphicon glyphicon-file"></i> <span class="text"> <?php echo $this->session->userdata('username')=='ms_user' ? 'ขอสอบประมวลผลความรู้' : 'ขอสอบวัดคุณสมบัติ' ;?> </span> </a> </li>
  <li> <a href="<?php echo site_url('CtrlStudent/ThesisName');?>" > <i class="glyphicon glyphicon-link"></i><span class="text">ยื่นหัวข้อภาคนิพนธ์</span></a> </li>
  <li> <a href="<?php echo site_url('CtrlStudent/Patition/'.$_SESSION['STUDENTID']."/PROP");?>" > <i class="glyphicon glyphicon-bullhorn"></i><span class="text">ขอสอบเค้าโครงวิทยานิพนธ์</span></a> </li>
  <li> <a href="<?php echo site_url('CtrlStudent/Patition/'.$_SESSION['STUDENTID']."/THES");?>" > <i class="glyphicon glyphicon-list-alt"></i><span class="text">ขอสอบวิทยานิพนธ์</span></a> </li>
  <li> <a href="<?php echo site_url();?>index.php/student/search_thesis/" > <i class="glyphicon glyphicon-list-alt"></i><span class="text">ค้นหาภาคนิพนธ์</span></a> </li>
  <li> <a href="<?php echo site_url();?>index.php/student/search_research/" ><i class="fa fa-th-list fa-fw"></i><span class="text">ค้นหางานวิจัย</span></a> </li>
  <li> <a href="<?php echo site_url();?>index.php/student/research/" ><i class="fa fa-th-list fa-fw"></i><span class="text">ผลงานวิจัยนักศึกษา</span></a> </li>
  <li> <a href="<?php echo site_url();?>index.php/student/Graduated/" ><i class="glyphicon glyphicon-education"></i><span class="text">ขอสำเร็จการศึกษา</span></a> </li>
  <li><a href="<?php echo site_url();?>/CtrlAuthen/Logout/" > <i class="glyphicon glyphicon-remove-circle" style="color:red"></i><span class="text" style="color:red"> ออกจากระบบ</span></a> </li>
</ul>
