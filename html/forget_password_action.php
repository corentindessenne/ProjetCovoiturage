<?php
if(isset($_POST["password-reset"]) && $_POST["email"]){
    include("Connexion.php");

    $email = $_POST["email"];
    $result = mysqli_query($conn, "SELECT * FROM compte WHERE Email = '$email'");       //on récupère les informations du compte
    $row = mysqli_fetch_array($result);

    if($row){
        $token = md5($email).rand(10,9999);         //token de changement de mot de passe
        $expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
        $expDate = date("Y-m-d H:i:s", $expFormat);          //date d'expiration du token            
        
        //ajout du token dans la base de donnée
        $update = mysqli_query($conn, "UPDATE compte SET token_reset_password = '$token', expiration_reset_password = '$expDate' WHERE Email = '$email'");
        $link = "<a href='localhost/ProjetCovoiturage/html/reset_password.php?key=".$email."&token=".$token."' target='_blank' style='font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid; display: inline-block;'>Réinitialise ton mot de passe</a>";
        
        include('../mails/header_mails.php');

        //envoi du mail
        $dest = $email;
        $sujet = "Demande de réinitialisation de ton mot de passe";
        $corp = file_get_contents("../mails/template_mail_reset_mot_de_passe.php");
        $corp = str_replace("{{Bouton}}",$link, $corp);

        if(mail($dest, $sujet, $corp, $headers)){
            echo "<script type='text/javascript'>alert('On t\'a envoyé un mail contenant un lien qui te permet de réinitialiser ton mot de passe.');</script>";
            ?>
            <script>document.location.href='../html/home.php';</script>                 <!--On précise à l'utilisateur que le mail s'est envoyé en cas de succès-->
        <?php
        }
        else{
            echo "<script type='text/javascript'>alert('Le mail ne s\'est pas envoyé');</script>";      //on affiche une erreur sinon avant de rediriger vers la page d'oubli de mot de passe
            ?>
            <script>document.location.href='../html/forget_password.php';</script>
            <?php
        }
    }
    else{
        echo "<script type='text/javascript'>alert('Oups, il semble que ton adresse mail n\'est pas valide.');</script>";   //Si l'adresse mail n'existe pas dans la base de donnée 
        ?>                                                                                                                 <!--on prévient l'utilisateur et on le redirige vers la page d'accueil-->
        <script>document.location.href='../html/home.php';</script> 
        <?php
        }
}