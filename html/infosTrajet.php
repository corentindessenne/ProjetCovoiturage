<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/profile.css" rel="stylesheet">

	<title>Informations du trajet</title>
</head>
<body>


    <style type="text/css">
        .main{
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .passager{
            width: 600px;
            background-color: white;
            padding: 20px;
            display: flex;
            border-radius: 10px;
            -webkit-box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 40%);
            box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 40%);
            transition: -webkit-box-shadow 1s;
            position: relative;
            align-items: center;
        }

        .passager img{
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 500px;
        }

        .infoProfil{
            display: flex;
            flex-direction: column;
            margin-left: 10px;
            min-width: 400px;
        }

        .telephone{
            width: 100%;
            text-align: right;
        }

    </style>

    <div class="main">
    	<?php 

                include 'Connexion.php';
                

                $idTrajet = $_GET['IdTrajet'];

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
                                            echo implode(" ", str_split("0".$row2['telephone'], 2));
            
                                        ?>
                                        </span>
                                    </div>
                            </div>
                            
                        </div>
                    </div>


                    <h1>Passagers</h1>
                <?php }


        $requete = "SELECT * FROM reservation WHERE IdTrajet = '$idTrajet' ";
        $result = mysqli_query($conn,$requete);       

        while ($row = mysqli_fetch_assoc($result)) {


            $idCompteReservation = $row['idCompteReservation'];
            $requete2 = "SELECT * FROM compte WHERE IdCompte = '$idCompteReservation'";
            $result2 = mysqli_query($conn,$requete2);
            $row2 = mysqli_fetch_assoc($result2);
            $pp = $row2['PhotoProfil'];
            $phone = "0".$row2['telephone'];

            ?>


            <div class="passager">
                <img src="../images/PhotoProfil/<?php if ($pp != NULL) {
                echo $pp;
                } else {
                    echo "defaultpp.jpg";
                } ?>">
                <div class="infoProfil">
                    <span style="font-size:18px;font-weight: bold;"><?php echo $row2['Prenom']." ".$row2['Nom'];?></span>
                    <span style="font-size:16px;"><?php echo $row['nbPassagersReservation']; ?> passagers</span>

                    <span>
                    <?php 
                    for ($i=1; $i < 7 ; $i++) { 
                        if(isset($row['nomPassager'.$i])){
                            if($row['nomPassager'.$i] && $i == 1) echo $row['nomPassager'.$i]."";
                            if($row['nomPassager'.$i] && $i != 1) echo ", ".$row['nomPassager'.$i]."";
                        }
                    }

                    ?>
                    </span>
                </div>
                <span class="telephone"><?php echo implode(" ", str_split($phone, 2)); ?></span>
            </div>


            <?php
        }

    	?>
    </div>

</body>
</html>