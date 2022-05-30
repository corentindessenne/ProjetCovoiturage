const WerwicqSud = { lat: 50.765011, lng: 3.046145 };

async function initMap(){
	
	let response = await getDataFromURL();

	let mapOptions = {
		center : WerwicqSud,
		zoom : 8
	};


	let map = new google.maps.Map(document.getElementById("map"),mapOptions);

	console.log("fin affichage map");
}

initMap().then( (response) => {

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
			console.log("distance" + result.routes[0].legs[0].distance);
			console.log("temps " + result.routes[0].legs[0].time);
			console.log(result);

			directionsDisplay.setDirections(result);

			console.log("ça marche");
		}

		else{
			directionsDisplay.setDirections( {routes : []} );
			console.log("ca marche pas ");
		}
	});
})

