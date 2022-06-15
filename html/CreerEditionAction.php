<?php
    include 'Connexion.php';
    
    $request="INSERT INTO edition(AnnéeEdition,DateDebut,HeureDebut,DateFin,HeureFin,Lieu,Description) VALUES ('".$_POST["Annee"]."','".$_POST["DateDebut"]."','".$_POST["HeureDebut"]."','".$_POST["DateFin"]."','".$_POST["HeureFin"]."','".$_POST["Lieu"]."','".$_POST["Description"]."')";

    if ($conn->query($request) === TRUE){
        ?>
        <script type="text/javascript">
            alert("Ton édition a bien été enregistrée");
            location="gestionEdition.php";
        </script>
      <?php
      die();
    } else {
        ?>
        <script type="text/javascript">
            alert("Une erreur s'est produite réessaye");
            location="gestionEdition.php";
        </script>
      <?php
      die();
    }

?>