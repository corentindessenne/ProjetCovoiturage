<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LBR Covoiturage</title>
  <!--CSS files and Library-->
  <link rel="stylesheet" type="text/css" href="../css/modifPass.css">
  <link rel="stylesheet" type="text/css" href="../css/nav.css">
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
  />
  <!--Favicon-->
  <link rel="icon" href="../images/LBR Ressources/intiniales.png" type="images/png"/> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  <!--Google Fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>
  <?php 
  include 'Connexion.php';                                    //on se connecte a la base de donnée et on active les sessions

  include 'NavbarConn.php';                                   //on ajoute la navbar
  if(!isset($_SESSION["login"]) || $_SESSION["login"] == 0){
    header("location:Login.php");
}
  ?>

  <div class="bloc">
    <div class="main">
      <h1>Modification de ton mot de passe</h1>
      <div class="container">
                 <form action="EditPasswordAction.php" method="post">
                  <input type="hidden" name="email" value="<?php echo $email ?>">       <!--On récupère le mail et un token pour le fichier action-->
                  <input type="hidden" name="token" value="<?php echo $token ?>">
                  <div class="input-group">
                    <div class="item">
                        <?php if((!isset($_SESSION["role"]) || $_SESSION["role"] != 1) ){ ?> <label>Mot de passe actuel</label>       <!--Si l'utilisateur est un administrateur il n'as pas beosoin de rentrer le mot de passe afin de pouvoir changer le mot de passe d'autre compte-->
                        <input type="password" required="required" placeholder="" name="password" id="password" pattern="(?=.*\d)(?=.*[\W_])(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Ton mot de passe doit contenir au moins 8 charactères dont 1 minuscule 1 majuscule et 1 caractère spécial">
                      <?php } ?>
                    </div>
                    <div class="item">
                      <label>Mot de passe</label>
                      <input type="password" required="required" name="newPassword" id="password_1" pattern="(?=.*\d)(?=.*[\W_])(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Ton mot de passe doit contenir au moins 8 caractères, dont au moins 1 minuscule, 1 majuscule et 1 caractère spécial" onkeyup='check();'>
                    </div> 
                    <div class="item">                <!--Nouveau mot de passe a taper 2 fois pour vérifier que l'utilisateur n'as pas fait de faute de frappe-->
                      <label>Confirmation</label>
                      <input type="password" required placeholder="" id="password_2" name="confirmPassword" onkeyup='check();'>
                    </div> 
                  </div>
                      <span id='message'></span>
                  </br>
              <span id='message2'></span>
                  <?php if(isset($_GET["id"]) && $_SESSION["role"]==1){  ?>
                      <input type="hidden" name="IdCompte" value="<?php echo $_GET["id"]; ?>">      <!--On récupère l'id du compte cible pour ne pas avoir de problème si l'utilisateur est un administrateur qui modifie le mot de passe d'un autre-->
                    <?php } ?>

                    <button type="submit" class="btn" name="reg_user" id="submit">Modifier mon mot de passe</button>
               </form>
          </div>
      </div>
  </div>




<script>
  let check = function() {
    if (document.getElementById('password_1').value ==
      document.getElementById('password_2').value) {
      document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Les mots de passe sont identiques';
    document.getElementById('submit').disabled = false;                                  //Si le nouveau mot de passe est le meme que celui de confirmation on autorise l'envoi du formulaire
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Le mot de passe de confirmation doit etre le même que celui au-dessus';
    document.getElementById('submit').disabled = true;                                    //Sinon on bloque l'envoie jusqu'à ce que les mot de passe soient identiques
  }

  if(document.getElementById('password_1').value ==
    document.getElementById('password').value){
    document.getElementById('message2').style.color = 'red';
  document.getElementById('message2').innerHTML = 'Ton nouveau mot de passe ne doit pas etre identique au précédent';
  document.getElementById('submit').disabled = true;                              //Si le nouveau mot de passe est le meme que le précédent on bloque l'envoi du formulaire

}
else{
  document.getElementById('message2').innerHTML = '';
  document.getElementById('submit').disabled = false;                             //On l'autorise sinon
}

}
</script>

<script type="text/javascript">

    let item = document.getElementsByClassName('item');

    for(let i = 0 ; i < item.length ; i++){
        item[i].addEventListener('focusin', () => {
            if(i !== 3 && i !== 6){
                item[i].children[0].classList.add("upper");
                item[i].children[1].classList.add("upperInput");
            }
        });

        item[i].addEventListener('focusout', () =>{                                             //Style des input en js
            if(i !== 3 && i !== 6){
                if(item[i].children[1].value === ""){
                    item[i].children[0].classList.remove("upper");
                    item[i].children[1].classList.remove("upperInput");
                }
            }
        });
    }

</script>

</body>
</html>