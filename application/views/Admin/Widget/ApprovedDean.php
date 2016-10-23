<?php if ($Result['DocAdviserStatus']['DEAN'][0]['doc_approved_status']==1): ?>
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
          <?php if($this->uri->segment(4)=='ADVI'): ?>
            <input name="DocID" type="hidden" value="<?php echo $Result['DocAdviser'][0]['APPOINT_AVISER_ID']; ?>">
          <?php endif; ?>
          <div class="col-md-12">
            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-check-circle"></i>อนุมัติเอกสาร</button>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    <?php endif; ?>

<?php endif; ?>
