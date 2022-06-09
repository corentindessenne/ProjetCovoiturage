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

	<script src="https://code.jquery.com/jquery-1.6.4.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

</head>

<body>

	

	<?php 
		include 'Connexion.php';
		include 'NavbarConn.php';
	?>
	<div class="title">
		<h1> ESPACE ADMIN </h1>
	</div>
	<section>

		<div class="wrapper">
			<!-- Left arrow button -->
			<button class="button">
				<!-- Arrow -->
				<div class="button__arrow button__arrow--left"></div>
			</button>
			<h2> 2022 </h2>

			<!-- Right arrow button -->
			<button class="button">
				
				<div class="button__arrow button__arrow--right"></div>
			</button>
		</div>
	</section>
	
	<div class="edition">
		<div class="header">	
			<h2>LBR TIMES</h2>
		</div>
		<div id="bloc1">
			<div class="boxy"> 
				<div class="subtitle1">
					<h2>What is Lorem Ipsum?</h2>
				</div>
				<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry.</p>
			</div>
		</div>

		<div id="bloc2">
			<div class="boxy"> 
				<div class="subtitle2">
					<h2>What is Lorem Ipsum?</h2>
				</div>
				<p>It is a long established fact that a reader will be distracted by the readable content</p>
			</div>
		</div>
		
		<div id="bloc3">
			<img src="../images/road.png">
			<div class="boxy2">
				<div class="subtitle3">
					<h2>What is Lorem Ipsum?</h2>
				</div>
				<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
			</div><br>
		</div>
		<div id="bloc4">
			<div class="boxy"> 
				<div class="subtitle1">
					<h2>What is Lorem Ipsum?</h2>
				</div>
				<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry.</p>
			</div>
		</div>
		
		<div id="bloc5">
			<div class="boxy"> 
				<div class="subtitle2">
					<h2>What is Lorem Ipsum?</h2>
				</div>
				<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry.	</p>
			</div>
		</div>
	</div>
</body>
</html>



