<?php
session_start();
session_unset();
session_destroy();
$backpage=$_SERVER['HTTP_REFERER'];
header('location:'.$backpage);
?>