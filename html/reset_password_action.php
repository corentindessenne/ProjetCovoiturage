<?php
if (isset($_POST['newPassword']) && $_POST['token'] && $_POST['email']) {
    include("Connexion.php");

    $email = $_POST['email'];
    $token = $_POST['token'];
    $password = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);     //On cripte le mot de passe

    $query = mysqli_query($conn, "SELECT * FROM compte WHERE token_reset_password = '$token' AND Email = '$email'");
    $row = mysqli_num_rows($query);

    if ($row) {
        if (mysqli_query($conn, "UPDATE compte SET motDePasse = '$password', token_reset_password = NULL, expiration_reset_password = NULL WHERE Email = '$email'")) {
            echo "<script type='text/javascript'>alert('Ton mot de passe a bien été modifié');</script>";
            ?>
            <script>document.location.href = '../html/home.php';</script>
            <?php
        } else {                    //Notification a l'utilisateur du succès ou de l'échec de la requete
            echo "<script type='text/javascript'>alert('Oups. La requête ne s\'est pas exécutée. Réessaye plus tard');</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Oups. Il y a une erreur. Réessaye plus tard');</script>";
        ?>
        }
        <?php
    }
}
