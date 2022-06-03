<!DOCTYPE html>
<html>
<head>
    <title>Mon Profil</title>
    <link href="../css/Profil.css" rel="stylesheet" >
</head>

<body>
<?php   
        include 'Connexion.php';
        if (!(isset($_SESSION['login']) && $_SESSION['login'] != '') && $_SESSION["role"] === true) {

        include 'NavBar3.php';

        }
        else if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
            include 'NavBar.php';
        }
        else{
            include 'NavBar2.php';
        }

$mail=$_SESSION["mail"];
$sql = "SELECT Nom,Prenom,telephone,PhotoProfil,Description,IdCompte FROM compte WHERE Email='".$mail."'" ;
$result = $conn->query($sql);
if ($result->num_rows >  0) {
    // output data of each row
    $row = $result->fetch_assoc();
      $nom=$row["Nom"];
      $prenom=$row["Prenom"];
      $idCompte=$row["IdCompte"];
      $phone="0".$row["telephone"];
      $description=$row["Description"];
      $pp=$row["PhotoProfil"];              //pp=Photo de Profil
      
    
  ?>
  <div class="Compte">
    <div class="PhotoDeProfil">
        <img class="profile-picture" src="..\images\PhotoProfil\defaultpp.jpg" alt="Ta PP" width="290" height="290">
        <form action="PPAction.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <input type="submit" name="submit" value="Enregistrer l'image choisie">
        </form>
        
    </div>

    <div class="InfosCompte">
        <p>Nom: <?php echo $nom;?></p>
        <p>Prenom: <?php echo $prenom;?> </p>
        <p>Email: <?php echo $mail;?></p>
        <p>Telephone: <?php echo $phone;?> </p>
        <br/>
        <p>Description: <?php echo $description;?> </p>
        <a href="EditProfil.php"><input type="button" id="EditInfo" name="EditInfo" value="editer les informations de ton compte"></a>
        <a href="EditPassword.php"><input type="button" id="EditPass" name="EditPass" value="Changer ton mot de passe"></a>

    </div>
    
    </div>
    <div id="Historique">
        <h3>Ton historique: </h3>
        <?php
           // $sql = "SELECT Nom,Prenom,telephone,PhotoProfil,Description,IdCompte FROM trajet WHERE IdCompte='".$idCompte."'" ;
            //$result = $conn->query($sql);
        ?>
    </div>

    <div id="DeleteButton">
        <input type="button" id="Delete" name="Delete" value="SUPPRIMER VOTRE COMPTE">
    </div>
<?php
} else {
    ?>
    <script type="text/javascript">
        alert("Cette adresse mail n'est liee a aucun compte");
        location="Login.php";
    </script>
<?php
  }?>

</body>
</html>