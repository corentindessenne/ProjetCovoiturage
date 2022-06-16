<!doctype html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmation de compte - LBR Covoiturages</title>
</head>
<body>
<?php
if($_GET['key'] && $_GET['token']){
    include('Connexion.php');
    $email = $_GET['key'];
    $token = $_GET['token'];
    $request = "SELECT * FROM compte WHERE lien_verif_mail = '$token' AND Email = '$email'";
    $query = mysqli_query($conn, $request);

    //$query = mysqli_query($conn, "SELECT * FROM compte WHERE lien_verif_mail = '$token' AND Email = '$email'");
    $d = date("Y.m.d");

    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_array($query);
        if($row['date_verif_mail'] == NULL){
            if(mysqli_query($conn, "UPDATE compte SET date_verif_mail = '$d', isVerif = 1 WHERE Email = '$email'")){
                echo "<script type='text/javascript'>alert('GG à toi. Ton adresse mail est vérifiée. Tu peux désormais réserver un trajet, ou en proposer un à d\'autres festivaliers !'); document.location.href='../html/home.php';</script>";
            }
            else{
                echo "La requête a échoué";
            }
        }
        else{
            echo "<script type='text/javascript'>alert('Oups, tu as déjà vérifié ton adresse mail.'); document.location.href='../html/home.php';</script>";
        }
    }
    else{
        echo "<script type='text/javascript'>alert('Petit souci, l\'adresse renseignée nous est inconnue'); document.location.href='../html/home.php';</script>";
    }
}
else{
    echo "<script type='text/javascript'>alert('Pas sur que tu sois au bon endroit'); //document.location.href='../html/home.php';</script>";
}
?>

</body>
</html>