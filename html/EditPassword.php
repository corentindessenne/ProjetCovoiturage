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
    <?php 
          include 'Connexion.php';

          include 'NavbarConn.php';
          if(!isset($_SESSION['login']) && $_SESSION['login'] != ''){
            header("Location:home.php");
            
          }
    ?>

  
	<div class="container">
    <h1>Modification de ton mot de passe</h1>
  </div>


  <form method="post" action="EditPasswordAction.php">
  <div class="input-group">
  	      <?php if((!isset($_SESSION["role"]) || $_SESSION["role"] != 1) ){ ?> <label>Rentre ton mot de passe actuel</label>
            <input type="password" required="required" placeholder="Mot de passe" name="password" id="password" pattern="(?=.*\d)(?=.*[\W_])(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Ton mot de passe doit contenir au moins 8 charactères dont 1 minuscule 1 majuscule et 1 caractère spécial" onkeyup='check();'>
          <?php } ?>
          </div>
  <div class="input-group">
  	  <label>Rentre ton nouveau mot de passe</label>
      <input type="password" required="required" placeholder="Mot de passe" name="password_1" id="password_1" pattern="(?=.*\d)(?=.*[\W_])(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Ton mot de passe doit contenir au moins 8 charactères dont 1 minuscule 1 majuscule et 1 caractère spécial" onkeyup='check();'>
  	</div>
  	   <div class="input-group">
  	     <label>Confirmes ton nouveau mot de passe</label>
  	     <input type="password" required="required"  placeholder="Mot de passe" id="password_2" name="password_2" onkeyup='check();'>
         <br/>
         <span id='message'></span>
         <br/>
         <span id='message2'></span>
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
      
        if(document.getElementById('password_1').value ==
          document.getElementById('password').value){
          document.getElementById('message2').style.color = 'red';
          document.getElementById('message2').innerHTML = 'Ton nouveau mot de passe ne doit pas etre identique au précédent';
          document.getElementById('submit').disabled = true;

        }
        else{
            document.getElementById('message2').innerHTML = '';
            document.getElementById('submit').disabled = false;
        }
        
      }

    </script>
       
       <?php if(isset($_GET["id"]) && $_SESSION["role"]==1){  ?>
       <input type="hidden" name="IdCompte" value="<?php echo $_GET["id"]; ?>">
        <?php } ?>
  	   
  	   <button type="submit" class="btn" name="reg_user" id="submit">Modifier mon mot de passe</button>
  	   </div>
    </form>
  </body>
</html>