<!DOCTYPE html>
<html>
<head>
    <title>Action Ajout</title>
</head>

<body>

<h1>Ca marche pas</h1>

<?php
include 'Connexion.php';

$_POST["Description"]= str_replace("'","''",$_POST["Description"]);

if($_POST["tel"]==1){$_POST["tel"]=1;}
else{$_POST["tel"]=0;}

$IdTrajet=8;

//echo $_POST["Date-de-Depart"]."<- ici";
if($_POST["AllerRetour"]=="Aller"){
    $request="UPDATE trajet SET TypeTrajet='".$_POST["AllerRetour"]."', isDemande= '1', LieuDépart='".$_POST["Ville"]."',LieuArrivée='Wervicq-Sud' ,DateDépart= '".$_POST["Date-de-Depart"]."',HeureDépart='".$_POST["Heure-de-Depart"]."',NbPassagers='".$_POST["NbPass"]."', Description='".$_POST["Description"]."',DisplayTel='".$_POST["tel"]."' WHERE IdTrajet=".$IdTrajet."";
}
else{
    $request="UPDATE trajet SET TypeTrajet='".$_POST["AllerRetour"]."', isDemande= '1', LieuArrivée='".$_POST["Ville"]."',LieuDépart='Wervicq-Sud', DateDépart= '".$_POST["Date-de-Depart"]."',HeureDépart='".$_POST["Heure-de-Depart"]."',NbPassagers='".$_POST["NbPass"]."', Description='".$_POST["Description"]."',DisplayTel='".$_POST["tel"]."' WHERE IdTrajet=".$IdTrajet."";
}



if ($conn->query($request) === TRUE) {
    $_SESSION["confirme"]=1;
    echo "New record created successfully";
    header("Location: home.php");
    
die();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>
</body>
</html>