<!DOCTYPE html>
<html>
<head>
    <title>Action Ajout</title>
</head>

<body>

<h1>Ca marche pas</h1>

<?php
include 'Connexion.php';            //connexion a la base de donnée

$_POST["Description"]= str_replace("'","''",$_POST["Description"]);       //on remplace les ' par des '' dans la description pour éviter de créer des erreurs sql

if (!isset($_POST["tel"])) {
  $tel=0;
}
else{                                           //On ajuste la valeur du tel en fonction de si la checkbox a été cochée ou non
  $tel = 1;
}

$IdTrajet=$_POST["IdTrajet"];                   //On met l'id du trajet dans une variable


if($_POST["AllerRetour"]=="Aller"){
    $request="UPDATE trajet SET TypeTrajet='".$_POST["AllerRetour"]."', isDemande= '1',"./*$newPlacesRestantes.*/" LieuDepart='".$_POST["Ville"]."',LieuArrivee='Wervicq-Sud',AdresseDepart='".$_POST["Adresse"]."',AdresseArrivee='21 Rue de Linselles' ,DateDepart= '".$_POST["Date-de-Depart"]."',HeureDepart='".$_POST["Heure-de-Depart"]."', Description='".$_POST["Description"]."',DisplayTel='".$_POST["tel"]."' WHERE IdTrajet=".$IdTrajet."";
}         //requete sql différente en fonction de s'il s'agit d'un aller ou une retour
else{
    $request="UPDATE trajet SET TypeTrajet='".$_POST["AllerRetour"]."', isDemande= '1',"./*$newPlacesRestantes.*/" LieuArrivee='".$_POST["Ville"]."',LieuDepart='Wervicq-Sud',AdresseArrivee='".$_POST["Adresse"]."',AdresseDepart='21 Rue de Linselles', DateDepart= '".$_POST["Date-de-Depart"]."',HeureDepart='".$_POST["Heure-de-Depart"]."', Description='".$_POST["Description"]."',DisplayTel='".$_POST["tel"]."' WHERE IdTrajet=".$IdTrajet."";
}



if ($conn->query($request) === TRUE) {
  ?>
  <script type="text/javascript">
      alert("Ta demande de trajet a bien ete modifie");         //Si la requete a fonctionné on redirige vers la page de profil
      location="Profil.php";
  </script>
<?php
die();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;              //Sinon on affiche l'erreur
  }
?>
</body>
</html>