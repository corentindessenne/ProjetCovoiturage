<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Edit Location LBR Covoiturage</title>
</head>

<body>

<?php
include 'Connexion.php';        //on se connecte à la base de donnée

$sql = "ALTER TABLE trajet ALTER LieuDepart SET DEFAULT '" . $_POST["Ville"] . "'";           //on remplace le lieu de départ par défaut par le nouvel emplacement du festival
$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    echo "Lieu départ changé avec succès";
    $sql = "ALTER TABLE trajet ALTER LieuArrivee SET DEFAULT '" . $_POST["Ville"] . "';";                         //meme chose pour le lieu d'arrivée
    if ($conn->query($sql) === TRUE) {
        $sql = "ALTER TABLE trajet ALTER AdresseDepart SET DEFAULT '" . $_POST["Adresse"] . "';";                 //On remplace l'adresse de départ par défaut par la nouvelle adresse du festival
        echo "Lieu Arrivée changé avec succès";
        if ($conn->query($sql) === TRUE) {
            $sql = "ALTER TABLE trajet ALTER AdresseArrivee SET DEFAULT '" . $_POST["Adresse"] . "';";            //meme chose pour l'adresse d'arrivée
            echo "Adresse départ changé avec succès";
            if ($conn->query($sql) === TRUE) {
                $sql = "ALTER TABLE trajet ALTER 	LongitudeDepart SET DEFAULT '" . $_POST["long"] . "';";            //On remplace la longitude par défaut par la nouvelle longitude
                echo "Adresse Arrivée changé avec succès";

                if ($conn->query($sql) === TRUE) {
                    $sql = "ALTER TABLE trajet ALTER LongitudeArrivee SET DEFAULT '" . $_POST["long"] . "';";         //meme chose pour l'arrivée
                    echo "Longitude Départ changé avec succès";
                    if ($conn->query($sql) === TRUE) {
                        $sql = "ALTER TABLE trajet ALTER LatitudeDepart SET DEFAULT '" . $_POST["lat"] . "';";           //meme chose pour la latitude de départ
                        echo "Longitude Arrivée changé avec succès";
                        if ($conn->query($sql) === TRUE) {
                            $sql = "ALTER TABLE trajet ALTER LatitudeArrivee SET DEFAULT '" . $_POST["lat"] . "';";       //meme chose pour la latitude d'arrivée
                            echo "Latitude Départ changé avec succès";
                            if ($conn->query($sql) === TRUE) {
                                echo "Latitude Arrivée changé avec succès";
                                header("Location: espaceAdmin.php");                        //on redirige vers l'espace admin si toutes les
                            }                                                               //requêtes ont été effectuées avec succès
                            else {
                                echo "Le changement de la Latitude Arrivée ne s'est pas effectué";
                            }
                        } else {
                            echo "Le changement de la Latitude Départ ne s'est pas effectué";               //on affiche la/les requêtes qui ont échoués
                        }
                    } else {
                        echo "Le changement de la Longitude Arrivée ne s'est pas effectué";
                    }
                } else {
                    echo "Le changement de la Longitude Départ ne s'est pas effectué";
                }
            } else {
                echo "Le changement de l'Adresse Arrivée ne s'est pas effectué";
            }
        } else {
            echo "Le changement de l'Adresse Départ ne s'est pas effectué";
        }
    } else {
        echo "Le changement de la Ville Arrivée ne s'est pas effectué";
    }
} else {
    echo "Le changement de la Ville Départ ne s'est pas effectué";
}

?>
</body>