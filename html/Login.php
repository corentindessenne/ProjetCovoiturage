<html>
    <head>
       <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google" content="notranslate">
    <title>LBR Covoiturage</title>
    <!-- CSS only -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
        <!-- importer le fichier de style -->
    <link rel="stylesheet" href="../css/login.css" media="screen" type="text/css" />
    </head>
    <body>
        <nav>
        <div class="logo">
            <a href="home.php"><img src="../images/LBR Ressources/logoLONGUEURClassic.png"></a>
        </div>

        <ul class="menu">
            <li class="menu-item"><a href="">Les trajets</a></li>
            <li class="menu-item connect"><a href="register.php">S'inscrire</a></li>
            <li class="menu-item connect"><a href="login.php">Se connecter</a></li>
        </ul>
    </nav>
        <?php
        if (isset($_GET['Message'])) {
            print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';
        }
        ?>
        <div id="container">
            <!-- zone de connexion -->
            <h1>Connexion</h1>
            <form action="LoginAction.php" method="POST">
                
                <label><b>Nom d'utilisateur</b></label>
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
                <div class="row">
                                <div class="col-md-12">
                                  <a class="btn btn-lg btn-google btn-block text-uppercase btn-outline" href="#"><img src="https://img.icons8.com/color/16/000000/google-logo.png"></a>
                                </div>
                            </div>
            </form>
        </div>
    </body>
</html>
