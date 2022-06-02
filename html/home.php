<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LBR Covoiturage</title>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	<!--Google Fonts-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-1.6.4.js"></script>

</head>
<body>

<?php include 'NavBar.php';
	include 'Connexion.php';
	?>
	<section class="fwh-slide">
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

			<div class="scrolldown">
				<button><a href="#down">Click Here to Smoothly Scroll Down</a></button>
			</div>


		</div>
	</section>
	
	<section class="fwh-slide fwh-slide--bg-yellow">
		<h1>POURQUOI PRATIQUER LE COVOITURAGE?</h1>

			<div class="container">
				<img src="../images/handshake.png"> 
				
				<div class="text">
        			<h3>FAIRE DES RENCONTRES</h3>
      
					<p>Le covoiturage te permet de rencontrer des nouvelles personnes durant ton trajet et de rendre plus convivial l’ambiance lors de ton déplacement. Tu y trouveras  peut-être tes futurs partenaires pour faire la fête ! </p>
				</div>
			</div>

			<div class="container2">
				
				<div class="text">
        			<h3>ECONOMISER TON ARGENT</h3>
      
					<p>Le covoiturage te permet aussi d’économiser ton argent ! Plus besoin de payer l’essence et les péages tout seul, tu peux maintenant partager les frais de déplacement avec tes amis !  </p>
				</div>
				<img src="../images/money.png"align="right"> 
			</div>

			<div class="container3">
				<img src="../images/earth.png"> 
				
				<div class="text">
        			<h3>PROTÉGER LA PLANÈTE</h3>
					<p>Faire du covoiturage, c’est aussi penser à la planète. En partageant le trajet à plusieurs, tu réduis tes émissions de CO2 et le risque d’embouteillages !</p>
				</div>
			</div>
				<div class="list">
					<img src="../images/car.png">
					<h1> DERNIERS COVOITURAGES</h1>	
				</div>
					<section id="down">
						<div class="wrapper">
						  <div class="item">Un</div>
						  <?php
						         	$requete = "SELECT * FROM trajet";
        							$result = mysqli_query($link,$requete);
            /* Extraction des résultats de la requete SELECT */     
            if  ( mysqli_num_rows($result)  > 0)  {             
                while ($row = mysqli_fetch_assoc($result)) {                     
                    /* constrution des lignes dynamiquement */   
                    if($row[""]>0){
                    	echo $row["LieuDépart"] . " -------> " . $row["LieuArrivée"]. "<br>"; 
                  	    echo "id: " . $row["id"]. " - Name: " .$row["PhotoProfil"]. " " . $row["Prénom"]. " " . $row["Nom"]. "<br>";

                    }                               
                }           
            }     
            else {             
                echo "<tr>" ;             
                echo "<td colspan='2'>La requête ne renvoie pas de résultat !</td>" ;
                echo "</tr>";         
            } 

        ?>
						  <div class="item">Deux</div>
						  <div class="item">Trois</div>
						</div>
					</section>
				
	</section>
	
</body>
</html>