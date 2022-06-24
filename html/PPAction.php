<?php
//Connexion a la base de donnée
include 'Connexion.php';
$statusMsg = '';

$mail=$_SESSION["mail"];
$sql = "SELECT IdCompte FROM compte WHERE Email='".$mail."'" ;//On récupère l'id du compte concerné
$result = $conn->query($sql);
if ($result->num_rows >  0) {
    $row = $result->fetch_assoc();
      $id=$row["IdCompte"];
      
}

// File upload path
$targetDir = "../images/PhotoProfil/";
$fileName = basename($_FILES["file"]["name"]);
$ext = pathinfo($fileName, PATHINFO_EXTENSION);    //on récupère le type du fichier
$fileName=$id.".".$ext;
$targetFilePath = $targetDir.$id.".".$ext;  //On renomme le fichier en fonction de l'Id pour éviter d'écraser la photo de profil d'un autre compte
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
if(!empty($_FILES["file"]["name"])){
    // On accepte que les fichier de type jpg jpeg ou png
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes)){
        //On ajoute le fichier dans le seveur
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // On insère le fichier dans la base de donnée
            $request="UPDATE compte SET  PhotoProfil='".$id.".".$ext."' WHERE Email='".$_SESSION["mail"]."' ";
            if ($conn->query($request) === TRUE) {
                header("Location: Profil.php");
              die();
                } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }
              
        }else{
            //************************* 
            //   MESSAGE D'ERREUR
            //************************* 
            ?>
                <script type="text/javascript">
                    alert("Une erreur s'est produite lors de l'envoie de ton image");
                    location="Profil.php";
                </script>
            <?php
        }
    }else{
        ?>
            <script type="text/javascript">
                alert("Seul les fichiers JPG, JPEG et PNG sont acceptés");
                location="Profil.php";
            </script>
        <?php
    }
}else{
    ?>
        <script type="text/javascript">
            alert("Choisis une image a envoyer");
            location="Profil.php";
        </script>
    <?php
}

?>