<?php
// Include the database configuration file
include 'Connexion.php';
$statusMsg = '';

// File upload path
$targetDir = "../images/PhotoProfil/";
$fileName = basename($_FILES["file"]["name"]);
$ext = pathinfo($fileName, PATHINFO_EXTENSION);    //get the extension of the file
$targetFilePath = $targetDir.$_SESSION["id"].".".$ext;  //rename the file with the account id so it deletes itself when updated in the database
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $request="UPDATE compte SET  PhotoProfil='".$fileName."' WHERE Email='".$_SESSION["mail"]."' ";
            if ($conn->query($request) === TRUE) {
                header("Location: Profil.php");
              die();
                } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }
              
        }else{
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