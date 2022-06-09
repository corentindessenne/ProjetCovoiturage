<!DOCTYPE html>
<html>
<head>
    <title>Ajout d'un trajet conducteur</title>
    <link href ="../css/AjoutModif.css" rel="stylesheet" >
    <script src="https://code.jquery.com/jquery-1.6.4.js"></script> 
</head>

<body>
<?php 
include 'Connexion.php';
include 'NavbarConn.php';
    if(isset($_SESSION["mail"])){
?>

    <h1>Ajout d'un trajet conducteur</h1>
    <div class=formap></div>
    <form action="ActionAjout.php" method="post" id="myform">
        <div class="AllerRetour">
            <input type="radio" required="required" value="Aller" id="Aller" name="AllerRetour" ><label for="Aller" class="AllerRetour">Aller</label>
            <input type="radio" required="required" name="AllerRetour" value="Retour" id="Retour"><label for="Retour" class="AllerRetour">Retour</label>
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
            <input type="number" required="required" class="Prix" name="Prix" id ="Prix" step=".01" min="0">
            <i>€</i>
        </div>
        <br>
        <p>Nombre maximum de passager acceptés: </p>
        <input type="number" required="required" name="NbPass" id="NbPass" class="NbPass" step="1" min="0" max="15">
        <br/>
        <p>Description (facultatif): </p>
        <textarea name="Description" id="Description" placeholder="Écris içi la description de ton trajet" rows="8" cols="65"></textarea>
        <br/>
        <div class="Checkboxtel">
        <input type="checkbox" id="tel" value="1" name="tel"> 
        <label>Coche pour rendre ton numéro de téléphone visible sur ton annonce</label>
        </div>
        
        <br/>
        <input type="button" name="send" id="send" value="Envoyer" onclick="getDataFromURL()">
        

    </form>
        <script>
            function getDataFromURL(){
            
                let query=document.getElementById("Adresse").value;
                console.log(query);
                $.getJSON('http://api.positionstack.com/v1/forward?access_key=3afeb3b8f8e21edd8aa31037edcdc1b6&query=' + query, function(data) {

                    queryCoord.lat = data.data[0].latitude;
                    queryCoord.lng = data.data[0].longitude;

                    console.log(queryCoord);

                });

                setTimeout(() => {

                    resolve("true");
                },2000);
                
                alert(query);
            
                $('#myform').submit();
        }
        </script>
    <div id="map"></div>

<?php
    }

    else{
        ?>
    <script type="text/javascript">
        alert("Tu dois etre connecté pour entrer un trajet");
        location="home.php";
    </script>
<?php
    }
?>

</body>
</html>