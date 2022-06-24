<?php 

	include 'Connexion.php';

	

	$idReservation = $_GET['idReservation'];

	//si le conducteur accepte de prendre les passagers faisant la demande
	if($_GET['isAccepted'] == 1){

		//enlever des places disponibles pour le trajet 
		$requete = "SELECT * FROM reservation WHERE idReservation = '$idReservation'";
        $result = mysqli_query($conn,$requete);
        $row = mysqli_fetch_assoc($result);
        $idTrajet = $row['idTrajet'];


        $sql = "UPDATE reservation SET isAccepted = 1 WHERE idReservation = '$idReservation'";
        if ($conn->query($sql) === TRUE) {
        	
        }

        $requete2 = "SELECT * FROM trajet WHERE IdTrajet = '$idTrajet' ";
        $result2 = mysqli_query($conn,$requete2);
        $row2 = mysqli_fetch_assoc($result2);
        $placesRestantes = $row2["PlacesRestantes"] - $row['nbPassagersReservation'];

        $sql = "UPDATE trajet SET PlacesRestantes = '$placesRestantes' WHERE IdTrajet = '$idTrajet' ";
        if ($conn->query($sql) === TRUE) {
        $_SESSION['alertAcceptPassagerDepuisConducteur'] = 1;
        header("location:Profil.php");
        }
	}

	//si le conducteur refuse de prendre les passagers faisant la demande
	if($_GET['isAccepted'] == 0){


		//supprimer la demande de reservation 
		$requete = "DELETE FROM reservation WHERE idReservation = '$idReservation'";
		if($conn->query($requete)){
		$_SESSION['alertRefusePassagerDepuisConducteur'] = 1;
		header("location:Profil.php");
		}
	}