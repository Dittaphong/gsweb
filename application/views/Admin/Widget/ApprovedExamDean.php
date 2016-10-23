<?php if ($Result['DocExamStatus'][$this->uri->segment(4)]['DEAN'][0]['doc_approved_status']==1): ?>
  <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 '>
    <div class="alert alert-success">
      <strong>อนุมัติเอกสารแล้ว </strong>
    </div>
  </div>
<?php else: ?>

    <?php if ($Result['DocAdviserStatus']['FACU'][0]['doc_approved_status']==0): ?>
      <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 '>
        <div class="alert alert-warning">
          <strong>กำลังดำเนินการ </strong>
        </div>
      </div>
    <?php else: ?>
      <div class="col-md-12">
        <!-- <h5>คณบดีบัณฑิตวิทยาลัย :</h5> -->
        <div class="row">
          <?php echo form_open('CtrlAdmin/SaveApproved/'.$this->uri->segment(4)); ?>
          <input name="ApprovedBy" type="hidden" value="DEAN">
          <input name="student_id" type="hidden" value="<?php echo $Result['Student'][0]['STUDENTID']; ?>">
          <?php foreach ($Result['DocExam'] as $DocExam): ?>
            <?php if ($DocExam['EXAM_TYPE']==$this->uri->segment(4)) {
              $DocID = $DocExam['EXAM_ID'];
            } ?>
          <?php endforeach; ?>
            <input name="DocID" type="hidden" value="<?php echo $DocID; ?>">

          <div class="col-md-12">
            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-check-circle"></i>อนุมัติเอกสาร</button>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    <?php endif; ?>

<?php endif; ?>
<div class="col-md-12">
  <h5>กำหนดวันสอบ : </h5>
  <?php echo form_open('graduate/PropersalApproved'); ?>
  <?php
    if (count($Result['DocExam'])>1){
      $id = $Result['DocExam'][1]['EXAM_ID'];
      $date = $Result['DocExam'][1]['EXAM_DATE'];
      $build = $Result['DocExam'][1]['EXAM_BUILD'];
      $room = $Result['DocExam'][1]['EXAM_ROOM'];
    } else {
      $id = $Result['DocExam'][0]['EXAM_ID'];
      $date = $Result['DocExam'][0]['EXAM_DATE'];
      $build = $Result['DocExam'][0]['EXAM_BUILD'];
      $room = $Result['DocExam'][0]['EXAM_ROOM'];
    }
    ?>
  <input type="hidden" name="docid" value="<?php echo $id; ?>"/>
  <div class="widget-content">
    <div class="row" >
      <div class="col-sm-2">
        <input name="exam_room" class="form-control" type="text" value="<?php echo $room; ?>" placeholder="ห้องสอบ">
      </div>
      <div class="col-sm-2">
        <input name="exam_build" class="form-control" type="text" value="<?php echo $build; ?>" placeholder="อาคาร">
      </div>
      <div class="col-sm-5">
        <div class="input-group date form_datetime" data-date="<?php echo $date; ?>" data-date-format="yyyy-mm-d HH:mm:ss" data-link-field="">
          <input id="exam_date" name="exam_date" class="form-control " size="16" type="text" value="<?php echo $date; ?>" readonly>
          <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span> <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span> </div>
      </div>
      <div class="col-sm-3">
        <button type="submit" class="btn btn-success btn-block"><i class="fa fa-check-circle"></i> กำหนดวันสอบ</button>
      </div>
    </div>
  </div>
</div>
