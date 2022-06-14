<!DOCTYPE html>
<html>
<head>
    <title>Action Ajout</title>
</head>

<body>

<h1>Ca marche pas</h1>

<?php
include 'Connexion.php';
$id=$_POST["IdCompte"];
$sql = "SELECT motDePasse, Email FROM compte WHERE IdCompte='".$id."'" ;
    $result = $conn->query($sql);
    if ($result->num_rows >  0) {
      // output data of each row
      $row = $result->fetch_assoc();
      $prevMail=$row["Email"];
        $hashedpassword=$row["motDePasse"];
    }
    else{?>
        <script type="text/javascript">
            alert("Une erreur est survenue réessaie plus tard");
            location="EditProfil.php";
        </script>
          <?php
      die();
      
    }
    
if(password_verify($_POST["password_1"],$hashedpassword) ||(isset($_SESSION['login']) && $_SESSION['login'] != '') && $_SESSION["role"] == 1){
    $description=$_POST["Description"];
    $description= str_replace("'","''",$_POST["Description"]);
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $mail=$_POST["email"];
    $phone=$_POST["phone"];
    
    $sql = "SELECT Email FROM compte" ;
    $result = $conn->query($sql);
    if ($result->num_rows >  0) {
      // output data of each row
      while ($row = mysqli_fetch_assoc($result)){
          if($row["Email"]==$mail && $mail!=$prevMail){
            ?>
            <script type="text/javascript">
                alert("Cette adresse mail est déjà utilisée");
                location="EditProfil.php";
            </script>
              <?php
          die();
          }
      }
    }
    else{?>
        <script type="text/javascript">
            alert("Une erreur est survenue réessaie plus tard");
            location="EditProfil.php";
        </script>
          <?php
      die();
    }

if($mail==$_SESSION["mail"]){
  $request="UPDATE compte SET Nom='".$nom."', Prenom='".$prenom."',telephone= '".$phone."', Description='".$_POST["Description"]."' WHERE IdCompte=".$id."";
}
else{
  $request="UPDATE compte SET Nom='".$nom."', Prenom='".$prenom."',Email='".$mail."',telephone= '".$phone."', Description='".$_POST["Description"]."' WHERE IdCompte=".$id."";
}
    
    if ($conn->query($request) === TRUE) {
        $_SESSION["mail"]=$mail;
        $_SESSION["Pseudo"]=$prenom;
      ?>
      <script type="text/javascript">
          alert("Les informations de ton compte ont bien été modifiées");
          location="Profil.php";
      </script>
    <?php
    die();
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
}
else{
    ?>
      <script type="text/javascript">
          alert("Mot de passe Incorrect");
          location="EditProfil.php";
      </script>
        <?php
    die();
    
}


?>
</body>
</html>