<?php
include('Connexion.php');

$mail = $_POST["email"];

$sql = "SELECT motDePasse, Prenom, isAdmin, isVerif FROM compte WHERE Email = '$mail'";
$result = mysqli_query($conn, $sql);            //On récupère les informations nécessaires de la base de donnée

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_array($result);

    $hashedpassword = $row["motDePasse"];
    $prenom = $row["Prenom"];
    $role = $row["isAdmin"];
}

if (password_verify($_POST["password"], $hashedpassword) && $row['isVerif'] == 1) {
    $_SESSION["mail"] = $mail;          //Si l'utilisateur a déjà vérifié son mail et que le mot de passe correspond a celui de la base de donnée
    $_SESSION["Pseudo"] = $prenom;      //on créer les variables de session en fonction des informations puis on redirige vers la page d'acceuil
    $_SESSION["role"] = $role;
    $_SESSION["login"] = "1";
    header("Location: home.php");

} else if (password_verify($_POST["password"], $hashedpassword) && !$row['isVerif']) {
    ?>  <!--Si le mot de passe est correct mais que l'utilisateur n'as pas  vérifié son adresse mail, on lui demande de le faire-->
    <script type="text/javascript">     
        alert("Il semble que tu n'as pas encore confirmé ton adresse mail. Vérifie ta boîte mail, tu as du recevoir un lien de confirmation.");
        document.location.href = "../html/Login.php";
    </script>
    <?php
} else {
    ?>
    <!--Si le mot de passe fournit ne correspond pas à celui de la base de donnée alors l'utilisateur a du se tromper de mot de passe ou d'adresse mail-->
    <!--On notifie donc l'utilisateur de l'erreur et on redirige vers la page d'acceuil-->
    <script type="text/javascript">
        alert("Email ou mot de passe incorrect");
        document.location.href = "../html/Login.php";
    </script>
    <?php
}
?>