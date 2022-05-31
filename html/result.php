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

		let queryCoord = {lat : 0, lng : 0};

		document.getElementByClassName('wrapper').style.display = 'none';


		function getDataFromURL(){
			return new Promise((resolve) =>{

				$.getJSON('http://api.positionstack.com/v1/forward?access_key=3afeb3b8f8e21edd8aa31037edcdc1b6&query=' + query, function(data) {

				  	queryCoord.lat = data.data[0].latitude;
				  	queryCoord.lng = data.data[0].longitude;

				  	console.log(queryCoord);

					});

				setTimeout(() => {

					resolve("true");
				},2000);

			})
		}

	</script>

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

	<div id="loader">
		<div class="dot"></div>
		<div class="dot"></div>
		<div class="dot"></div>
	</div>

	<div class="search">
		<div class="searchBar"></div>
	</div>

	<div class="wrapper">
		<div class="left">
			<div class="sortBy">
				
			</div>

			<div id="map">
				
			</div>
		</div>

		<div class="right">


			<div class="item">
				<div class="title">
					<span class="place">Départ</span>
					<img src="../images/icon/right-arrow 2.png">
					<span class="place">Arrivée</span>
				</div>

				<div class="adresse">
					<span class="place">X rue EAZOEAZY</span>
					<img src="../images/icon/right-arrow 2.png">
					<span class="place">X rue EAZOEAZY</span>
				</div>


			</div>

			<div class="item">
				<div class="title">
					<span class="place">Départ</span>
					<img src="../images/icon/right-arrow 2.png">
					<span class="place">Arrivée</span>
				</div>


			</div>

			<div class="item">
				<div class="title">
					<span class="place">Départ</span>
					<img src="../images/icon/right-arrow 2.png">
					<span class="place">Arrivée</span>
				</div>
			</div>

			<div class="item">
				<div class="title">
					<span class="place">Départ</span>
					<img src="../images/icon/right-arrow 2.png">
					<span class="place">Arrivée</span>
				</div>
			</div>

			<div class="item">
				<div class="title">
					<span class="place">Départ</span>
					<img src="../images/icon/right-arrow 2.png">
					<span class="place">Arrivée</span>
				</div>
			</div>


		</div>
	</div>

	<script type="text/javascript">
		document.getElementById("loader").style.display = "none";
		document.getElementByClassName('wrapper').style.display = "flex";
	</script>

<!--
	<script type="text/javascript">
		const WerwicqSud = { lat: 50.765011, lng: 3.046145 };


		async function test(){
			let response = await getDataFromURL();
			return response;
		}

		test().then( (response) => {
			console.log("ça marche !");
			console.log(response);
		});

		async function initMap(){
			
			let response = await getDataFromURL();

			let mapOptions = {
				center : WerwicqSud,
				zoom : 8
			};


			let map = new google.maps.Map(document.getElementById("map"),mapOptions);

			console.log("fin affichage map");

			console.log(response);
			
			console.log("début affichage trajet");

			let directionsService = new google.maps.DirectionsService();

			let directionsDisplay = new google.maps.DirectionsRenderer();

			directionsDisplay.setMap(map);

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
			document.getElementByClassName('wrapper').style.display = "flex";

		}
		
	</script>

-->
</body>
</html>