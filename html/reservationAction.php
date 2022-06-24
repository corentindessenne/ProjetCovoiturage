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

	$request = "INSERT INTO reservation(idTrajet, nbPassagersReservation, typeTrajet, anneeEdition, idCompteReservation, nomPassager1, nomPassager2, nomPassager3, nomPassager4, nomPassager5, nomPassager6) VALUES ('$idTrajet', '$nbPassagers', '$typeTrajet', '2022', '$idCompteReservation', '$tab[1]', '$tab[2]', '$tab[3]', '$tab[4]', '$tab[5]', '$tab[6]')";

	if($conn->query($request)){
        
        $request = mysqli_query($conn, "SELECT IdCompte FROM trajet WHERE IdTrajet = '$idTrajet' ");
        $result = mysqli_fetch_assoc($request);
        $idCompteConducteur = $result['IdCompte'];

		//requête pour récupérer les informations nécessaires
        $request = mysqli_query($conn, "SELECT * FROM compte WHERE IdCompte = '$idCompteConducteur' ");
        $result = mysqli_fetch_assoc($request);

        include('../mails/header_mails.php');
		//mail
        $dest = $result['Email'];
        $sujet = "Tu as reçu(e) une demande pour ton trajet !";
        $corp = file_get_contents("../mails/template_mail_demande_trajet.php");
        $corp = str_replace("{{Prenom}}", $result['Prenom'], $corp);

        if(mail($dest,$sujet,$corp, $headers)){
            $_SESSION['alertReservationBienEffectuee'] = 1;
            header('location:home.php');
        }
        else{
            echo "Oups. Ta demande ne s'est pas envoyée. Réessaye à nouveau";
        }
	}
	else{
		echo "Error: <br>" . $conn->error;
	}

