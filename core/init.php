<?php

session_start();
ob_start();

require_once(str_replace('\\','/',__dir__).'/../functions/utils.php');
require_once(resolveHeader('classes/Config.php'));

?>