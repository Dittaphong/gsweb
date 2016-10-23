

<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#home" data-toggle="tab"><i class="fa fa-home"></i> แต่งตั้งอาจารย์ที่ปรึกษา</a></li>
  <li><a href="#profile" data-toggle="tab"><i class="fa fa-user"></i> ค้นหาประวัติการแต่งตั้งอาจารย์ที่ปรึกษา</a></li>
</ul>
<div class="main-header">
<div class="main-content">
  <div class="row tab-pane fade in active" id="home">
    <div class="col-md-12">
      <div class="widget-content">
        <table  class="table colored-header datatable project-list" role="grid" aria-describedby="datatable-column-filter_info">
          <thead>
            <tr role="row">
              <th>รหัสนักศึกษา</th>
              <th>ชื่อ-นามสกุล</th>
              <th>คณะ</th>
              <th>วันที่ทำเอกสาร</th>
              <th>ระดับการศึกษา</th>
              <th>ปีการศึกษา</th>
              <th>สถานภาพ</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($Result['DocExamLists'] as $DocExamLists): ?>
            <tr role="row" class="odd">
              <td><a href="<?php echo site_url(); ?>/CtrlAdmin/ApprovedPatition/<?php echo $DocExamLists['STUDENTID']; ?>/<?php echo $this->uri->segment(3);?>" ><?php echo $DocExamLists['STUDENTCODE']; ?></a></td>
              <td><a href="<?php echo site_url(); ?>/CtrlAdmin/ApprovedPatition/<?php echo $DocExamLists['STUDENTID']; ?>/<?php echo $this->uri->segment(3);?>" > <?php echo $DocExamLists['PREFIXNAME'].$DocExamLists['STUDENTNAME']." ".$DocExamLists['STUDENTSURNAME']; ?></a></td>
              <td><?php echo $DocExamLists['FACULTYNAME']; ?></td>
              <td><?php echo $this->debuger->FullDateThai($DocExamLists['EXAM_CREATE_DATE']); ?></td>
              <td><?php echo $DocExamLists['LEVELNAME']; ?></td>
              <td><?php echo $DocExamLists['CURRENTACADYEAR']; ?></td>
              <td><?php echo $DocExamLists['procedure_name']; ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="profile">
    <div class="row">

      <div class="widget-content col-md-6 col-md-offset-3"> <?php echo form_open('graduate/searchOfficer','class="form-horizontal label-left" role="form"'); ?>
        <div class="form-group">
          <label for="officercode" class="col-sm-4 control-label">รหัสนักศึกษา</label>
          <div class="col-sm-8">
            <input id="STUDENTCODE" name="STUDENTCODE" class="form-control" type="text">
          </div>
        </div>
        <div class="form-group">
          <label for="officername" class="col-sm-4 control-label">ชื่อนักศึกษา - สกุล</label>
          <div class="col-sm-8">
            <input id="STUDENTFULLNAME" name="STUDENTFULLNAME" class="form-control" type="text">
          </div>
        </div>
        <div class="form-group">
          <label for="ssn" class="col-sm-9 control-label"></label>
          <div class="col-sm-3">
            <input type="submit" class="btn btn-primary form-control" name="submitBtn" value="ค้นหา"/>
          </div>
        </div>
        <?php echo form_close(); ?> </div>
    </div>
  </div>
</div>
