<?php
session_start();

$_SESSION['logout'] = 1;
header('Location: home.php');
exit;
