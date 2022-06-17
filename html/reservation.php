<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Réservation</title>
	<link rel="stylesheet" type="text/css" href="../css/register.css">
</head>
<body>

	<?php

		include 'Connexion.php';

		$idTrajet = $_GET['idTrajet'];
		$requete = "SELECT * FROM trajet WHERE IdTrajet = '$idTrajet' ";
		$result = mysqli_query($conn,$requete);
		$row = mysqli_fetch_assoc($result);
		$typeTrajet = $row['TypeTrajet'];

		//checks if still enough place
		if($row['PlacesRestantes'] < $_GET['nbPassagers']){
			echo "Ce trajet ne possède pas assez de place pour vous";
			return;
		}

		//checks if connected
		if(!isset($_SESSION['mail'])){
			$_SESSION['location'] = "reservation.php?idTrajet=".$_GET['idTrajet']."&nbPassagers=".$_GET['nbPassagers'];
			$_SESSION['alertConnexion'] = true;
			header('location:Login.php');
		}

		//if connected
		if(isset($_SESSION['mail'])){
			$_SESSION['location'] = null;
		}

		//check si le passager à déjà une réservation pour un trajet du typeTrajet(aller/retour)
		$mail = $_SESSION['mail'];
		$requete = "SELECT IdCompte FROM compte WHERE Email = '$mail'";
		$result = mysqli_query($conn,$requete);
		$row = mysqli_fetch_assoc($result);

		$idCompteReservation = $row['IdCompte'];

		$requete = "SELECT * FROM reservation WHERE idCompteReservation = '$idCompteReservation' AND typeTrajet = '$typeTrajet' ";
		$result = mysqli_query($conn,$requete);
		$row = mysqli_fetch_assoc($result);
		
		if($result->num_rows != 0){
			echo "Vous ne pouvez pas réserver 2 trajet".$typeTrajet." à la fois";
			return;
		}

		//check si le passager à dejà proposé un trajet de type typeTrajet(aller/retour)
		$requete = "SELECT * FROM trajet WHERE IdCompte = '$idCompteReservation' AND TypeTrajet = '$typeTrajet' ";
		$result = mysqli_query($conn,$requete);
		$row = mysqli_fetch_assoc($result);
		if($result->num_rows != 0){
			echo "Vous ne pouvez pas réserver un trajet ".$typeTrajet." alors que vous en proposez déjà un";
		}

	?>

	<form>
		
		<?php 
		//affichage HTML demande noms des passagers 
		for ($i=0; $i < $_GET['nbPassagers']; $i++) { 
			?>
				<div class="bloc">
					<label>Prénom passager <?php echo $i?></label>
					<input type="text" name="passager-<?php echo $i?>">
				</div>
			<?php
			}
		?>

	</form>


		<script type="text/javascript">
	
			let item = document.getElementsByClassName('bloc');

			for(let i = 0 ; i < item.length	; i++){
				item[i].addEventListener('focusin', () => {
					item[i].children[0].classList.add("upper");
					item[i].children[1].classList.add("upperInput");
				});

				item[i].addEventListener('focusout', () =>{
					if(item[i].children[1].value == ""){
						item[i].children[0].classList.remove("upper");
						item[i].children[1].classList.remove("upperInput");
					}
				});
			}
			
		</script>
</body>
</html>