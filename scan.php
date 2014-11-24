<?php
require_once('core/init.php');
include(resolveHeader('includes/header.php'));

$cardid= Input::get('cardid');

$name="";
$has_permission=false;

if($cardid!='')
{
	try
	{
		$guest = Guest::get_guest_by_cardid($cardid);
		$name = $guest->get('name');
		$has_permission = $guest->has_permission();
	}catch(Exception $e)
	{
		try
		{
			$authorised = Authorised::get_authorised_by_cardid($cardid);
			$name = $authorised->get('name');
			$has_permission = $authorised->has_permission();
		}catch(Exception $e)
		{

		}
	}

}

?>

<script>
$(document).ready(function(){
	$('#user-submit').click(function(){
	 	window.location = "<?php echo resolveURIHeader('scan')?>/"+$('#user-cardid').val();
	});
});
</script>

<div align="center">
	<img style="padding:20px" src="<?php echo resolveURIHeader("image/rfid_tag.png");?>" height="350" width="350">
</div>
<div align="center">
	<h1>กรุณาแตะบัตร</h1>
</div>
<div class="row">

		<div class="col-sm-1 col-sm-offset-5">
			<input name='cardid' type="text" class="form-control" id="user-cardid" placeholder="XXXX" value="<?php echo Input::get('cardid'); ?>">
		</div>
		<div class="col-sm-2">
			<button id="user-submit" class='btn btn-primary btn-s'>แตะ</button>
		</div>

</div>
<div align="center"><h3>
<?php
	if($cardid!="")
	{
		if($name=="")
		{
			echo "ไม่มีบัตร ".$cardid." ในระบบ";
		}else{
			echo "สวัสดีคุณ ".$name;
		}
	}
?>
</h2></div>
<div align="center"><h3>
<?php
	if($cardid!=""&&$name!="")
	{
		if($has_permission)
		{
			echo "เชิญเข้าค่ะ";
		}else{
			echo "ห้ามเข้าค่ะ";
		}
	}
?>
</h2></div>
<?php
 	include(resolveHeader('includes/footer.php'));
?>