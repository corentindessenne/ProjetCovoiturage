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
                <input class="inputUpper" type="text" value="<?php echo $nom;?>" >
            </div>

            <div class="form-item">
                <label class="upper">Prénom</label>
                <input class="inputUpper" type="text" value="<?php echo $prenom;?>" >
            </div>
        </div>

        <div class="input-group">
            <div class="form-item">
                <label class="upper">E-mail</label>
                <input class="inputUpper" type="text" value="<?php echo $mail;?>" >
            </div>

            <div class="form-item">
                <label class="upper">Téléphone</label>
                <input class="inputUpper" type="text" value="<?php echo $phone;?>" >
            </div>
        </div>

        <div class="input-group">
            <div class="form-item">
                <label class="upper">Description</label>
                <textarea name="Description" cols="30" rows="3"></textarea>
            </div>
        </div>

        <a class="mdpChange" href="EditPassword.php">Changer mon mot de passe</a>

        <div class="submitForm">
            <input class="modifyData" type="submit" value="Modifier" style="width: 20%; padding: 0px; float: right;">
        </div> 
    </form>
</div>

<div class="trajets" id="trajets">
    <?php
            
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
                                <input type="submit" class=modifyTrajet value="Modifier">
                            </form>

                            <form method="post" action="DeleteTrajetaction.php" onsubmit="return confirm('Veux-tu vraiment supprimer ce trajet ?');">    
                                <input type="submit" class="deleteTrajet" value="Supprimer">
                            </form>


                    </div>
                <?php } ?>

</div>

<div class="propositions" id="propositions">
    <?php   
            $idTrajets = array(0,0);
            $i = 0;

            //check si a des trajets
            $requete = "SELECT * FROM trajet WHERE IdCompte='$idCompte' ";
            $result = mysqli_query($conn,$requete);
            while ($row = mysqli_fetch_assoc($result)) {
                $idTrajets[$i] = 1;
                $i++;
            }

            //check si a des reservations sur chacun des trajets
            for ($i=0; $i < 2; $i++) { 
                if($idTrajets[$i] == 1){
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
                            <img src="<?php echo $row2['PhotoProfil'] ?>">
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