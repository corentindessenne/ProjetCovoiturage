<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db = "lbrcovoiturage";

ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);     //connexion a la base de donnée

// Check connection
if (!$conn) {
    echo "Erreur de connexion".mysqli_connect_errno();
    die();
}

session_start();                                                  //on lance les sessions
