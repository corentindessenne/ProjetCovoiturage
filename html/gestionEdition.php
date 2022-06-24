<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des éditions LBR Covoiturages</title>
    <!--CSS files-->
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../css/Edition.css">
    <!--Favicon-->
	<link rel="icon" href="../images/LBR Ressources/intiniales.png" type="images/png"/> 
    <!--Library-->
    <script src="https://code.jquery.com/jquery-1.6.4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!--Google Maps API-->
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzOGPYwZqOFb6hCGtZo68-nQ4sxwum7Hg">
    </script>
</head>
<body>
    <?php
        include 'Connexion.php';            //Connexion a la base de donnée et affichage de la navbar
        include 'NavbarConn.php';
      
        if((isset($_SESSION["role"]) && $_SESSION["role"] == 1)){       //On vérifier que l'utilisateur est un administrateur
    ?>
    <h1>Gestion des éditions LBR Covoiturages</h1>

    <div class="DeleteButtondiv" id="DeleteButton">
        <button class="CreateButton" onclick="document.getElementById('CreateEd').style.display='block'">Créer une édition</button>
    </div>                                                      <!--Bouton pour afficher le modal de création d'édition-->

    <div id="CreateEd" class="modal">
        <!--Modal contenant le formulaire de création d'un édition-->
       <span onclick="document.getElementById('CreateEd').style.display= 'none'" class="close" title="Close modal">&times;</span>
        <form class="modal-content" action="CreerEditionAction.php" method="post">
            <div class="container">
                <label for="Annee">Année de l'édition:</label>
                <input type="number" require="required" name="Annee" id="Annee"  min="2021" step="1" >
                <br/>
                <label for="DateDebut">Date de début de l'édition</label>
                <input type="date" require="required" name="DateDebut" id="DateDebut" min="2021-09-23" >
                <br/>
                <label for="HeureDebut">Heure de début de l'édition</label>
                <input type="time" require="required" name="HeureDebut" id="HeureDebut">
                <br/>
                <label for="DateFin">Date de fin de l'édition</label>
                <input  type="date" require="required" name="DateFin" id="DateFin" min="2021-09-25">
                <br/>
                <label for="HeureFin">Heure de fin de l'édition</label>
                <input  type="time" require="required" name="HeureFin" id="HeureFin"> 
                <br/>
                <label for="Lieu">Lieu de l'édition</label>
                <input type="text" require="required" name="Lieu" id="Lieu" placeholder="Emplacement du festival pour cette édition">
                <br/>
                <label for="Description">Description de l'édition</label>
                <textarea name="Description"require="required"  id="Description" placeholder="Écris la description de l'édition ici" rows="8" cols="65"></textarea>

				
					
				<button type="submit" class="btn" name="create_ed" id="submit"><strong class="strongbutton">Créer une édition</strong></button>
					
				
				

            </div>
        </form>
    </div>

    <h2>Liste des Éditions</h2>
    
        <?php
            $requete = "SELECT * FROM edition ORDER BY AnnéeEdition";
            //On récupère toutes les éditions et on les affiche
			$result = mysqli_query($conn,$requete);
            while($row = mysqli_fetch_assoc($result)){
                ?>
                <div class="EditionList">
                    <h3 class="EditionYear"><?php echo $row["AnnéeEdition"]; ?></h3>
                    <div class="EditionDate">
                        <p><?php echo $row["DateDebut"]; ?></p>
                        <p><?php echo $row["DateFin"]; ?></p>
                    </div>
                    
                    <div class="EditionHour">
                        <p><?php echo $row["HeureDebut"]; ?></p>
                        <p><?php echo $row["HeureFin"]; ?></p>
                    </div>
                    
                    <p><?php echo $row["Lieu"]; ?></p>
                    <p><?php echo $row["Description"]; ?></p>
                    <div class="DeleteButtondiv" id="DeleteButton"> <!--Bouton pour modifer l'édition-->
                        <button class="ModifButton" onclick="document.getElementById('ModifEd').style.display='block'">Modifier</button>
                    </div>
                    <br/>
                    <div class="book-container">
                        <!--Bouton pour supprimer l'édition-->
						<form class="deleteform" method="post" action="DeleteEditionAction.php" onsubmit="return confirm('Veux-tu vraiment supprimer cette édition ?');">	
							<input type="hidden" name="IdEdition" value="<?php echo $row["AnnéeEdition"];?>">
							<input type="submit" class="delbutton" value="Supprimer l'édition">
						</form>
					</div>
                </div>
                <br/>
                
                
                <div id="ModifEd" class="modal">
                    <!--Modal contenant le formulaire de modification d'un édition-->
                        <span onclick="document.getElementById('ModifEd').style.display= 'none'" class="close" title="Close modal">&times;</span>
                        <form class="modal-content" action="ModifierEditionAction.php" method="post">
                            <div class="container">

                                <label for="Annee">Année de l'édition:</label>
                                <input type="number" require="required" name="Annee" id="Annee"  min="2021" step="1" value="<?php echo $row["AnnéeEdition"]; ?>" >
                                <br/>
                                <label for="DateDebut">Date de début de l'édition</label>
                                <input type="date" require="required" name="DateDebut" id="DateDebut" min="2021-09-23" value="<?php echo $row["DateDebut"]; ?>" >
                                <br/>
                                <label for="HeureDebut">Heure de début de l'édition</label>
                                <input type="time" require="required" name="HeureDebut" id="HeureDebut" value="<?php echo substr_replace($row["HeureDebut"] ,"", -8);?>">
                                <br/>
                                <label for="DateFin">Date de fin de l'édition</label>
                                <input  type="date" require="required" name="DateFin" id="DateFin" min="2021-09-25"  value="<?php echo $row["DateFin"]; ?>">
                                <br/>
                                <label for="HeureFin">Heure de fin de l'édition</label>
                                <input  type="time" require="required" name="HeureFin" id="HeureFin" value="<?php echo substr_replace($row["HeureFin"] ,"", -8);?>"> 
                                <br/>
                                <label for="Lieu">Lieu de l'édition</label>
                                <input type="text" require="required" name="Lieu" id="Lieu" placeholder="Emplacement du festival pour cette édition"  value="<?php echo $row["Lieu"]; ?>">
                                <br/>
                                <label for="Description">Description de l'édition</label>
                                <textarea name="Description"require="required"  id="Description" placeholder="Écris la description de l'édition ici" rows="8" cols="65"> <?php echo $row["Description"]; ?></textarea>
                                <input type="hidden" name="IdEdition" value="<?php echo $row["AnnéeEdition"]; ?>">

                                <button type="submit" class="btn" name="create_ed" id="submit"><strong class="strongbutton">Modifier cette édition</strong></button>
                            </div>
                        </form>
                    </div>
                
                
                
                
                <?php
            } 
        }
        else{
            header("Location: home.php");
        }
    ?>
<!--Formulaire pour modifier l'emplacement du festival-->
<form method="post" action="EditLocationAction.php">
    <label for="Ville">Ville:</label>
    <input type="text" name="Ville" id="Ville">
    <label for="Adresse">Adresse:</label>
    <input type="text" name="Adresse" id="Adresse">
    <input type="hidden" name="long" id="long">
    <input type="hidden" name="lat" id="lat">

    <input type="submit">
</form>




<script>
    //Finction de calcul des coordonnées de l'emplacement du festival
    let queryCoord = {lat : 0, lng : 0};
    document.getElementById("Adresse").onchange = function(){ changeLieu();}  
    document.getElementById("Ville").onchange = function(){ changeLieu();}
    

    function changeLieu(){
        let quer="";
        query=document.getElementById("Adresse").value;
        query += " "+document.getElementById("Ville").value;
        getDataFromForm(query);
    }

    function getDataFromForm(query){
    
        
    console.log(query);
    $.getJSON('http://api.positionstack.com/v1/forward?access_key=3afeb3b8f8e21edd8aa31037edcdc1b6&query=' + query, function(data) {
        let arrivee="";
        let depart="";
        var directionsService = new google.maps.DirectionsService();
        var directionsRenderer = new google.maps.DirectionsRenderer();

        queryCoord.lat = data.data[0].latitude;
        queryCoord.lng = data.data[0].longitude;
        document.getElementById("lat").value=queryCoord.lat;
        document.getElementById("long").value=queryCoord.lng;

    });
  }
</script>




<script>
    //fonction limitant la taille max de la description d'une édition
  var $limitNum = 150;  //modifier cette variable pour modifier le nombre maximum de caractère de la description d'une édition
$('textarea[name="Description"]').keydown(function() {
    var $this = $(this);

    if ($this.val().length > $limitNum) {
        $this.val($this.val().substring(0, $limitNum));
    }
});
</script>
</body>
</html>