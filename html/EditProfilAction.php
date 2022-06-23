<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Edition du profil - LBR Covoiturage</title>
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
        echo "<script type='text/javascript'>alert('Ton numéro de téléphone n\'est pas valide');</script>";
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
            $token = md5($email);

            $path = 'localhost/ProjetCovoiturage/html/verify_email.php?key='. $_POST['email'].'&token='.$token;

            $link = "<a href='localhost/ProjetCovoiturage/html/verify_email.php?key=" . $_POST['email'] . "&token=" . $token . "' target='_blank' style='font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #000000; display: inline-block;'>Confirme ton compte</a>";
            $lienBrut = "<a href='localhost/ProjetCovoiturage/html/verify_email.php?key=" . $_POST['email'] . "&token=" . $token . "' target='_blank' style='color: #FFA73B;'>".$path."</a>";

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From:Les Briques Rouges<cocodsn2@gmail.com>";

            $dest = $email;
            $sujet = "Confirme ta nouvelle adresse mail !";
            $corp = file_get_contents("../mails/template_mail_confirmation_mail.php");

            $variables = array(
                "{{Prenom}}" => $prenom,
                "{{Bouton}}" => $link,
                "{{Lien}}" => $lienBrut
            );

            foreach ($variables as $key => $value) {
                $corp = str_replace($key, $value, $corp);
            }

            if(mail($dest, $sujet, $corp, $headers)){
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
                    alert("Oups. Il semble que le mail ne se soit pas envoyé. Réessaye à nouveau");
                    location = "logout.php";
                </script>
                <?php
            }
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