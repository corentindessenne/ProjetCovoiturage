<!DOCTYPE html>
<html>
<head>
    <title>Action Ajout</title>
</head>

<body>

<h1>Ton trajet a bien été mit en ligne</h1>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db="briquesrouges";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$_POST["Description"]= str_replace("'","''",$_POST["Description"]);
if($_POST["tel"]==1){$_POST["tel"]=1;}
else{$_POST["tel"]=0;}
if($_POST["AllerRetour"]=="Aller"){
    $request="INSERT INTO trajet(TypeTrajet,isDemande,LieuDépart, DateDépart, HeureDépart, DateAjout, NbPassagers, Prix, Description, DisplayTel,  AnnéeEdition, IdCompte, IdTrajet) VALUES ('".$_POST["AllerRetour"]."','0','".$_POST["Ville"]."','".$_POST["Date-de-Depart"]."','".$_POST["Heure-de-Depart"]."','".date("d.m.y")."','".$_POST["NbPass"]."','".$_POST["Prix"]."','".$_POST["Description"]."','".$_POST["tel"]."' ,'2022','0','0')";
}
else{
    $request="INSERT INTO trajet(TypeTrajet,isDemande,LieuArrivée, DateDépart, HeureDépart, DateAjout, NbPassagers, Prix, Description, DisplayTel,  AnnéeEdition, IdCompte, IdTrajet) VALUES ('".$_POST["AllerRetour"]."','0','".$_POST["Ville"]."','".$_POST["Date-de-Depart"]."','".$_POST["Heure-de-Depart"]."','".date("d.m.y")."','".$_POST["NbPass"]."','".$_POST["Prix"]."','".$_POST["Description"]."','".$_POST["tel"]."' ,'2022','0','0')";
}
if ($conn->query($request) === TRUE) {
    echo "New record created successfully";
    header("Location: http://localhost/ProjetCovoiturage/html/home.php");
die();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>
</body>
</html>