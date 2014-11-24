<?php
require_once('core/init.php');
include(resolveHeader('includes/header.php'));
include(resolveHeader('includes/navbar.php'));

if( Session::exists('user') == null)
{
  Redirect::to('');
}

$guests = Guest::get_guests();
$authoriseds = Authorised::get_authoriseds();
$user = unserialize(Session::get('user'));
?>
<div class='container'>
	<div class="data-box">

<div class='page-header'>
	<h1>รายการผู้มาเยือน&nbsp;<button class='btn btn-primary btn-xs' onClick='location.href="<?php echo resolveURIHeader('new').'/g/';?>"' >เพิ่ม</button></h1>
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

	<?php
	
	for($i=0;$i<count($guests);$i++)
	{
		$guest = $guests[$i];
		echo "<tr>\n";
		echo "<td>".($guest->get('name'))."</td>\n";
		echo "<td>".($guest->get('status'))."</td>\n";
		echo "<td>".($guest->get('cardid'))."</td>\n";
		echo "<td>".($guest->get('enterTime'))."</td>\n";
		echo "<td>".($guest->get('exitTime'))."</td>\n";
		echo "<td><button class='btn btn-warning btn-xs' onClick='location.href=".'"'.resolveURIHeader('edit').'/g/'.$guest->get('gid').'"'."' >แก้ไข</button></td>\n";
		echo "<td><button class='btn btn-danger btn-xs'  onClick='location.href=".'"'.resolveURIHeader('delete').'/g/'.$guest->get('gid').'"'."' >ลบ</button></td>\n";
		echo "</tr>\n";
	}

	?>
</table>

<?php

if($user->get('isAdmin'))
{


?>

<div class='page-header'>
	<h1>รายการผู้ใช้&nbsp;<button class='btn btn-primary btn-xs' onClick='location.href="<?php echo resolveURIHeader('new').'/a/';?>"'>เพิ่ม</button></h1>
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
	
	<?php

	for($i=0;$i<count($authoriseds);$i++)
	{
		$authorised = $authoriseds[$i];
		echo "<tr>\n";
		echo "<td>".($authorised->get('name'))."</td>\n";
		echo "<td>".($authorised->get('status'))."</td>\n";
		echo "<td>".($authorised->get('cardid'))."</td>\n";
		echo "<td>".($authorised->get('enterTime'))."</td>\n";
		echo "<td>".($authorised->get('exitTime'))."</td>\n";
		echo "<td><button class='btn btn-warning btn-xs' onClick='location.href=".'"'.resolveURIHeader('edit').'/a/'.$authorised->get('aid').'"'."' >แก้ไข</button></td>\n";
		echo "<td><button class='btn btn-danger btn-xs' onClick='location.href=".'"'.resolveURIHeader('delete').'/a/'.$authorised->get('aid').'"'."' >ลบ</button></td>\n";
		echo "</tr>\n";
	}
	
	?>
</table>

<?php
}
?>

	</div>
</div>
<?php
  include(resolveHeader('includes/footer.php'));
?>