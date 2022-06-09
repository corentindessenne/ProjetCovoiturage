<?php
include 'Connexion.php';



$mail=$_SESSION["mail"];
$sql = "SELECT IdCompte FROM compte WHERE Email='".$mail."'" ;
$result = $conn->query($sql);
if($result->num_rows >  0){
    $row = $result->fetch_assoc();
    if(isset($_POST["IdTrajet"])){
        $id=$_POST["IdTrajet"];
        if(((isset($_SESSION['login']) && $_SESSION['login'] != '') && $_SESSION["role"] == 1) or $row["IdCompte"]==$_POST["IdCompte"]){
            $sql = "DELETE FROM trajet WHERE IdTrajet='".$id."'" ;
            if ($conn->query($sql) === TRUE){
                ?>
                <script type="text/javascript">
                    alert("Trajet supprimé avec succès");
                    location="TousLesTrajets.php";
                </script>
                <?php
            }
            else{
                ?>
                <script type="text/javascript">
                    alert("Une erreur c'est produite");
                    location="TousLesTrajets.php";
                </script>
                <?php
            }
            
        }
        else{
            ?>
            <script type="text/javascript">
                alert("Tu n'es pas un administrateur ou tu n'as pas créer ce trajet");
                location="TousLesTrajets.php";
            </script>
            <?php
            
        }
    }
    else{
        ?>
      <script type="text/javascript">
          alert("Tu es passé par un chemin douteux réessaye en passant par le boutton");
          location="TousLesTrajets.php";
      </script>
    <?php
    die();
    }
}
else if(!isset($_SESSION['login']) || $_SESSION['login'] == ''){
    ?>
    <script type="text/javascript">
        alert("Connecte toi avant d'essayer de supprimer un trajet");
        location="TousLesTrajets.php";
    </script>
  <?php
  die();
}
else{
    ?>
    <script type="text/javascript">
        alert("Une erreur c'est produite");
        location="TousLesTrajets.php";
    </script>
  <?php
  die();
}
