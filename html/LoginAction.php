<?php
include('Connexion.php');

$mail = $_POST["email"];

$sql = "SELECT motDePasse, Prenom, isAdmin, isVerif FROM compte WHERE Email = '$mail'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_array($result);

    $hashedpassword = $row["motDePasse"];
    $prenom = $row["Prenom"];
    $role = $row["isAdmin"];
}

if (password_verify($_POST["password"], $hashedpassword) && $row['isVerif'] == 1) {
    $_SESSION["mail"] = $mail;
    $_SESSION["Pseudo"] = $prenom;
    $_SESSION["role"] = $role;
    $_SESSION["login"] = "1";
    header("Location: home.php");

} else if (password_verify($_POST["password"], $hashedpassword) && !$row['isVerif']) {
    ?>
    <script type="text/javascript">
        alert("Il semble que tu n'as pas encore confirmé ton adresse mail. Vérifie ta boîte mail, tu as du recevoir un lien de confirmation.");
        document.location.href = "../html/Login.php";
    </script>
    <?php
} else {
    ?>
    <script type="text/javascript">
        alert("Email ou mot de passe incorrect");
        document.location.href = "../html/Login.php";
    </script>
    <?php
}
?>