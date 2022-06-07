<?php
include 'Connexion.php';

$mail=$_SESSION["mail"];
$sql = "SELECT motDePasse,IdCompte FROM compte WHERE Email='".$mail."'" ;
$result = $conn->query($sql);
if ($result->num_rows >  0) {
    // output data of each row
    $row = $result->fetch_assoc();
      $hashedpassword=$row["motDePasse"];
      $idcompte=$row["IdCompte"];
      //echo $hashedpassword;
  }
  else{
    ?>
            <script type="text/javascript">
                alert("Une erreur inatendue c'est produite réessaye plus tard");
                location="home.php";
            </script>
          <?php
          die();
  }

if(password_verify($_POST["password_1"],$hashedpassword)){
    
    $sql = "DELETE FROM compte WHERE Email='".$mail."'" ;
    if ($conn->query($sql) === TRUE) {
        $sql = "DELETE FROM trajet WHERE IdCompte='".$idcompte."'" ;
        if ($conn->query($sql) === TRUE) {
            
            session_destroy();
            ?>
            <script type="text/javascript">
                alert("Ton compte a bien été supprimé");
                location="home.php";
            </script>
            <?php
            die();
        } else {

                ?>
                <script type="text/javascript">
                    alert("Une erreur inatendue c'est produite réessaye plus tard 2");
                    location="home.php";
                </script>
            <?php
            die();
            }
    }
}
  else{
        ?>
        <script type="text/javascript">
            alert("Mot de passe incorrect");
            location="Profil.php";
        </script>
    <?php
    die();
  }
  ?>
  