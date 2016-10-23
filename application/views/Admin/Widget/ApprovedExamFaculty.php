<?php if ($Result['DocExamStatus'][$this->uri->segment(4)]['FACU'][0]['doc_approved_status']==1): ?>
  <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 '>
    <div class="alert alert-success">
  		<strong>อนุมัติเอกสารแล้ว </strong>
  	</div>
  </div>
  <?php else: ?>
    <div class="col-md-12">
      <!-- <h5>คณบดีบัณฑิตวิทยาลัย :</h5> -->
      <div class="row">
      <?php echo form_open('CtrlAdmin/SaveApproved/'.$this->uri->segment(4)); ?>
      <input name="ApprovedBy" type="hidden" value="FACU">
      <input name="student_id" type="hidden" value="<?php echo $Result['Student'][0]['STUDENTID']; ?>">
      <?php //$this->debuger->prevalue($Result['DocExam']); ?>
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
<?php $ExamType = $this->uri->segment(4) ?>
<?php echo form_close(); ?> <?php echo form_open('graduate/Exam_Officer'); ?>
<input type="hidden" name="EXAM_TYPE" value="<?php echo $ExamType; ?>">
<input type="hidden" name="EXAMREF" value="<?php echo $id; ?>">
<div class="col-md-12">
  <div class="row">
    <div class='col-md-12'>
      <h5>คณะกรรมการดําเนินการสอบ : </h5>
    </div>
    <div class="col-sm-5">
      <div class="form-group">
        <select name="OFFICERID" id="officer1" autocomplete="off" class="input">
          <option value="">กรรมการดําเนินการสอบ</option>
          <?php for($i=0; $i<count($Result['officerList']); $i++) { ?>
          <option value="<?php echo $Result['officerList'][$i]['OFFICERID'];?>"><?php echo $Result['officerList'][$i]['OFFICERPOSITION']." ".$Result['officerList'][$i]['OFFICERNAME']." ".$Result['officerList'][$i]['OFFICERSURNAME'];?></option>
          <?php  }?>
        </select>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
        <select name="OFFICER_POSITION" id="officer1" autocomplete="off" class="input">
          <option value="">ตำแหน่งกรรมการดําเนินการสอบ</option>
          <option value="ผู้แทนบัณฑิตวิทยาลัย">ผู้แทนบัณฑิตวิทยาลัย</option>
          <option value="ผู้ทรงคุณวุฒิ">ผู้ทรงคุณวุฒิ</option>
        </select>
      </div>
    </div>
    <div class="col-sm-3">
      <button type="submit" class="btn btn-success btn-sm btn-block"><i class="fa fa-check-circle"></i> เพิ่มอาจารย์คุมสอบ</button>
    </div>
  </div>
</div>
<?php echo form_close(); ?>
