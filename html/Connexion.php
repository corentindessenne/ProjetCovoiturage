<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db="lbrcovoiturage";
ini_set('display_errors',1);
error_reporting(E_ALL|E_STRICT);
// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
/*echo "test1";
$ftp_server="ftp.cpz16748.odns.fr";
$ftp_user_name="drivelbr@test-mail.lesbriquesrouges.fr";
$ftp_user_pass="ProjetsDriveLBR2022";
echo "test2";
$ftp = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server");
//var_dump($ftp);
echo "test3";
$login_result = ftp_login($ftp, $ftp_user_name, $ftp_user_pass);
echo "test4";
if ((!$ftp) || (!$login_result)) {
  echo "La connexion FTP a échoué !";
  echo "Tentative de connexion au serveur $ftp_server pour l'utilisateur $ftp_user_name";
  //exit;
}
else{
  echo "ff";
}*/
session_start();
