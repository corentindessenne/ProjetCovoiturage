<!DOCTYPE html>
<html>
<head>
    <title>Modification d'une demande de trajet</title>
    <link href ="../css/AjoutModif.css" rel="stylesheet" >
</head>

<body>
<?php 
include 'Connexion.php';

if ((isset($_SESSION['login']) && $_SESSION['login'] != '') && $_SESSION["role"] == 1) {
    echo $_SESSION["role"];
include 'NavBar3.php';

}
else if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
    include 'NavBar.php';
}
else{
    include 'NavBar2.php';
}
if(isset($_SESSION["mail"])){
?>
    <h1>Modification d'une demande de trajet</h1>
    <form action="ActionDemandeModif.php" method="post">
    <div class="AllerRetour">
            <input type="radio" value="Aller" required="required" id="Aller" name="AllerRetour" <?php if($_POST["TypeTrajet"]=="Aller"){ ?>checked="true"<?php } ?>><label for="Aller" class="AllerRetour">Aller</label>
            <input type="radio" name="AllerRetour" required="required" value="Retour" id="Retour" <?php if($_POST["TypeTrajet"]=="Retour"){ ?>checked="true"<?php } ?>><label for="Retour" class="AllerRetour">Retour</label>
        </div>
        <div>
            <p>Ville de départ/arrivée:</p>   <input type="text" required="required" name="Ville" id="Ville" value="<?php echo $_POST["LieuDepart"]; ?>">
            <p>Adresse de départ/arrivée:</p>   <input type="text" required="required" name="Adresse" id="Adresse"  value="<?php echo $_POST["AdresseDepart"]; ?>">
        </div>
        <p>Date de départ:</p>
        <input type="date" id="Date-de-Depart" required="required" name="Date-de-Depart" class="Date-de-Depart" min="2022-09-16" value="<?php echo $_POST["DateDepart"]; ?>" >
        <p>Heure de départ:</p>
        <input type="time" id="Heure-de-Depart" required="required" name="Heure-de-Depart" class="Heure-de-Depart"  value="<?php echo substr_replace($_POST["HeureDepart"] ,"", -8); ?>">
        <p>Date et heure d'arrivée:</p>
        <!--//insérer la date via JS/API google-->
        <br>
        <p>Nombre de passager: </p>
        <input type="number" name="NbPass" id="NbPass" required="required" class="NbPass" step="1" min="0" max="15" value="<?php echo $_POST["NbPassagers"]; ?>">
        <br/>
        <p>Description (facultatif): </p>
        <textarea name="Description" id="Description" placeholder="Écris içi la description de ton trajet" rows="8" cols="65"><?php echo $_POST["Description"] ?></textarea>
        <br/>
        <div class="Checkboxtel">
        <input type="checkbox" id="tel" value="1" name="tel" <?php if($_POST["DisplayTel"]==1){ ?>checked="true"<?php }?>> 
        <label>Coche pour rendre ton numéro de téléphone visible sur ton annonce</label>
        </div>
        <input type="hidden" name="IdTrajet" value="<?php echo $_POST["IdTrajet"]; ?>"></input>
        <br/>
        <input type="submit" name="send" id="send" value="Envoyer">

    </form>

    <?php
    }

    else{
        ?>
    <script type="text/javascript">
        alert("Tu dois etre connecté pour modifier une demande de trajet");
        location="home.php";
    </script>
<?php
    }
?>

</body>
</html>