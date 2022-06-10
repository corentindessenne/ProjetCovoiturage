<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LBR Covoiturage</title>
	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../css/eAdmin.css">
	<!--Google Fonts-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	
	<script src="https://code.jquery.com/jquery-1.6.4.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

</head>

<body>

	

	<?php 
		include 'Connexion.php';
		include 'NavbarConn.php';
		

		if(isset($_POST["annee"])){
			if($_POST["annee"]<2021){$anneeEd=2021;}
			else{$anneeEd=$_POST["annee"];}
			
		}
		else{
			$anneeEd=date("Y");
		}
		
		if((isset($_SESSION['login']) && $_SESSION['login'] != '') && $_SESSION["role"] == 1){
	?>
	<div class="title">
		<h1> ESPACE ADMIN </h1>
	</div>
	<section>

		<div class="wrapper">
			<form action="espaceAdmin.php" method="post">
				<!-- Left arrow button -->
				<input type="hidden" name="annee" value="<?php echo $anneeEd-1 ?>"/>
				<button class="button" onClick="javascript:this.form.submit();">
					<!-- Arrow -->
					<div class="button__arrow button__arrow--left"></div>
				</button>
			</form>
				<h2> <?php echo $anneeEd; ?> </h2>

				<!-- Right arrow button -->
			<form action="espaceAdmin.php" method="post">
				<input type="hidden" name="annee" value="<?php echo $anneeEd+1 ?>"/>
				<button class="button" onClick="javascript:this.form.submit();">
					
					<div class="button__arrow button__arrow--right"></div>
				</button>
			</form>
		</div>
	</section>



	<?php 	
			$requete = "SELECT isDemande, NbPassagers, PlacesRestantes FROM trajet WHERE AnneeEdition='".$anneeEd."'";
			$result = mysqli_query($conn,$requete);

			$nbTrajets=0;
			$nbDemandes=0;
			$nbVoituresRemplies=0;
			$nbPassagers=0;
			$nbCompte=0;

			while ($row = mysqli_fetch_assoc($result)) {
				$nbTrajets++;

				if($row["isDemande"]==1){$nbDemandes++;}
				if($row["PlacesRestantes"]==0){$nbVoituresRemplies++;}
				$nbPassagers+= $row["NbPassagers"]-$row["PlacesRestantes"];
			}
			
			$requete = "SELECT IdCompte FROM compte WHERE YEAR(DateCreation)='".$anneeEd."'";
			$result = mysqli_query($conn,$requete);
			while ($row = mysqli_fetch_assoc($result)) {$nbCompte++;}

	?>



	<div class="edition">
		<div class="header">	
			<h2>LBR TIMES</h2>
		</div>
		<div id="bloc1">
			<div class="boxy"> 
				<div class="subtitle1">
					<h2>A l'occasion de l'ouverture du site</h2>
				</div>
				<p><?php echo $nbTrajets; ?> trajets ont été crées !</p>
			</div>
		</div>

		<div id="bloc2">
			<div class="boxy"> 
				<div class="subtitle2">
					<h2>Depuis la création du site</h2>
				</div>
				<p>Plus de <?php echo $nbDemandes; ?> demandes de covoiturages ont été faites!!</p>
			</div>
		</div>
		
		<div id="bloc3">
			<img src="../images/road.png">
			<div class="boxy2">
				<div class="subtitle3">
					<h2>A l’aide de vos compagnons mécaniques</h2>
				</div>
				<p>Plus de <?php echo $nbVoituresRemplies; ?> voitures ont été remplies !</p>
			</div><br>
		</div>
		<div id="bloc4">
			<div class="boxy"> 
				<div class="subtitle1">
					<h2>Grâce à votre solidarité</h2>
				</div>
				<p><?php echo $nbPassagers; ?> passagers ont pu embarqué dans vos bolides !</p>
			</div>
		</div>
		
		<div id="bloc5">
			<div class="boxy"> 
				<div class="subtitle2">
					<h2>Nous avons vite grandit</h2>
				</div>
				<p>Plus de <?php echo $nbCompte; ?> personnes ont rejoint le covoiturage Les Briques Rouges</p>
			</div>
		</div>
	</div>
	<?php

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



