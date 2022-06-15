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
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
	 rel="stylesheet">
	 <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.6.4.js"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body>

<script>
	AOS.init();
</script>

	<img class="rocket" src="../images/icon/rocket.png">


	<img class="planets" src="../images/icon/planets.png">

	<a href="https://www.youtube.com/channel/UCf9g0UfCsETQilcTj0ljzlA/featured">
		<img class="yt-planet" src="../images/icon/yt-planet.png">
    </a>
	<a href="https://www.linkedin.com/company/les-briques-rouges-festival">
		<img class="ld-planet" src="../images/icon/ld-planet.png">
	</a>
	<a href="https://www.instagram.com/lbr_festival">
		<img class="ig-planet" src="../images/icon/ig-planet.png">
	</a>
	<a href="https://www.facebook.com/LBRfestival">
		<img class="fb-planet" src="../images/icon/fb-planet.png">
	</a>

	<?php 	
		include 'Connexion.php';
		include 'NavbarConn.php';
	?>

	<img class="svgForm" src="../images/Vector 1.svg">

	<div class="title">

		<img class="wave" src="../images/LBR Ressources/logo.png">
		<span class="">PLATEFORME DE COVOITURAGE</span>
		<p>Les Briques Rouges, c’est un évènement où de nombreux festivaliers se déplacent en voiture pour faire la fête ! Trouve toi aussi ton moyen de transport écologique et économique pour venir jusqu’à nous !</p>

		<div class="radio">
			<span>Je cherche :</span>
			<div>
				<input type="radio" id="aller" name="allerRetour" value="aller" checked>
				<label>Aller</label>
			</div>

			<div>
				<input type="radio" id="retour" name="allerRetour" value="retour">
				<label>Retour</label>
			</div>
		</div>

		<form method="post" action="result.php">
			<div class="form-item">
				<img class="icon" src="../images/icon/free-location-pointer-icon-2961-thumb 1.png">
				<input placeholder="Lieu" type="text" name="lieu">
			</div>
			<hr>
			<div class="form-item">
				<input id="inputDate" type="date" min="2022-09-12" max="2022-10-03" name="date">
			</div>
			<hr>
			<div class="form-item">
				<img class="icon" src="../images/icon/1077114 1.png">
				<input value="1" min="0" step="1" max="7" type="number" name="nbPlaces">
			</div>
			<input type="text" id="hidden" name="allerRetour" value="aller">
			<input type="submit" value="Rechercher" name="submit">
		</form>

		<script type="text/javascript">

			document.getElementById('aller').addEventListener('change', () =>{
				if(document.getElementById('aller').checked) document.getElementById('hidden').value = "aller";
				console.log(document.getElementById('hidden').value);
			});

			document.getElementById('retour').addEventListener('change', () =>{
				if(document.getElementById('retour').checked) document.getElementById('hidden').value = "retour";
				console.log(document.getElementById('hidden').value);
			});

			//scroll button 
			const myFunction = () =>{
				document.getElementById("list").scrollIntoView({behavior: "smooth", block: "start"});
			}
			let scrollUnder = 0;
			let animationTriggered = 0;
			const nav = document.getElementsByTagName('nav')[0];

			document.addEventListener("scroll", () =>{

				console.log(scrollUnder);

				if(window.scrollY != 0 && scrollUnder == 0) {
					animationTriggered = 1
					nav.classList.remove("display");
					nav.classList.add('remove');	
				}
				
				if(window.scrollY > 40) {
					scrollUnder = 1;
					animationTriggered = 0;
				}
				if(window.scrollY < 40 && nav.classList.contains('remove') && scrollUnder){
					scrollUnder = 0;
					nav.classList.remove('remove');
					nav.classList.add('display');
				}
			});
		</script>

		<div class="scrolldown">
			<button class="scroll" onclick="myFunction()">VOIR LES DERNIERS COVOITURAGES</button>
		</div>
	</div>

	<div data-aos="zoom-in-up"  data-aos-easing="linear"
     data-aos-duration="1000"   data-aos-delay="300">
		<h1>POURQUOI PRATIQUER LE COVOITURAGE?</h1>
	</div>


<div data-aos="fade-right"  data-aos-easing="linear"
     data-aos-duration="600"   data-aos-delay="500">
	<div class="container">
		
			<img src="../images/handshake.png"> 
		
		<div class="text">
			<h3>FAIRE DES RENCONTRES</h3>

			<p>Le covoiturage te permet de rencontrer des nouvelles personnes durant ton trajet et de rendre plus convivial l’ambiance lors de ton déplacement. Tu y trouveras  peut-être tes futurs partenaires pour faire la fête ! </p>
		</div>
	</div>
</div>

<div data-aos="fade-left"  data-aos-easing="linear"
     data-aos-duration="600"   data-aos-delay="500">
	<div class="container2">

		<div class="text">
			<h3>ECONOMISER TON ARGENT</h3>

			<p>Le covoiturage te permet aussi d’économiser ton argent ! Plus besoin de payer l’essence et les péages tout seul, tu peux maintenant partager les frais de déplacement avec tes amis !  </p>
		</div>

		<img src="../images/money.png"align="right"> 
	</div>
</div>

<div data-aos="fade-up"  data-aos-easing="linear"
     data-aos-duration="600"   data-aos-delay="500">
	<div class="container3">
		<img src="../images/earth.png"> 

		<div class="text">
			<h3>PROTÉGER LA PLANÈTE</h3>
			<p>Faire du covoiturage, c’est aussi penser à la planète. En partageant le trajet à plusieurs, tu réduis tes émissions de CO2 et le risque d’embouteillages !</p>
		</div>
	</div>
</div>

	<div class="list" id="list">
		<div class="header">
			<img src="../images/car.png">
			<h1>DERNIERS COVOITURAGES</h1>	
		</div>


		<div id="down" class="wrapper">
			<?php
			$requete = "SELECT * FROM trajet ORDER BY RAND()";
			$result = mysqli_query($conn,$requete);
			$count = 0;

			while ($row = mysqli_fetch_assoc($result)) {
				$count++;

				$hourString1 = substr($row['HeureDepart'],0,2);
				$hourString2 = substr($row['HeureDepart'],3,2);
				$hourStringDeparture = $hourString1."h".$hourString2;


				$hourString3 = substr($row['HeureArrivee'],0,2);
				$hourString4 = substr($row['HeureArrivee'],3,2);
				$hourStringArrival = $hourString3."h".$hourString4;

				if($count < 5){
					?>

					<div class="item">
						<div class="data-group">
							<span class="horaire">
								<?php echo $hourStringDeparture; ?>
							</span>
							<span class="place">
								<?php echo utf8_encode($row['LieuDepart']); ?>
							</span>

							<span class="date">
								<?php echo utf8_encode($row['DateDepart']); ?>
							</span>
						</div>

						<div class="data-group">
							<span class="horaire">
								<?php echo $hourStringArrival; ?>
							</span>
							<span class="place">
								<?php echo utf8_encode($row['LieuArrivee']); ?>
							</span>

							<span class="price">
								<?php echo $row['Prix']; ?>€
							</span>
						</div>

						<div class="account-info">
							<img class="profile-picture" src="../images/adrien.jpg">
							<div class="profile-info">
								<span class="name">Adrien Mareel</span>
								<div class="available">
									<?php
										$value = $row['NbPassagers'] - $row['PlacesRestantes'];
										if($value == 1) echo $value." place restante";
										else echo $value." places restantes"
									?>
								</div>
							</div>
							
							<div class="book-container"><a class="book" href="#" class="button">Réserver</a></div>
						</div>
					</div>

					<?php
				}}
				?>
			</div>

		</div>
	</body>
	</html>
