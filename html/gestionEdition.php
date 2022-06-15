<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des éditions LBR Covoiturages</title>
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../css/Edition.css">
</head>
<body>
    <?php
        include 'Connexion.php';
        include 'NavbarConn.php';
        if((isset($_SESSION["role"]) && $_SESSION["role"] == 1)){
    ?>
    <h1>Gestion des éditions LBR Covoiturages</h1>

    <div class="DeleteButtondiv" id="DeleteButton">
        <button class="CreateButton" onclick="document.getElementById('CreateEd').style.display='block'">Créer une édition</button>
    </div>

    <div id="CreateEd" class="modal">
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
                <textarea name="Description"require="required"  id="Description" placeholder="Écris la description de l'édition içi" rows="8" cols="65"></textarea>

				
					
				<button type="submit" class="btn" name="create_ed" id="submit"><strong class="strongbutton">Créer une édition</strong></button>
					
				
				

            </div>
        </form>
    </div>

    <h2>Liste des Éditions</h2>
    
        <?php
            $requete = "SELECT * FROM edition ORDER BY AnnéeEdition";
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
                    <div class="DeleteButtondiv" id="DeleteButton">
                        <button class="ModifButton" onclick="document.getElementById('ModifEd').style.display='block'">Modifier</button>
                    </div>

                    <div class="book-container">
						<form class="Acrhiveform" method="post" action="ArchiveEditionAction.php" onsubmit="return confirm('Veux-tu vraiment archiver cette édition ?');">	
							<input type="hidden" name="IdEdition" value="<?php echo $row["IdEdition"];?>">
							<input type="submit" class="delbutton" value="Archiver l'édition">
						</form>
					</div>
                    <br/>
                    <div class="book-container">
						<form class="deleteform" method="post" action="DeleteEditionAction.php" onsubmit="return confirm('Veux-tu vraiment supprimer cette édition ?');">	
							<input type="hidden" name="IdEdition" value="<?php echo $row["IdEdition"];?>">
							<input type="submit" class="delbutton" value="Supprimer l'édition">
						</form>
					</div>
                </div>
                <br/>
                
                
                <div id="ModifEd" class="modal">
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
                                <textarea name="Description"require="required"  id="Description" placeholder="Écris la description de l'édition içi" rows="8" cols="65"> <?php echo $row["Description"]; ?></textarea>
                                <input type="hidden" name="IdEdition" value="<?php echo $row["IdEdition"]; ?>">

                                <button type="submit" class="btn" name="create_ed" id="submit"><strong class="strongbutton">Modifier cette édition</strong></button>
                            </div>
                        </form>
                    </div>
                
                
                
                
                <?php
            } 
        }
        else{
            ?>
			<script type="text/javascript">
				alert("Tu n'es pas connecté/ Tu n'es pas un administrateur");
				location="home.php";
			</script>
			<?php
        }
    ?>
</body>
</html>