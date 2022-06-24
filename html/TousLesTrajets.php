<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LBR Covoiturage</title>
	<!--CSS files-->
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	<link rel="stylesheet" type="text/css" href="../css/trajet.css">
	<!--Favicon-->
	<link rel="icon" href="../images/LBR Ressources/intiniales.png" type="images/png"/> 
	<!--Google Fonts-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.6.4.js"></script>
</head>
  <body>
    <?php
          include 'Connexion.php';
		  include 'NavbarConn.php';
    ?>

  
		<h1>Liste de tous les trajets</h1>

	

    <form>
	<!--Radio pour trier les trajets-->
    <div class="AllerRetour">
            <input type="radio" required="required" name="AllerRetour" value="Aller" id="Aller" onclick="SortDiv('Aller');" ><label for="Aller" class="AllerRetour">Aller</label>
            <input type="radio" required="required" name="AllerRetour" value="Retour" id="Retour" onclick="SortDiv('Retour');"><label for="Retour" class="AllerRetour">Retour</label>
            <input type="radio" required="required" name="AllerRetour" value="Demande" id="Demande" onclick="SortDiv('Demande');"><label for="Demande" class="AllerRetour	">Demande</label>
            <input type="radio" required="required" name="AllerRetour" value="Proposition" id="Proposition" onclick="SortDiv('Proposition');"><label for="Proposition" class="AllerRetour">Proposition</label>
			<input type="radio" required="required" name="Tri" value="Sale" id="Sale" onclick="SortDiv('Sale');"><label for="Sale" class="Tri">Le moins cher</label>
			<input type="radio" required="required" name="Tri" value="Cher" id="Cher" onclick="SortDiv('Cher');"><label for="Cher" class="Tri">Le plus cher</label>
        </div>
    </form>
    <div class="ListeTrajets" >
    <div id="trajets" class="wrapper">
		
			<?php

			$count=0;
			$requete = "SELECT * FROM trajet";
			$result = mysqli_query($conn,$requete);
			
			//Affichage des trajets
			while ($row = mysqli_fetch_assoc($result)) {

				$hourString1 = substr($row['HeureDepart'],0,2);
				$hourString2 = substr($row['HeureDepart'],3,2);
				$hourStringDeparture = $hourString1."h".$hourString2;


				$hourString3 = substr($row['HeureArrivee'],0,2);
				$hourString4 = substr($row['HeureArrivee'],3,2);
				$hourStringArrival = $hourString3."h".$hourString4;

				?>

					<div class="item" id="<?php echo $count; ?>" >
						
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

							<span style="display:none" class="TypeTrajet"><?php echo $row["TypeTrajet"]; ?></span>
							<span style="display:none" class="isDemande"><?php echo $row["isDemande"]; ?></span>
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
										$value = $row['PlacesRestantes'];
										if($row["isDemande"]==1){ echo "Recherche une voiture";}
										else if($value == 1){ echo $value." place restante";}
										else echo $value." places restantes";
									?>
								</div>
								<!--On affiche le numéro de téléphone si l'utilisateur le souhaite-->
                                <div class="available" id="placesRestantes">
                                    <span id="DisplayTel">
									<?php
										if($row["DisplayTel"]==1)echo "numéro de téléphone: 0".$row2["telephone"];
		
									?>
                                    </span>
								</div>
							</div>
								
							
								<div class="book-container">
										<?php
											$linkPropos = "proposition.php?typeTrajet=".$row['TypeTrajet']."&idTrajet=".$row['IdTrajet'];
										if($row["isDemande"] == 0){ ?> 
											<?php $linkint = "nbPass.php?idTrajet=".$row['IdTrajet'];?>
										<a class="book" href="<?php echo $linkint ?>" class="button">Réserver</a>
										<?php										
										} 
										else if($row["isDemande"]==1){ ?> <a class="book2" href="<?php echo $linkPropos ?>" class="button">Demander</a> <?php
										 } 
										?>
								</div>
							

							<?php if((isset($_SESSION['login']) && $_SESSION['login'] != '') && $_SESSION["role"] == 1){ ?>
							<div class="book-container">
								<form class="deleteform" method="post" action="DeleteTrajetaction.php" onsubmit="return confirm('Veux-tu vraiment supprimer ce trajet ?');">	
									<input type="hidden" name="IdTrajet" value="<?php echo $row["IdTrajet"];?>">
									<input type="hidden" name="IdCompte" value="<?php echo $row["IdCompte"];?>">
									<input type="hidden" name="Location" value="TousLesTrajets.php">		
									<input type="submit" class="deletebutton" value="Supprimer le trajet">
								</form>
							</div>

							<?php } ?>
							
						</div>
					</div>
					
					<?php
				$count++;
			}
				?>
			</div>

			<script>

				function SortDiv(sort){
			
					let Toustrajet=document.getElementById("trajets");
					let Display=Toustrajet;
					let price=[];
					//tri en fonction des radios cochés
					for(let i=0; i<Toustrajet.children.length;i++){
						switch (sort){
							case 'Aller':
								
								if(Display.children[i].getElementsByClassName("TypeTrajet")[0].textContent!="Aller"){
									document.getElementById(i).style.display="none"
									
								}
								else{
									document.getElementById(i).style.display="block"
								}
								
								break;

							case 'Retour':

								if(Display.children[i].getElementsByClassName("TypeTrajet")[0].textContent=="Aller"){
									document.getElementById(i).style.display="none"
									
								}
								else{
									document.getElementById(i).style.display="block"
								}
								break;
							
							case 'Demande':
								if(Display.children[i].getElementsByClassName("isDemande")[0].textContent=="0"){
									document.getElementById(i).style.display="none"
								}
								else{
									document.getElementById(i).style.display="block"
								}
								break;
							
							case 'Proposition':
								if(Display.children[i].getElementsByClassName("isDemande")[0].textContent!="0"){
									document.getElementById(i).style.display="none"
								}
								else{
									document.getElementById(i).style.display="block"
								}
								break;
							
							case 'Sale':
								let price1=Display.children[i].getElementsByClassName("price")[0].textContent.replace('€', '');
								price[i]=Number(price1);
								price.sort(function(a, b) {
									return a - b;
								});
								
								
								
								break;
							
							case 'Cher':
								let price3=Display.children[i].getElementsByClassName("price")[0].textContent.replace('€', '');
								price[i]=Number(price3);
								price.sort(function(a, b) {
									return a - b;
								});
								price.reverse();
								
							
								break;
							
						}
						
						
						
					}
					//On réorganise le fichier en fonction du tri
					for(let i=0; i<Toustrajet.children.length;i++){
						for(let j=0; j<Toustrajet.children.length;j++){
									let price2=parseInt(Display.children[j].getElementsByClassName("price")[0].textContent.replace('€', ''));
									if(Number(price2)==price[i]){
										let temp=Display.children[i].innerHTML;
										Display.children[i].innerHTML=Display.children[j].innerHTML
										Display.children[j].innerHTML=temp;
									}
												
								}
					}
					
					document.getElementById("trajets").innerHTML=Display.innerHTML;
					
					
				}
				
				

			</script>
    </div>

  
  </body>
</html>