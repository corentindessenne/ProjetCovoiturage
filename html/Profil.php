<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Espace festivalier - LBR Covoiturage</title>
    <!--CSS files-->
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../css/register.css">
    <link href="../css/profile.css" rel="stylesheet">
    <!--Favicon-->
    <link rel="icon" href="../images/LBR Ressources/intiniales.png" type="images/png"/> 
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
    rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.6.4.js"></script>
    <!-- Pour la PP -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/solid.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/svg-with-js.min.css" rel="stylesheet"/>
</head>
<body>
    <?php

    include 'Connexion.php';
    include 'NavbarConn.php';
    if (!isset($_SESSION['login']) && $_SESSION['login'] != '') {
        header("Location:home.php");

    }
    if (isset($_POST["CompteId"]) && (isset($_SESSION['login']) && $_SESSION['login'] != '') && $_SESSION["role"] == 1) {
        $ismyaccount = 0;
        $idCompte = $_POST["CompteId"];
        $sql = "SELECT * FROM compte WHERE IdCompte='" . $idCompte . "'";
    } else {
        $ismyaccount = 1;
        $mail = $_SESSION["mail"];
        $sql = "SELECT * FROM compte WHERE Email='" . $mail . "'";
    }
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
        $row = $result->fetch_assoc();
        $nom = $row["Nom"];
        $mail = $row["Email"];
        $prenom = $row["Prenom"];
        $idCompte = $row["IdCompte"];
        $phone = "0" . $row["telephone"];
        $description = $row["Description"];
        $pp = $row["PhotoProfil"];              //pp=Photo de Profil
        $hashedpassword = $row["motDePasse"];

        if ($pp == NULL){
            $pp = "defaultpp.jpg";
        }

}
?>

<ul class="menu" id="menu">
    <li class="menu-link active"><img class="icon" src="../images/icon/25694.png">Mes informations</li>
    <li class="menu-link"><img class="icon" src="../images/icon/car-front.png">Mes trajets</li>
    <li class="menu-link"><img class="icon" src="../images/icon/1077114 1.png">Mes demandes reçues</li>
</ul>

<div class="infos" id="infos">
    <div class="infos-main">
        <!-- Profile picture + nom et prénom -->
        <div class="PhotoDeProfil">
            <img class="profile-picture BigPP" src="..\images\PhotoProfil\<?php if ($pp != NULL) {
                echo $pp;
                } else {
                    echo "defaultpp.jpg";
                } ?>" alt="Ta PP" width="200px" height="200px">
                <form action="PPAction.php" method="post" enctype="multipart/form-data" id="ppform" class="ppform">
                    <input type="file" name="file" class="PPbutton" id="file" style="opacity: 0;width: 200px;height: 200px;border-radius: 500px;">
                    <label for="file" class="PPbutton"><img src="..\images\icon\camera.png" class="camera">Change ta
                    photo de profil</label>
                </form>
            </div>
            <span><?php echo $prenom." ".$nom; ?></span>

        </div>

        <form action="editProfilAction.php" method="post" class="infos-secondary" autocomplete="off">
            <input class="hidden" type="text" name="IdCompte" value="<?php echo $idCompte;?>">
            <div class="input-group">
                <div class="form-item">
                    <label class="upper">Nom</label>
                    <input class="inputUpper" name="nom" type="text" value="<?php echo $nom;?>" >
                </div>

                <div class="form-item">
                    <label class="upper">Prénom</label>
                    <input class="inputUpper" name="prenom" type="text" value="<?php echo $prenom;?>" >
                </div>
            </div>

            <div class="input-group">
                <div class="form-item">
                    <label class="upper">E-mail</label>
                    <input class="inputUpper" name="email" type="text" value="<?php echo $mail;?>" >
                </div>

                <div class="form-item">
                    <label class="upper">Téléphone</label>
                    <input class="inputUpper" name="phone"type="text" value="<?php echo $phone;?>" >
                </div>
            </div>

            <div class="input-group">
                <div class="form-item">
                    <label class="upper">Description</label>
                    <textarea name="description" cols="30" rows="3"></textarea>
                    <script type="text/javascript">
                        let text = document.getElementsByTagName('textarea');
                        text[0].innerHTML = '<?php echo $description ?>';
                    </script>
                </div>
            </div>

            <a class="mdpChange" href="EditPassword.php" style="margin-bottom:10px;">Changer mon mot de passe</a>

            <div class="submitForm">
                <input class="modifyData" type="submit" value="Modifier" style="width: 20%; padding: 0px; float: right;">
                <p class="deleteAccount" href="deletionAction.php" onclick="if(confirm('Voulez-vous vraiment supprimer votre compte? Cette action est irréversible')){window.location.href = 'deletionAction.php';}">Supprimer mon compte</p>
            </div> 
        </form>
    </div>

    <div class="trajets" id="trajets">
        <?php
            //trajets conducteur
        $requete = "SELECT * FROM trajet WHERE IdCompte='".$idCompte."'";
        $result = mysqli_query($conn,$requete);
        $count = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $count++;

            $hourString1 = substr($row['HeureDepart'],0,2);
            $hourString2 = substr($row['HeureDepart'],3,2);
            $hourStringDeparture = $hourString1."h".$hourString2;


            $hourString3 = substr($row['HeureArrivee'],0,2);
            $hourString4 = substr($row['HeureArrivee'],3,2);
            $hourStringArrival = $hourString3."h".$hourString4;

            ?>

            <div class="item">
                <div class="data-group">
                    <span class="horaire">
                        <?php echo $hourStringDeparture; ?>
                    </span>
                    <span class="place">
                        <?php echo utf8_encode($row['LieuDepart']); ?>
                    </span>

                    <span class="date">
                        <?php echo utf8_encode($row['DateDepart']); ?>
                    </span>
                </div>

                <div class="data-group">
                    <span class="horaire">
                        <?php echo $hourStringArrival; ?>
                    </span>
                    <span class="place">
                        <?php echo utf8_encode($row['LieuArrivee']); ?>
                    </span>

                    <span class="price">
                        <?php echo $row['Prix']; ?>€
                    </span>
                </div>

                <div class="account-info">
                    <img class="profile-picture" src="../images/PhotoProfil/<?php echo $pp?>">
                    <div class="profile-info">
                        <span class="name"><?php echo $prenom." ".$nom?></span>
                        <div class="available">
                            <?php
                            $value = $row['PlacesRestantes'];
                            if($value == 1) echo $value." place restante";
                            else echo $value." places restantes";
                            ?>
                        </div>
                    </div>

                    <form method="post" action="ModifConducteur.php">
                        <input class="hidden" type="text" name="IdTrajet" value="<?php echo $row['IdTrajet']; ?>"> 
                        <input type="submit" class=modifyTrajet value="Modifier">
                    </form>

                    <form method="post" action="DeleteTrajetaction.php" onsubmit="return confirm('Veux-tu vraiment supprimer ce trajet ?');">    
                        <input type="submit" class="deleteTrajet" value="Supprimer">
                    </form>


                </div>
            </div>
            <?php
            } 

        //trajets passagers qui ont été validés
        $requete = "SELECT * FROM reservation WHERE idCompteReservation='$idCompte' AND isAccepted=1";
        $result = mysqli_query($conn,$requete);

        while($row = mysqli_fetch_assoc($result)){

            $idTrajet = $row['idTrajet'];
            $requete = "SELECT * FROM trajet WHERE IdTrajet = '$idTrajet' ";
            $result = mysqli_query($conn,$requete);

            $count = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $count++;

                $hourString1 = substr($row['HeureDepart'],0,2);
                $hourString2 = substr($row['HeureDepart'],3,2);
                $hourStringDeparture = $hourString1."h".$hourString2;


                $hourString3 = substr($row['HeureArrivee'],0,2);
                $hourString4 = substr($row['HeureArrivee'],3,2);
                $hourStringArrival = $hourString3."h".$hourString4;

                $idCompteTrajet = $row['IdCompte'];
                $requete2 = "SELECT * FROM compte WHERE IdCompte = '$idCompteTrajet'";
                $result2 = mysqli_query($conn,$requete2);
                $row2 = mysqli_fetch_assoc($result2);

                ?>

                <div class="item">
                    <div class="data-group">
                        <span class="horaire">
                            <?php echo $hourStringDeparture; ?>
                        </span>
                        <span class="place">
                            <?php echo utf8_encode($row['LieuDepart']); ?>
                        </span>

                        <span class="date">
                            <?php echo utf8_encode($row['DateDepart']); ?>
                        </span>
                    </div>

                    <div class="data-group">
                        <span class="horaire">
                            <?php echo $hourStringArrival; ?>
                        </span>
                        <span class="place">
                            <?php echo utf8_encode($row['LieuArrivee']); ?>
                        </span>

                        <span class="price">
                            <?php echo $row['Prix']; ?>€
                        </span>
                    </div>

                    <div class="account-info">
                        <img class="profile-picture" src="../images/PhotoProfil/<?php echo $row2['PhotoProfil']; ?>">
                        <div class="profile-info">
                            <span class="name"><?php echo $row2['Nom']." ".$row2['Prenom']; ?></span>
                            <div class="available">
                                <?php
                                $value = $row['PlacesRestantes'];
                                if($value == 1) echo $value." place restante";
                                else echo $value." places restantes";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php 
            }}
        ?>
        </div>
    </div>

        <div class="propositions" id="propositions">
            <?php   
            $idTrajets = array(0,0);
            $i = 0;

            //check si a des trajets
            $requete = "SELECT * FROM trajet WHERE IdCompte='$idCompte' ";
            $result = mysqli_query($conn,$requete);
            while ($row = mysqli_fetch_assoc($result)) {
                $idTrajets[$i] = $row['IdTrajet'];
                $i++;
            }

            //check si a des reservations sur chacun des trajets et affiche
            for ($i=0; $i < 2; $i++) { 
                if($idTrajets[$i] != 0){
                    $requete = "SELECT * FROM reservation WHERE IdTrajet='$idTrajets[$i]' AND isAccepted = 0";
                    $result = mysqli_query($conn,$requete);
                    while ($row = mysqli_fetch_assoc($result)) {

                        //infos profil du compte réservation
                        $idCompteReservation = $row['idCompteReservation'];
                        $requete2 = "SELECT * FROM compte WHERE idCompte = '$idCompteReservation' ";
                        $result2 = mysqli_query($conn,$requete2);
                        $row2 = mysqli_fetch_assoc($result2);

                        ?>

                        <div class="demandeRecue">
                            <img class="profile-picture" src="../images/PhotoProfil/<?php if ($row2['PhotoProfil'] != NULL) {
                                echo $row2['PhotoProfil'];
                                } else {
                                echo "defaultpp.jpg";
                            } ?>">
                            <div class="infos-profil">
                                <span><?php echo $row2['Prenom'].' '.$row2['Nom']; ?></span>
                                <p>
                                <?php 
                                    for ($i=1; $i < 7 ; $i++) { 
                                        if(isset($row['nomPassager'.$i])){
                                           echo $row['nomPassager'.$i]; 
                                        }
                                    }
                                ?>
                                </p>
                            </div>

                            <?php $link = "validationReservation.php?idReservation=".$row['idReservation']."&isAccepted=";?>
                            <div class="select">
                                <a href="<?php echo $link."1"?>"><img src="../images/icon/845646.png"></a>
                                <a href="<?php echo $link."0"?>"><img src="../images/icon/463612.png"></a>
                            </div>
                            
                        </div>

                        <?php
                    }
                }
            }

            ?>
        </div>

        <script type="text/javascript">
    //on-click
    let menu = document.getElementById('menu');
    document.getElementById('trajets').style.display = "none";
    document.getElementById('propositions').style.display = "none";

    for (let i = 0; i < menu.children.length; i++) {
        menu.children[i].addEventListener('click', () => {
            for (let a = 0; a < menu.children.length; a++) {
                menu.children[a].classList.remove('active');
            }
            menu.children[i].classList.add('active');
            document.getElementById('infos').style.display = "none";
            document.getElementById('trajets').style.display = "none";
            document.getElementById('propositions').style.display = "none";
            if (i === 0) {
                document.getElementById('infos').style.display = "flex";
            }
            if (i === 1) {
                document.getElementById('trajets').style.display = "flex";
            }
            if (i == 2) {
                document.getElementById('propositions').style.display = "flex";
            }
        });
    }

    //form profile picture
    let input = document.querySelector('.ppform');
    input.onchange = handleChange;

    function handleChange(e) {
        document.forms["ppform"].submit();
    }
</script>


<script>
  var $limitNum = 255;
  $('textarea[name="Description"]').keydown(function() {
    var $this = $(this);

    if ($this.val().length > $limitNum) {
        $this.val($this.val().substring(0, $limitNum));
    }
});
</script>
</body>
</html>