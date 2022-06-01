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
/*$sql = "SELECT IdCompte FROM compte";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $idCompte=$row["IdCompte"];
    echo $idCompte;
  }
} else {
  $idCompte=0;
}*/
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

</body>
</html>