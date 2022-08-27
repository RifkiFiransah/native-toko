<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('uniq', '', time() - 3600);
setcookie('keyValue', '', time() - 3600);

header("location: login.php");
exit;
