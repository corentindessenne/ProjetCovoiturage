<?php 
    

    include 'Connexion.php';
    $idTrajet = $_POST['IdTrajet'];

    //select des infos du trajet
    $sql = "SELECT * FROM trajet WHERE IdTrajet = '$idTrajet'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $IdCompte = $row['IdCompte'];

    //on avertit les usagers de chaque réservation du trajet
    $result = mysqli_query($conn, "SELECT * FROM reservation WHERE idTrajet = '$idTrajet'");

    while( $row2 = mysqli_fetch_assoc($result) ){

        //envoi e mail de suppresion du trajet aux passagers ayant réservé le trajet 
        $sql = "SELECT * FROM compte WHERE Email='$mail' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }

    //delete de toutes les reservations du trajet
    $sql3 = "DELETE FROM reservation WHERE idTrajet = '$idTrajet'";
    if($conn->query($sql3)){

    }

    //delete de toutes les propositions qui ont été faites avec ce trajet
    $sql3 = "DELETE FROM proposition WHERE idTrajet = '$idTrajet'";
    if($conn->query($sql3)){

    }

    //suppression du trajet
    $sql3 = "DELETE FROM trajet WHERE IdTrajet = '$idTrajet'";
    if($conn->query($sql3)){
        $_SESSION['alertTrajetSupprimé'] = 1;
    }

    //envoi e mail suppresion du trajet au compte ayant créé le trajet

    header('location:profil.php');
 ?>