<?php
include 'Connexion.php';
session_destroy();
header('Location : home.php');
?>