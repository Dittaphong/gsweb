
<div class='row '> </div>
<hr>
<div class='row '> </div>
<h3>อาจารย์ที่ปรึกษา</h3>

  <span class="badge element-bg-color-blue">เอกสารเลขที่ : <?php  if (isset($Result['DocAdviserNum'][0]['relate_doc_num'])) {
    echo isset($Result['DocAdviserNum'][0]['relate_doc_num'])."/".$this->debuger->YearThai($Result['DocAdviserNum'][0]['relate_doc_date']);
  } ?></span>
<hr class="inner-separator">
<div class="row">

  <?php foreach ($Result['AdviserLists'] as $AdviserLists): ?>
    <?php $AMT_STD1 = $AdviserLists['WorkAdviserThesis'];
          $AMT_STD2 = $AdviserLists['WorkAdviserIS'];
          $limitIS = $Result['limitIS'];
          $limitThesis = $Result['limitThesis']; ?>
  <div class="col-md-6">
    <div class="media clearfix header-bottom" style="padding-bottom:20px">
      <div class="media-left"> <img src="<?php echo base_url('image/officer/user1.png'); ?>" class="media-object img-circle" height="64px"> </div>
      <div class="media-body"> <a href="<?php echo site_url(); ?>/graduate/Officerinfo/<?php echo $AdviserLists['OFFICERID']?>"> <span><?php echo $AdviserLists['OFFICERPOSITION']." ".$AdviserLists['OFFICERNAME']."  ".$AdviserLists['OFFICERSURNAME'];?></span> </a><br>
        <span class="text-muted username">ที่ปรึกษาวิทยานิพนธ์ <?php echo $AMT_STD1."/".$limitThesis; ?> คน</span><br>
        <span class="text-muted username">ที่ปรึกษาค้นคว้าอิสระ <?php echo $AMT_STD2."/".$limitIS; ?> คน</span><br>
        <?php if($AdviserLists['ADVISERTYPE']==1): ?>
        <span class="badge element-bg-color-green">ที่ปรึกษาหลัก</span>
        <?php else: ?>
        <span class="badge">ที่ปรึกษาร่วม</span>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>
<?php //$this->load->view('Admin/Widget/ExamApproved');
// echo $_SESSION['GROUPTYPE'];
if ($_SESSION['GROUPTYPE']=='FACULTY') {
  $this->load->view('Admin/Widget/ApprovedFaculty');
} elseif ($_SESSION['GROUPTYPE']=='ADMIN') {
  $this->load->view('Admin/Widget/ApprovedDean');
}
?>
