<?php
include 'Connexion.php';

$mail=$_POST["email"];
$sql = "SELECT motDePasse,Prenom FROM compte WHERE Email='".$mail."'" ;
$result = $conn->query($sql);
if ($result->num_rows >  0) {
    // output data of each row
    $row = $result->fetch_assoc();
      $hashedpassword=$row["motDePasse"];
      $prenom=$row["Prenom"];
      //echo $hashedpassword;
    
  } else {
    ?>
    <script type="text/javascript">
        alert("Cette adresse mail n'est liee a aucun compte");
        location="Login.php";
    </script>
<?php
  }

  if(password_verify($_POST["password"],$hashedpassword)){
    $_SESSION["mail"]= $mail;
    $_SESSION["Pseudo"]=$prenom;

    ?>
    <script type="text/javascript">
        location="home.php";
    </script>
<?php
  }
  else{
    ?>
    <script type="text/javascript">
        alert("Mot de passe incorrect");
        location="Login.php";
    </script>
<?php
  }
?>