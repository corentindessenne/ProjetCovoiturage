<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Réinitialise ton mot de passe - LBR Covoiturage</title>
</head>
<body>
<h1 style="text-align: center;">Réinitialise ton mot de passe</h1>
<div class="form" style="margin-top: 2.5rem;">
    <?php
    if($_GET['key'] && $_GET['token']){
        include("Connexion.php");

        $email = $_GET['key'];
        $token = $_GET['token'];

        $query = mysqli_query($conn, "SELECT * FROM compte WHERE token_reset_password = '$token' AND Email = '$email'");
        $currentDate = date("Y-m-d H:i:s");

        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_array($query);
            if($row['expiration_reset_password'] >= $currentDate){?>
            <form action="reset_password_action.php" method="post">
                <input type="hidden" name="email" value="<?php echo $email ?>">
                <input type="hidden" name="token" value="<?php echo $token ?>">
                <label for="newPassword">
                    <input type="password" name="newPassword" class="form-control" placeholder="Nouveau mot de passe" pattern="(?=.*\d)(?=.*[\W_])(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Ton mot de passe doit contenir au moins 8 caractères, dont 1 minuscule, 1 majuscule et 1 caractère spécial" required>
                </label>
                <label for="confirmPassword">
                    <input type="password" name="confirmPassword" class="form-control" placeholder="Confirmer le mot de passe" onkeyup="check() required">
                </label>
                <br/>
                <span id='message'></span>
                <input type="submit" name="resetPassword" class="reset-btn">
            </form>
    <?php
            }
        }
        else{
            echo "<script type='text/javascript'>alert('Oups, il semble que ton lien soit expiré');</script>";
            ?>
            <script>document.location.href='../html/home.php';</script>
    <?php
        }
    }
    ?>
</div>

<script>
    let check = function() {
        if (document.getElementById('password_1').value === document.getElementById('password_2').value) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'Les mots de passe sont identiques';
            document.getElementById('submit').disabled = false;
        }
        else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'Les mots de passe doivent être identiques';
            document.getElementById('submit').disabled = true;
        }
    }

</script>

</body>
</html>
