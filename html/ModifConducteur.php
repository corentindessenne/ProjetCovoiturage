<!DOCTYPE html>
<html>
<head>
    <title>Modification d'un trajet conducteur</title>
    <link href ="../css/AjoutModif.css" rel="stylesheet" >
</head>

<body>
<?php include 'NavBar.php';
include 'Connexion.php';
if(isset($_SESSION["mail"])){
?>
    <h1>Modification d'un trajet conducteur</h1>
    <form action="ActionModifCond.php" method="post">
        <div class="AllerRetour">
            <input type="radio" value="Aller" required="required" id="Aller" name="AllerRetour" ><label for="Aller" class="AllerRetour">Aller</label>
            <input type="radio" name="AllerRetour" required="required" value="Retour" id="Retour"><label for="Retour" class="AllerRetour">Retour</label>
        </div>
        <div>
            <p>Ville de départ/arrivée:</p>   <input type="text" required="required" name="Ville" id="Ville">
            <p>Adresse de départ/arrivée:</p>   <input type="text" required="required" name="Adresse" id="Adresse">
        </div>
        <p>Date de départ:</p>
        <input type="date" id="Date-de-Depart" required="required" name="Date-de-Depart" class="Date-de-Depart" min="2022-09-16">
        <p>Heure de départ:</p>
        <input type="time" id="Heure-de-Depart" required="required" name="Heure-de-Depart" class="Heure-de-Depart">
        <p>Date et heure d'arrivée:</p>
        <!--//insérer la date via JS/API google-->
        <br/>
        <p>Prix par passager: </p>
        <div class="PrixSelect">
            <input type="number" class="Prix" required="required"  name="Prix" id ="Prix" step=".01" min="0">
            <i>€</i>
        </div>
        <br>
        <p>Nombre maximum de passager acceptés: </p>
        <input type="number" name="NbPass" id="NbPass" required="required" class="NbPass" step="1" min="0" max="15">
        <br/>
        <p>Description (facultatif): </p>
        <textarea name="Description" id="Description" placeholder="Écris içi la description de ton trajet" rows="8" cols="65"></textarea>
        <br/>
        <div class="Checkboxtel">
        <input type="checkbox" id="tel" value="tel" name="tel"> 
        <label>Coche pour rendre ton numéro de téléphone visible sur ton annonce</label>
        </div>
        
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