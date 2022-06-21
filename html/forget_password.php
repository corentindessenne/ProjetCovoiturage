<?php
include("Connexion.php");
?>

<!doctype html>
<html lang="fr">
<head>
    <!--CSS files-->
    <link rel="stylesheet" type="text/css" href="../css/forget.css">
    <!--Favicon-->
	<link rel="icon" href="../images/LBR Ressources/intiniales.png" type="images/png"/> 
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mot de passe oublié - LBR Covoiturage</title>
</head>
<body>
<?php include('NavbarConn.php') ?>

<div class="bloc">
    <div class="main">
        <h2 style="text-align: center;">Tu as oublié ton mot de passe ?</h2>
        <div class="container">
            <form method="post" action="forget_password_action.php">
                <div class="input-group">
                    <div class="item long">
                        <label>Email </label>
                        <input type="email" required="required" name="email">
                    </div>
                </div>
                <button type="submit" name="password-reset">Envoyer</button>
                <p> <a href="login.php"> Finalement, je m'en souviens! </a></p>
            </form>
        </div>
    </div>
</div>

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
