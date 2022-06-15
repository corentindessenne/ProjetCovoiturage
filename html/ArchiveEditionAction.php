<?php
    include 'Connexion.php';
    
    $request="UPDATE edition SET IsArchived='1' WHERE IdEdition='".$_POST["IdEdition"]."'";

    
    if ($conn->query($request) === TRUE){
        ?>
        <script type="text/javascript">
            alert("Ton édition a bien été archivée");
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