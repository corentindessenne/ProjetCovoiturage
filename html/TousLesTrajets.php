<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LBR Covoiturage</title>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	<link rel="stylesheet" type="text/css" href="../css/trajet.css">
	<!--Google Fonts-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.6.4.js"></script>
</head>
  <body>
    <?php include 'NavBar.php';
          include 'Connexion.php';
    ?>

  
	<div class="container">
        <h1>Liste des trajets</h1>
    </div>


    <form action="TousLesTrajets.php" method="get">

    <div class="AllerRetour">
            <input type="radio" required="required" name="AllerRetour" value="Aller" id="Aller"*><label for="Aller" class="AllerRetour">Aller</label>
            <input type="radio" required="required" name="AllerRetour" value="Retour" id="Retour"><label for="Retour" class="AllerRetour">Retour</label>
            <input type="radio" required="required" name="AllerRetour" value="Demande" id="Demande"><label for="Demande" class="AllerRetour">Demande</label>
            <input type="radio" required="required" name="AllerRetour" value="Proposition" id="Proposition"><label for="Proposition" class="AllerRetour">Proposition</label>
            <input type="radio" required="required" name="AllerRetour" value="DepartImm" id="DepartImm"><label for="DepartImm" class="AllerRetour">Départ Immédiat</label>
            <input type="radio" required="required" name="AllerRetour" value="Departlate" id="Departlate"><label for="Departlate" class="AllerRetour">Départ tardif</label>
            <input type="submit" name="send" id="send" value="jeSaisPasQuoiMettre">
        </div>
    </form>

    <div class="ListeTrajets">
    <div id="down" class="wrapper">
			<?php
			if(isset($_GET["AllerRetour"])){
				$order=$_GET["AllerRetour"];
				switch($order){
					case "Aller":
						$order="IdTrajet";
						$sens="DESC";
						$where=" WHERE TypeTrajet='Aller'";
						break;
					case "Retour":
						$order="IdTrajet";
						$sens="DESC";
						$where=" WHERE TypeTrajet='Retour'";
						break;
					case "Demande":
						$order="IdTrajet";
						$sens="DESC";
						$where=" WHERE isDemande='1'";
						break;
					case "Proposition":
						$order="IdTrajet";
						$sens="DESC";
						$where=" WHERE isDemande='0'";
						break;
					case "DepartImm":
						$order="DateDepart ASC, HeureDepart"; //j'utilise order de manière différente pour faciliter l'écriture de la requete ici
						$sens="ASC";
						$where="";
						break;
					case "Departlate":
						$order="DateDepart DESC, HeureDepart"; //j'utilise order de manière différente pour faciliter l'écriture de la requete ici
						$sens="DESC";
						$where="";
						break;
					default:	
						$order="IdTrajet";
						$sens="DESC";
						$where="";
				}
			}
			else{
				$order="IdTrajet";
				$sens="DESC";
			}
			
			$requete = "SELECT * FROM trajet".$where." ORDER BY ".$order." ".$sens."";
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
						<?php $sql = "SELECT * FROM compte WHERE IdCompte='".$row['IdCompte']."'";
                                
								$resultat = mysqli_query($conn,$sql); 
								$row2 = mysqli_fetch_assoc($resultat);?>
							<img class="profile-picture" src="../images/PhotoProfil/<?php if($row2["PhotoProfil"]!=NULL){echo $row2["PhotoProfil"];}else{echo "defaultpp.jpg";} ?>">
							<div class="profile-info">
                                
								<span class="name"><?php echo $row2["Prenom"] ?></span>
								<div class="available">
									<?php
										$value = $row['NbPassagers'] - $row['NbReservations'];
										if($value == 1) echo $value." place restante";
										else echo $value." places restantes"
									?>
								</div>
							</div>
							
							<div class="book-container"><a class="book" href="#" class="button">Réserver</a></div>
						</div>
					</div>

					<?php
				}
				?>
			</div>
    </div>

  
  </body>
</html>