<?php

include 'Connexion.php';

//***************************
// CAS CONDUCTEUR : l'utilisateur a créé un trajet que des utilisateurs ont réservé et supprime son compte
//***************************

$mail = $_SESSION['mail'];
$sql = "SELECT * FROM compte WHERE Email='$mail' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$idCompte = $row['IdCompte'];

//check si la personne a créé un trajet
$sql2 = "SELECT * FROM trajet WHERE IdCompte = '$idCompte' ";
$result2 = mysqli_query($conn, $sql2);

//on avertit les usagers de chaque réservation de chaque trajet et on leur retire le trajet
while ($row2 = mysqli_fetch_assoc($result2)) { //Tant qu'il y a des trajets
    $idTrajet = $row2['idTrajet'];

    $sql8 = mysqli_query($conn, "SELECT idCompteReservation, typeTrajet FROM reservation WHERE idTrajet = '$idTrajet'");

    while ($row8 = mysqli_fetch_assoc($sql8)) { //Tant qu'il y a des passagers
        $idPassager = $row8['idCompteReservation'];
        $sql9 = mysqli_query($conn, "SELECT Prenom, Email FROM compte WHERE IdCompte = '$idPassagers'");
        $row9 = mysqli_fetch_assoc($sql9);

        include('../mails/header_mails.php');

        $dest = $row9['Email'];
        $sujet = "Mauvaise nouvelle ...";
        $corp = file_get_contents("../mails/template_mail_suppression_trajet");

        if ($row8['typeTrajet'] === 'Aller') $typeTrajet = "t'emmener au";
        else $typeTrajet = "te ramener du";

        $variables = array(
            "{{Prenom}}" => $row9['Prenom'],
            "{{typeTrajet}}" => $typeTrajet
        );

        foreach ($variables as $key => $value) {
            $corp = str_replace($key, $value, $corp);
        }

        mail($dest, $sujet, $corp, $headers);
    }
    //delete de toutes les réservations sur ce trajet
    $sql3 = "DELETE FROM reservation WHERE IdTrajet = '$idTrajet' ";

    if($conn->query($sql3)){
        echo "suppression des reservations des usagers";
    }

    //delete de tous les trajets du conducteur
    $sql3 = "DELETE FROM trajet WHERE IdCompte = '$idCompte' ";
    if($conn->query($sql3)){
        echo "suppression des trajets du conducteur";
    }
}

//***************************
// CAS PASSAGER : l'utilisateur a réservé un trajet et supprime son compte
//***************************

//check si la personne avait réservé un trajet 
$sql4 = "SELECT * FROM reservation WHERE idCompteReservation = '$idCompte' ";
$result4 = mysqli_query($conn, $sql4);

//toutes les réservations de user
while ($row4 = mysqli_fetch_assoc($result4)) {

    //on ajoute aux trajets le nombre de places supprimées
    $idTrajet = $row4['idTrajet'];
    $sql5 = "SELECT * FROM trajet WHERE IdTrajet = '$idTrajet' ";
    $result5 = mysqli_query($conn, $sql5);
    $row5 = mysqli_fetch_assoc($result5);
    $placesRestantes = $row5['PlacesRestantes'] + $row4['nbPassagersReservation'];

    $sql6 = "UPDATE trajet SET PlacesRestantes = '$placesRestantes' WHERE IdTrajet = '$idTrajet' ";

    if ($conn->query($sql6) === TRUE) {
        echo "Actualisation des places restantes du trajet";
    }

    //delete de toutes les réservations
    $idReservation = $row4['idReservation'];
    $sql7 = "DELETE FROM reservation WHERE idReservation = '$idReservation' ";
    if ($conn->query($sql7) === TRUE) {
        echo "suppression des réservations du compte";
    }
}

//toutes les propositions de user
$sql5 = "DELETE FROM proposition WHERE idCompteConducteur='$idCompte'";
if($conn->query($sql5)){

}

$sql5 = "DELETE FROM compte WHERE IdCompte='$idCompte'";
if($conn->query($sql5)){

}

header('location:logout.php');

