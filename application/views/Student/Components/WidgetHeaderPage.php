<?php $ExamType = $this->uri->segment(4);
 $StudentType = $Result['Student'][0]['LEVELID'];
$DocName = $this->debuger->DocName($ExamType, $StudentType);
// $this->debuger->prevalue($namepage);
?>

<div id="header">

<table   width=100%>
<tr>
 <td style="padding-top:10px;vertical-align:top;text-align:left"  width=20%>
     <b style="border:2px solid black; padding:10px;">บว.ทบ.09</b>
 </td>
 <td  width="50%" style="text-align:center">
   <p id="rmu_logo" style="padding-top:30px"><img src="<?php echo base_url();?>/assets/img/rmu/rmu_logo.png"></p>
   <p id="appoint"><b><?php echo $DocName['NamePage']; ?></b></p>
   <p id="appoint"><b><?php echo $Result['Student'][0]['LEVELID']<90 ? "(Comprehensive Examination)" : "(Qualify Examination)"; ?></b></p>
   <p id="appoint"><b>ระดับบัณฑิตศึกษา มหาวิทยาลัยราชภัฏมหาสารคาม</b></p>
   <p class="font14px">
     วันที่  <input type="text" class="underline " style="width:10%" name="printdate" value ="<?=date('d');?>" disabled>
     <?php
      $thaimonth=
      array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
      ?>

     เดือน
     <input type="hidden" name="printmonthhidden" value="<?=date('m');?>">
     <input type="text" class="underline" style="width:25%" name="printmonth" value ="<?=$thaimonth[date(" m ")-1] ;?>" disabled>
     พ.ศ<input type="text" class="underline " style="width:20%" name="printyear" value ="<?=date('Y')+543;?>" disabled>
   </p>
 </td>
 <?php //print_r($studentInfo);?>
 <td style="padding-top:10px;vertical-align:top;"  width=30%>
   <table >
     <tr>
       <td style="text-align:left">คณะต้นสังกัดคณะ
         <input type="text" class="underline"  style="width:50%" value ="" disabled>
         </td>
     </tr>
     <tr>
       <td style="text-align:left" colspan="2">
         รับที่
       <input type="text" class="underline" style="width:86%" value =" " disabled>
     </tr>
     <tr>
       <td style="text-align:left" colspan="2">
         วันที่
         <input type="text" class="underline" style="width:15%" value =" " disabled>/
         <input type="text" class="underline" style="width:41%" value =" " disabled>/
         <input type="text" class="underline" style="width:23%" value =" " disabled>
       </td>
     </tr>
     <tr>
       <td>
         <hr style="border-color:black"/>
       </td>
     </tr>
     <tr>
       <td style="text-align:left">บัณฑิตวิทยาลัย
       </td>
     </tr>
     <tr>
       <td style="text-align:left" colspan="2">
         รับที่
       <input type="text" class="underline" style="width:86%" value =" " disabled>
     </tr>
     <tr>
       <td style="text-align:left" colspan="2">
         วันที่
         <input type="text" class="underline" style="width:15%" value =" " disabled>/
         <input type="text" class="underline" style="width:41%" value =" " disabled>/
         <input type="text" class="underline" style="width:23%" value =" " disabled>
       </td>
     </tr>
   </table>
 </td>
</tr>
</table>
</div><!-- id="header"-->
