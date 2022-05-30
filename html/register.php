<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LBR Covoiturage</title>
  <link rel="stylesheet" type="text/css" href="../css/register.css">
  <link rel="stylesheet" type="text/css" href="../css/nav.css">
   <link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
   />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  <!--Google Fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
  <body>
    <nav>
      <div class="logo">
        <a href="home.php"><img src="../images/LBR Ressources/logoLONGUEURClassic.png"></a>
      </div>

    <ul class="menu">
      <li class="menu-item"><a href="">Les trajets</a></li>
      <li class="menu-item connect "><a href="register.php">S'inscrire</a></li>
      <li class="menu-item connect"><a href="login.php">Se connecter</a></li>
    </ul>
  </nav>

  
	<div class="container">
    <h1>Inscription</h1>
  </div>

  <form method="post" action="register.php">
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
  	</div>
    <div class="input-group">
      <label>Numéro de téléphone</label>
  <input id="phone" type="tel"name="phone" />
      <script>
          const phoneInputField = document.querySelector("#phone");
          const phoneInput = window.intlTelInput(phoneInputField, {
          preferredCountries: ["fr","be"],
          utilsScript:
             "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
          });
      </script>
    </div>
  	<div class="input-group">
  	  <label>Mot de passe</label>
  	  <input type="password" placeholder="Mot de passe" name="password_1">
  	</div>
  	   <div class="input-group">
  	     <label>Confirmer votre mot de passe</label>
  	     <input type="password" placeholder="Mot de passe" name="password_2">
  	   </div>
  	   <div class="input-group">
  	   <button type="submit" class="btn" name="reg_user">S'inscrire</button>
  	   </div>
  	 <p>
  		Déjà inscrit ? <a href="login.php">Connectez-vous</a>
  	 </p>
    </form>
  </body>
</html>