<!DOCTYPE html>
<html>
<head>
    <title>Action Ajout</title>
</head>

<body>

<h1>Ca marche pas</h1>

<?php
include 'Connexion.php';

$_POST["Description"]= str_replace("'","''",$_POST["Description"]);

if($_POST["tel"]==1){$_POST["tel"]=1;}
else{$_POST["tel"]=0;}

$IdTrajet=$_POST["IdTrajet"];

//echo $_POST["Date-de-Depart"]."<- ici";
if($_POST["AllerRetour"]=="Aller"){
    $request="UPDATE trajet SET TypeTrajet='".$_POST["AllerRetour"]."', isDemande= '0', LieuDepart='".$_POST["Ville"]."',AdresseDepart='".$_POST["Adresse"]."',AdresseArrivee='21 Rue de Linselles',LieuArrivee='Wervicq-Sud' , Prix='".$_POST["Prix"]."',DateDepart= '".$_POST["Date-de-Depart"]."',HeureDepart='".$_POST["Heure-de-Depart"]."',NbPassagers='".$_POST["NbPass"]."', Description='".$_POST["Description"]."',DisplayTel='".$_POST["tel"]."' WHERE IdTrajet=".$IdTrajet."";
}
else{
    $request="UPDATE trajet SET TypeTrajet='".$_POST["AllerRetour"]."', isDemande= '0', LieuArrivee='".$_POST["Ville"]."',LieuDepart='Wervicq-Sud' , AdresseArrivee='".$_POST["Adresse"]."',AdresseDepart='21 Rue de Linselles',Prix='".$_POST["Prix"]."', DateDepart= '".$_POST["Date-de-Depart"]."',HeureDepart='".$_POST["Heure-de-Depart"]."',NbPassagers='".$_POST["NbPass"]."', Description='".$_POST["Description"]."',DisplayTel='".$_POST["tel"]."' WHERE IdTrajet=".$IdTrajet."";
}

if ($conn->query($request) === TRUE) {
  ?>
  <script type="text/javascript">
      alert("Ton trajet a bien ete modifie");
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