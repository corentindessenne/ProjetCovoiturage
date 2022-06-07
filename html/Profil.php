<!DOCTYPE html>
<html>
<head>
    <title>Mon Profil</title>
    <link href="../css/home.css" rel="stylesheet" >
    
    
</head>

<body>
<?php   
        include 'Connexion.php';
        if (!(isset($_SESSION['login']) && $_SESSION['login'] != '') && $_SESSION["role"] === true) {

        include 'NavBar3.php';

        }
        else if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
            include 'NavBar.php';
        }
        else{
            include 'NavBar2.php';
        }

$mail=$_SESSION["mail"];
$sql = "SELECT Nom,Prenom,telephone,PhotoProfil,Description,IdCompte FROM compte WHERE Email='".$mail."'" ;
$result = $conn->query($sql);
if ($result->num_rows >  0) {
    // output data of each row
    $row = $result->fetch_assoc();
      $nom=$row["Nom"];
      $prenom=$row["Prenom"];
      $idCompte=$row["IdCompte"];
      $phone="0".$row["telephone"];
      $description=$row["Description"];
      $pp=$row["PhotoProfil"];              //pp=Photo de Profil
      
    
  ?>
  <div class="Compte">
    <div class="PhotoDeProfil">
        <img class="profile-picture" src="..\images\PhotoProfil\<?php if($pp!=NULL){echo $pp;}else{echo "defaultpp.jpg";} ?>" alt="Ta PP" width="290" height="290">
        <form action="PPAction.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <input type="submit" name="submit" value="Enregistrer l'image choisie">
        </form>
        
    </div>

    <div class="InfosCompte">
        <p>Nom: <?php echo $nom;?></p>
        <p>Prenom: <?php echo $prenom;?> </p>
        <p>Email: <?php echo $mail;?></p>
        <p>Telephone: <?php echo $phone;?> </p>
        <br/>
        <p>Description: <?php echo $description;?> </p>
        <a href="EditProfil.php"><input type="button" id="EditInfo" name="EditInfo" value="editer les informations de ton compte"></a>
        <a href="EditPassword.php"><input type="button" id="EditPass" name="EditPass" value="Changer ton mot de passe"></a>

    </div>
    
    </div>
    <div id="Historique" >
        <h3>Ton historique: </h3>
        <div class="ListeTrajets">
    <div id="down" class="wrapper">
			<?php
			
			
			$requete = "SELECT * FROM trajet WHERE IdCompte='".$idCompte."'";
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
							
							<div class="book-container"><form action="<?php if($row["isDemande"]==1){echo "ModifDemandeTrajet.php";}else{echo "ModifConducteur.php";} ?>" method="post">
							<input type="hidden" name="IdTrajet" value="<?php echo $row["IdTrajet"]; ?>"></input>
							<input type="hidden" name="TypeTrajet" value="<?php echo $row["TypeTrajet"]; ?>"></input>
							<input type="hidden" name="LieuDepart" value="<?php echo $row["LieuDepart"]; ?>"></input>
							<input type="hidden" name="AdresseDepart" value="<?php echo $row["AdresseDepart"]; ?>"></input>
							<input type="hidden" name="DateDepart" value="<?php echo $row["DateDepart"]; ?>"></input>
							<input type="hidden" name="HeureDepart" value="<?php echo $row["HeureDepart"]; ?>"></input>
							<input type="hidden" name="NbPassagers" value="<?php echo $row["NbPassagers"]; ?>"></input>
							<input type="hidden" name="Description" value="<?php echo $row["Description"]; ?>"></input>
							<input type="hidden" name="DisplayTel" value="<?php echo $row["DisplayTel"]; ?>"></input>
							<?php  if($row["isDemande"]==0){ ?><input type="hidden" name="Prix" value="<?php echo $row["Prix"]; ?>"></input><?php } ?>
							<input type="submit" class="book" class="button" value="Modifier"></input>
						</form></div>
						</div>
					</div>

					<?php
				}
				?>
			</div>
    </div>
    </div>

    <div id="DeleteButton">
        <input type="button" id="Delete" name="Delete" value="SUPPRIMER VOTRE COMPTE">
    </div>
<?php
} else {
    ?>
    <script type="text/javascript">
        alert("Cette adresse mail n'est liee a aucun compte");
        location="Login.php";
    </script>
<?php
  }?>

</body>
</html>