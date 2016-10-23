
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ระบบสารสนเทศ</title>

<!-- Bootstrap -->
<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.ico">
<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/my-custom-styles.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/fonts.css" rel="stylesheet" type="text/css">


<style>
html, body, .container-table {
	height: 100%;
}
.container-table {
	display: table;
	height: 100%;
	width: 100%;
	vertical-align: middle;
}
.vertical-center-row {
	display: table-cell;
	vertical-align: middle;
}
#login_form .row {
	margin-bottom:10px;
}
</style>
</head>
<body align='center'>
<div class="top-bar" style="background-color:rgb(246, 246, 246); width: 100%;">
  <div class="col-md-12">
    <div class="row">
      <!-- logo -->
      <div class="col-md-4 logo" style="margin-bottom:5px;"> <a href="#"><b style="color:#F2F2F2;font-size:16px;"><img src="<?php echo base_url()?>/assets/img/logo-gs-blue.png"></b></a> </div>

      <!-- end logo -->
      <!--<div class="col-md-5"></div>
    <div class="col-md-3" style="margin-top:5px;">
      <p> <a href="<?php //echo base_url();?>studentdemo/index.php/student/search_student/" class="btn btn-primary">ค้นหานักศึกษา</a> <a href="<?php echo base_url();?>studentdemo/index.php/teacher/search_teacher/" class="btn btn-primary">ค้นหาอาจารย์</a> </p>
      <!-- /row -->
    </div>
  </div>

  <!-- /row -->
</div>

  <div class="topic-page col-md-12" >ระบบสารสนเทศบัณฑิตวิทยาลัย มหาวิทยาลัยราชภัฏมหาสารคาม</div>
  <div class="row col-md-12">
    <div class="col-md-3"></div>
    <div class="item col-md-2 col-sm-6">
    <a href="<?php echo site_url('CtrlAuthen/LoginPage/Student');?>">
      <div class="thumbnail" style="background-color: blue;height: 200px;font-size: 20px;color:#FFFFFF;
      text-align: center;padding-top:90px">

        สำหรับนักศึกษา
      </div>
    </a>
    </div>
    <div class="item col-md-2 col-sm-6">
    <a href="<?php echo site_url('CtrlAuthen/LoginPage/Graduate');?>">
      <div class="thumbnail" style="background-color: blue;height: 200px;font-size: 20px;color:#FFFFFF;
      text-align: center;padding-top:90px">
        สำหรับบัณฑิตศึกษา
      </div>
    </a>
    </div>
    <div class="item col-md-2 col-sm-6">
    <a href="<?php echo site_url('CtrlAuthen/LoginPage/Officer');?>">
      <div class="thumbnail" style="background-color: blue;height: 200px;font-size: 20px;color:#FFFFFF;
      text-align: center;padding-top:90px">

        สำหรับอาจารย์
      </div>
    </a>
  </div>
	<div class="item col-md-2 col-sm-6">
    <a href="<?php echo site_url('CtrlAuthen/LoginPage/Faculty');?>">
      <div class="thumbnail" style="background-color: blue;height: 200px;font-size: 20px;color:#FFFFFF;
      text-align: center;padding-top:90px">

        สำหรับคณะ
      </div>
    </a>
  </div>
  <div class="col-md-3"></div>
</div>
<div class="col-md-12">
    <div class="row">
      <!-- logo -->

      <!-- end logo -->
      <!--<div class="col-md-5"></div>
    <div class="col-md-3" style="margin-top:5px;">
      <p> <a href="<?php //echo base_url();?>studentdemo/index.php/student/search_student/" class="btn btn-primary">ค้นหานักศึกษา</a> <a href="<?php echo base_url();?>studentdemo/index.php/teacher/search_teacher/" class="btn btn-primary">ค้นหาอาจารย์</a> </p>
      <!-- /row -->
    </div>
  </div>

  <!-- /row -->
</div>

  <div class="row col-md-12">
    <div class="col-md-3"></div>
    <div class="item col-md-2 col-sm-6">
    <a href="<?php echo base_url();?>index.php/home/index/1">
      <div class="thumbnail" style="background-color: blue;height: 200px;font-size: 20px;color:#FFFFFF;
      text-align: center;padding-top:70px">

        รับสมัครเข้า<br>ศึกษาต่อออนไลน์
      </div>
    </a>
    </div>
    <div class="item col-md-2 col-sm-6">
    <a href="<?php echo base_url();?>index.php/home/index/1">
      <div class="thumbnail" style="background-color: blue;height: 200px;font-size: 20px;color:#FFFFFF;
      text-align: center;padding-top:90px">

          ระบบจัดการประชุม
      </div>
    </a>
    </div>
    <div class="item col-md-2 col-sm-6">
    <a href="<?php echo base_url();?>index.php/home/index/1">
      <div class="thumbnail" style="background-color: blue;height: 200px;font-size: 20px;color:#FFFFFF;
      text-align: center;padding-top:70px">

          ระบบลงทะเบียน<br>งานสัมนา
      </div>
    </a>
  </div>
  <div class="col-md-3"></div>
</div>



<div id="login_form" class="container-table" style="display: none">
  <div class="row vertical-center-row">
    <div class="text-center col-md-4 col-md-offset-4">
      <div class="panel panel-primary">
        <div class="panel-heading" style="text-align:left;">ระบบสารสนเทศระดับบัณฑิตศึกษา</div>
        <div class="panel-body">
          <div class="row"> <?php echo form_open('home/authen'); ?>
            <div class="col-md-12">
            <div class="row">
              <div class="form-group">
                <div class="col-md-4">
                  <label for="userName" class="">ชื่อเข้าใช้</label>
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control col-md-12" id="userName" name="userName" placeholder="ชื่อผู้ใช้งาน" autofocus>
                </div>
              </div>
              </div>
              <div class="row">
              <div class="form-group">
                <div class="col-md-4">
                  <label for="password" class="">รหัสผ่าน</label>
                </div>
                <div class="col-md-8">
                  <input type="password" class="form-control col-md-12" id="password" name="password" placeholder="รหัสผ่าน">
                </div>
              </div>
              </div>
              <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary pull-right">เข้าสู่ระบบ</button>
                </div>
              </div></div>
              <!-- </form> -->
              <?php echo form_close(); ?> </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- Javascript -->
<script src="<?php echo base_url(); ?>assets/js/jquery/jquery-2.1.0.min.js"></script>
</body>
</html>
