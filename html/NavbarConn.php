<?php

if ((isset($_SESSION['login']) && $_SESSION['login'] != '') && $_SESSION["role"] == 1) {
        	
    include 'NavBar3.php';

    }
    else if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
        include 'NavBar.php';
    }
    else{
        include 'NavBar2.php';
    }



?>