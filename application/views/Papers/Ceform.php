<page size="A4">
<?php $this->load->view('Student/Components/WidgetHeaderPage') ?>
<?php $ExamType = $this->uri->segment(4);
$StudentType = $Result['Student'][0]['LEVELID'];
$DocName = $this->debuger->DocName($ExamType, $StudentType);
?>
<table id="content" style="width:100%">
  <tr>
  <td style="text-align:left">
   <b>เรื่อง  </b><?php echo $DocName['NamePage'];?>  ระดับบัณฑิตศึกษา
  </td>
  </tr>
<tr>
<td style="text-align:left">
 <b>เรียน     คณบดีคณะ</b>
 <input type="text" class="underline" style="width:30%" value="<?=$Result['Student'][0]['FACULTYNAME'];?>" value =" " disabled>
</td>
</tr>
<?php if($Result['Student'][0]['LEVELID']<90){?>
<tr>
<td style="text-align:left;" colspan="2">
 <b>สิ่งที่ส่งมาด้วย</b>  1.<input type="text" class="underline" name="attach1" style="width:85%"
    value="<?=$this->session->userdata('print_status')=="print"? $Result['data']['ce_qe_info'][0]['ATTACH1'] : ""; ?>">
 <br />
  <span style="margin-left:78px">2.<input type="text" class="underline" name="attach2" style="width:85%"
      value="<?=$this->session->userdata('print_status')=="print"? $Result['data']['ce_qe_info'][0]['ATTACH2'] : ""; ?>"></span>
  <br />
  <span style="margin-left:78px">3.<input type="text" class="underline" name="attach3" style="width:85%"
       value="<?=$this->session->userdata('print_status')=="print"? $Result['data']['ce_qe_info'][0]['ATTACH3'] : ""; ?>"></span>
</td>
</tr>
<?php } //if  ?>
<tr>
<td style="text-align:left" colspan="2">
 ข้าพเจ้า<input type="text" class="underline" style="width:40%"
  value="<?=$Result['Student'][0]['STUDENTNAME']. " ".$Result['Student'][0]['STUDENTSURNAME'];?>"  disabled>
 รหัสประจำตัว<input type="text" class="underline" style="width:35%" value ="<?=$Result['Student'][0]['STUDENTCODE'];?> " disabled>
</td>
</tr>
<tr>
<td style="text-align:left;letter-spacing:.01px;" colspan="2">
  <?php
    if($Result['Student'][0]['LEVELID']<90){
      $this->load->view('Student/Components/WidgetIsCeQeForm');
    }
    else{

     $this->load->view('Student/Components/WidgetThesisCeQeForm');
    }
  ?>
</td>
</tr>

<?php  $this->load->view('Student/Components/WidgetGraduateFooterPager');?>

</page>
