<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Action Ajout</title>
</head>

<body>

<h1>Ca marche pas</h1>

<?php
include 'Connexion.php';            //connexion a la base de donnée

$_POST["Description"] = str_replace("'", "''", $_POST["Description"]);       //on remplace les ' par des '' dans la description pour éviter de créer des erreurs sql

if (!isset($_POST["tel"])) {
    $tel = 0;
} else {                                           //On ajuste la valeur du tel en fonction de si la checkbox a été cochée ou non
    $tel = 1;
}

$IdTrajet = $_POST["IdTrajet"];                   //On met l'id du trajet dans une variable
$isDemande = $_POST["isDemande"];
$defaultLong = "3.1134";                        //coordonnées par défaut du festival
$defaultLat = "50.7364";
$defaultLieu = "Wervicq-Sud";
$defaultAdresse = "21 Rue de Linselles	";
$lieu = "";
$prix = 0;

if (isset($_POST["Prix"])) {
    $prix = $_POST["Prix"];
}

if ($_POST["AllerRetour"] == "Retour") {
    $lieu = $_POST["arrival"];
} else {
    $lieu = $_POST["Ville"];
}


$dateArr = strtotime(str_replace(" (heure d’été d’Europe centrale)", "", $_POST["dateArr"])); //on convertit en timestamp la string récupérée

if ($_POST["AllerRetour"] == "Aller") {
    $request = "UPDATE trajet SET TypeTrajet='" . $_POST["AllerRetour"] . "', isDemande= '" . $isDemande . "', LieuDepart='" . $lieu . "',LongitudeDepart='" . $_POST["long"] . "',LatitudeDepart='" . $_POST["lat"] . "',LieuArrivee='" . $defaultLieu . "',LongitudeArrivee='" . $defaultLong . "',LatitudeArrivee='" . $defaultLat . "',AdresseDepart='" . $_POST["Adresse"] . "',AdresseArrivee='" . $defaultAdresse . "' ,DateDepart= '" . $_POST["Date-de-Depart"] . "',DateArrivee='" . date("Y.m.d", $dateArr) . "',HeureDepart='" . $_POST["time"] . "',HeureArrivee='" . $_POST["heureArrivee"] . "', Description='" . $_POST["Description"] . "',Prix='" . $prix . "',DisplayTel='" . $tel . "' WHERE IdTrajet=" . $IdTrajet . "";
}         //requete sql différente en fonction de s'il s'agit d'un aller ou une retour
else {
    $request = "UPDATE trajet SET TypeTrajet='" . $_POST["AllerRetour"] . "', isDemande= '" . $isDemande . "', LieuDepart='" . $defaultLieu . "',LongitudeDepart='" . $defaultLong . "',LatitudeDepart='" . $defaultLat . "',LieuArrivee='" . $lieu . "',LongitudeArrivee='" . $_POST["long"] . "',LatitudeArrivee='" . $_POST["lat"] . "',AdresseDepart='" . $defaultAdresse . "',AdresseArrivee='" . $_POST["Adresse"] . "', DateDepart= '" . $_POST["Date-de-Depart"] . "',DateArrivee='" . date("Y.m.d", $dateArr) . "',HeureDepart='" . $_POST["time"] . "',HeureArrivee='" . $_POST["heureArrivee"] . "', Description='" . $_POST["Description"] . "',Prix='" . $prix . "',DisplayTel='" . $tel . "' WHERE IdTrajet=" . $IdTrajet . "";
}

if ($conn->query($request) === TRUE) {
    $_SESSION['alertTrajetModifie'] = 1;      //Si la requete a fonctionné on redirige vers la page de profil
    header("location:profil.php");
} else {
    echo("Error description: " . $mysqli -> error);
    $_SESSION['alertErreurSurvenue'] = 1;              //Sinon on affiche l'erreur
}
?>
</body>
</html>