<?php
session_start();
setcookie('remember', NULL, -1);
unset($_SESSION['auth']);
$_SESSION['flash']['success'] = "Vous avez bien été déconnecté.";

header("Location: login.php");

