<?php
session_start();

$_SESSION['logout'] = 1;        //On initialise une variable de session avant de rediriger vers la page d'accueil ou on affiche une alerte avant de déconnecter l'utilisateur
header('Location: home.php');
exit;
