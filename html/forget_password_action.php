<?php
if(isset($_POST["password-reset"]) && $_POST["email"]){
    include("Connexion.php");

    $email = $_POST["email"];
    $result = mysqli_query($conn, "SELECT * FROM compte WHERE Email = '$email'");
    $row = mysqli_fetch_array($result);

    if($row){
        $token = md5($email).rand(10,9999);
        $expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
        $expDate = date("Y-m-d H:i:s", $expFormat);

        $update = mysqli_query($conn, "UPDATE compte SET token_reset_password = '$token', expiration_reset_password = '$expDate' WHERE Email = '$email'");
        $link = "<a href='localhost/ProjetCovoiturage/html/reset_password.php?key=".$email."&token=".$token."' target='_blank' style='font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid; display: inline-block;'>Réinitialise ton mot de passe</a>";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From:Les Briques Rouges<cocodsn2@gmail.com>";

        $dest = $email;
        $sujet = "Demande de réinitialisation de ton mot de passe";
        $corp = file_get_contents("../mails/template_mail_reset_mot_de_passe.php");
        $corp = str_replace("{{Bouton}}",$link, $corp);

        if(mail($dest, $sujet, $corp, $headers)){
            echo "<script type='text/javascript'>alert('On t\'a envoyé un mail contenant un lien qui te permet de réinitialiser ton mot de passe.');</script>";
            ?>
            <script>document.location.href='../html/home.php';</script>
        <?php
        }
        else{
            echo "<script type='text/javascript'>alert('Le mail ne s\'est pas envoyé');</script>";
            ?>
            <script>document.location.href='../html/forget_password.php';</script>
            <?php
        }
    }
    else{
        echo "<script type='text/javascript'>alert('Oups, il semble que ton adresse mail n\'est pas valide.');</script>";
        ?>
        <script>document.location.href='../html/home.php';</script>
        <?php
        }
}