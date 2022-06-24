<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Espace festivalier - LBR Covoiturage</title>
    <!--CSS files-->
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../css/register.css">
    <link href="../css/profile.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/alert.css">
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

    //***********************
    //AFFICHAGE DES ALERT  
    //***********************

    if(isset($_SESSION['alertAcceptPassagerDepuisConducteur'])){
        if($_SESSION['alertAcceptPassagerDepuisConducteur'] == 1){
            ?>
                <div class="alert" style="background-color: #2ed573;">
                    <div class="alert-text">Tu as bien accepté la demande de ton passager.</div>
                    <div class="croix"><img src="../images/icon/3426000.png"></div>
                </div>
            <?php
            $_SESSION['alertAcceptPassagerDepuisConducteur'] = 0; 
        }
    }

    if(isset($_SESSION['alertRefusePassagerDepuisConducteur'])){
        if($_SESSION['alertRefusePassagerDepuisConducteur'] == 1){
            ?>
                <div class="alert" style="background-color: #EA2027;">
                    <div class="alert-text">Tu as refusé la demande de ton passager.</div>
                    <div class="croix"><img src="../images/icon/3426000.png"></div>
                </div>
            <?php
            $_SESSION['alertRefusePassagerDepuisConducteur'] = 0;
        }
    }

    if(isset($_SESSION['alertMailDejaUtilise'])){
        if($_SESSION['alertMailDejaUtilise'] == 1){
            ?>
                <div class="alert" style="background-color: #EA2027;">
                    <div class="alert-text">L'email entré est déjà utilisé pour un autre compte</div>
                    <div class="croix"><img src="../images/icon/3426000.png"></div>
                </div>
            <?php
            $_SESSION['alertMailDejaUtilise'] = 0;
        }
    }

    if(isset($_SESSION['alertMauvaisFormatTel'])){
        if($_SESSION['alertMauvaisFormatTel'] == 1){
            ?>
                <div class="alert" style="background-color: #EA2027;">
                    <div class="alert-text">Le format du numéro de téléphone entré est incorrect</div>
                    <div class="croix"><img src="../images/icon/3426000.png"></div>
                </div>
            <?php
            $_SESSION['alertMauvaisFormatTel'] = 0;
        }
    }

    if(isset($_SESSION['alertModificationEnregistrees'])){
        if($_SESSION['alertModificationEnregistrees'] == 1){
            ?>
                <div class="alert" style="background-color: #2ed573;">
                    <div class="alert-text">Les modifications ont bien été enregistrées</div>
                    <div class="croix"><img src="../images/icon/3426000.png"></div>
                </div>
            <?php
            $_SESSION['alertModificationEnregistrees'] = 0;
        }
    }

    if(isset($_SESSION['alertErreurSurvenue'])){
        if($_SESSION['alertErreurSurvenue'] == 1){
            ?>
                <div class="alert" style="background-color: #EA2027;">
                    <div class="alert-text">Une erreur est survenue, rééssaie plus tard</div>
                    <div class="croix"><img src="../images/icon/3426000.png"></div>
                </div>
            <?php
            $_SESSION['alertErreurSurvenue'] = 0;
        }
    }

    if(isset($_SESSION['alertTrajetModifie'])){
        if($_SESSION['alertTrajetModifie'] == 1){
            ?>
                <div class="alert" style="background-color:#2ed573;">
                    <div class="alert-text">Les informations du trajet ont bien été enregistrées</div>
                    <div class="croix"><img src="../images/icon/3426000.png"></div>
                </div>
            <?php
            $_SESSION['alertTrajetModifie'] = 0;
        }
    }

    if(isset($_SESSION['alertTrajetCree'])){
        if($_SESSION['alertTrajetCree'] == 1){
            ?>
                <div class="alert" style="background-color:#2ed573;">
                    <div class="alert-text">Ton trajet a bien été créé</div>
                    <div class="croix"><img src="../images/icon/3426000.png"></div>
                </div>
            <?php
            $_SESSION['alertTrajetCree'] = 0;
        }
    }

    if(isset($_SESSION['alertTrajetRejoint'])){
        if($_SESSION['alertTrajetRejoint'] == 1){
            ?>
                <div class="alert" style="background-color:#2ed573;">
                    <div class="alert-text">Tu as bien rejoint le trajet proposé</div>
                    <div class="croix"><img src="../images/icon/3426000.png"></div>
                </div>
            <?php
            $_SESSION['alertTrajetRejoint'] = 0;
        }
    }

    if(isset($_SESSION['alertDemandeCreee'])){
        if($_SESSION['alertDemandeCreee'] == 1){
            ?>
                <div class="alert" style="background-color:#2ed573;">
                    <div class="alert-text">Ta demande de trajet a bien été créée</div>
                    <div class="croix"><img src="../images/icon/3426000.png"></div>
                </div>
            <?php
            $_SESSION['alertDemandeCreee'] = 0;
        }
    }


    if(isset($_SESSION['PasDeTrajet'])){
        if($_SESSION['PasDeTrajet'] == 1){
            ?>
                <div class="alert" style="background-color: #2ed573;">
                    <div class="alert-text">Fais un trajet d'abord.</div>
                    <div class="croix"><img src="../images/icon/3426000.png"></div>
                </div>
            <?php
            $_SESSION['PasDeTrajet'] = 0; 
        }
    }

    if(isset($_SESSION['alertTrajetSupprimé'])){
        if($_SESSION['alertTrajetSupprimé'] == 1){
            ?>
                <div class="alert" style="background-color: #2ed573;">
                    <div class="alert-text">Ton trajet a bien été supprimé. Les passagers ont été avertis de la suppression du trajet</div>
                    <div class="croix"><img src="../images/icon/3426000.png"></div>
                </div>
            <?php
            $_SESSION['alertTrajetSupprimé'] = 0; 
        }
    }


    //redirect vers la page d'accueil si l'utilisateur n'est pas connecté
    if (!isset($_SESSION['login']) && $_SESSION['login'] != '') {
        header("Location:home.php");

    }
    //Si l'utilisateur est un admin on récupère les informmations du compte a partir de l'id récupéré plus tot
    if (isset($_POST["CompteId"]) && (isset($_SESSION['login']) && $_SESSION['login'] != '') && $_SESSION["role"] == 1) {
        $ismyaccount = 0;
        $idCompte = $_POST["CompteId"];
        $sql = "SELECT * FROM compte WHERE IdCompte='" . $idCompte . "'";
    } else {
        //sinon on récupère les informations a partirde la session du mail de l'utilisateur
        $ismyaccount = 1;
        $mail = $_SESSION["mail"];
        $sql = "SELECT * FROM compte WHERE Email='" . $mail . "'";
    }
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
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

<!--Menu de sélection des informations affichées-->
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
        <!--Formulaire d'affichage et modification des informations du compte-->
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
        $requete = "SELECT * FROM trajet WHERE IdCompte='$idCompte' AND isDemande = 0";
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
                        <?php echo ($row['LieuDepart']); ?>
                    </span>

                    <span class="date">
                        <?php echo ($row['DateDepart']); ?>
                    </span>
                </div>

                <div class="data-group">
                    <span class="horaire">
                        <?php echo $hourStringArrival; ?>
                    </span>
                    <span class="place">
                        <?php echo ($row['LieuArrivee']); ?>
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
                        </div><!--On affiche le numéro de téléphone si l'utilisateur le souhaite-->
                                <div class="available" id="placesRestantes">
                                    <span id="DisplayTel">
									<?php
										if($row["DisplayTel"]==1)echo "numéro de téléphone: ".$phone;
		
									?>
                                    </span>
								</div>
                        
                    </div>

                    <form method="post" action="modifTravel.php">
                        <input class="hidden" type="text" name="IdTrajet" value="<?php echo $row['IdTrajet']; ?>"> 
                        <input type="submit" class=modifyTrajet value="Modifier">
                    </form>

                    <form method="post" action="DeleteTrajetaction.php" onsubmit="return confirm('Veux-tu vraiment supprimer ce trajet ?');">
                        <input class="hidden" type="text" name="IdTrajet" value="<?php echo $row['IdTrajet']; ?>">
                        <input type="submit" class="deleteTrajet" value="Supprimer">
                    </form>


                </div>
            </div>
            <?php
            } 


        //demandes en attente de conducteur qui propose
        $requete = "SELECT * FROM trajet WHERE IdCompte='$idCompte' AND isDemande = 1";
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
                        <?php echo ($row['LieuDepart']); ?>
                    </span>

                    <span class="date">
                        <?php echo ($row['DateDepart']); ?>
                    </span>
                </div>

                <div class="data-group">
                    <span class="horaire">
                        <?php echo $hourStringArrival; ?>
                    </span>
                    <span class="place">
                        <?php echo ($row['LieuArrivee']); ?>
                    </span>

                    <span class="price" style="font-size: 14px;">
                        En attente de conducteur...
                    </span>
                </div>

                <div class="account-info">
                    <img class="profile-picture" src="../images/PhotoProfil/<?php echo $pp?>">
                    <div class="profile-info">
                        <span class="name"><?php echo $prenom." ".$nom?></span>
                        <div class="available">
                            Recherche une voiture
                        </div>
                        <!--On affiche le numéro de téléphone si l'utilisateur le souhaite-->
                        <div class="available" id="placesRestantes">
                                    <span id="DisplayTel">
									<?php
										if($row["DisplayTel"]==1)echo "numéro de téléphone: 0".$row2["telephone"];
		
									?>
                                    </span>
								</div>
                    </div>

                    <form method="post" action="modifTravel.php">
                        <input class="hidden" type="text" name="IdTrajet" value="<?php echo $row['IdTrajet']; ?>"> 
                        <input type="submit" class=modifyTrajet value="Modifier">
                    </form>

                    <form method="post" action="DeleteTrajetaction.php" onsubmit="return confirm('Veux-tu vraiment supprimer ce trajet ?');">
                        <input class="hidden" type="text" name="IdTrajet" value="<?php echo $row['IdTrajet']; ?>">
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
                            <?php echo ($row['LieuDepart']); ?>
                        </span>

                        <span class="date">
                            <?php echo ($row['DateDepart']); ?>
                        </span>
                    </div>

                    <div class="data-group">
                        <span class="horaire">
                            <?php echo $hourStringArrival; ?>
                        </span>
                        <span class="place">
                            <?php echo ($row['LieuArrivee']); ?>
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
                            <!--On affiche le numéro de téléphone si l'utilisateur le souhaite-->
                            <div class="available" id="placesRestantes">
                                    <span id="DisplayTel">
									<?php
										echo "numéro de téléphone: 0".$row2["telephone"];
		
									?>
                                    </span>
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


                        $requete3 = "SELECT * FROM trajet WHERE idTrajet = '$idTrajets[$i]' ";
                        $result3 = mysqli_query($conn,$requete3);
                        $row3 = mysqli_fetch_assoc($result3);

                        ?>

                        <div class="demandeRecue">
                            <img class="profile-picture" src="../images/PhotoProfil/<?php if ($row2['PhotoProfil'] != NULL) {
                                echo $row2['PhotoProfil'];
                                } else {
                                echo "defaultpp.jpg";
                            } ?>">
                            <div class="infos-profil">
                                <div style="font-size: 20px;font-weight: bold;">
                                    <span><?php echo $row3['LieuDepart'] ;?> &#8594; <?php echo $row3['LieuArrivee']?></span>
                                </div>
                                
                                <span><?php echo $row2['Prenom'].' '.$row2['Nom']; ?></span>
                                
                                <?php 
                                    echo "<div style=\"font-size:16px;font-weight:normal;\">Nb de Passagers : ".$row['nbPassagersReservation']."</div><p>";
                                    for ($i=1; $i < 7 ; $i++) { 
                                        if(isset($row['nomPassager'.$i])){
                                           echo " ".$row['nomPassager'.$i]." ";
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

            //check si a des propositions de trajet suite aux demandes postées
            $requete1 = "SELECT * FROM trajet WHERE IdCompte='$idCompte' AND isDemande = 1";
            $result1 = mysqli_query($conn,$requete1);
            while( $row1 = mysqli_fetch_assoc($result1)){

                $idDemande = $row1['IdTrajet'];

                $requete = "SELECT * FROM proposition WHERE idDemande = '$idDemande' ";
                $result = mysqli_query($conn,$requete);
                $count = 0;
                while ($row = mysqli_fetch_assoc($result)) {


                    $idTrajetConducteur = $row['idTrajet'];
                    $requete3 = "SELECT * FROM trajet WHERE IdTrajet = '$idTrajetConducteur' ";
                    $result3 = mysqli_query($conn,$requete3);
                    $row3 = mysqli_fetch_assoc($result3);

                    $count++;

                    $hourString1 = substr($row3['HeureDepart'],0,2);
                    $hourString2 = substr($row3['HeureDepart'],3,2);
                    $hourStringDeparture = $hourString1."h".$hourString2;


                    $hourString3 = substr($row3['HeureArrivee'],0,2);
                    $hourString4 = substr($row3['HeureArrivee'],3,2);
                    $hourStringArrival = $hourString3."h".$hourString4;

                    $idCompteConducteur = $row['idCompteConducteur'];
                    $requete2 = "SELECT * FROM compte WHERE IdCompte = '$idCompteConducteur'";
                    $result2 = mysqli_query($conn,$requete2);
                    $row2 = mysqli_fetch_assoc($result2);

                    $prenom = $row2['Prenom'];
                    $nom = $row2['Nom'];

                    $pp = $row2['PhotoProfil'];
                    if ($pp != NULL) {
                        
                    } 
                    else {
                        $pp = "defaultpp.jpg";
                    } 

                ?>

                <div class="item">
                    <div class="data-group">
                        <span class="horaire">
                            <?php echo $hourStringDeparture; ?>
                        </span>
                        <span class="place">
                            <?php echo ($row3['LieuDepart']); ?>
                        </span>

                        <span class="date">
                            <?php echo ($row3['DateDepart']); ?>
                        </span>
                    </div>

                    <div class="data-group">
                        <span class="horaire">
                            <?php echo $hourStringArrival; ?>
                        </span>
                        <span class="place">
                            <?php echo ($row3['LieuArrivee']); ?>
                        </span>

                        <span class="price">
                            <?php echo $row3['Prix']; ?> €
                        </span>
                    </div>

                    <div class="account-info">
                        <img class="profile-picture" src="../images/PhotoProfil/<?php echo $pp?>">
                        <div class="profile-info">
                            <span class="name"><?php echo $prenom." ".$nom?></span>
                            <div class="available">
                                Te propose de rejoindre
                            </div>
                        </div>

                        <div class="select">
                                <?php $link = "validationProposition.php?idProposition=".$row['idProposition']."&isAccepted=";?>
                                <a href="<?php echo $link."1"?>"><img src="../images/icon/845646.png"></a>
                                <a href="<?php echo $link."0"?>"><img src="../images/icon/463612.png"></a>
                        </div>

                    </div>
                </div>
                <?php

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
    //Fontion limite taille description
  var $limitNum = 255;      //variable contenant la taille limite de la description
  $('textarea[name="Description"]').keydown(function() {
    var $this = $(this);

    if ($this.val().length > $limitNum) {
        $this.val($this.val().substring(0, $limitNum));
    }
});
</script>



<script type="text/javascript"> //JS Alert
    let tab = document.getElementsByClassName('croix');
    for(let i = 0; i < tab.length;i++){
        tab[i].addEventListener('click', () =>{
            tab[i].parentNode.style.display = 'none';
        })
    }
</script>


</body>
</html>