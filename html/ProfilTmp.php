<!DOCTYPE html>
<html>
<head>
    <title>Mon Profil</title>
    <link href="../css/Profil.css" rel="stylesheet" >
	<!--Google Fonts-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.6.4.js"></script>

	<!-- Pour la PP -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/solid.min.css" rel="stylesheet" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/svg-with-js.min.css" rel="stylesheet" />
</head>

<body>
<?php   
        include 'Connexion.php';
		include 'NavbarConn.php';
		if(!isset($_SESSION['login']) && $_SESSION['login'] != ''){
			header("Location:home.php");
			
		  }

		if(isset($_POST["CompteId"])&& (isset($_SESSION['login']) &&$_SESSION['login'] != '') && $_SESSION["role"] == 1){
			$ismyaccount=0;
			$idCompte=$_POST["CompteId"];
			$sql = "SELECT * FROM compte WHERE IdCompte='".$idCompte."'" ;
		}
		else{
			$ismyaccount=1;
			$mail=$_SESSION["mail"];
			$sql = "SELECT * FROM compte WHERE Email='".$mail."'" ;
		}

		$result = $conn->query($sql);
		if ($result->num_rows >  0) {
		    // output data of each row
		    $row = $result->fetch_assoc();
		    $nom=$row["Nom"];
			$mail=$row["Email"];
		    $prenom=$row["Prenom"];
		    $idCompte=$row["IdCompte"];
		    $phone="0".$row["telephone"];
		    $description=$row["Description"];
		    $pp=$row["PhotoProfil"];              //pp=Photo de Profil
			$hashedpassword=$row["motDePasse"];
?>

  <h1 class="title">Ton Profil</h1>
  <div class="Compte">
  <div class="PhotoDeProfil">
	<img class="profile-picture BigPP" src="..\images\PhotoProfil\<?php if($pp!=NULL){echo $pp;}else{echo "defaultpp.jpg";} ?>" alt="Ta PP" width="250" height="290">
				<form action="PPAction.php" method="post" enctype="multipart/form-data" id="ppform" class="ppform" >
					<input type="file" name="file" class="PPbutton" id="file" style="visibility:hidden;" >
					<label for="file" class="PPbutton"><img src="..\images\icon\camera.png" class="camera"> <br/>Change	 ta photo de profil</label>
				
					
				</form>
				<script>
						let input = document.querySelector('input');

						input.onchange = handleChange;
						
						function handleChange(e) {
							
							//alert(input.value)
							document.forms["ppform"].submit();
							
						}
				</script>
			</div>

    <div class="InfosCompte">
	
		<div class="infop">
			<p class="infonom infolabel">Nom</p>
			<p class="infodonnees"> <?php echo $nom;?></p>
		</div>
		<div class="infop">
        <p class="infoprenom infolabel">Prenom </p>
		<p class="infodonnees"><?php echo $prenom;?> </p>
		</div>
		<div class="infop">
        <p class="infomail infolabel">Email </p>
		<p class="infodonnees"><?php echo $mail;?></p>
		</div>
		<div class="infop">
        <p class="infotel infolabel">Telephone </p>
		<p class="infodonnees"> <?php echo $phone;?> </p>
		</div>
        <br/>
		<div class="infop">
        <p class="infodescr infolabel">Description</p>
		<p class="infodonnees"> <?php echo $description;?> </p>
		</div>
        <a href="<?php if($ismyaccount==0){echo "EditProfil.php?id=".$idCompte;} else{echo "EditProfil.php";} ?>"><input type="button" class="buttoncompte" id="EditInfo" name="EditInfo" value="editer les informations de ton compte"></a>
        <a href="<?php if($ismyaccount==0){echo "EditPassword.php?id=".$idCompte;} else{echo "EditPassword.php";}?>"><input type="button" class="buttoncompte" id="EditPass" name="EditPass" value="Changer ton mot de passe"></a>

    </div>
    
    </div>
    <div id="Historique" >
        <h1 class="title">Ton historique </h1>
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
										$value = $row['NbPassagers'] - $row['PlacesRestantes'];
										if($value == 1) echo $value." place restante";
										else echo $value." places restantes"
									?>
								</div>
							</div>
							
							<div class="book-container"><form action="<?php if($row["isDemande"]==1){echo "ModifDemandeTrajet.php";}else{echo "ModifConducteur.php";} ?>" method="post">
							<input type="hidden" name="IdTrajet" value="<?php echo $row["IdTrajet"]; ?>"></input>
							<input type="hidden" name="TypeTrajet" value="<?php echo $row["TypeTrajet"]; ?>"></input>
							<input type="hidden" name="LieuDepart" value="<?php if($row["TypeTrajet"]=="Aller"){echo $row["LieuDepart"];} else{echo $row["LieuArrivee"];} ?>"></input>
							<input type="hidden" name="AdresseDepart" value="<?php if($row["TypeTrajet"]=="Aller"){echo $row["AdresseDepart"];} else{echo $row["AdresseArrivee"];}  ?>"></input>
							<input type="hidden" name="DateDepart" value="<?php echo $row["DateDepart"]; ?>"></input>
							<input type="hidden" name="HeureDepart" value="<?php echo $row["HeureDepart"]; ?>"></input>
							<input type="hidden" name="NbPassagers" value="<?php echo $row["NbPassagers"]; ?>"></input>
							<input type="hidden" name="Description" value="<?php echo $row["Description"]; ?>"></input>
							<input type="hidden" name="DisplayTel" value="<?php echo $row["DisplayTel"]; ?>"></input>
							<?php  if($row["isDemande"]==0){ ?><input type="hidden" name="Prix" value="<?php echo $row["Prix"]; ?>"></input><?php } ?>
							<input type="submit" class="book" class="button" value="Modifier"></input>
						</form></div>
						<div class="book-container">
								<form class="deleteform" method="post" action="DeleteTrajetaction.php" onsubmit="return confirm('Veux-tu vraiment supprimer ce trajet ?');">	
									<input type="hidden" name="IdTrajet" value="<?php echo $row["IdTrajet"];?>">
									<input type="hidden" name="IdCompte" value="<?php echo $row["IdCompte"];?>">
									<input type="hidden" name="Location" value="Profil.php">		
									<input type="submit" class="delbutton" value="Supprimer le trajet">
								</form>
							</div>
						
						</div>
					</div>

					<?php
				}
				?>
			</div>
    </div>
    </div>

    <div class="DeleteButtondiv" id="DeleteButton">
        <button class="ButtonDelete" onclick="document.getElementById('confirmDeletion').style.display='block'">Supprimer ton compte</button>
    </div>

    <div id="confirmDeletion" class="modal">
       <span onclick="document.getElementById('confirmDeletion').style.display= 'none'" class="close" title="Close modal">&times;</span>
        <form class="modal-content" action="deletionAction.php" method="post">
            <div class="container">
                <h3 style="text-align: left;">Es-tu absolument sûr ?</h3>
                <div class="separate">Attention ! C'est très important !</div>
                <div class="explications">
                    <p>Nous allons effacer <strong>ton compte, toutes tes demandes ainsi que tes propositions de trajet</strong></p>
					<p class="separate">Attention cette opération est <strong>IRRÉVERSIBLE</strong></p>
                </div>
				
					<p>Tape "<strong>OUI JE SUIS SUR</strong>": </p>
					
					<input type="text" required="required" id="Verif_1" name="Verif_1" onkeyup='check();'>
					<br/>
					<p class="separate">                                                                             </p>
					<script>
						
						var check = function() {
							if (document.getElementById('Verif_1').value == "OUI JE SUIS SUR") {
								document.getElementById('submit').disabled = false;
							} else {
								document.getElementById('Verif_1').style.color = 'red';
								document.getElementById('submit').disabled = true;
							}
						}
					</script>
					<?php if($ismyaccount==1) {?>
					<label>Rentre ton mot de passe pour qu'on puisse s'assurer qu'il s'agisse bien de toi:</label>
					<br/>
					

					<input type="password" required="required" placeholder="Mot de passe" name="password_1" id="password_1"><?php } ?>
					
					
					<input type="hidden" name="Compteid" value="<?php echo $idCompte; ?>" >
					<button type="submit" class="btn" name="del_user" id="submit"><strong class="strongbutton">SUPPRIMER MON COMPTE</strong></button>
					
				
				

            </div>
        </form>
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