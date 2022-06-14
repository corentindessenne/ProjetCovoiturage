<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LBR Covoiturage</title>
	<link rel="stylesheet" type="text/css" href="../css/register.css">
	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<!--Tel Display-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
	<!--Google Fonts-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body>

<div class="dwich">

<div class="main">
	<div class="logo"><img src="../images/LBR Ressources/logo.png"></div>
	<div class="title">
		<span>Créer un compte</span>
	</div>

	<div class="container">
		<!-- Form -->
		<form method="post" action="registerAction.php">
		<?php if(isset($_POST["VerifAdmin"])){
		?>
		<input type="hidden" name="VerifAdmin" value="<?php echo $_POST["VerifAdmin"]; ?>">
		<?php } ?>
			<div class="input-group">
				<div class="item">
					<label>Nom</label>
					<input type="text" required="required" name="nom">
				</div>
				
				<div class="item">
					<label>Prénom</label>
					<input type="text" required="required" name="prenom">
				</div>
			</div>

			<div class="input-group">
				<div class="item long">
					<label>Email </label>
					<input type="email" required="required" name="email">
				</div>
			</div>

			<div class="input-group">
				<div class="item phone">
					<input id="phone" type="tel"name="phone" required="required" placeholder="" />
				</div>
			</div>


			<div class="input-group">
				<div class="item">
					<label>Mot de passe</label>
					<input type="password" required="required" name="password_1" id="password_1" pattern="(?=.*\d)(?=.*[\W_])(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Ton mot de passe doit contenir au moins 8 charactères dont 1 minuscule 1 majuscule et 1 caractère spécial" onkeyup='check();'>
				</div>

				<div class="item">
					<label>Confirmation</label>
					<input type="password" required="required"  placeholder="" id="password_2" name="password_2" onkeyup='check();'>
					<br/>
					<span id='message'></span>
				</div>	
			</div>

			<div class="input-group">
				<div class="item">
					<?php if(isset($_POST["VerifAdmin"])){ ?>
				      		<input type="hidden" name="VerifAdmin" value="<?php echo $_POST["VerifAdmin"]; ?>">
				      <?php } ?>
				</div>
			</div>

			<div class="checkboxes">
				<input type="checkbox" required="required" id="conduti" value="conduti" name="conduti">
				<label>J'accepte les <a href="https://www.lesbriquesrouges.fr/reglement.pdf" target="_blank">conditions générales d'utilisation</a></label>
			</div>

			<button type="submit" class="btn" name="reg_user" id="submit">S'inscrire</button>

			<p>Déjà inscrit ? <a href="login.php">Connectez-vous</a></p>
		</form>

		<!-- Illustration -->
		<div class="img-container">
			<img src="../images/illustration-covoiturage.jpg">
			<p class="title-text">Déjà 400 inscrits</p>
			<p class="subtitle">Rejoins Nous !</p>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
	
	let item = document.getElementsByClassName('item');

	for(let i = 0 ; i < item.length	; i++){
		item[i].addEventListener('focusin', () => {
			if(i != 3 && i != 6){
				item[i].children[0].classList.add("upper");
				item[i].children[1].classList.add("upperInput");
			}
		});

		item[i].addEventListener('focusout', () =>{
			if(i != 3 && i != 6){
				if(item[i].children[1].value == ""){
					item[i].children[0].classList.remove("upper");
					item[i].children[1].classList.remove("upperInput");
				}
			}
		});
	}
	
</script>

<script>
	var check = function() {
		if (document.getElementById('password_1').value ==
			document.getElementById('password_2').value) {
			document.getElementById('message').style.color = 'green';
		document.getElementById('message').innerHTML = 'Les mots de passe sont identiques';
		document.getElementById('submit').disabled = false;
	} 
	else {
		document.getElementById('message').style.color = 'red';
		document.getElementById('message').innerHTML = 'Le mot de passe de confirmation doit etre le même que celui au-dessus';
		document.getElementById('submit').disabled = true;
	}
}

</script>


<script type="text/javascript">
	const phoneInputField = document.querySelector("#phone");
	const phoneInput = window.intlTelInput(phoneInputField, {
		preferredCountries: ["fr","be"],
		utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
	});
</script>

</body>
</html>