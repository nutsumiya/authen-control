<?php

session_start();
ob_start();

require_once(str_replace('\\','/',__dir__).'/../functions/utils.php');
require_once(resolveHeader('classes/Config.php'));
require_once(resolveHeader('classes/DB.php'));
require_once(resolveHeader('classes/Session.php'));
require_once(resolveHeader('classes/User.php'));
require_once(resolveHeader('classes/Redirect.php'));
require_once(resolveHeader('classes/Input.php'));
?>