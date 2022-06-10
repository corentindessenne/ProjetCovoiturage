<?php
include 'Connexion.php';

$mail=$_SESSION["mail"];
$sql = "SELECT motDePasse FROM compte WHERE Email='".$mail."'" ;
$result = $conn->query($sql);
if ($result->num_rows >  0) {
    // output data of each row
    $row = $result->fetch_assoc();
      $hashedpassword=$row["motDePasse"];
    
  } else {
    ?>
    <script type="text/javascript">
        alert("Une erreur s'est produite réessaye1");
        location="EditPassword.php";
    </script>
<?php
die();
  }
$newpassword=$_POST["password_1"];
  if(password_verify($_POST["password"],$hashedpassword)){
    $newpassword=password_hash($_POST["password_1"],PASSWORD_DEFAULT);
    $request="UPDATE compte SET motDePasse='".$newpassword."' WHERE Email='".$mail."'";
    if($conn->query($request) === TRUE){

            ?>
        <script type="text/javascript">
            alert("Ton mot de passe a bien été modifié");
            location="Profil.php";
        </script>
        <?php
        die();
    } else {
        ?>
        <script type="text/javascript">
            alert("Une erreur s'est produite réessaye");
            location="EditPassword.php";
        </script>
    <?php
  }

  }
  else{
    ?>
    <script type="text/javascript">
        alert("Mot de passe incorrect");
        location="EditPassword.php";
    </script>
<?php
  }
?>