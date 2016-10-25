<div class="col-md-12" style="text-align: right; ">
  <form method="POST" action="<?php echo base_url();?>index.php/CtrlAdmin/SearchOfficer">
    <button type="submit" class="btn btn-primary" style="margin-right:-20px;float: right;"> ค้นหา </button>
    <input type="text" id="FULLNAME" name="FULLNAME" class="form-control in-search"  placeholder="ชื่ออาจารย์ - สกุล" value="<?php echo $keyword['NAME']; ?>">
    <input type="text" id="CODE" name="CODE" class="form-control in-search"  placeholder="รหัสอาจารย์" value="<?php echo $keyword['CODE']; ?>">
  </form>
</div>

<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#home" data-toggle="tab"><i class="fa fa-home"></i> <?php echo $PageName; ?> </a></li>
</ul>
<div class="main-header">
  <div class="main-content">
    <div class="row tab-pane fade in active" id="home">
      <div class="col-md-12">
        <div class="widget-content">
          <table  class="table colored-header datatable project-list" role="grid" aria-describedby="datatable-column-filter_info">
            <thead>
              <tr role="row">
                <th>รหัสอาจารย์</th>
                <th>ชื่อ-นามสกุล</th>
                <th  width="150">คณะ</th>
                <th width="200">สาขาวิชา</th>
                <th>อีเมลล์</th>
             <!--  <th>ปีการศึกษา</th>
             <th>สถานภาพ</th> -->
           </tr>
         </thead>
         <tbody>
           <?php if (count($OfficerLists) !=NULL):?>
             <?php foreach ($OfficerLists as $OL): ?>

              <tr role="row" class="odd">
                <td><a href="<?php echo site_url(); ?>/CtrlAdmin/ApprovedPatition/<?php echo $OL['OFFICERID']; ?>/<?php echo $this->uri->segment(3);?>" ><?php echo $OL['OFFICERCODE']; ?></a></td>
                <td><a href="<?php echo site_url(); ?>/CtrlAdmin/ApprovedPatition/<?php echo $OL['OFFICERID']; ?>/<?php echo $this->uri->segment(3);?>" > <?php echo $OL['OFFICERNAME']; ?></a></td>
                <td><?php echo $OL['FACULTYNAME']; ?></td>
                <td><?php echo $OL['DEPARTMENTNAME']; ?></td>
                <td><?php echo $OL['OFFICEREMAIL']; ?></td>
                <!-- <td><?php echo $OL['procedure_name']; ?></td> -->
              </tr>
            <?php endforeach; ?>
          <?php  else: ?>
            <tr>
              <td colspan="4" align="center">======================== ไม่มีข้อมูลที่ต้องการ ======================== </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>

