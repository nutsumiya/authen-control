<?php
require_once('core/init.php');
include(resolveHeader('includes/header.php'));
include(resolveHeader('includes/navbar.php'));

if( Session::exists('user') == null)
{
  Redirect::to('');
}

$error='';

if(Input::exists())
{
  $type = Input::post('type');
  $cardid = Input::post('user-cardid');
  $id = Input::post('id');
  if(!Card::is_had($cardid,$type,$id))
  {
    if($type=='g')
    {
      $name = Input::post('user-name');
      $status = Input::post('user-status');
      $enterDate = Input::post('user-enterDate');
      $enterTime = Input::post('user-enterTime');
      $exitDate = Input::post('user-exitDate');
      $exitTime = Input::post('user-exitTime');
      if($id=='')
      {
        DB::get_db()->insert('guests',array(
          "name","status","cardid","enterTime","exitTime"
        ),array(
          $name,$status,$cardid,$enterDate.' '.$enterTime,$exitDate.' '.$exitTime
        ));
      }else{
        DB::get_db()->update('guests',array(
          "name"=>$name,
          "status"=>$status,
          "cardid"=>$cardid,
          "enterTime"=>$enterDate.' '.$enterTime,
          "exitTime"=>$exitDate.' '.$exitTime
        ),"gid='$id'");
      } 
    }
    if($type=='a')
    {
      $name = Input::post('user-name');
      $status = Input::post('user-status');
      $cardid = Input::post('user-cardid');
      $enterTime = Input::post('user-enterTime');
      $exitTime = Input::post('user-exitTime');
      if($id=='')
      {
        DB::get_db()->insert('authoriseds',array(
          "name","status","cardid","enterTime","exitTime"
        ),array(
          $name,$status,$cardid,$enterTime,$exitTime
        ));
      }else{
        DB::get_db()->update('authoriseds',array(
          "name"=>$name,
          "status"=>$status,
          "cardid"=>$cardid,
          "enterTime"=>$enterTime,
          "exitTime"=>$exitTime
        ),"aid='$id'");
      } 
    }
    Redirect::to('show');
  }else{
    $error = "ไม่สามารถใช้หมายเลขบัตร ".$cardid." ได้ค่ะ ";
  }
  
}

$command=Input::get('command');
$type=Input::get('type');
$id=Input::get('id');

$name = '';
$cardid = '';
$status = '';
$enterTime = '';
$exitTime = '';
$enterDate ='';
$exitDate = '';
if($command=='edit')
{
  if($type=='g')
  {
    try
    {
      $person = Guest::get_guest_by_id($id);
      $name = $person->get('name');
      $cardid = $person->get('cardid');
      $status = $person->get('status');

      $enters = explode(' ',$person->get('enterTime'));
      $exits = explode(' ',$person->get('exitTime'));
      $enterDate = $enters[0];
      $enterTime = $enters[1];
      $exitDate = $exits[0];
      $exitTime = $exits[1];
    }catch(Exception $e)
    {
      Redirect::to('show');
    }
  }
  if($type=='a')
  {
    try
    {
      $person = Authorised::get_authorised_by_id($id);
      $name = $person->get('name');
      $cardid = $person->get('cardid');
      $status = $person->get('status');
      $enterTime = $person->get('enterTime');
      $exitTime = $person->get('exitTime');
    }catch(Exception $e)
    {
      Redirect::to('show');
    } 
  }
}

function selectedIfMatch($word,$status)
{
  if($word==$status)echo ' selected ';
}

?>
<div class='container'>
	<div class="data-box">

<div class='page-header'>
	<h1>
  <?php
    if($command=="new")echo "สร้าง";
    if($command=="edit")echo "แก้ไข";
    if($type=='g')echo "ผู้มาเยือน";
    if($type=='a')echo "ผู้ใช้";
  ?>
  </h1>
</div>		

<form class="form-horizontal" role="form" method="post" action="">
  <div class="form-group">
    <label for="user-name" class="col-sm-2 control-label">ชื่อ-นามสกุล</label>
    <div class="col-sm-5">
      <input name="user-name" type="text" class="form-control" id="user-name" placeholder="ชื่อ-นามสกุล" value="<?php echo $name; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="user-status" class="col-sm-2 control-label">สถานะ</label>
    <div class="col-sm-2">
    <select name="user-status" class="form-control" id="user-status">
			<option value="อนุญาต" <?php selectedIfMatch('อนุญาต',$status); ?> >อนุญาต</option>
			<option value="ไม่อนุญาต" <?php selectedIfMatch('ไม่อนุญาต',$status); ?> >ไม่อนุญาต</option>
			<option value="รอพิจารณา" <?php selectedIfMatch('รอพิจารณา',$status); ?> >รอพิจารณา</option>
		</select>
    </div>
  </div>
  <div class="form-group">
    <label for="user-cardid" class="col-sm-2 control-label">หมายเลขบัตร</label>
    <div class="col-sm-1">
      <input name="user-cardid" type="text" class="form-control" id="user-cardid" placeholder="XXXX" value="<?php echo $cardid; ?>">
    </div>
  </div>
  <?php if($type=='g'){ ?>
  <div class="form-group">
    <label for="user-enterdate" class="col-sm-2 control-label">วันและเวลาเริ่ม</label>
    <div class="col-sm-6">
   	  <input name="user-enterDate" type="date" id="user-enterdate" value='<?php echo $enterDate;?>'>&nbsp;<input name="user-enterTime" type="time" value='<?php echo $enterTime;?>'>
    </div>
  </div>
  <div class="form-group">
    <label for="user-exitdate" class="col-sm-2 control-label">วันและเวลาสิ้นสุด</label>
    <div class="col-sm-6">
      <input name="user-exitDate" type="date" id="user-exitdate" value='<?php echo $exitDate;?>'>&nbsp;<input name="user-exitTime" type="time" value='<?php echo $exitTime;?>'>
    </div>
  </div>
  <input type="hidden" name="type" value="g">

  <?php } if($type=='a'){ ?>
  <div class="form-group">
    <label for="user-startdate" class="col-sm-2 control-label" >เวลาเริ่ม</label>
    <div class="col-sm-6">
      <input name="user-enterTime" type="time" value='<?php echo $enterTime;?>'>
    </div>
  </div>
  <div class="form-group">
    <label for="user-enddate" class="col-sm-2 control-label">เวลาสิ้นสุด</label>
    <div class="col-sm-6">
      <input name="user-exitTime" type="time" value='<?php echo $exitTime;?>'>
    </div>
  </div>
  <input type="hidden" name="type" value="a">
  <?php } 

  if($command=='edit')
  {
    echo '<input type="hidden" name="id" value="'.$id.'">';
  }

  ?>


  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">บันทึก</button>
    </div>
  </div>
</form>
<h1 align="center" style="color:red"><?php echo $error; ?></h1>
	</div>
</div>
<?php
  include(resolveHeader('includes/footer.php'));
?>