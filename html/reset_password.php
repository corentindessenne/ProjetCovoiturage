
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <!--Favicon-->
	<link rel="icon" href="../images/LBR Ressources/intiniales.png" type="images/png"/> 
    <title>Réinitialise ton mot de passe - LBR Covoiturage</title>
</head>
<body>
<?php include('NavbarConn.php') ?>
<?php
if ($_GET['key'] && $_GET['token']) {
    include("Connexion.php");
            $email = $_GET['key'];
            $token = $_GET['token'];

            $query = mysqli_query($conn, "SELECT * FROM compte WHERE token_reset_password = '$token' AND Email = '$email'");
            $currentDate = date("Y-m-d H:i:s");             

            if (mysqli_num_rows($query) > 0) {
                $row = mysqli_fetch_array($query);
                if ($row['expiration_reset_password'] >= $currentDate) {        //on vérifie que le token est valide
                    ?>
                    <div class="bloc">
                        <div class="main">
                            <h1>Réinitialise ton mot de passe</h1>
                            <div class="container">
                             <form action="reset_password_action.php" method="post">
                                <input type="hidden" name="email" value="<?php echo $email ?>">
                                <input type="hidden" name="token" value="<?php echo $token ?>">
                                <div class="input-group">
                                    <div class="item">
                                        <label>Mot de passe</label>
                                        <input type="password" required="required" name="newPassword" id="password_1" pattern="(?=.*\d)(?=.*[\W_])(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Ton mot de passe doit contenir au moins 8 caractères, dont au moins 1 minuscule, 1 majuscule et 1 caractère spécial" onkeyup='check();'>
                                    </div> 
                                    <div class="item">
                                        <label>Confirmation</label>
                                        <input type="password" required placeholder="" id="password_2" name="confirmPassword" onkeyup='check();'>
                                    </div> 
                                </div>
                                <span id='message'></span>
                            </br>
                            <button type="submit" name="resetPassword"> Réinitialiser </button>
                        </form>
                        <!-- Instruction -->
                        <div class="rules">
                            <p class="title-text">Le mot de passe doit avoir:</p>
                            <p class="subtitle">Au moins 8 caractères</p>
                            <p class="subtitle">1 Majuscule</p>
                            <p class="subtitle">1 Minuscule</p>
                            <p class="subtitle">Et 1 caractère spécial</p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    else{
        echo "<script type='text/javascript'>alert('Oups, il semble que ton lien soit expiré');</script>";
        ?>                          <!--si le token a expiré-->
        <script>document.location.href = '../html/home.php';</script>
        <?php
    }
}
?>



<!--Verif mot de passe identiques-->
<script>
    let check = function () {
        if (document.getElementById('password_1').value === document.getElementById('password_2').value) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'Les mots de passe sont identiques';
            document.getElementById('submit').disabled = false;
        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'Les mots de passe doivent être identiques';
            document.getElementById('submit').disabled = true;
        }
    }

</script>
<!--Style JS-->
<script type="text/javascript">

    let item = document.getElementsByClassName('item');

    for(let i = 0 ; i < item.length ; i++){
        item[i].addEventListener('focusin', () => {
            if(i !== 3 && i !== 6){
                item[i].children[0].classList.add("upper");
                item[i].children[1].classList.add("upperInput");
            }
        });

        item[i].addEventListener('focusout', () =>{
            if(i !== 3 && i !== 6){
                if(item[i].children[1].value === ""){
                    item[i].children[0].classList.remove("upper");
                    item[i].children[1].classList.remove("upperInput");
                }
            }
        });
    }

</script>

</body>
</html>
