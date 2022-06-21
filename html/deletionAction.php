<?php
include('Connexion.php');

$mail = $_SESSION["mail"];

$sql = "SELECT motDePasse,IdCompte FROM compte WHERE Email='" . $mail . "'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($result);
    $hashedPassword = $row["motDePasse"];
    $idCompte = $row["IdCompte"];
} else {
    ?>
    <script type="text/javascript">
        alert("Une erreur inattendue s'est produite. Réessaye plus tard");
        location = "home.php";
    </script>
    <?php
    die();

}

if (password_verify($_POST["password_1"], $hashedPassword)) {

    $sql = "DELETE FROM compte WHERE Email='$mail'";
    if ($conn->query($sql) === TRUE) {
        $sql = "DELETE FROM trajet WHERE IdCompte = '$idCompte'";
        if ($conn->query($sql) === TRUE) {
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From:Les Briques Rouges<cocodsn2@gmail.com>";

            $dest = $mail;
            $sujet = "Confirmation de suppression de ton compte";
            $corp = file_get_contents("../mails/template_mail_suppression_compte.php");
            $corp = str_replace("{{Prenom}}", $_SESSION['Pseudo'], $corp);

            if (mail($dest, $sujet, $corp, $headers)) {
                ?>
                <script type="text/javascript">
                    alert("Ton compte a bien été supprimé");
                </script>
                <?php session_destroy(); ?>
                <script>
                    document.location.href = "home.php";
                </script>
                <?php
            } else {
                echo "<script type='text/javascript'>alert('Oups. Il semble qu\'il y a une erreur. Réessaye plus tard');</script>";
                ?>
                <script>document.location.href = '../html/home.php';</script>
                <?php
            }
            ?>
            <?php
            die();
        } else {

            ?>
            <script type="text/javascript">
                alert("Une erreur inattendue s'est produite. Réessaye plus tard.");
                location = "home.php";
            </script>
            <?php
            die();
        }
    }
} else {
    ?>
    <script type="text/javascript">
        alert("Mot de passe incorrect");
        location = "Profil.php";
    </script>
    <?php
    die();
}
?>
  