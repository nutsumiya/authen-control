<?php
require_once('core/init.php');
include(resolveHeader('includes/header.php'));

if( Session::exists('user') != null)
{
  Redirect::to('show');
}

$error_msgs = array();
if(Input::exists())
{
  try
  {
    $user = User::auth( Input::post('username') , Input::post('password') );
    Redirect::to('show');
  }
  catch(Exception $e)
  {
    array_push($error_msgs,$e->getMessage());
  }
}

?>
<link rel="stylesheet" href="<?php echo resolveURIHeader("style/signin.css");?>">

<div class="container">
  <form class="form-signin" role="form" method="post" action="">
    <h2 class="form-signin-heading">เข้าสู่ระบบ</h2>
    <label for="inputUsername" class="sr-only">Username</label>
    <input name="username" type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <span style="color:red"><?php if(count($error_msgs) != 0)print($error_msgs[0]); ?></span>
    <button class="btn btn-lg btn-warning btn-block" type="submit">Sign in</button>
  </form>
</div>


<?php
 	include(resolveHeader('includes/footer.php'));
?>