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

        $query3 = mysqli_query($conn, "SELECT * FROM trajet WHERE IdTrajet = '$idDemande'");
        $result3 = mysqli_fetch_assoc($query3);
        $idDemandeur = $result3['IdCompte'];

        $query3 = mysqli_query($conn, "SELECT * FROM compte WHERE IdCompte = '$idDemandeur'");
        $result3 = mysqli_fetch_assoc($query3);
        $mailDemandeur = $result3['Email'];

        include('../mails/header_mails.php');

        $dest = $mailDemandeur;
        $sujet = "Tu as reçu(e) une proposition pour ton trajet !";
        $corp = file_get_contents("../mails/template_mail_proposition_trajet.php");

        if ($typetrajet === 'Aller') $typeTrajet = "t'emmener au";
        else $typeTrajet = "te ramener du";

        $variables = array(
            "{{Prenom}}" => $result3['Prenom'],
            "{{typeTrajet}}" => $typeTrajet
        );

        foreach ($variables as $key => $value){
            $corp = str_replace($key, $value, $corp);
        }

        if(mail($dest,$sujet,$corp, $headers)){
            echo "Votre demande pour rejoindre la voiture a bien été envoyée au conducteur";
            $_SESSION['alertPropositionBienEnvoyee'] = 1;
            header('location:home.php');
        }
        else{
            echo "Oups. Ta demande ne s'est pas envoyée. Réessaye à nouveau";
        }
	}
	else{
		echo "Error: <br>" . $conn->error;
	}

