<?php
require_once('core/init.php');
include(resolveHeader('includes/header.php'));
?>
<div align="center">
	<img style="padding:20px" src="<?php echo resolveURIHeader("image/rfid_tag.png");?>" height="350" width="350">
</div>
<div align="center">
	<h1>กรุณาแตะบัตร</h1>
</div>
<div class="row">
	
	<div class="col-sm-1 col-sm-offset-5">
		<input type="text" class="form-control" id="user-cardno" placeholder="XXXX">
	</div>
	<div class="col-sm-2">
		<button class='btn btn-primary btn-s'>แตะ</button>
	</div>
	
</div>
<?php
 	include(resolveHeader('includes/footer.php'));
?>