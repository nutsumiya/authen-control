<!-- <link rel="stylesheet" href="<?php echo resolveURIHeader("style/starter-template.css");?>"> -->

<?php
$user==null;
if(Session::exists('user'))
{
	$user = unserialize(Session::get('user'));
}
?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  </div>
      <a class="navbar-brand" href="<?php echo resolveURIHeader(""); ?>">&nbsp;สวัสดี &nbsp;<?php if($user!=null)echo $user->get('name'); ?></a>
  </div>
  <div class="collapse navbar-collapse pull-right">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo resolveURIHeader("logout");?>">ออกจากระบบ</a></li>
      </ul>
    </div>
</nav>