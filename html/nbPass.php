<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Réservation</title>
	<!--CSS files-->
	<link rel="stylesheet" type="text/css" href="../css/register.css">
	<link rel="stylesheet" type="text/css" href="../css/reservation.css">
	<!--Favicon-->
	<link rel="icon" href="../images/LBR Ressources/intiniales.png" type="images/png"/> 
</head>
<body>



	<div class="big-bloc">
		<div class="logo"><a href="home.php"><img src="../images/LBR Ressources/logo.png"></a></div>
		<div class="title">
			<span>Veuillez indiquer le nombre de passagers :</span>
		</div>
			<div class="form-item">
				<img class="icon" src="../images/icon/1077114 1.png">
				<input id="nbPlaces" value="1" min="0" step="1" max="7" type="number" name="nbPlaces">
			</div>
		<div class="bloc2">
			<button id="submit" class="button">Valider</button>
		</div>
	</div>


	<script type="text/javascript">
		
		let idTrajet = <?php echo $_GET['idTrajet']; ?>

		document.getElementById('submit').addEventListener("click", ()=>{
			document.location.href = "../html/reservation.php?idTrajet=" + idTrajet + "&nbPassagers=" + document.getElementById('nbPlaces').value;
		});

	</script>


		<script type="text/javascript">
	
			let item = document.getElementsByClassName('bloc');

			for(let i = 0 ; i < item.length	; i++){
				if(i != item.length-1){
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
			}
			
		</script>
</body>
</html>