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

if($_POST["AllerRetour"]=="Aller"){
    $request="INSERT INTO trajet(TypeTrajet,isDemande,LieuDepart,AdresseDepart, DateDepart, HeureDepart, DateAjout, NbPassagers, Description, DisplayTel,  AnneeEdition, IdCompte) VALUES ('".$_POST["AllerRetour"]."','1','".$_POST["Ville"]."','".$_POST["Date-de-Depart"]."','".$_POST["Heure-de-Depart"]."','".date("Y.m.d")."','".$_POST["NbPass"]."','".$_POST["Description"]."','".$_POST["tel"]."' ,'2022','".$id."')";
}
else{
    $request="INSERT INTO trajet(TypeTrajet,isDemande,LieuArrivee,AdresseArrivee, DateDepart, HeureDepart, DateAjout, NbPassagers, Description, DisplayTel,  AnneeEdition, IdCompte) VALUES ('".$_POST["AllerRetour"]."','1','".$_POST["Ville"]."','".$_POST["Adresse"]."','".$_POST["Date-de-Depart"]."','".$_POST["Heure-de-Depart"]."','".date("Y.m.d")."','".$_POST["NbPass"]."','".$_POST["Description"]."','".$_POST["tel"]."' ,'2022','".$id."')";
}
if ($conn->query($request) === TRUE) {
  ?>
  <script type="text/javascript">
      alert("Ta demande de trajet a bien ete enregistre");
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