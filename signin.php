<?php
require_once('core/init.php');
include(resolveHeader('includes/header.php'));
?>
<link rel="stylesheet" href="<?php echo resolveURIHeader("style/signin.css");?>">

<div class="container">
  <form class="form-signin" role="form">
    <h2 class="form-signin-heading">เข้าสู่ระบบ</h2>
    <label for="inputEmail" class="sr-only">Username</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-warning btn-block" type="submit">Sign in</button>
  </form>
</div>


<?php
 	include(resolveHeader('includes/footer.php'));
?>