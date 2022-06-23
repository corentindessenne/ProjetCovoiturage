<!DOCTYPE html>
<html>
<head>
    <title>Action Ajout</title>
</head>
<body>

    <?php
    include 'Connexion.php';

    $idCompte = $_POST['IdCompte'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];
    $description= str_replace("'","''",$description);

    //Recup ancien e mail
    $requete = "SELECT * FROM compte WHERE IdCompte = '$idCompte'";
    $result = mysqli_query($conn,$requete);
    $row = mysqli_fetch_assoc($result);
    $previousEmail = $row['Email'];

    //check si l'e mail est déjà utilisé
    $requete = "SELECT * FROM compte WHERE Email = '$email' ";
    $result = mysqli_query($conn,$requete);
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0 && $previousEmail != $email){
      echo "<script type='text/javascript'>alert('Ton adresse E-mail est déjà utilisée par un autre compte');</script>";
        ?><script>document.location.href='../html/profil.php';</script><?php
    }
    if(strlen($phone) != 10){
        echo "<script type='text/javascript'>alert('Ton numéro de téléphone n'est pas valide');</script>";
        ?><script>document.location.href='../html/profil.php';</script><?php
    }

    //cas où l'email change (revalidation e mail)
    $requete = "SELECT * FROM compte WHERE IdCompte = '$idCompte' ";
    $result = mysqli_query($conn,$requete);
    $row = mysqli_fetch_assoc($result);

    $verifyEmail = 0;
    if($email != $row['Email']){
        $verifyEmail = 1;
    }

    $sql = "UPDATE compte SET Nom ='$nom', Prenom='$prenom',telephone= '$phone',Email = '$email' ,Description='$description' WHERE IdCompte='$idCompte' ";

    if ($conn->query($sql) === TRUE) {

        if($verifyEmail == 1){
            ?>

            <script type="text/javascript">
              alert("Vérifie ta nouvelle adresse mail à l'aide du mail que l'on vient de t'envoyer");
              location="logout.php";
            </script>
            <?php
        }
        else{
            ?>
            <script type="text/javascript">
              alert("Les informations de ton compte ont bien été modifiées");
              location="Profil.php";
            </script>
            <?php

        }
    }

?>
</body>
</html>