<?php
require_once('core/init.php');
include(resolveHeader('includes/header.php'));
include(resolveHeader('includes/navbar.php'));
?>
<div class='container'>
	<div class="data-box">

<div class='page-header'>
	<h1>รายการผู้มาเยือน&nbsp;<button class='btn btn-primary btn-xs'>เพิ่ม</button></h1>
</div>		

<table class='table table-hover'>
	<tr class='warning'>
		<th>ชื่อ</th>
		<th>สถานะ</th>
		<th>หมายเลขบัตร</th>
		<th>วันและเวลาเริ่ม</th>
		<th>วันและเวลาสิ้นสุด</th>
		<th>แก้ไข</th>
		<th>ลบ</th>
	</tr>
	<tr>
		<td>นาย จิรเดช สิริจันทรดิลก</td>
		<td>อนุญาต</td>
		<td>0001</td>
		<td>1 ธันวาคม 2557 , 8:30</td>
		<td>1 ธันวาคม 2557 , 16:30</td>
		<td><button class='btn btn-warning btn-xs' >แก้ไข</button></td>
		<td><button class='btn btn-danger btn-xs' >ลบ</button></td>
	</tr>
	<tr>
		<td>นาย ณรงค์ เสรีพุกกะณะ</td>
		<td>อนุญาต</td>
		<td>0002</td>
		<td>1 ธันวาคม 2557 , 8:30</td>
		<td>1 ธันวาคม 2557 , 16:30</td>
		<td><button class='btn btn-warning btn-xs' >แก้ไข</button></td>
		<td><button class='btn btn-danger btn-xs' >ลบ</button></td>
	</tr>
	<tr>
		<td>นาย ณัช เรือนเพ็ชร์</td>
		<td>อนุญาต</td>
		<td>0003</td>
		<td>1 ธันวาคม 2557 , 8:30</td>
		<td>1 ธันวาคม 2557 , 16:30</td>
		<td><button class='btn btn-warning btn-xs' >แก้ไข</button></td>
		<td><button class='btn btn-danger btn-xs' >ลบ</button></td>
	</tr>
</table>


<div class='page-header'>
	<h1>รายการผู้ใช้&nbsp;<button class='btn btn-primary btn-xs'>เพิ่ม</button></h1>
</div>		

<table class='table table-hover'>
	<tr class='warning'>
		<th>ชื่อ</th>
		<th>สถานะ</th>
		<th>หมายเลขบัตร</th>
		<th>เวลาเริ่ม</th>
		<th>เวลาสิ้นสุด</th>
		<th>แก้ไข</th>
		<th>ลบ</th>
	</tr>
	<tr>
		<td>นาย ณัฐพัฒน์ มาลีหวล</td>
		<td>อนุญาต</td>
		<td>1001</td>
		<td>8:30</td>
		<td>22:30</td>
		<td><button class='btn btn-warning btn-xs' >แก้ไข</button></td>
		<td><button class='btn btn-danger btn-xs' >ลบ</button></td>
	</tr>
	<tr>
		<td>นาย ปัณณวิช สุนทร</td>
		<td>อนุญาต</td>
		<td>1002</td>
		<td>8:30</td>
		<td>22:30</td>
		<td><button class='btn btn-warning btn-xs' >แก้ไข</button></td>
		<td><button class='btn btn-danger btn-xs' >ลบ</button></td>
	</tr>
	<tr>
		<td>นาย ภควัต กิจสุวรรณไพศาล</td>
		<td>อนุญาต</td>
		<td>1003</td>
		<td>8:30</td>
		<td>22:30</td>
		<td><button class='btn btn-warning btn-xs' >แก้ไข</button></td>
		<td><button class='btn btn-danger btn-xs' >ลบ</button></td>
	</tr>
</table>


	</div>
</div>
<?php
  include(resolveHeader('includes/footer.php'));
?>