<!DOCTYPE html>
<html>
<head>
    <title>Modification d'un trajet conducteur</title>
    <link href ="../css/AjoutModif.css" rel="stylesheet" >
</head>

<body>

    <h1>Modification d'un trajet conducteur</h1>
    <form action="ActionModifCond.php" method="post">
        <div class="AllerRetour">
            <input type="radio" value="Aller" id="Aller" name="AllerRetour" ><label for="Aller" class="AllerRetour">Aller</label>
            <input type="radio" name="AllerRetour" value="Retour" id="Retour"><label for="Retour" class="AllerRetour">Retour</label>
        </div>
        <div>
            <p>Ville de départ/arrivée:</p>   <input type="text" name="Ville" id="Ville">
            <!--<p>Adresse de départ/arrivée:</p>   <input type="text" name="Adresse0" id="Adresse">-->
        </div>
        <p>Date de départ:</p>
        <input type="date" id="Date-de-Depart" name="Date-de-Depart" class="Date-de-Depart" min="2022-09-16">
        <p>Heure de départ:</p>
        <input type="time" id="Heure-de-Depart" name="Heure-de-Depart" class="Heure-de-Depart">
        <p>Date et heure d'arrivée:</p>
        <!--//insérer la date via JS/API google-->
        <br/>
        <p>Prix par passager: </p>
        <div class="PrixSelect">
            <input type="number" class="Prix" name="Prix" id ="Prix" step=".01" min="0">
            <i>€</i>
        </div>
        <br>
        <p>Nombre maximum de passager acceptés: </p>
        <input type="number" name="NbPass" id="NbPass" class="NbPass" step="1" min="0" max="15">
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




</body>
</html>