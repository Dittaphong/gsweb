<!-- TimeLine -->
<style>

 #sortable1,#sortable2{
  /*height: 300px;*/
  height: 200px;
  overflow-y:scroll;
}
#sortable1, #sortable2 {
  border: 1px solid #eee;
  /*width: 300px;*/
  /*width: 100%*/
  min-height: 20px;
  list-style-type: none;
  margin: 0;
  padding: 5px 0 0 0;
  float: left;
  margin-right: 10px;
}
#sortable1 li , #sortable2 option {
  margin: 0 5px 5px 5px;
  padding: 5px;
  font-size: 1.2em;
  /*width: 120px;*/
  width: 90%
}
</style>
<script>
  $( function() {
    $( "#sortable1, #sortable2" ).sortable({
      connectWith: ".connectedSortable"
    }).disableSelection();
  } );
</script>
<div class='row '>
  <div class="col-md-12 col-sm-12" style="text-align:center;margin-top:3%">
    <div class="col-md-1"></div>
    <div class="col-md-3 col-sm-4">
      <div class="sidebar-minified" style="margin-left:-19%;margin-right:-19%;"> <i style="background:#088A08;color:#ffffff;">1</i> </div>
      <span>ขอแต่งตั้งอาจารย์ที่ปรึกษา<?php echo $Result['DocName']['StudentTypeName']  ?></span> </div>
      <div class="col-md-4 col-sm-4">
        <div class="sidebar-minified" style="margin-left:-19%;margin-right:-19%;"> <i>2</i> </div>
        <span>ตัวอย่าง</span> </div>
        <div class="col-md-3 col-sm-4">
          <div class="sidebar-minified" style="margin-left:-19%;margin-right:-19%;"> <i>3</i> </div>
          <span>เสร็จสิ้น</span> </div>
          <div class="col-md-1"></div>
        </div>
      </div>
      <div class="tab-content">
        <?php if (count($Result['DocAdviser'])!=0): ?>
          <!-- Select -->
          <div class="tab-pane fade" id="Select">
          <?php else: ?>
            <div class="tab-pane fade active in" id="Select">
            <?php endif; ?>
            <div class='row '>
              <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="messages">
                  <div class="table-responsive"> <?php echo form_open('CtrlStudent/SaveDocAdviser', array('id' => 'SaveDocAdviser'));?>
                    <div class="col-sm-12" style="margin-top:10px;">
                      <!-- <div class="col-sm-1"></div> -->
                      <!-- <div class="col-sm-10"> -->
                      <label for="address" class="col-md-3 control-label" style="text-align:right;padding-top:10px;"><u>อาจารย์ที่ปรึกษาหลัก </u></label>
                      <div class="col-sm-9">
                        <select name="MainAdviser" id="adviser" class="select2 " required="required">
                          <option value="">เลือกอาจารย์ที่ปรึกษาหลัก</option>
                          <?php foreach ($Result['ProgramOfficer'] as $ProgramOfficer): ?>
                            <option value="<?php echo $ProgramOfficer['OFFICERID'];?>"
                              <?php  // echo $select = ($ProgramOfficer['OFFICERID']==$Result['AdviserLists'][0]['OFFICERID'])?"selected":" ";?>
                              >
                              <?php echo $ProgramOfficer['PREFIXNAME'].$ProgramOfficer['OFFICERNAME']."  ".$ProgramOfficer['OFFICERSURNAME'];?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                        <!-- รายชื่ออาจารย์ที่ปรึกษา -->
                        <!-- </div> -->
                      </div>
                    </div>
                    <?php if($Result['Student'][0]['LEVELID'] != 82): ?>
                    <!--   <?php for ($i=1; $i < 3; $i++): ?>
                        <div class="col-sm-12" style="margin-top:10px;">
                          <label for="address" class="col-md-3 control-label" style="text-align:right;padding-top:10px;">อาจารย์ที่ปรึกษาร่วม </label>
                          <div class="col-sm-8">
                            <select name="SubAdviser<?php echo $i ?>" id="sub_adviser1" class="select2" required="required">
                              <option value="">เลือกอาจารย์ที่ปรึกษาร่วม</option>
                              <?php $value = $Officer.$i; foreach ($Result['OfficerAll'] as $value): ?>
                              <option value="<?php echo$value['OFFICERID'];?>"
                                <?php //$select =($value['OFFICERID']==$Result['AdviserLists'][$i]['OFFICERID'])?"selected":""; ?>
                                >
                                <?php echo $value['PREFIXNAME'].$value['OFFICERNAME']."  ".$value['OFFICERSURNAME'];?>
                              </option>
                              <option><?php echo $value['OFFICERSURNAME']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    <?php endfor; ?> -->

                    <div class="col-sm-12" style="margin-top:10px;">
                      <label for="address" class="col-sm-3 control-label" style="text-align:right;padding-top:10px;">อาจารย์ที่ปรึกษาร่วม </label>
                      <div class="col-sm-4">
                        <ul id="sortable1" class="connectedSortable col-sm-12 well">
                        </ul>
                      </div>
                      <!-- <div class="col-sm-1"></div> -->
                      <div class="col-sm-1 " align="center" >
                        <h1><id class="glyphicon glyphicon-arrow-left "> </id></h1><h1><id class="glyphicon glyphicon-arrow-right "> </id></h1>
                      </div>
                      <div class="col-sm-4">
                       <!-- <ul id="sortable2" class="connectedSortable col-sm-12 well">
                         <?php foreach ($Result['OfficerAll'] as $dataProgrameOfficer): ?>
                          <li class="ui-state-highlight" style="background-color:#FFFFFF;">
                            <?php echo $dataProgrameOfficer['OFFICERPOSITION'].$dataProgrameOfficer['OFFICERNAME']." ".$dataProgrameOfficer['OFFICERSURNAME']; ?>
                          </li>
                        <?php endforeach; ?>
                      </ul> -->
                      <select  id="SELECTADVI" class="from-control" size="10" multiple="multiple" max="2">
                       <?php foreach ($Result['OfficerAll'] as $dataProgrameOfficer): ?>
                        <option class="ui-state-highlight" style="background-color:#FFFFFF;">
                          <?php echo $dataProgrameOfficer['OFFICERPOSITION'].$dataProgrameOfficer['OFFICERNAME']." ".$dataProgrameOfficer['OFFICERSURNAME']; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>

                  </div>
                </div>
              </div>

            <?php endif; ?>
            <div class="col-sm-12" style="text-align:center;"> <br>
              <a id="PreviewDoc" href="#Preview" role="tab" data-toggle="tab" aria-expanded="true" class="btn btn-primary btn-sm">ยื่นขอแต่งตั้งอาจารย์ที่ปรึกษา</a>
              <!-- <button type="submit" name="appoint_advisor_btn" class="btn btn-primary btn-sm">ยื่นขอแต่งตั้งอาจารย์ที่ปรึกษา</button> -->
              <br>
            </div>
            <?php echo form_close(); ?> </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Preview -->
    <div class="tab-pane fade" id="Preview">
      <div class="row preview" style="text-align:left;margin-top:5%">
        <div class="col-md-2 col-sm-6">
      <!-- <button name="printBth" id="printBth" class="btn btn-block btn-success" onClick="printpaper()">
        <i class="fa fa-print fa-3x pull-left"></i>
        ปริ้นเอกสาร
      </button> -->
      <a href="#Success" id="BtnPrint" role="tab" data-toggle="tab" aria-expanded="true" class="btn btn-block btn-success" onClick="printpaper()">ปริ้นเอกสาร</a>
      <a href="#Select" role="tab" data-toggle="tab" aria-expanded="true" class="btn btn-block btn-warning">แก้ไข </a>
    </div>
    <div class="col-md-7 col-sm-6 " id="printableArea">
      <?php  $this->load->view('Papers/Adviser_appoint_paper'); ?>
    </div>
  </div>
</div>

<!-- Success -->
<?php if (count($Result['DocAdviser'])!=0): ?>
  <div class="tab-pane fade active in" id="Success">
    <div class="nav nav-pills nav-pills-custom-minimal custom-minimal-bottom" role="tablist">
      <li class="active"><a>สถานะ การดำเนินการแต่งตั้งอาจารย์ที่ปรึกษา : กำลังดำเนินการ</a></li>
    </div>
    <div class="row" style="padding-top:20px">
      <?php foreach ($Result['AdviserLists'] as $AdviserLists): ?>
        <?php $AMT_STD1 = $AdviserLists['WorkAdviserThesis'];
        $AMT_STD2 = $AdviserLists['WorkAdviserIS'];
        $limitIS = $Result['limitIS'];
        $limitThesis = $Result['limitThesis']; ?>
        <div class="col-md-4">
          <div class="media clearfix header-bottom" style="padding-bottom:20px">
            <div class="media-left"> <img src="<?php echo base_url('image/officer/user1.png'); ?>" class="media-object img-circle" height="64px"> </div>
            <div class="media-body"> <a href="<?php echo site_url(); ?>/graduate/Officerinfo/<?php echo $AdviserLists['OFFICERID']?>"> <span><?php echo $AdviserLists['OFFICERPOSITION']." ".$AdviserLists['OFFICERNAME']."  ".$AdviserLists['OFFICERSURNAME'];?></span> </a><br>
              <span class="text-muted username">ที่ปรึกษาวิทยานิพนธ์ <?php echo $AMT_STD1."/".$limitThesis; ?> คน</span><br>
              <span class="text-muted username">ที่ปรึกษาค้นคว้าอิสระ <?php echo $AMT_STD2."/".$limitIS; ?> คน</span><br>
              <?php if ($AdviserLists['ADVISERTYPE']==1): ?>
                <span class="badge element-bg-color-green">ที่ปรึกษาหลัก</span>
              <?php else: ?>
                <span class="badge">ที่ปรึกษาร่วม</span>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-3"> <a href="#Preview" role="tab" data-toggle="tab" aria-expanded="true" class="btn btn-block btn-primary">ทำการปริ้นเอกสาร</a> </div>
      <div class="col-md-3"> <a href="#Select" role="tab" data-toggle="tab" aria-expanded="true" class="btn btn-block btn-primary">ทำการสร้างเอกสารใหม่</a> </div>
    <?php endif; ?>
  </div>
  <!-- End Tab Content -->
</div>
<!-- <?php echo "<pre>"; ?> -->
<!-- <?php print_r($Result['OfficerAll']); ?> -->
<!-- <?php print_r($Result['getProgramOfficer']); ?> -->
<!-- <?php print_r($Result['AdviserLists']); ?> -->
<!-- <?php print_r($Result['Student']); ?> -->
<!-- <?php echo $Result['Student'][0]; ?> -->
<!-- <?php print_r($_SESSION) ?> -->
<script type="text/javascript">
  $( "#BtnPrint" ).click(function() {
    $( "#SaveDocAdviser" ).submit();
  });
  var uri3 = "<?php echo $this->uri->segment(5) ?>"
  if (uri3=='success') {
    alert('บันทึกสำเร็จ');
    window.location.replace("<?php echo site_url(); ?>/CtrlStudent/Patition/260645/ADVI");
  }
  $('#SELECTADVI').on('change',function() {
    var selectval = $(this).val();
    $.each(selectval,function(i,n){
      if(i > 0){
        $('select option').prop('disabled',true);
      }else{
        $('select option').removeProp('disabled');
      }
    });
  });
</script>
