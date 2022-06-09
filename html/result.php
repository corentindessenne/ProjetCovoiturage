<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Résultats de la recherche</title>
	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../css/result.css">
	<!--JQuery-->
	<script src="https://code.jquery.com/jquery-1.6.4.js"></script>
	<!--Google Fonts-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
	<!--Google Maps API-->
	<script async
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzOGPYwZqOFb6hCGtZo68-nQ4sxwum7Hg&callback=initMap">
</script>

</head>

<body>

	<script type="text/javascript">
		let query = "<?php echo $_POST['lieu'] ?>";
		console.log(query);
		let idTrajetTab = new Array();

		let queryCoord = {lat : 0, lng : 0};

		function getDataFromURL(){
			return new Promise((resolve) =>{

				$.getJSON('http://api.positionstack.com/v1/forward?access_key=3afeb3b8f8e21edd8aa31037edcdc1b6&query=' + query, function(data) {

					queryCoord.lat = data.data[0].latitude;
					queryCoord.lng = data.data[0].longitude;

					console.log(queryCoord);

				});

				setTimeout(() => {
					resolve("true");
				},1500);
			})
		}
	</script>

	<?php 	
	include 'Connexion.php';

	if ((isset($_SESSION['login']) && $_SESSION['login'] != '') && $_SESSION["role"] == 1) {
		echo $_SESSION["role"];
		include 'NavBar3.php';

	}
	else if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
		include 'NavBar.php';
	}
	else{
		include 'NavBar2.php';
	}
	?>

	<div id="loader">
		<div class="dot"></div>
		<div class="dot"></div>
		<div class="dot"></div>
	</div>

	<div class="search">
		<div class="searchBar">
			<img class="searchIcon" src="../images/icon/694985.png">

			<div>
				<div>
					<span class="location"><?php echo $_POST['lieu'];?></span>
					<img src="../images/icon/right-arrow 2.png">
					<span class="location">LBR Festival</span>
				</div>

				<div>
					<span class="secondary">
						<?php
							//Affichage nb de passagers 
						if($_POST['nbPlaces'] == 1){
							echo "1 passager";
						}
						else echo $_POST['nbPlaces']." passagers";

						echo ", ";
							//Affichage de la date au format Jour Numéro Mois 2022
						switch (date('w', strtotime($_POST['date']))) {
							case 0:
							echo "Dimanche ";
							break;
							case 1:
							echo "Lundi ";
							break;
							case 2:
							echo "Mardi ";
							break;
							case 3:
							echo "Mercredi ";
							break;
							case 4:
							echo "Jeudi ";
							break;
							case 5:
							echo "Vendredi ";
							break;
							case 6:
							echo "Samedi ";
							break;
						}
						echo date('j',strtotime($_POST['date']));
						echo " ";
						switch (date('F',strtotime($_POST['date']))) {
							case "January":
							echo "Janvier";
							break;
							case "February":
							echo "Février";
							break;
							case "March":
							echo "Mars";
							break;
							case "April":
							echo "Avril";
							break;
							case "May":
							echo "Mai";
							break;
							case "June":
							echo "Juin";
							break;
							case "July":
							echo "Juillet";
							break;
							case "August":
							echo "Août";
							break;
							case "September":
							echo "Septembre";
							break;
							case "October":
							echo "Octobre";
							break;
							case "November":
							echo "Novembre";
							break;
							case "December":
							echo "Décembre";
							break;
						}
						echo date(" Y",strtotime($_POST['date']));
						?>
					</span>
				</div>
			</div>
		</div>
	</div>

	<div class="wrapper" id="wrapper">
		<div class="left">
			<div id="map"></div>
			<div class="info">
				<span id="duration"></span>
				<span id="distance"></span>
			</div>
		</div>

		<div class="right" id="trajets">

			<?php
			$i=0;
			$requete = "SELECT * FROM trajet WHERE TypeTrajet='Aller' AND isDemande=0 AND DateDepart = '".mysqli_real_escape_string($conn,$_POST['date'])."'";
			$result = mysqli_query($conn,$requete);

			$num_rows = mysqli_num_rows($result);

			while ($row = mysqli_fetch_assoc($result)){
				$idTrajet[$i] = $row['IdTrajet'];
				$i++;

				$idCompte = $row["IdCompte"];

				$hourString1 = substr($row['HeureDepart'],0,2);
				$hourString2 = substr($row['HeureDepart'],3,2);
				$hourStringDeparture = $hourString1."h".$hourString2;


				$hourString3 = substr($row['HeureArrivee'],0,2);
				$hourString4 = substr($row['HeureArrivee'],3,2);
				$hourStringArrival = $hourString3."h".$hourString4;

				$requete2 = "SELECT * FROM compte WHERE IdCompte=$idCompte";
				$result2 = mysqli_query($conn,$requete);
				$row2 = mysqli_fetch_assoc($result2);

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
							<span class="name"><?php echo $row2['Prenom']; echo $row2['Nom']; ?>;</span>
							<div class="available">
								<?php
									$value = $row['PlacesRestantes'];
									if($value == 1) echo $value." place restante";
									else echo $value." places restantes";
								?>
							</div>
						</div>

						<div class="book-container"><a class="book" href="#" class="button">Réserver</a></div>
					</div>
				</div>

				<?php
			}
			?>
		</div>
	</div>

	<script type="text/javascript">

			//******distance between two coordinates******
			function haversine_distance(mk1, mk2) {

		      	var R = 6371; //meters 
		      	var rlat1 = mk1.lat * (Math.PI/180); 
		      	var rlat2 = mk2.lat * (Math.PI/180); 
		      	var difflat = rlat2-rlat1; 
		      	var difflon = (mk2.lng-mk1.lng) * (Math.PI/180);

		      	var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat/2)*Math.sin(difflat/2)+Math.cos(rlat1)*Math.cos(rlat2)*Math.sin(difflon/2)*Math.sin(difflon/2)));
		      	return d;
		    }

			//******Affichage Map + trajet sur map******
			const WerwicqSud = { lat: 50.765011, lng: 3.046145 };

			let trajetsHTML;
			let distanceTrajets;
			let coordonneesTrajets;

			async function initMap(){

				let response = await getDataFromURL();

				//******tri trajet ******
				let trajets = document.getElementById('trajets');
				console.log(trajets);
				trajetsHTML = new Array(trajets.children.length);
				distanceTrajets = new Array(trajets.children.length);
				coordonneesTrajets = new Array(trajets.children.length);

				for (let i = 0; i < trajets.children.length;i++){
					trajetsHTML[i] = trajets.children[i];
				}
				let tmpObj;
				let loopValue = <?php echo $i; ?>;
				<?php

				for ($a = 0; $a < $i ; $a++){

					$requete = "SELECT * FROM trajet WHERE TypeTrajet='Aller' AND isDemande=0 AND IdTrajet = $idTrajet[$a] AND DateDepart = '".mysqli_real_escape_string($conn,$_POST['date'])."'";


					$result = mysqli_query($conn,$requete);
					$row = mysqli_fetch_assoc($result);
					?>

					tmpObj = {lat : <?php echo $row['LatitudeDepart'] ?>, lng: <?php echo $row['LongitudeDepart'] ?>};
					coordonneesTrajets[<?php echo $a; ?>] = tmpObj;
					distanceTrajets[<?php echo $a; ?>] = haversine_distance(tmpObj,queryCoord);
					<?php
				}
				?>

				trajets.innerHTML = "";
				console.log("distance trajet",distanceTrajets);
				console.log("coordonneesTrajets",coordonneesTrajets);

				let min;
				let indexMin;
				let indexOrdre = new Array();

				for(let i = 0 ; i < loopValue;i++){
					min = 1000;

					for (let a = 0; a < loopValue;a++){
						if(distanceTrajets[a] < min) {
							min = distanceTrajets[a];
							indexMin = a;
						}
					}
					indexOrdre.push(indexMin);
					distanceTrajets[indexMin] = 100000;
					trajets.appendChild(trajetsHTML[indexMin]);
				}

				console.log("index ordre",indexOrdre);

				let mapOptions = {
					center : WerwicqSud,
					zoom : 8
				};

				let map = new google.maps.Map(document.getElementById("map"),mapOptions);

				let directionsService = new google.maps.DirectionsService();

				let directionsDisplay = new google.maps.DirectionsRenderer();

				directionsDisplay.setMap(map);

				queryCoord.lng = coordonneesTrajets[indexOrdre[0]].lng;
				queryCoord.lat = coordonneesTrajets[indexOrdre[0]].lat;
				console.log(document.getElementById('trajets'));
				document.getElementById("trajets").children[0].classList.add("active");

				var request = {
					origin : queryCoord,
					destination : WerwicqSud,
					travelMode : google.maps.TravelMode.DRIVING,
					unitSystem : google.maps.UnitSystem.IMPERIAL,
				}

				directionsService.route(request, (result,status) => {
					if (status == "OK"){
						console.log(result.routes[0].legs[0].distance);
						console.log(result.routes[0].legs[0].duration

							);
						console.log(result);

						directionsDisplay.setDirections(result);

						console.log("ça marche");
					}

					else{
						directionsDisplay.setDirections( {routes : []} );
						console.log("ca marche pas ");
					}
				});

				document.getElementById("loader").style.display = "none";
				document.getElementById('wrapper').style.display = "flex";

			//update map on click 
			let node = document.getElementById("trajets").children;
			loopValue = <?php echo $i; ?>;
			for (let i = 0; i < loopValue ; i++){
				node[i].addEventListener('click', () => {
					
					//remove class
					for (let a = 0; a < loopValue ; a++){
						node[a].classList.remove('active');
					}

					//add class
					node[i].classList.add("active");

					console.log(coordonneesTrajets[indexOrdre[i]].lat);
					queryCoord.lat = coordonneesTrajets[indexOrdre[i]].lat;
					queryCoord.lng = coordonneesTrajets[indexOrdre[i]].lng;

					var request = {
						origin : queryCoord,
						destination : WerwicqSud,
						travelMode : google.maps.TravelMode.DRIVING,
						unitSystem : google.maps.UnitSystem.IMPERIAL,
					}

					directionsService.route(request, (result,status) => {
						if (status == "OK"){
							document.getElementById("duration").innerHTML = result.routes[0].legs[0].duration.text;
							document.getElementById("distance").innerHTML = result.routes[0].legs[0].distance.value / 1000 + " km";

							directionsDisplay.setDirections(result);
						}

						else{
							directionsDisplay.setDirections( {routes : []} );
							console.log("Erreur dans l'affichage du trajet ");
						}
					});

				});
			}
		}

		</script>
	</body>
	</html>