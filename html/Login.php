<html>
    <head>
       <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google" content="notranslate">
    <title>LBR Covoiturage</title>
    <!-- CSS only -->
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
        <!-- importer le fichier de style -->
    <link rel="stylesheet" href="../css/login.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="LoginAction.php" method="POST">

                    <div class="logo">
                        <a href=""><img src="../images/LBR Ressources/logoLONGUEURClassic.png"></a>
                    </div>
                    <h1>Connexion</h1>
                    <label><b>Email</b></label>
                    <input type="text" required="required" placeholder="Email" name="email" required>

                    <label><b>Mot de passe</b></label>
                    <input type="password" required="required" placeholder="Mot de passe" name="password" required>

                    <input style="border-radius: 100px;" type="submit" id='submit' value='Se connecter' >
                    <?php
                    if(isset($_GET['erreur'])){
                        $err = $_GET['erreur'];
                        if($err==1 || $err==2)
                            echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                    }
                    ?>
                    <div class="google-btn">
                          <div class="google-icon-wrapper">
                            <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
                          </div>
                          <p class="btn-text"><b>Sign in with google</b></p>
                    </div>
            </form>
        </div>
    </body>
</html>
