<!DOCTYPE html>
<html>
<head>
    <title>Action Ajout</title>
</head>

<body>

<?php
include 'Connexion.php';            //On se connecte a notre base de donné

$mail=$_SESSION["mail"];
$sql = "SELECT IdCompte FROM compte WHERE Email='".$mail."'" ;  //On récupère l'id du compte a partir du mail enrgeistré dans une session
$result = $conn->query($sql);
if ($result->num_rows >  0) {
    // output data of each row
    $row = $result->fetch_assoc();
    $id=$row["IdCompte"];
      
}
if (!isset($_POST["tel"])) {
    $tel=0;
  }
  else{                                           //On ajuste la valeur du tel en fonction de si la checkbox a été cochée ou non
    $tel = 1;
  }

$_POST["Description"]= str_replace("'","''",$_POST["Description"]);             //on remplace les ' par des '' dans la description pour éviter de créer des erreurs sql


$dateArr=strtotime(str_replace("(heure d’été d’Europe centrale)","",$_POST["dateArr"]));         //on isole la partie date du résultat fournit


if($_POST["aller-retour"]=="Aller"){
    $request="INSERT INTO trajet(TypeTrajet,isDemande,LieuDepart,AdresseDepart,LongitudeDepart,LatitudeDepart, DateDepart, HeureDepart,DateArrivee,HeureArrivee, DateAjout, NbPassagers, PlacesRestantes, Prix, Description,  DisplayTel,  AnneeEdition, IdCompte) VALUES ('".$_POST["aller-retour"]."',".$_POST["isDemande"].",'".$_POST["departure"]."','".$_POST["adresse"]."','".$_POST["long"]."','".$_POST["lat"]."','".$_POST["date"]."','".$_POST["time"]."','".date("Y.m.d",$dateArr)."','".$_POST["heureArrivee"]."','".date("Y.m.d")."','".$_POST["NbPassagers"]."','".$_POST["NbPassagers"]."','".$_POST["Prix"]."','".$_POST["Description"]."','".$tel."' ,'2022','".$id."')";
}                   //requete sql différente en fonction de s'il s'agit d'un aller ou une retour
else{
    $request="INSERT INTO trajet(TypeTrajet,isDemande,LieuArrivee,AdresseArrivee,LongitudeArrivee,LatitudeArrivee, DateDepart, HeureDepart,DateArrivee,HeureArrivee, DateAjout,NbPassagers, PlacesRestantes, Prix, Description, DisplayTel,  AnneeEdition, IdCompte) VALUES ('".$_POST["aller-retour"]."',".$_POST["isDemande"].",'".$_POST["arrival"]."','".$_POST["adresse"]."','".$_POST["long"]."','".$_POST["lat"]."','".$_POST["date"]."','".$_POST["time"]."','".date("Y.m.d",$dateArr)."','".$_POST["heureArrivee"]."','".date("Y.m.d")."','".$_POST["NbPassagers"]."','".$_POST["NbPassagers"]."','".$_POST["Prix"]."','".$_POST["Description"]."','".$tel."' ,'2022','".$id."')";
}
if ($conn->query($request) === TRUE) {
    

    if($_POST['isDemande'] == 1){
        $_SESSION['alertDemandeCreee'] = 1;
    }
    else{
        $_SESSION['alertTrajetCree'] = 1;
    }

    header("Location: profil.php");               //si la requete s'est effectuée avec succès on redirige vers le profil


  } else {
    //si la requete est un échec on affiche l'erreur ou/et on redirige vers addtravels
    $_SESSION['alertErreurSurvenue'] = 1;
    header("Location: addtravels.php");
  }
?>
</body>
</html>