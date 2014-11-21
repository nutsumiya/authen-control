<?php
require_once('core/init.php');
include(resolveHeader('includes/header.php'));
include(resolveHeader('includes/navbar.php'));
?>
<div class='container'>
	<div class="data-box">

<div class='page-header'>
	<h1>สร้างผู้ใช้</h1>
</div>		

<form class="form-horizontal" role="form">
  <div class="form-group">
    <label for="user-name" class="col-sm-2 control-label">ชื่อ-นามสกุล</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="user-name" placeholder="ชื่อ-นามสกุล">
    </div>
  </div>
  <div class="form-group">
    <label for="user-status" class="col-sm-2 control-label">สถานะ</label>
    <div class="col-sm-2">
    	<select class="form-control" id="user-status">
			<option>อนุญาต</option>
			<option>ไม่อนุญาต</option>
			<option>รอพิจารณา</option>
		</select>
    </div>
  </div>
  <div class="form-group">
    <label for="user-cardno" class="col-sm-2 control-label">หมายเลขบัตร</label>
    <div class="col-sm-1">
      <input type="text" class="form-control" id="user-cardno" placeholder="XXXX">
    </div>
  </div>
  <div class="form-group">
    <label for="user-startdate" class="col-sm-2 control-label">วันและเวลาเริ่ม</label>
    <div class="col-sm-6">
   	  <input type="date" id="user-startdate">&nbsp;<input type="time">
    </div>
  </div>
  <div class="form-group">
    <label for="user-enddate" class="col-sm-2 control-label">วันและเวลาสิ้นสุด</label>
    <div class="col-sm-6">
      <input type="date" id="user-enddate">&nbsp;<input type="time">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">บันทึก</button>
    </div>
  </div>
</form>

	</div>
</div>
<?php
  include(resolveHeader('includes/footer.php'));
?>