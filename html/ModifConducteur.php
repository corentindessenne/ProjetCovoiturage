<!DOCTYPE html>
<html>
<head>
    <title>Modification d'un trajet conducteur</title>
    <link href ="../css/AjoutModif.css" rel="stylesheet" >
</head>

<body>
<?php 
include 'Connexion.php';
include 'NavbarConn.php';

if(isset($_SESSION["mail"])){
?>
    <h1>Modification d'un trajet conducteur</h1>
    <form action="ActionModifCond.php" method="post">
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
        <br/>
        <p>Prix par passager: </p>
        <div class="PrixSelect">
            <input type="number" class="Prix" required="required"  name="Prix" id ="Prix" step=".01" min="0" value="<?php echo $_POST["Prix"]; ?>">
            <i>€</i>
        </div>
        <br>
        <p>Nombre maximum de passager acceptés: </p>
        <input type="number" name="NbPass" id="NbPass" required="required" class="NbPass" step="1" min="0" max="15" value="<?php echo $_POST["NbPassagers"]; ?>">
        <br/>
        <p>Description (facultatif): </p>
        <textarea name="Description" id="Description" placeholder="Écris içi la description de ton trajet" rows="8" cols="65"><?php echo $_POST["Description"] ?></textarea>
        <br/>
        <div class="Checkboxtel">
        <input type="checkbox" id="tel" value='1' name="tel" <?php if($_POST["DisplayTel"]==1){ ?>checked="true"<?php }?>> 
        <label>Coche pour rendre ton numéro de téléphone visible sur ton annonce</label>
        </div>
        <input type="hidden" name="IdTrajet" value="<?php echo $_POST["IdTrajet"]; ?>"></input>
        
        <br/>
        <input type="submit" name="send" id="send" value="Envoyer">
        <div id="map"></div>


    </form>

    <?php
    }

    else{
        ?>
    <script type="text/javascript">
        alert("Tu dois etre connecté pour modifier un trajet");
        location="home.php";
    </script>
<?php
    }
?>


</body>
</html>