<?php 

	include 'Connexion.php';
	$count = 0;
	$tab = array(11);
	for ($i=1; $i <= 10; $i++) { 
		if(isset($_POST['passager-'.$i])){
			$tab[$i] = $_POST['passager-'.$i];
			$count++;
		}
		else $tab[$i] = "";
	}

	$mail = $_SESSION['mail'];
	$requete = "SELECT IdCompte FROM compte WHERE Email = '$mail'";
	$result = mysqli_query($conn,$requete);
	$row = mysqli_fetch_assoc($result);

	//setup variable push database
	$idCompteReservation = $row['IdCompte'];
	$typeTrajet = $_POST['typeTrajet'];
	$idTrajet = $_POST['idTrajet'];
	$nbPassagers = $_POST['nbPassagers'];


	$request = "INSERT INTO reservation(idTrajet, nbPassagersReservations, typeTrajet, anneeEdition, idCompteReservation, nomPassager1, nomPassager2, nomPassager3, nomPassager4, nomPassager5, nomPassager6) VALUES ('$idTrajet', '$nbPassagers', '$typeTrajet', '2022', '$idCompteReservation', '$tab[1]', '$tab[2]', '$tab[3]', '$tab[4]', '$tab[5]', '$tab[6]')";

	if($conn->query($request) == TRUE){
		echo "Votre demande pour rejoindre la voiture a bien été envoyée au créateur du trajet";
	}
	else{
		echo "Error: <br>" . $conn->error;
	}

	//envoi e mail 
?>