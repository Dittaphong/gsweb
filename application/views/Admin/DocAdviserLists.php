

<div class="col-md-12" style="text-align: right; ">
<form method="POST" action="<?php echo base_url();?>index.php/CtrlAdmin/DocAdviserLists"> 
  <button type="submit" class="btn btn-primary" style="margin-right:-20px;float: right;"> ค้นหา </button>
  <input type="text" id="STUDENTFULLNAME" name="STUDENTFULLNAME" class="form-control in-search"  placeholder="ชื่อนักศึกษา - สกุล" value="<?php echo $keyword['STUNAME']; ?>">
  <input type="text" id="STUDENTCODE" name="STUDENTCODE" class="form-control in-search"  placeholder="รหัสนักศึกษา" value="<?php echo $keyword['STUCODE']; ?>">
</form> 
</div>

<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#home" data-toggle="tab"><i class="fa fa-home"></i> แต่งตั้งอาจารย์ที่ปรึกษา</a></li>
  <!-- <li><a href="#profile" data-toggle="tab"><i class="fa fa-user"></i> ค้นหาประวัติการแต่งตั้งอาจารย์ที่ปรึกษา</a></li> -->
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
            <?php foreach ($DocAdviserLists as $RS): ?>
            <tr role="row" class="odd">
              <td><a href="<?php echo site_url(); ?>/CtrlAdmin/ApprovedPatition/<?php echo $RS['STUDENTID']; ?>/ADVI" ><?php echo $RS['STUDENTCODE']; ?></a></td>
              <td><a href="<?php echo site_url(); ?>/CtrlAdmin/ApprovedPatition/<?php echo $RS['STUDENTID']; ?>/ADVI" > <?php echo $RS['PREFIXNAME'].$RS['STUDENTNAME']." ".$RS['STUDENTSURNAME']; ?></a></td>
              <td><?php echo $RS['FACULTYNAME']; ?></td>
              <td><?php echo $this->debuger->FullDateThai($RS['APPOINT_AVISER_DATE']); ?></td>
              <td><?php echo $RS['LEVELNAME']; ?></td>
              <td><?php echo $RS['CURRENTACADYEAR']; ?></td>
              <td><?php echo $RS['procedure_name']; ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
</div>
