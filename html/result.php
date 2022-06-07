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
			<div class="sortBy">
				
			</div>

			<div id="map">
				
			</div>
		</div>

		<div class="right">
			<?php
			$requete = "SELECT * FROM trajet WHERE TypeTrajet='Aller' AND isDemande=0";
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
									$value = $row['NbPassagers'] - $row['NbReservations'];
									if($value == 1) echo $value." place restante";
									else echo $value." places restantes";
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
				document.getElementById('wrapper').style.display = "flex";

			}

		</script>
	</body>
	</html>