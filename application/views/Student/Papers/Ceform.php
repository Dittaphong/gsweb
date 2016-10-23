<?php $ExamType = $this->uri->segment(4);
$StudentType = $Result['Student'][0]['LEVELID'];
$DocName = $this->debuger->DocName($ExamType, $StudentType); ?>
<div class="col-md-12 col-sm-12 " style="text-align:right;margin-top:1%;" id="printArea">
  <page size="A4">
    <div id="header">
      <table style="width:100%" >
        <tr>
          <td style="padding-top:10px;vertical-align:top">
            <b style="border:2px solid black; padding:10px;">บว.ทบ.09</b>
          </td>
          <td>
            <p id="rmu_logo" style="padding-top:30px"><img src="<?php echo base_url();?>/assets/img/rmu/rmu_logo.png"></p>
            <p id="appoint"><b><?php echo $DocName['NamePage']; ?></b></p>
            <p id="appoint"><b>Comprehensive Examination</b></p>
            <p class="font14px">
              วันที่ <span class="underline"><?=date('d');?></span>
              เดือน <span class="underline"><?=date('M');?></span>
              พ.ศ<span class="underline"><?=date('Y');?></span></p>
            </td>
            <td style="padding-top:10px;vertical-align:top;width:30%">
              <table >
                <tr>
                  <td style="text-align:left">คณะต้นสังกัดคณะ
                    <input type="text" class="underline" style="width:50%" value =" " disabled>
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
          <br />

          <table id="content" style="width:100%">
            <tr>
              <td style="text-align:left">
                <b>เรื่อง  </b>สอบ<?=$namepage;?>  ระดับบัณฑิตศึกษา
              </td>
            </tr>
            <tr>
              <td style="text-align:left">
                <b>เรียน     คณบดีคณะ</b>
                <input type="text" class="underline" style="width:30%" value="ศึกษาศาสตร์" value =" " disabled>
              </td>
            </tr>
            <tr>
              <td style="text-align:left">
                <b>สิ่งที่ส่งมาด้วย</b>  1.<input type="text" class="underline" style="width:30%" >
                <br />
                <span style="margin-left:75px">2.<input type="text" class="underline" style="width:30%"></span>
                <br />
                <span style="margin-left:75px">3.<input type="text" class="underline" style="width:30%"></span>
              </td>
            </tr>
            <tr>
              <td style="text-align:left">
                ข้าพเจ้า<input type="text" class="underline" style="width:30%" value=""  disabled>
                รหัสประจำตัว<input type="text" class="underline" style="width:30%" value =" " disabled>
              </td>
            </tr>
            <tr>
              <td style="text-align:left">
                เป็นนักศึกษา <label class="control-inline  custom-bgcolor-green">
                  <input type="checkbox">
                  <span style="font-size:12px">ระดับปริญญาโท</span>
                  ( <span style="font-size:12px">แผน ข</span>)
                  สาขา<input type="text" class="underline" style="width:30%" value =" " disabled>
                  รูปแบบการศึกษา  <input type="checkbox"> <span style="font-size:12px;">ในเวลาราชการ</span>
                  <input type="checkbox"> <span style="font-size:12px;">  นอกเวลาราชการ
                  </td>
                </tr>
                <tr>
                  <td class="alignleft">
                    ศูนย์การศึกษา<input type="text" class="underline" style="width:30%" value =" " disabled>
                    เริ่มเข้าเรียน  ในภาคเรียนที่<input type="text" class="underline" style="width:5%" value =" " disabled>/
                    <input type="text" class="underline" style="width:5%" value =" " disabled>
                    มีความประสงคขอสอบประมวลความรู้
                    ประจำภาคเรียนที่<input type="text" class="underline" style="width:5%" value =" " disabled>/
                    <input type="text" class="underline" style="width:5%" value =" " disabled>
                    กำหนดสอบวันที่<input type="text" class="underline" style="width:5%" value =" " disabled>
                    เดือน<input type="text" class="underline" style="width:5%" value =" " disabled>พ.ศ
                    <input type="text" class="underline" style="width:5%" value =" " disabled>และได้ชำระค่าสอบประมวลความรู้แล้ว
                    จำนวน<input type="text" class="underline" style="width:5%" value =" " disabled>บาท
                    ตามใบเสร็จรับเงินเล่มที่<input type="text" class="underline" style="width:5%" value =" " disabled>
                    เลขที่<input type="text" class="underline" style="width:5%" value =" " disabled>
                    ลงวันที่<input type="text" class="underline" style="width:5%" value =" " disabled>
                    เดือน<input type="text" class="underline" style="width:5%" value =" " disabled>
                    พ.ศ<input type="text" class="underline" style="width:5%" value =" " disabled>

                  </td>
                </tr>
                <tr>
                  <td class="alignleft">
                    เจ้าหน้าที่รับเงินลงนาม
                    <input type="text" class="underline" style="width:5%" value =" " disabled>
                  </td>
                  <td>
                    (<input type="text" class="underline" style="width:5%" value =" " disabled>)
                  </td>
                </tr>

                <tr>
                  <td class="alignleft">
                    ลงลายมือชื่อนักศึกษา
                    <input type="text" class="underline" style="width:5%" value =" " disabled>
                  </td>
                  <td>
                    (<input type="text" class="underline" style="width:5%" value =" " disabled>)
                  </td>
                </tr>
              </table>




              <div style="margin-top:20px;width:100%" class="alignleft">
                <b>1.  อาจารย์ที่ปรึกษาการค้นคว้าอิสระตรวจคำร้องนี้แล้ว    เห็นควร</b>
                <input type="checkbox"> <span style="font-size:12px;">อนุมัติ</span>
                <input type="checkbox"> <span style="font-size:12px;">ไม่อนุมัติ</span>
              </div>
              <table>
                <tr>
                  <td class="alignleft">
                    เพราะว่า
                    <input type="text" class="underline" style="width:5%" value =" " disabled>
                  </td>
                </tr>
                <tr>
                  <td class="alignleft">
                    อาจารย์ที่ปรึกษาการค้นคว้าอิสระลงนาม
                    <input type="text" class="underline" style="width:5%" value =" " disabled>
                  </td>
                  <td>
                    (<input type="text" class="underline" style="width:5%" value =" " disabled>)
                  </td>
                  <td>
                    วันที่<input type="text" class="underline" style="width:5%" value =" " disabled>
                    เดือน<input type="text" class="underline" style="width:5%" value =" " disabled>
                    พ.ศ.<input type="text" class="underline" style="width:5%" value =" " disabled>
                  </td>
                </tr>
              </table>
              <div style="margin-top:20px;width:100%" class="alignleft">
                <b>2.  จ้าหน้าที่คณะที่สาขาวิชาสังกัด  ได้ตรวจคำร้องและเอกสารที่เกี่ยวข้องครบสมบูรณ์แล้ว  จึงนำเสนอเพื่อโปรดพิจารณา</b>
              </div>
              <table>
                <tr>
                  <td class="alignleft">
                    ลายมือชื่อเจ้าหน้าที่
                    <input type="text" class="underline" style="width:5%" value =" " disabled>
                  </td>
                  <td>
                    (<input type="text" class="underline" style="width:5%" value =" " disabled>)
                  </td>
                  <td>
                    วันที่<input type="text" class="underline" style="width:5%" value =" " disabled>
                    เดือน<input type="text" class="underline" style="width:5%" value =" " disabled>
                    พ.ศ.<input type="text" class="underline" style="width:5%" value =" " disabled>
                  </td>
                </tr>
              </table>
              <div style="margin-top:20px;width:100%" class="alignleft">
                <b>3.  ประธานคณะกรรมการผู้รับผิดชอบหลักสูตร  ได้ตรวจคำร้องและเอกสารที่เกี่ยวข้องแล้ว เห็นควร</b>
                <input type="checkbox"> <span style="font-size:12px;">อนุมัติ</span>
                <input type="checkbox"> <span style="font-size:12px;">ไม่อนุมัติ</span>
              </div>
              <table>
                <tr>
                  <td class="alignleft">
                    เพราะว่า
                    <input type="text" class="underline" style="width:5%" value =" " disabled>
                  </td>
                </tr>
                <tr>
                  <td class="alignleft">
                    ลายมือชื่อประธานฯ
                    <input type="text" class="underline" style="width:5%" value =" " disabled>
                  </td>
                  <td>
                    (<input type="text" class="underline" style="width:5%" value =" " disabled>)
                  </td>
                  <td>
                    วันที่<input type="text" class="underline" style="width:5%" value =" " disabled>
                    เดือน<input type="text" class="underline" style="width:5%" value =" " disabled>
                    พ.ศ.<input type="text" class="underline" style="width:5%" value =" " disabled>
                  </td>
                </tr>

              </table>

              <div style="margin-top:20px;width:100%" class="alignleft">
                <b>5.  คณบดี คณะที่สาขาวิชาสังกัดคณะ</b>
                <input type="checkbox"> <span style="font-size:12px;">ครุศาสตร์</span>
                <input type="checkbox"> <span style="font-size:12px;">มนุษยศาสตร์และสังคมศาสตร์</span>
                <input type="checkbox"> <span style="font-size:12px;">วิทยาศาสตร์และเทคโนโลยี</span>
                <input type="checkbox"> <span style="font-size:12px;">วิทยาการจัดการ</span>
                <input type="checkbox"> <span style="font-size:12px;">เทคโนโลยีการเกษตร</span>
                ได้ตรวจคำร้องและเอกสารที่เกี่ยวข้องแล้ว  เห็นควร
                <input type="checkbox"> <span style="font-size:12px;">อนุมัติ</span>
                <input type="checkbox"> <span style="font-size:12px;">ไม่อนุมัติ</span>
              </div>
              <table>
                <tr>
                  <td class="alignleft">
                    เพราะว่า
                    <input type="text" class="underline" style="width:5%" disabled>
                  </td>
                </tr>
                <tr>
                  <td class="alignleft">
                    ลายมือชื่อคณบดีสาขาวิชาสังกัด
                    <input type="text" class="underline" style="width:5%" disabled>
                  </td>
                  <td>
                    (<input type="text" class="underline" style="width:5%" disabled>)
                  </td>
                  <td>
                    วันที่<input type="text" class="underline" style="width:5%" disabled>
                    เดือน<input type="text" class="underline" style="width:5%" disabled>
                    พ.ศ.<input type="text" class="underline" style="width:5%" disabled>
                  </td>
                </tr>

              </table>
              <hr /><hr />
              <table>
                <tr>
                  <td class="alignleft">
                    เรียน  คณบดีบัณฑิตวิทยาลัย
                  </td>
                </tr>
                <tr>
                  <td class="alignleft">
                    1. รองคณบดีบัณฑิตวิทยาลัย   ตรวจสอบคำร้องเสนอขอสอบประมวลความรู้ครั้งนี้แล้ว   เห็นควร
                    <input type="checkbox"> <span style="font-size:12px;">อนุมัติ</span>
                    <input type="checkbox"> <span style="font-size:12px;">ไม่อนุมัติ</span>
                    ตามข้อกำหนด ของข้อบังคับ  ระเบียบ และประกาศที่เกี่ยวข้องกับการจัดการศึกษาระดับบัณฑิตศึกษา  มหาวิทยาลัยราชภัฏมหาสารคาม
                  </td>
                </tr>
                <tr>
                  <td class="alignleft">
                    ลายมือชื่อรองคณบดีบัณฑิตวิทยาลัย<input type="text" class="underline" style="width:5%" disabled>
                    (<input type="text" class="underline" style="width:5%" disabled>)
                    วันที่ <input type="text" class="underline" style="width:5%" disabled>
                    เดือน<input type="text" class="underline" style="width:5%" disabled>
                    พ.ศ.<input type="text" class="underline" style="width:5%" disabled>

                  </td>
                </tr>
                <tr>
                  <td class="alignleft">
                    2.  คณบดีบัณฑิตวิทยาลัย  พิจารณา
                    <input type="checkbox"> <span style="font-size:12px;">อนุมัติ</span>
                    <input type="checkbox"> <span style="font-size:12px;">ไม่อนุมัติ</span>
                    เพราะว่า
                    <input type="text" class="underline" style="width:5%" disabled>

                  </td>
                  <td class="alignleft">
                    ลายมือชื่อคณบดีบัณฑิตวิทยาลัย
                    <input type="text" class="underline" style="width:5%" disabled>
                  </td>
                  <td>
                    (<input type="text" class="underline" style="width:5%" disabled>)
                  </td>
                  <td>
                    วันที่<input type="text" class="underline" style="width:5%" disabled>
                    เดือน<input type="text" class="underline" style="width:5%" disabled>
                    พ.ศ.<input type="text" class="underline" style="width:5%" disabled>
                  </td>
                </tr>
              </table>

            </page>
          </div>
