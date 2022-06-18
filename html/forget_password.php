<?php
include("Connexion.php");
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mot de passe oublié - LBR Covoiturage</title>
</head>
<body>

<h2>Réinitialise ton mot de passe</h2>
<form method="post" action="forget_password_action.php">
    <div class="container">
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Entre ton adresse mail" name="email" required>
        <button type="submit" name="password-reset">Réinitialiser</button>
    </div>
</form>

</body>
</html>
