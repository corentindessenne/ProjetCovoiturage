<!DOCTYPE html>
<html>
<head>
    <title>Action Ajout</title>
</head>

<body>
<h1>Test mail</h1>
<?php

include 'Connexion.php';
$to= $_POST["email"];
$subject="test";
$message = "test";
// Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
$password=$_POST["password_1"];
$password=password_hash($password,PASSWORD_DEFAULT);
$tel=$_POST['phone'];
if(!$tel){$tel=1111111111;}
$request="INSERT INTO compte(/*IdCompte,*/Nom,Prénom, Email, téléphone, motDePasse, isAdmin, Description, DateCréation) VALUES (/*'".$idCompte."',*/'".$_POST["nom"]."','".$_POST["prenom"]."','".$_POST["email"]."','".$tel."','".$password."','0','".$_POST["Description"]."','".date("d.m.y")."')";










if (mail($to, $subject, $message)!=FALSE || $conn->query($request) === TRUE) {
  ?>
  <script type="text/javascript">
      alert("Ton Compte a bien été créé");
      location="home.php";
  </script>
<?php
die();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  ?>
  <script type="text/javascript">
      alert("Cette adresse mail est déjà utilisée");
      location="register.php";
  </script>
<?php


?>

</body>
</html>