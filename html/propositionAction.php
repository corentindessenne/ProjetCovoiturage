<?php 

	include 'Connexion.php';
	$count = 0;
	$tab = array();
	if(isset($_GET['nomConducteur'])){
	$tab[1] = $_GET['nomConducteur'];}
		else{$tab[1] = "";}


	$mail = $_SESSION['mail'];
	$requete = "SELECT IdCompte,Nom, Prenom FROM compte WHERE Email = '$mail'";
	$result = mysqli_query($conn,$requete);
	$row = mysqli_fetch_assoc($result);

	//setup variable push database
	$idCompteConducteur = $row['IdCompte'];
	$nom = ($row['Nom']);
	$prenom = ($row['Prenom']);
	$nomPrenom = $nom."".$prenom;
	$typeTrajet = $_POST['typeTrajet2'];
	$idTrajet = $_POST['idTrajet2'];
	$idDemande = $_POST['idDemande'];

	$request = "INSERT INTO proposition(idDemande,idTrajet, typeTrajet, anneeEdition, idCompteConducteur, nomConducteur) VALUES ('$idDemande','$idTrajet', '$typeTrajet', '2022', '$idCompteConducteur', '$nomPrenom')";

	if($conn->query($request)){
        
        $request = mysqli_query($conn, "SELECT IdCompte FROM trajet WHERE IdTrajet = '$idTrajet' ");
        $result = mysqli_fetch_assoc($request);
        $idCompteConducteur = $result['IdCompte'];

        $request = mysqli_query($conn, "SELECT * FROM compte WHERE IdCompte = '$idCompteConducteur' ");
        $result = mysqli_fetch_assoc($request);

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From:Les Briques Rouges<cocodsn2@gmail.com>";

        $dest = $result['Email'];
        $sujet = "Tu as reçu(e) une demande pour ton trajet !";
        $corp = file_get_contents("../mails/template_mail_proposition_trajet.php");
        $corp = str_replace("{{Prenom}}", $result['Prenom'], $corp);

        if(mail($dest,$sujet,$corp, $headers)){
            echo "Votre demande pour rejoindre la voiture a bien été envoyée au conducteur";
            header('location:home.php');
        }
        else{
            echo "Oups. Ta demande ne s'est pas envoyée. Réessaye à nouveau";
        }
	}
	else{
		echo "Error: <br>" . $conn->error;
	}

