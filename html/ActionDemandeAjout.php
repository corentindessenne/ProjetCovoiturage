<!DOCTYPE html>
<html>
<head>
    <title>Action Ajout</title>
</head>

<body>

<h1>Ton trajet a bien ete mit en ligne</h1>
<?php
include 'Connexion.php';

$mail=$_SESSION["mail"];
$sql = "SELECT IdCompte FROM compte WHERE Email='".$mail."'" ;
$result = $conn->query($sql);
if ($result->num_rows >  0) {
    // output data of each row
    $row = $result->fetch_assoc();
    $id=$row["IdCompte"];
      
}


$_POST["Description"]= str_replace("'","''",$_POST["Description"]);
/*if($_POST["tel"]=="on"){$_POST["tel"]=1;}
else{$_POST["tel"]=0;}*/


if (!isset($_POST["tel"])) {
    $tel=0;
}
else{
    $tel = 1;
}
echo "Salut c'est tel". $tel;
if($_POST["aller-retour"]=="Aller"){
    $request="INSERT INTO trajet(TypeTrajet,isDemande,LieuDepart,AdresseDepart, DateDepart, HeureDepart, DateAjout, NbPassagers, PlacesRestantes, Prix, Description,  DisplayTel,  AnneeEdition, IdCompte) VALUES ('".$_POST["aller-retour"]."',".$_POST["isDemande"].",'".$_POST["departure"]."','".$_POST["adresse"]."','".$_POST["date"]."','".$_POST["time"]."','".date("Y.m.d")."','".$_POST["NbPassagers"]."','".$_POST["NbPassagers"]."','".$_POST["Prix"]."','".$_POST["Description"]."','".$tel."' ,'2022','".$id."')";
}
else{
    $request="INSERT INTO trajet(TypeTrajet,isDemande,LieuArrivee,AdresseArrivee, DateDepart, HeureDepart, DateAjout,NbPassagers, PlacesRestantes, Prix, Description, DisplayTel,  AnneeEdition, IdCompte) VALUES ('".$_POST["aller-retour"]."',".$_POST["isDemande"].",'".$_POST["departure"]."','".$_POST["adresse"]."','".$_POST["date"]."','".$_POST["time"]."','".date("Y.m.d")."','".$_POST["NbPassagers"]."','".$_POST["NbPassagers"]."','".$_POST["Prix"]."','".$_POST["Description"]."','".$tel."' ,'2022','".$id."')";
}
if ($conn->query($request) === TRUE) {
  ?>
  <!--<script type="text/javascript">
      alert("Ta demande de trajet a bien ete enregistre");
      location="home.php";
  </script>-->
<?php
die();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    
  }
?>
</body>
</html>