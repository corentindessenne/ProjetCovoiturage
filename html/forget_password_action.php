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
        $link = "<a href='localhost/Plateforme covoiturage/html/reset_password.php?key=".$email."&token=".$token."'>Clique ici pour réinitialiser ton mot de passe</a>";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $dest = $email;
        $sujet = "Réinitialise ton mot de passe";
        $corp = "Clique sur ce lien pour réinitialiser ton mot de passe : \n".$link;
        $headers .= "From:Les Briques Rouges<cocodsn2@gmail.com>";

        if(mail($dest, $sujet, $corp, $headers)){
            echo "<script type='text/javascript'>alert('On t\'a envoyé un mail contenant un lien qui te permet de réinitialiser ton mot de passe.');</script>";
            ?>
            <script>document.location.href='../html/home.php';</script>
        <?php
        }
        else{
            echo "<script type='text/javascript'>alert('Le mail ne s\'est pas envoyé');</script>";
            ?>
            <script>document.location.href='../html/home.php';</script>
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