<!-- TimeLine -->

<div class='row '>
  <div class="col-md-12 col-sm-12" style="text-align:center;margin-top:3%">
    <div class="col-md-1"></div>
    <div class="col-md-3 col-sm-4">
      <div class="sidebar-minified" style="margin-left:-19%;margin-right:-19%;"> <i style="background:#088A08;color:#ffffff;">1</i> </div>
      <span>ขอสอบประมวลผลความรู้</span> </div>
      <div class="col-md-4 col-sm-4">
        <div class="sidebar-minified" style="margin-left:-19%;margin-right:-19%;"> <i>2</i> </div>
        <span>ตัวอย่างเอกสาร</span> </div>
        <div class="col-md-3 col-sm-4">
          <div class="sidebar-minified" style="margin-left:-19%;margin-right:-19%;"> <i>3</i> </div>
          <span>เสร็จสิ้น</span> </div>
          <div class="col-md-1"></div>
        </div>
      </div>
      <?php
      $ExamType = $this->uri->segment(4);
      $Count = 0;
      foreach ($Result['DocExam'] as $Exam) {
        if ($Exam['EXAM_TYPE']==$ExamType) {
          $Count = 1;
        }

      }
      ?>
      <div class="tab-content">
        <?php if ($Count!=0): ?>
          <div class="tab-pane fade" id="Select">
          <?php else: ?>
            <div class="tab-pane fade active in" id="Select">
            <?php endif; ?>


            <div class="row">
              <div class="col-xs-12 col-sm-12 col-lg-12">
                <h3 class="text-center">ยื่อคำร้องขอสอบ</h3>
                <?php echo form_open('CtrlStudent/PetitionSave',  array('id' => 'ExamForm', ));?>
                <input type="hidden" name="examtype" value="<?=$this->uri->segment(4);?>">
                <input type="hidden" name="studentid" value="<?=$_SESSION['STUDENTID']?>"/>
                <?php if ($this->uri->segment(4)!='QECE'): ?>
                  <input type="hidden" name="name_id" value="<?=$Result['ThesisName'][0]['thesis_name_id'];?>">
                  <div class="col-sm-12" style="margin-top:10px;">
                    <div class="col-md-3 text-right">
                      <h3>หัวข้อภาษาไทย :</h3>
                    </div>
                    <div class="col-sm-8">
                      <h3>
                        <?php $this->debuger->NullObj($Result['ThesisName'][0]['thesis_name_th']); ?>
                      </h3>
                    </div>
                  </div>
                  <div class="col-sm-12" style="margin-top:10px;">
                    <div class="col-md-3 text-right">
                      <h3>หัวข้อภาษาอังกฤษ :</h3>
                    </div>
                    <div class="col-sm-8">
                      <h3>
                        <?php $this->debuger->NullObj($Result['ThesisName'][0]['thesis_name_en']); ?>
                      </h3>
                    </div>
                  </div>
                <?php endif; ?>
                <div class="col-sm-12" style="text-align:center;"><br>
                  <!-- <button  type="submit" name="topicPropersal" class="btn btn-info btn-lg">ยื่นคำร้องขอสอบ</button> -->
                  <a id="PreviewDoc" href="#Preview" role="tab" data-toggle="tab" aria-expanded="true" class="btn btn-primary btn-sm">ยื่นคำร้องขอสอบ</a> </div>
                  <?php echo form_close();?> </div>
                </div>



              </div>

              <div class="tab-pane fade" id="Preview">
                <?php $ExamType = $this->uri->segment(4);
                $StudentType = $Result['Student'][0]['LEVELID'];
                $DocName = $this->debuger->DocName($ExamType, $StudentType);
                ?>
                <div class="row preview" style="text-align:left;margin-top:5%">
                  <div class="col-md-2 col-sm-6">
                    <a href="#Success" id="BtnPrint" role="tab" data-toggle="tab" aria-expanded="true" class="btn btn-block btn-success" onClick="printpaper()">ปริ้นเอกสาร</a>
                    <!-- <a href="#Select" role="tab" data-toggle="tab" aria-expanded="true" class="btn btn-block btn-warning">แก้ไข </a> -->
                  </div>
                  <div class="col-md-7">
                    <?php if ($ExamType=="QECE"): ?>
                      <div class="col-md-7 col-sm-6 " id="printableArea">
                        <?php if ($StudentType<90): ?>
                          <?php $this->load->view('Papers/Ceform'); ?>
                        <?php else: ?>
                          <?php $this->load->view('Papers/Qeform'); ?>
                        <?php endif; ?>
                      </div>
                    <?php else: ?>
                      <?php if ($ExamType=="PROP"): ?>
                        <?php $this->load->view('Papers/Thesis_proposal_petition_exam'); ?>
                      <?php elseif ($ExamType=="THES"): ?>
                        <?php $this->load->view('Papers/Thesis_petition_exam'); ?>
                      <?php endif; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <?php if ($Count==1): ?>
                <!-- Success -->
                <div class="tab-pane fade active in" id="Success">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ครั้งที่สอบ</th>
                        <th>วันที่ - ช่วงเวลา</th>
                        <th>สถานที่สอบ</th>
                        <th>ผลการสอบ</th>
                        <th>เอกวสาร</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $list=1; foreach ($Result['DocExam'] as $DocExamList): ?>
                        <?php if ($DocExamList['EXAM_TYPE']==$ExamType): ?>
                          <tr>
                            <td><?php echo $list ?></td>
                            <td><?php if ($DocExamList['EXAM_DATE']!='0000-00-00 00:00:00'): ?>
                              <?php echo $this->debuger->DateThai($DocExamList['EXAM_DATE']) ?>
                            <?php else: ?>
                              <?php echo "ดำเนินการ" ?>
                            <?php endif; ?></td>
                            <td>
                              <?php if ($DocExamList['EXAM_ROOM']!=''): ?>
                                <?php echo "อาคาร ".$DocExamList['EXAM_BUILD']." ห้อง ".$DocExamList['EXAM_ROOM'] ?>
                              <?php else: ?>
                                <?php echo "อยู่ระหว่างดำเนินการ" ?>
                              <?php endif; ?>
                            </td>
                            <td>
                              <?php if ($DocExamList['EXAM_RESULT']==1): ?>
                                <?php echo "ดีเยี่ยม" ?>
                              <?php elseif($DocExamList['EXAM_RESULT']==2): ?>
                                <?php echo "ดี" ?>
                              <?php elseif($DocExamList['EXAM_RESULT']==3): ?>
                                <?php echo "ไม่ผ่าน" ?>
                              <?php elseif($DocExamList['EXAM_RESULT']=="" ||$DocExamList['EXAM_RESULT']==0 ): ?>
                                <?php echo "รอผลสอบ" ?>
                              <?php endif; ?>
                            </td>
                            <td>
                            <a href="#Preview" role="tab" data-toggle="tab" aria-expanded="true" class="btn btn-primary">ปริ้นเอกสาร</a>
                            </td>
                          </tr>
                        <?php $list++; endif; ?>

                      <?php  endforeach; ?>


                    </tbody>
                  </table>
                </div>
              <?php endif; ?>
              <!-- End Tab Content -->
            </div>
            <script type="text/javascript">
            $( "#BtnPrint" ).click(function() {
              $( "#ExamForm" ).submit();
            });
            var uri3 = "<?php echo $this->uri->segment(5) ?>"
            if (uri3=='success') {
              alert('บันทึกสำเร็จ');
              window.location.replace("<?php echo site_url(); ?>/CtrlStudent/Patition/260645/<?php echo $ExamType; ?>");
            }
            </script>
