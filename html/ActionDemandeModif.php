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
$isDemande=$_POST["isDemande"];
$requete="SELECT DEFAULT(LongitudeDepart), DEFAULT(LatitudeDepart),DEFAULT(LieuDepart), DEFAULT(AdresseDepart), PlacesRestantes,NbPassagers FROM trajet";
$result = mysqli_query($conn,$requete);
if(mysqli_fetch_assoc($result)==TRUE){
  $row = mysqli_fetch_assoc($result);
  $defaultLong=$row["DEFAULT(LongitudeDepart)"];
  $defaultLat=$row["DEFAULT(LatitudeDepart)"];
  $defaultLieu=$row["DEFAULT(LieuDepart)"];
  $defaultAdresse=$row["DEFAULT(AdresseDepart)"];
  $placesRestantes=$row["PlacesRestantes"];
  $NbPass=$row["NbPassagers"];
}
else{
  echo "Error: " . $sql . "<br>" . $conn->error;              //Sinon on affiche l'erreur
  die();
}
$lieu="";
$prix=0;
if(isset($_POST["Prix"])){
  $prix=$_POST["Prix"];
}

if($_POST["AllerRetour"]=="Retour"){
  $lieu=$_POST["arrival"];
}else{
  $lieu=$_POST["Ville"];
}
$temp=$NbPass;
if(isset($_POST["NbPass"])){
  $NbPass=$_POST["NbPass"];
}
$placesRestantes+= $NbPass-$temp;

if($_POST["AllerRetour"]=="Aller"){
    $request="UPDATE trajet SET TypeTrajet='".$_POST["AllerRetour"]."', isDemande= '".$isDemande."', LieuDepart='".$lieu."',LongitudeDepart='".$_POST["long"]."',LatitudeDepart='".$_POST["lat"]."',LieuArrivee='".$defaultLieu."',LongitudeArrivee='".$defaultLong."',LatitudeArrivee='".$defaultLat."',AdresseDepart='".$_POST["Adresse"]."',AdresseArrivee='".$defaultAdresse."' ,DateDepart= '".$_POST["Date-de-Depart"]."',DateArrivee='".$_POST["dateArr"]."',HeureDepart='".$_POST["time"]."',HeureArrivee='".$_POST["heureArrivee"]."', Description='".$_POST["Description"]."',Prix='".$prix."',NbPassagers='".$NbPass."',PlacesRestantes='".$placesRestantes."',DisplayTel='".$_POST["tel"]."' WHERE IdTrajet=".$IdTrajet."";
}         //requete sql différente en fonction de s'il s'agit d'un aller ou une retour
else{
    $request="UPDATE trajet SET TypeTrajet='".$_POST["AllerRetour"]."', isDemande= '".$isDemande."', LieuDepart='".$defaultLieu."',LongitudeDepart='".$defaultLong."',LatitudeDepart='".$defaultLat."',LieuArrivee='".$lieu."',LongitudeArrivee='".$_POST["long"]."',LatitudeArrivee='".$_POST["lat"]."',AdresseDepart='".$defaultAdresse."',AdresseArrivee='".$_POST["Adresse"]."', DateDepart= '".$_POST["Date-de-Depart"]."',DateArrivee='".$_POST["dateArr"]."',HeureDepart='".$_POST["time"]."',HeureArrivee='".$_POST["heureArrivee"]."', Description='".$_POST["Description"]."',Prix='".$prix."',NbPassagers='".$NbPass."',PlacesRestantes='".$placesRestantes."',DisplayTel='".$_POST["tel"]."' WHERE IdTrajet=".$IdTrajet."";
}



if ($conn->query($request) === TRUE) {
  ?>
  <script type="text/javascript">
      alert("Ta demande de trajet a bien ete modifie");         //Si la requete a fonctionné on redirige vers la page de profil
      location="ProfilTmp.php";
  </script>
<?php
die();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;              //Sinon on affiche l'erreur
  }
?>
</body>
</html>