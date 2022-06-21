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
   <!--Favicon-->
	<link rel="icon" href="../images/LBR Ressources/intiniales.png" type="images/png"/> 
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
     <!--Library-->
  <script src="https://code.jquery.com/jquery-1.6.4.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
    <h1>Modification des informations de ton profil</h1>
  </div>

  <?php
if(isset($_GET["id"])&& (isset($_SESSION['login']) && $_SESSION['login'] != '') && $_SESSION["role"] == 1){
	$idCompte=$_GET["id"];
	$sql = "SELECT * FROM compte WHERE IdCompte='".$idCompte."'" ;
}
else{
	$mail=$_SESSION["mail"];
	$sql = "SELECT * FROM compte WHERE Email='".$mail."'" ;
}
  $result = $conn->query($sql);
  if ($result->num_rows >  0) {
      // output data of each row
      $row = $result->fetch_assoc();
        $mail=$row["Email"];
        $nom=$row["Nom"];
        $prenom=$row["Prenom"];
        $phone=$row["telephone"];
        $description=$row["Description"];
        $idCompte=$row["IdCompte"];
  }
     ?>

  <form method="post" action="EditProfilAction.php">
    <div class="input-group">
      <label>Nom</label>
      <input type="text" required="required" name="nom" value=<?php echo $nom;?> >
    </div>
    <div class="input-group">
      <label>Prénom</label>
      <input type="text" required="required" name="prenom" value=<?php echo $prenom; ?>>
    </div>
  	<div class="input-group">
  	  <label>Email </label>
  	  <input type="email" required="required" name="email" value="<?php echo $mail; ?>">
  	</div>
    <div class="input-group">
      <label>Numéro de téléphone</label>
  <input id="phone" type="tel"name="phone" required="required" value=<?php echo "0".$phone; ?> />
      <script>
          const phoneInputField = document.querySelector("#phone");
          const phoneInput = window.intlTelInput(phoneInputField, {
          preferredCountries: ["fr","be"],
          utilsScript:
             "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
          });
      </script>
    </div>
          <input type="hidden" name="IdCompte" value="<?php echo $idCompte; ?>">

       <div class="input-group">
         <label>Description (facultatif):</label>
         <textarea name="Description" id="Description" rows="8" cols="65"> <?php echo $description; ?></textarea>
       </div>

       <div class="input-group">
        <?php  if((isset($_SESSION['login']) && $_SESSION['login'] != '') && $_SESSION["role"] != 1){?>
  	        <label>Rentre ton mot de passe actuel</label>
            <input type="password" required="required" placeholder="Mot de passe" name="password_1" id="password_1" pattern="(?=.*\d)(?=.*[\W_])(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Ton mot de passe doit contenir au moins 8 charactères dont 1 minuscule 1 majuscule et 1 caractère spécial">
        <?php } ?>
            </div>
  	   
  	   <button type="submit" class="btn" name="reg_user" id="submit">Modifier mes informations</button>
  	   </div>
    </form>
    <script>
  var $limitNum = 255;
$('textarea[name="Description"]').keydown(function() {
    var $this = $(this);

    if ($this.val().length > $limitNum) {
        $this.val($this.val().substring(0, $limitNum));
    }
});
</script>
  </body>
</html>