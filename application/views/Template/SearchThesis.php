<div class="main-content"><div class="row">    <?php //print_r($Result['facultyLists']); ?>    <div class="col-md-3"></div>    <div class="col-md-6">      <div class="widget">        <div class="widget-header">          <h3><i class="fa fa-edit"></i>ค้นหานักศึกษา</h3>        </div>        <div class="widget-content">          <?php echo form_open('student/search_thesis','class="form-horizontal label-left" role="form"'); ?>            <div class="form-group">              <label for="thesiscode" class="col-sm-5 control-label">รหัสวิทยานิพนธ์</label>              <div class="col-sm-7">                <input name="thesiscode" class="form-control col-sm-10" id="" type="text">              </div>            </div>            <div class="form-group">              <label for="thesisname" class="col-sm-5 control-label">ชื่อวิทยานิพนธ์</label>              <div class="col-sm-7">                <input id="thesisname" name="thesisname" class="form-control" type="text">              </div>            </div>            <div class="form-group">              <label for="tax-id" class="col-sm-5 control-label">คณะ</label>              <div class="col-sm-7">                <select class="select2-input" name="stdfacultyid">                  <option value=""> -- เลือกหรือพิมพ์ค้นหา --</option>                  <?php foreach ($Result['facultyLists'] as $key => $value) { ?>                    <option value="<?=$value['FACULTYID'];?>">-<?=$value['FACULTYNAME'];?></option>                  <?php } ?>                </select>              </div>            </div>            <div class="form-group">              <label for="tax-id" class="col-sm-5 control-label">ภาควิชา</label>              <div class="col-sm-7">                <select class="select2-input" name="stddepartmentid">                  <option value=""> -- เลือกหรือพิมพ์ค้นหา --</option>                  <?php foreach ($Result['departmentLists'] as $key => $value) { ?>                    <option value="<?=$value['DEPARTMENTID'];?>">-<?=$value['DEPARTMENTNAME'];?></option>                  <?php } ?>                </select>              </div>            </div>            <div class="form-group">              <label for="ssn" class="col-sm-5 control-label">ระดับการศึกษา</label>              <div class="col-sm-7">                <select class="select2-input" name="levelid">                  <option value=""> -- เลือกหรือพิมพ์ค้นหา --</option>                  <?php foreach ($Result['level'] as $key => $value) { ?>                    <option value="<?=$value['LEVELID'];?>">-<?=$value['LEVELNAME'];?></option>                  <?php } ?>                </select>              </div>            </div>            <div class="form-group">              <label for="ssn" class="col-sm-9 control-label"></label>              <div class="col-sm-3">                <input type="submit" class="btn btn-primary form-control" name="submitBtn" value="ค้นหา"/>              </div>            </div>          <?php echo form_close(); ?>        </div>      </div>    </div>    <div class="col-md-3"></div>  </div><?php echo form_open('student/search_thesis'); ?><div class="row" style="display: none">  <div class="col-md-11">    <div class="row">      <div class="form-group has-success col-md-2" >        <label class="control-label" for="inputSuccess2">รหัสวิทยานิพนธ์</label>        <input name="thesiscode" class="form-control col-sm-10" id="" type="text">      </div>      <div class="form-group has-success col-md-2">        <label class="control-label" for="inputSuccess2">ชื่อวิทยานิพนธ์</label>        <input name="thesisname" class="form-control col-sm-10" id="" type="text">      </div>      <div class="form-group has-success col-md-2">        <label class="control-label" for="inputSuccess2">รหัสนักศึกษา</label>        <input name="thesisname" class="form-control col-sm-10" id="" type="text">      </div>      <div class="form-group has-success col-md-3">        <label class="control-label" for="inputSuccess2">คณะ</label>        <select class="select2-input" name="thesisfacultyid">          <option value=""> -- เลือกหรือพิมพ์ค้นหา --</option>          <?php foreach ($facultyLists as $key => $value) { ?>            <option value="<?=$value['FACULTYID'];?>"><?=$value['FACULTYNAME'];?></option>          <?php } ?>        </select>      </div>      <div class="form-group has-success col-md-3">        <label class="control-label" for="inputSuccess2">ภาควิชา</label>        <select class="select2-input" name="thesisdepartmentid">          <option value=""> -- เลือกหรือพิมพ์ค้นหา --</option>          <?php foreach ($departmentLists as $key => $value) { ?>            <option value="<?=$value['DEPARTMENTID'];?>"><?=$value['DEPARTMENTNAME'];?></option>          <?php } ?>        </select>      </div>      <div class="form-group has-success col-md-2">        <label class="control-label" for="inputSuccess2">ระดับการศึกษา</label>          <select class="select2-input" name="levelid">            <option value=""> -- เลือกหรือพิมพ์ค้นหา --</option>            <?php foreach ($level as $key => $value) { ?>              <option value="<?=$value['LEVELID'];?>"><?=$value['LEVELNAME'];?></option>            <?php } ?>          </select>      </div>    </div><!-- row -->  </div><!-- col-md-11 -->  <div class="col-md-1">    <div class="form-group has-success col-md-12" >      <label class="control-label" for="inputSuccess2">&nbsp;</label>      <!-- <input type="submit" class="btn btn-primary form-control" name="submitBtn" value="ค้นหา"> -->      <button type="submit" class="btn btn-primary form-control" name="submitBtn" value="ค้นหา">        <i class="fa fa-search" aria-hidden="true"></i>      </button>    </div>  </div></div><!-- outer row --><?php echo form_close(); ?><hr>  <div class="row">    <div class="col-md-12">      <div class="widget-content">        <table id="LoadThesisAll" class="table table-bordered table-responsive table-sorting table-striped table-hover datatable dataTable no-footer" role="grid" aria-describedby="datatable-column-filter_info">          <thead>            <tr role="row">              <th>รหัสวิทยานิพนธ์</th>              <th>ชื่อวิทยานิพนธ์</th>              <th>นักศึกษา</th>              <th>คณะ</th>              <th>สาขา/แผนการศึกษา</th>              <th>ระดับการศึกษา</th>            <!--   <th>ปีการศึกษา</th> -->              <th>ประเภท</th>            </tr>          </thead>          <tbody>            <?php //print_r($Result);?>            <?php foreach ($Result as $Result): ?>            <tr role="row" class="odd">              <td><?php echo $Result['THESISCODE']; ?></td>              <td style="width: 15%;"><?php echo $Result['THESISNAME']; ?></td>              <td><p><span><?php echo $Result['STUDENTNAME']; ?></span> <span><?php echo $Result['STUDENTSURNAME']; ?></span></p>                <p><span><?php echo $Result['STUDENTNAMEENG']; ?></span> <span><?php echo $Result['STUDENTSURNAMEENG']; ?></span></p></td>              <td><?php echo $Result['FACULTYNAME']; ?></td>              <td style="width: 15%;"><?php echo $Result['DEPARTMENTNAME']; ?></td>              <td><?php echo $Result['LEVELNAME']; ?></td>              <!-- <td><?php //echo $Result['CURRENTACADYEAR']; ?></td> -->              <td><?php if($Result['THESISTYPE']=="T"){										echo "<span class='label label-success' style='font-size: 12px;'>วิทยานิพนธ์</span>";									}else if($Result['THESISTYPE']=="I"){										echo "<span class='label label-info' style='font-size: 12px;'>ค้นคว้าอิศระ</span>";									}else {										echo "<span class='label label-danger' style='font-size: 12px;'>ไม่มีข้อมูล</span>";									}?></td>            </tr>            <?php endforeach; ?>          </tbody>        </table>      </div>    </div>  </div></div>