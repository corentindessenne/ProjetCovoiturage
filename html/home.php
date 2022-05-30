<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LBR Covoiturage</title>
	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	<!--Google Fonts-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

</head>
<body>
	<nav>
		<div class="logo">
			<img src="../images/LBR Ressources/logoLONGUEURClassic.png">
		</div>

		<ul class="menu">
			<li class="menu-item"><a href="">Les trajets</a></li>
			<li class="menu-item "><a href="">S'inscrire</a></li>
			<li class="menu-item connect"><a href="">Se connecter</a></li>
		</ul>
	</nav>
	<?php 
	include 'Connexion.php';
	?>
	<img class="svgForm" src="../images/Vector 1.svg">

	<div class="title">

		<img class="wave" src="../images/LBR Ressources/logo.png">
		<span class="">PLATEFORME DE COVOITURAGE</span>
		<p>Les Briques Rouges, c’est un évènement où de nombreux festivaliers se déplacent en voiture pour faire la fête ! Trouve toi aussi ton moyen de transport pour venir jusqu’à nous !</p>

		<form method="post" action="result.php">
			<div class="form-item">
				<img class="icon" src="../images/icon/free-location-pointer-icon-2961-thumb 1.png">
				<input placeholder="Lieu" type="text" name="lieu">
			</div>
			<hr>
			<div class="form-item">
				<input id="inputDate" type="date" placeholder="" value="" name="">
			</div>
			<hr>
			<div class="form-item">
				<img class="icon" src="../images/icon/1077114 1.png">
				<input value="1" min="0" step="1" max="7" type="number" name="">
			</div>
			<input type="submit" value="Rechercher" name="">
		</form>

		<script type="text/javascript">
			let d = new Date();
			let year = d.getFullYear();
			let m = d.getMonth() + 1;
			let month = m;

			if(m < 10){
				month = "0"+m;
			}

			let day = d.getDate();
			let string = year+"-"+month+"-"+day;
			document.getElementById('inputDate').min = string;
			document.getElementById('inputDate').value = string;
		</script>

	</div>
	<?php
	if($_SESSION["confirme"]==1){
		$_SESSION["confirme"]=0;
		echo '<script type="text/javascript">window.alert("Votre modification a bien été enregistré");</script>';
	}
	else if($_SESSION["confirme"]==2){
		$_SESSION["confirme"]=0;
		echo '<script type="text/javascript">window.alert("Votre trajet a bien été enregistré");</script>';
	}
	?>
</body>
</html>