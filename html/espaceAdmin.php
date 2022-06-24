<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LBR Covoiturage Espace Admin</title>
    <!--CSS files-->
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../css/eAdmin.css">
    <!--Favicon-->
    <link rel="icon" href="../images/LBR Ressources/intiniales.png" type="images/png"/>
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
          rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.6.4.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>


    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
    <script src='https://code.jquery.com/jquery-3.4.1.min.js' type='text/javascript'></script>

</head>

<body>


<?php
include 'Connexion.php';            //On ajoute la navbar et on se connecte a la base de donnée
include 'NavbarConn.php';


if (isset($_POST["annee"])) {
    if ($_POST["annee"] < 2021) {
        $anneeEd = 2021;
    } else {
        $anneeEd = $_POST["annee"];
    }                        //On bloque l'année a 2021 au plus bas car le festival n'existait pas encore avant

} else {
    $anneeEd = date("Y");                                    //Si il n'y a pas eu de changement on prend par défaut l'année actuelle
}

if ((isset($_SESSION['login']) && $_SESSION['login'] != '') && $_SESSION["role"] == 1){        //on vérifie que l'utilisateur est un administrateur
?>

<div class="title">
    <h1> ESPACE ADMINISTRATEUR </h1>
</div>
<div class="tout">


    <?php
    $requete = "SELECT isDemande, NbPassagers, PlacesRestantes FROM trajet WHERE AnneeEdition='" . $anneeEd . "'";
    $result = mysqli_query($conn, $requete);

    $nbTrajets = 0;
    $nbDemandes = 0;
    $nbVoituresRemplies = 0;        //On récupère des statistiques sur cette édition du festival
    $nbPassagers = 0;
    $nbCompte = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        $nbTrajets++;

        if ($row["isDemande"] == 1) {
            $nbDemandes++;
        }
        if ($row["PlacesRestantes"] == 0) {
            $nbVoituresRemplies++;
        }
        $nbPassagers += $row["NbPassagers"] - $row["PlacesRestantes"];        //On calcule les statistiques
    }

    $requete = "SELECT IdCompte FROM compte WHERE YEAR(DateCreation)='" . $anneeEd . "'";
    $result = mysqli_query($conn, $requete);
    while ($row = mysqli_fetch_assoc($result)) {
        $nbCompte++;
    }

    ?>


    <div class="edition">
        <div class="header">
            <h2>LBR TIMES</h2>

        </div>
        <script>
            AOS.init();
        </script>


        <div class="wrapper">
            <!--On affiche les statistiques-->
            <div class="left-high" data-aos="fade-down" id="test">
                <div class="text">
                    <section>
                        <div class="EditionSel">
                            <form action="espaceAdmin.php" method="post">
                                <!-- Left arrow button -->
                                <input type="hidden" name="annee" value="<?php echo $anneeEd - 1 ?>"/>
                                <button class="EdButton" onClick="javascript:this.form.submit();">
                                    <!-- Arrow -->
                                    <div class="button__arrow button__arrow--left"></div>
                                </button>
                            </form>
                            <h2 class="DisplayEd"> <?php echo $anneeEd; ?> </h2>

                            <!-- Right arrow button -->
                            <form action="espaceAdmin.php" method="post">
                                <input type="hidden" name="annee" value="<?php echo $anneeEd + 1 ?>"/>
                                <button class="EdButton" onClick="javascript:this.form.submit();">

                                    <div class="button__arrow button__arrow--right"></div>
                                </button>
                            </form>
                        </div>
                    </section>
                    <br/>
                    <h2>A l'occasion de l'ouverture du site</h2>
                    <p><?php echo $nbTrajets; ?> trajets ont été crées !</p>
                    <br/>
                    <h2>A l’aide de vos compagnons mécaniques</h2>
                    <p>Plus de <?php echo $nbVoituresRemplies; ?> voitures ont été remplies !</p>
                    <br/>
                    <h2>Grâce à votre solidarité</h2>
                    <p><?php echo $nbPassagers; ?> passagers ont pu embarqué dans vos bolides !</p>
                    <br/>
                    <h2>Nous avons vite grandit</h2>
                    <p>Plus de <?php echo $nbCompte; ?> personnes ont rejoint le covoiturage Les Briques Rouges</p>
                </div>

            </div>


        </div>
        <!--Bouton pour créer un compte administrateur-->
        <div class="CreateCompte">

            <form method="post" action="register.php">
                <input type="hidden" name="VerifAdmin" value="1">
                <input type="submit" value="Créer un compte admin">
            </form>
        </div>
        <!--Style JS-->
        <script>
            if (window.innerWidth < 1000) {
                document.getElementsByClassName("aos").forEach(element => {
                    element.setAttribute('data-aos-delay', 0)
                });
            }

        </script>

        <?php

        }
        else {
            header("Location: home.php");
        }


        ?>
    </div>
    <!--Liste des comptes afin de pouvoir les modifier-->
    <div class="right aos" data-aos="fade-left" data-aos-delay="750">

        <h1 id="listTitle">Liste des comptes</h1>


        <div class="PageCompte">

            <?php include 'TousLesComptes.php'; ?>
        </div>

    </div>
</div>
</body>
</html>


<div class="left-bottom-1 aos" data-aos="fade-up" data-aos-delay="250">
    <!--Bouton pour gérer les éditions-->
    <div class="text">
        <h1>Gestion des éditions</h1>
        <h2>Accès aux différentes éditions gestion de ces dernières</h2>
    </div>

    <a href="gestionEdition.php">
        <button>Gérer mes éditions</button>
    </a>
</div>


<div class="left-bottom-2 aos" data-aos="fade-up" data-aos-delay="500">
    <div class="text">
        <h1>Email</h1>
    </div>

    <button class="notHover">COMING SOON</button>
</div>