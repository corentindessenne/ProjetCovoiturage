<!DOCTYPE html>
<html>
<head>
    <title>Action Ajout</title>
</head>

<body>

<h1>Ca marche pas</h1>

<?php
include 'Connexion.php';

$_POST["Description"]= str_replace("'","''",$_POST["Description"]);             //on remplace les ' par des '' dans la description pour éviter de créer des erreurs sql

if (!isset($_POST["tel"])) {
  $tel=0;
}
else{                                           //On ajuste la valeur du tel en fonction de si la checkbox a été cochée ou non
  $tel = 1;
}



/*$sql = "SELECT PlacesRestantes, NbPassagers FROM trajet WHERE IdTrajet='".$IdTrajet."'" ;
$result = $conn->query($sql);
if ($result->num_rows >  0) {
    // output data of each row
    $row = $result->fetch_assoc();
      $nbPlaces=$row["PlacesRestantes"];
      $nbPassagers=$row["NbPassagers"];
      
}

$newPlacesRestantes="PlacesRestantes='".$nbPlaces+($_POST["NbPass"]-$nbPassagers)."',";
*/

$IdTrajet=$_POST["IdTrajet"];       //On met l'id du trajet dans une variable

//echo $_POST["Date-de-Depart"]."<- ici";
if($_POST["AllerRetour"]=="Aller"){
    $request="UPDATE trajet SET TypeTrajet='".$_POST["AllerRetour"]."', isDemande= '0',"./*$newPlacesRestantes.*/" LieuDepart='".$_POST["Ville"]."',AdresseDepart='".$_POST["Adresse"]."',AdresseArrivee='21 Rue de Linselles',LieuArrivee='Wervicq-Sud' , Prix='".$_POST["Prix"]."',DateDepart= '".$_POST["Date-de-Depart"]."',HeureDepart='".$_POST["Heure-de-Depart"]."',NbPassagers='".$_POST["NbPass"]."', Description='".$_POST["Description"]."',DisplayTel='".$_POST["tel"]."' WHERE IdTrajet=".$IdTrajet."";
}     //requete sql différente en fonction de s'il s'agit d'un aller ou une retour
else{
    $request="UPDATE trajet SET TypeTrajet='".$_POST["AllerRetour"]."', isDemande= '0',"./*$newPlacesRestantes.*/" LieuArrivee='".$_POST["Ville"]."',LieuDepart='Wervicq-Sud' , AdresseArrivee='".$_POST["Adresse"]."',AdresseDepart='21 Rue de Linselles',Prix='".$_POST["Prix"]."', DateDepart= '".$_POST["Date-de-Depart"]."',HeureDepart='".$_POST["Heure-de-Depart"]."',NbPassagers='".$_POST["NbPass"]."', Description='".$_POST["Description"]."',DisplayTel='".$_POST["tel"]."' WHERE IdTrajet=".$IdTrajet."";
}

if ($conn->query($request) === TRUE) {
  ?>
  <script type="text/javascript">
      alert("Ton trajet a bien ete modifie");               //Si la requete a fonctionné on redirige vers la page de profil
      location="Profil.php";
  </script>
<?php
die();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;            //Sinon on affiche l'erreur
  }
?>
</body>
</html>