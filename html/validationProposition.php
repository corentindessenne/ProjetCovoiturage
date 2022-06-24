<?php 

	include 'Connexion.php';

	$idProposition = $_GET['idProposition'];

	//recupération des infos du compte connecté
	$mail = $_SESSION['mail'];
	$requete = "SELECT * FROM compte WHERE Email = '$mail' ";
    $result = mysqli_query($conn,$requete);
    $row = mysqli_fetch_assoc($result);
    $idCompte = $row['IdCompte'];
    $prenom = $row['Prenom'];

	//la proposition est refusée
	if($_GET['isAccepted'] == 0){ 

		//supprimer la proposition 
		$requete = "DELETE FROM proposition WHERE idProposition = '$idProposition'";
		if($conn->query($requete)){
			$_SESSION['alertPropositionRefusee'] = 1;
			header('location:profil.php');
		}
	}

	//la proposition est acceptée
	if($_GET['isAccepted'] == 1){ 

		$requete = "SELECT * FROM proposition WHERE idProposition = '$idProposition' ";
        $result = mysqli_query($conn,$requete);
        $row = mysqli_fetch_assoc($result);

        //check que la voiture du conducteur n'est pas déjà remplie
        $idTrajet = $row['idTrajet'];
        $idDemande = $row['idDemande'];
        $requete1 = "SELECT * FROM trajet WHERE IdTrajet = '$idTrajet' ";
        $result1 = mysqli_query($conn,$requete1);
        $row1 = mysqli_fetch_assoc($result1);

        if($row1['PlacesRestantes'] == 0){
        	$_SESSION['alertPlusAssezDePlaceDansLeTrajet'] = 1;
        	echo "Plus assez de place dans le trajet";
        	die();
        }

        //update places Restantes dans le trajet
        $placesRestantes = $row1['PlacesRestantes'] - 1;
       	$sql = "UPDATE trajet SET PlacesRestantes = '$placesRestantes' WHERE IdTrajet = '$idTrajet'";
       	if($conn->query($sql)){
       		
       	}
        $typeTrajet = $row['typeTrajet'];

        //ajout d'une réservation dans la DB
		$requete = "INSERT INTO reservation(idTrajet, nbPassagersReservation, typeTrajet, anneeEdition, idCompteReservation, nomPassager1, isAccepted) VALUES ('$idTrajet', '1', '$typeTrajet', '2022', '$idCompte', '$prenom','1')";

		if($conn->query($requete)){
			//suppression d'une place dans le trajet 


			//suppression de la demande de trajet car le trajet a été rejoint
			$requete = "DELETE FROM trajet WHERE idTrajet = '$idDemande' ";
			if($conn->query($requete)){
				echo "Delete du trajet ".$idDemande."<br>";
			}

			//suppression de la proposition car le trajet a été rejoint
			$requete = "DELETE FROM proposition WHERE idProposition = '$idProposition'";
			if($conn->query($requete)){
				echo "Delete de la proposition ".$idProposition."<br>";
			}

			$_SESSION['alertTrajetRejoint'] = 1;
			header('location:profil.php');
		}


	}



?>