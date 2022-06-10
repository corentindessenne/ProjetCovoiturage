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
if($_POST["tel"]==1){$_POST["tel"]=1;}
else{$_POST["tel"]=0;}
if($_POST["aller-retour"]=="Aller"){
    $request="INSERT INTO trajet(TypeTrajet,isDemande,LieuDepart,AdresseDepart, DateDepart, HeureDepart, DateAjout, NbPassagers, PlacesRestantes,  Prix, Description, DisplayTel,  AnneeEdition, IdCompte) VALUES ('".$_POST["aller-retour"]."','0','".$_POST["departure"]."','".$_POST["adresse"]."','".$_POST["date"]."','".$_POST["time"]."','".date("Y.m.d")."','".$_POST["nbPass"]."','".$_POST["nbPass"]."','".$_POST["Prix"]."','".$_POST["Description"]."','".$_POST["tel"]."' ,'2022','".$id."')";
}
else{
    $request="INSERT INTO trajet(TypeTrajet,isDemande,LieuArrivee,AdresseArrivee, DateDepart, HeureDepart, DateAjout, NbPassagers, PlacesRestantes, Prix, Description, DisplayTel,  AnneeEdition, IdCompte) VALUES ('".$_POST["aller-retour"]."','0','".$_POST["departure"]."','".$_POST["adresse"]."','".$_POST["date"]."','".$_POST["time"]."','".date("Y.m.d")."','".$_POST["nbPass"]."','".$_POST["nbPass"]."','".$_POST["nbPass"]."','".$_POST["Prix"]."','".$_POST["Description"]."','".$_POST["tel"]."' ,'2022','".$id."')";
}
if ($conn->query($request) === TRUE) {
  ?>
  <script type="text/javascript">
      alert("Ton trajet a bien ete enregistre");
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