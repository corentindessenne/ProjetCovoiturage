<?php
include 'Connexion.php';
if(isset($_POST["IdCompte"])&& (isset($_SESSION['login']) && $_SESSION['login'] != '') && $_SESSION["role"] == 1){
	$idCompte=$_POST["IdCompte"];
	$sql = "SELECT motDePasse, Email, IdCompte FROM compte WHERE IdCompte='".$idCompte."'" ;          //Si l'utilisateur est un admninistrateur on récupère les infos du compte a partir de l'id fournit
}
else{
	$mail=$_SESSION["mail"];
	$sql = "SELECT motDePasse, Email, IdCompte FROM compte WHERE Email='".$mail."'" ;       //On récupère les informations de la session sinon
}
$result = $conn->query($sql);
if ($result->num_rows >  0) {
    // output data of each row
    $row = $result->fetch_assoc();
      $hashedpassword=$row["motDePasse"];                                   //on récupère les informations de la base de donnée
      $mail=$row["Email"];
      $idCompte=$row["IdCompte"];
    
  } 
  else {
    ?>
    <script type="text/javascript">
        alert("Une erreur s'est produite réessaye");
        location="EditPassword.php";                                    //on redirige vers la page de changement de mot de passe si la requête a échouée
    </script>
<?php
die();
  }
$newpassword=$_POST["newPassword"];
  if(password_verify($_POST["password"],$hashedpassword)|| $_SESSION["role"]==1){       //on vérifie que l'utilisateur est un administrateur ou que le mot de passe rentré est le bon
    $newpassword=password_hash($_POST["newPassword"],PASSWORD_DEFAULT);                   //On crypte le nouveau mot de passe
    $request="UPDATE compte SET motDePasse='".$newpassword."' WHERE IdCompte='".$idCompte."'";    //on remplace le précédent mot de passe par le nouveau mot de passe crypté
    if($conn->query($request) === TRUE){

            ?>
        <script type="text/javascript">
            alert("Ton mot de passe a bien été modifié");                   //si la requete s'est effectuée avec succès on notifie l'utilisateur et on le renvoie sur son profil
            location="Profil.php";
        </script>
        <?php
        die();
    } else {
        ?>
        <script type="text/javascript">
            alert("Une erreur s'est produite réessaye");                   //sinon on lui notifie l'erreur et on renvoie sur la page de changement de mot de passe
            location="EditPassword.php";
        </script>
    <?php
  }

  }
  else{
    ?>
    <script type="text/javascript">
        alert("Mot de passe incorrect");                            //si l'utilisateur n'est pas un administrateur et que le mot de passe inséré ne correspond pas 
        location="EditPassword.php";                                //on le notifie puis on le redirige vers la page de changement de mot de passe
    </script>
<?php
  }
?>