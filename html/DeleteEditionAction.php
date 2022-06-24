<?php
    include 'Connexion.php';

    $sql = "DELETE FROM edition WHERE AnnéeEdition='".$_POST["IdEdition"]."'" ;           //requete de supression de l'édition
    if ($conn->query($sql) === TRUE){
        ?>
        <script type="text/javascript">
            alert("Ton édition a bien été supprimée");
            location="gestionEdition.php";
        </script>
      <?php
      die();                                                    //on précise si la requete a été effectué avec succès ou non puis 
    } else {                                                    //on redirige vers la page de gestion des éditions
        ?>
        <script type="text/javascript">
            alert("Une erreur s'est produite réessaye");
            location="gestionEdition.php";
        </script>
      <?php
      die();
    }

?>
