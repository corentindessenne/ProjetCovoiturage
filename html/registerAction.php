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
// Pour envoyer un mail HTML, l'en-tête Content-type doit être defini
$password=$_POST["password_1"];
$password=password_hash($password,PASSWORD_DEFAULT);
$tel=$_POST['phone'];
$request="INSERT INTO compte(/*IdCompte,*/Nom,Prenom, Email, telephone, motDePasse, isAdmin, Description, DateCreation) VALUES (/*'".$idCompte."',*/'".$_POST["nom"]."','".$_POST["prenom"]."','".$_POST["email"]."','".$tel."','".$password."','0','".$_POST["Description"]."','".date("d.m.y")."')";

if ($conn->query($request) === TRUE) {
  mail($to, $subject, $message);
  //ftp_close($ftp);
  ?>
  <script type="text/javascript">
      alert("Ton Compte a bien ete cree");
      location="home.php";
  </script>
<?php
die();
  } else {
    
    echo "Error: " . $sql . "<br>" . $conn->error;
    ?>
      <script type="text/javascript">
          alert("Cette adresse mail est dejà utilisee");
          location="register.php";
      </script>
    <?php

  }
  

?>

</body>
</html>