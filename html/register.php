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
    <?php include 'NavBar.php';?>

  
	<div class="container">
    <h1>Inscription</h1>
  </div>

  <form method="post" action="registerAction.php">
    <div class="input-group">
      <label>Nom</label>
      <input type="text" required="required" name="nom" placeholder="Mets ton nom içi">
    </div>
    <div class="input-group">
      <label>Prénom</label>
      <input type="text" required="required" name="prenom" placeholder="Mets ton prénom içi">
    </div>
  	<div class="input-group">
  	  <label>Email </label>
  	  <input type="email" required="required" name="email" placeholder="Email">
  	</div>
    <div class="input-group">
      <label>Numéro de téléphone</label>
  <input id="phone" type="tel"name="phone" required="required" />
      <script>
          const phoneInputField = document.querySelector("#phone");
          const phoneInput = window.intlTelInput(phoneInputField, {
          preferredCountries: ["fr","be"],
          utilsScript:
             "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
          });
      </script>
    </div>
    <?php if(isset($_POST["VerifAdmin"])){
      ?>
      <input type="hidden" name="VerifAdmin" value="<?php echo $_POST["VerifAdmin"]; ?>">
      <?php
    } ?>
    
  	<div class="input-group">
  	  <label>Mot de passe</label>
      <input type="password" required="required" placeholder="Mot de passe" name="password_1" id="password_1" pattern="(?=.*\d)(?=.*[\W_])(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Ton mot de passe doit contenir au moins 8 charactères dont 1 minuscule 1 majuscule 1 chiffre et 1 caractère spécial" onkeyup='check();'>
  	</div>
  	   <div class="input-group">
  	     <label>Confirmer votre mot de passe</label>
  	     <input type="password" required="required"  placeholder="Mot de passe" id="password_2" name="password_2" onkeyup='check();'>
         <br/>
         <span id='message'></span>
  	   </div>

       <script>
      var check = function() {
        if (document.getElementById('password_1').value ==
          document.getElementById('password_2').value) {
          document.getElementById('message').style.color = 'green';
          document.getElementById('message').innerHTML = 'Les mots de passe sont identiques';
          document.getElementById('submit').disabled = false;
        } else {
          document.getElementById('message').style.color = 'red';
          document.getElementById('message').innerHTML = 'Le mot de passe de confirmation doit etre le même que celui au-dessus';
          document.getElementById('submit').disabled = true;
        }
      }

    </script>

       <div class="input-group">
         <label>Description (facultatif):</label>
         <textarea name="Description" id="Description" placeholder="Écris içi la description de ton trajet" rows="8" cols="65"></textarea>
       </div>

      <div class="checkboxes">
        <input type="checkbox" required="required" id="conduti" value="conduti" name="conduti">
        <label>J'accepte les <a href="https://www.lesbriquesrouges.fr/reglement.pdf" target="_blank">conditions générales d'utilisation</a></label>
       
      </div>
  	   
  	   <button type="submit" class="btn" name="reg_user" id="submit">S'inscrire</button>
  	   </div>
  	 <p>
  		Déjà inscrit ? <a href="login.php">Connectez-vous</a>
  	 </p>
    </form>
  </body>
</html>