<?php 

include 'Connexion.php';

$mail = $_SESSION['mail'];
$sql = "SELECT * FROM compte WHERE Email='$mail' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$idCompte = $row['IdCompte'];

//check si la personne a créé un trajet
$sql2 = "SELECT * FROM trajet WHERE IdCompte = '$idCompte' ";
$result2 = mysqli_query($conn, $sql2);

//on averti les usagers de chaque réservation de chaque trajet et on leur retire le trajet
while ($row2 = mysqli_fetch_assoc($result2)) {
    $idTrajet = $row2['idTrajet'];

    //delete de toutes les réservations sur ce trajet
    $sql3 = "DELETE FROM reservation WHERE IdTrajet = '$idTrajet' ";
    
    if($conn->query($sql3)){
        echo "suppression des reservations des usagers";
    }
}

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
    $placesRestantes = $row['PlacesRestantes'] + $row4['nbPassagersReservation'];

    $sql6 = "UPDATE trajet SET PlacesRestantes = '$placesRestantes' WHERE IdTrajet = '$idTrajet' ";

    if ($conn->query($sql6) === TRUE) {
        echo "Actualisation des places restantes du trajet";
    }
}
?>
