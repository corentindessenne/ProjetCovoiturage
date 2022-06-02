<!DOCTYPE html>
<html>
<head>
    <title>Action Ajout</title>
</head>

<body>

<h1>Ton trajet a bien ete mit en ligne</h1>
<?php
include 'Connexion.php';

$_POST["Description"]= str_replace("'","''",$_POST["Description"]);
if($_POST["tel"]==1){$_POST["tel"]=1;}
else{$_POST["tel"]=0;}
if($_POST["AllerRetour"]=="Aller"){
    $request="INSERT INTO trajet(TypeTrajet,isDemande,LieuDepart,AdresseDepart, DateDepart, HeureDepart, DateAjout, NbPassagers, Description, DisplayTel,  AnneeEdition, IdCompte, IdTrajet) VALUES ('".$_POST["AllerRetour"]."','1','".$_POST["Ville"]."','".$_POST["Date-de-Depart"]."','".$_POST["Heure-de-Depart"]."','".date("d.m.Y")."','".$_POST["NbPass"]."','".$_POST["Description"]."','".$_POST["tel"]."' ,'2022','0','0')";
}
else{
    $request="INSERT INTO trajet(TypeTrajet,isDemande,LieuArrivee,AdresseArrivee, DateDepart, HeureDepart, DateAjout, NbPassagers, Description, DisplayTel,  AnneeEdition, IdCompte, IdTrajet) VALUES ('".$_POST["AllerRetour"]."','1','".$_POST["Ville"]."','".$_POST["Adresse"]."','".$_POST["Date-de-Depart"]."','".$_POST["Heure-de-Depart"]."','".date("d.m.y")."','".$_POST["NbPass"]."','".$_POST["Description"]."','".$_POST["tel"]."' ,'2022','0','0')";
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