<?php
require_once("../../init.php");

unset($_SESSION['logged']);
unset($_SESSION['login_name']);
unset($_SESSION['login_type']);

header("location:/master/login");
?>