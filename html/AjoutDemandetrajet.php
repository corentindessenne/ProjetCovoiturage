<!DOCTYPE html>
<html>
<head>
    <title>Création d'une demande de trajet</title>
    <link href ="../css/AjoutModif.css" rel="stylesheet" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <h1 class="Demande">Ajout d'une demande de trajet</h1>
    <form action="ActionDemandeAjout.php" method="post">
        <div class="AllerRetour">
            <input type="radio" required="required" value="Aller" id="Aller" name="AllerRetour" ><label for="Aller" class="AllerRetour">Aller</label>
            <input type="radio" required="required" name="AllerRetour" value="Retour" id="Retour"><label for="Retour" class="AllerRetour">Retour</label>
        </div>
        <div>
            <p>Ville de départ/arrivée:</p>   <input type="text" required="required" name="Ville" id="Ville">
            <p>Adresse de départ/arrivée:</p>   <input type="text" required="required" name="Adresse" id="Adresse">
        </div>
        <p>Date de départ:</p>
        <input type="date" id="Date-de-Depart" name="Date-de-Depart" required="required" class="Date-de-Depart" min="2022-09-16">
        <p>Heure de départ:</p>
        <input type="time" id="Heure-de-Depart" name="Heure-de-Depart" required="required" class="Heure-de-Depart"> 
        <p>Date et heure d'arrivée:</p>
        <!--//insérer la date via JS/API google-->
        <br>
        <p>Nombre de passager: </p>
        <input type="number" name="NbPass" id="NbPass" required="required" class="NbPass" step="1" min="0" max="15">
        <br/>
        <p>Description (facultatif): </p>
        <textarea name="Description" id="Description" placeholder="Écris içi la description de ton trajet" rows="8" cols="65"></textarea>
        <br/>
        <div class="Checkboxtel">
        <input type="checkbox" id="tel" value="1" name="tel"> 
        <label>Coche pour rendre ton numéro de téléphone visible sur ton annonce</label>
        </div>
        
        <br/>
        <input type="submit" name="send" id="send" value="Envoyer">

    </form>

    <?php
    }

    else{
        ?>
    <script type="text/javascript">
        alert("Tu dois etre connecté pour faire une demande de trajet");
        location="home.php";
    </script>
<?php
    }
?>


</body>
</html>