<!DOCTYPE html>
<html>
<head>
    <title>Création d'une demande de trajet</title>
    <link href="" rel="stylesheet" >
</head>

<body>

    <h1>Création d'une demande de trajet</h1>
    <form action="ActionDemandeAjout.php" method="post">
        <div>
            <input type="radio" value="Aller" id="Aller" name="AllerRetour" ><label for="Aller">Aller</label>
            <input type="radio" name="AllerRetour" value="Retour" id="Retour"><label for="Retour">Retour</label>
        </div>
        <div>
            <p>Ville de départ/arrivée:</p>   <input type="text" name="Ville" id="Ville">
            <!--<p>Adresse de départ/arrivée:</p>   <input type="text" name="Adresse0" id="Adresse">-->
        </div>
        <p>Date de départ:</p>
        <input type="date" id="Date-de-Depart" name="Date-de-Depart" value="" min="2022-09-16">
        <p>Heure de départ:</p>
        <input type="time" id="Heure-de-Depart" name="Heure-de-Depart" value="">
        <p>Date et heure d'arrivée:</p>
        <!--//insérer la date via JS/API google-->
        <br>
        <p>Nombre de passager: </p>
        <input type="number" name="NbPass" id="NbPass" step="1" min="0" max="15">
        <br/>
        <p>Description (facultatif): </p>
        <textarea name="Description" id="Description" placeholder="Écris içi la description de ta demande de trajet" rows="8" cols="65"></textarea>
        <br/>
        <input type="checkbox" id="tel" value="tel" name="tel"> 
        <label>Coche pour rendre ton numéro de téléphone visible sur ton annonce</label>
        <br/>
        <input type="submit" name="send" id="send" value="Envoyer">

    </form>




</body>
</html>