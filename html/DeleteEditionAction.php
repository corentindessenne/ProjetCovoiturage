<?php
    include 'Connexion.php';

    $sql = "DELETE FROM edition WHERE AnnéeEdition='".$_POST["IdEdition"]."'" ;
    if ($conn->query($sql) === TRUE){
        ?>
        <script type="text/javascript">
            alert("Ton édition a bien été supprimée");
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
