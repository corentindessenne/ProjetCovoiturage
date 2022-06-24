<!doctype html>
    <html>
    <head>
        <title>Edition Mail LBR Covoiturage</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CSS Files-->
        <link rel="stylesheet" type="text/css" href="../css/email.css">
        <!--Favicon-->
        <link rel="icon" href="../images/LBR Ressources/intiniales.png" type="images/png"/> 

        <!--Google Fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-1.6.4.js"></script>
    </head>
    <body>


        <div class="logo">
          <a href=""><img src="../images/LBR Ressources/logo.png"></a>
      </div>  
      <nav class="nav__cont">
          <ul class="nav">

            <li class="nav__items" id="email0">
              <img src="../images/icon/BackArrow.png">
              <a id="email1" href="espaceAdmin.php">Retourner sur l'espace admin</a>
          </li>

          <li class="nav__items" id="email1">
              <img src="../images/icon/nocar.png">
              <a id="email1">Supr. compte</a>
          </li>
                                                                            <!--Navbar latérale avec choix de l'email à modifier-->
          <li class="nav__items" id="email2">
              <img src="../images/icon/email.png">
              <a id="email2">Supr. trajet</a>
          </li>

          <li class="nav__items" id="email3">
             <img src="../images/icon/car.png">
             <a id="email3">Créateur Demande</a>
         </li>

         <li class="nav__items" id="email4">
            <img src="../images/icon/driver.png">
            <a id="email4">Réserve trajet</a>
        </li>

        <li class="nav__items" id="email5">
            <img src="../images/icon/check.png">
            <a id="email5">Confirmation Demande</a>
        </li>

        <li class="nav__items" id="email5">
            <img src="../images/icon/Apply.png">
            <a id="email6">Confirmation création de compte</a>
        </li>

        <li class="nav__items" id="email5">
            <img src="../images/icon/ResetPassword.png">
            <a id="email7">réinitialistion de mdp</a>
        </li>



        <li class="nav__items" id="email5">
            <img src="../images/icon/Check2.png">
            <a id="email8">Confirmation conducteur</a>
        </li>


    </ul>
</nav>

<!--Formulaires contenant les paragraphe et le titre du mail a changer-->
<div class="main" id="main">
    <form action="emailModif.php" method="post" id="text1">
      <div class="email" >
        <input type="hidden" name="mail" value="DeleteAccount">
        <h1>Suppression de compte</h1>
        <label for="h1">Titre:</label>
        <textarea name="h1"   rows="2" cols="50" wrap="soft" id="textzone" >Salut {{Prenom}} !</textarea>
        <label for="p1">Paragraphe 1:</label>
        <textarea name="p1"   rows="4" cols="25" wrap="soft" id="textzone" >Nous te confirmons que nous avons bien supprimé ton compte ainsi que
        l'ensemble de tes données sur la plateforme covoiturage LBR.</textarea>
        <label for="p2">Paragraphe 2:</label>
        <textarea name="p2"   rows="4" cols="25" wrap="soft" id="textzone" >Même si nous sommes triste que tu nous quittes, on espère te revoir bientôt ! </textarea>
        <label for="p3">Paragraphe 3:</label>
        <textarea name="p3"   rows="4" cols="25" wrap="soft" id="textzone" >L'équipe des Briques Rouges</textarea>
        <button type="submit" id="saveButton">Save</button>
    </div>
    

</form>

<form action="emailModif.php" method="post" id="text2">
  <div class="email" >
    <input type="hidden" name="mail" value="DeleteTraject">
    <h1>Suppression de trajet</h1>
    <label for="h1">Titre:</label>
    <textarea name="h1"   rows="2" cols="50" wrap="soft" id="textzone" >Salut {{Prenom}} !</textarea>
    <label for="p1">Paragraphe 1:</label>
    <textarea name="p1"   rows="4" cols="25" wrap="soft" id="textzone" >Je suis désolé de t'annoncer que le conducteur a annulé le trajet "??". </textarea>
    <label for="p2">Paragraphe 2:</label>
    <textarea name="p2"   rows="4" cols="25" wrap="soft" id="textzone" >J'espère que tu trouveras une alternative pour venir au festival, on t'y attend avec impatience ! </textarea>
    <label for="p3">Paragraphe 3:</label>
    <textarea name="p3"   rows="4" cols="25" wrap="soft" id="textzone" >A bientôt !!</textarea>
    <button type="submit" id="saveButton">Save</button>
</div>


</form>



<form action="emailModif.php" method="post"id="text3">
  <div class="email" >
    <input type="hidden" name="mail" value="Request">
    <h1>Demande</h1>
    <label for="h1">Titre:</label>
    <textarea name="h1"   rows="2" cols="50" wrap="soft" id="textzone" >Salut {{Prenom}} !</textarea>
    <label for="p1">Paragraphe 1:</label>
    <textarea name="p1"   rows="4" cols="25" wrap="soft" id="textzone" >Salut à toi festivalier, 
      On a remarqué que tu cherchais quelqu'un pour te conduire à "??" le "??" et cela tombe bien puisque quelqu'un semble volontaire pour t'aider 
  </textarea>
  <label for="p2">Paragraphe 2:</label>
  <textarea name="p2"   rows="4" cols="25" wrap="soft" id="textzone" >" notes du conducteur"</textarea>
  <label for="p3">Paragraphe 3:</label>
  <textarea name="p3"   rows="4" cols="25" wrap="soft" id="textzone" >En acceptant la demande, tu acceptes d'envoyer tes coordonnées ainsi que ton numéro de téléphone à ton conducteur.</textarea>
  <button type="submit" id="saveButton">Save</button>
</div>


</form>


<form action="emailModif.php" method="post" id="text4">
  <div class="email" >
    <input type="hidden" name="mail" value="Reservation">
    <h1>Demande Réserve</h1>
    <label for="h1">Titre:</label>
    <textarea name="h1"   rows="2" cols="50" wrap="soft" id="textzone" >Salut {{Prenom}} !</textarea>
    <label for="p1">Paragraphe 1:</label>
    <textarea name="p1"   rows="4" cols="25" wrap="soft" id="textzone" >Tu as reçu(e) une demande pour le trajet que tu as proposé sur notre plateforme. Consulte ton profil pour afficher les détails de cette demande.</textarea>
    <label for="p2">Paragraphe 2:</label>
    <textarea name="p2"   rows="4" cols="25" wrap="soft" id="textzone" >Si tu as des questions, n'hésite pas à nous contacter - on est là pour ça
    !</textarea>
    <label for="p3">Paragraphe 3:</label>
    <textarea name="p3"   rows="4" cols="25" wrap="soft" id="textzone" >A bientôt !<br>L'équipe des Briques Rouges</textarea>
    <button type="submit" id="saveButton">Save</button>
</div>


</form>



<form action="emailModif.php" method="post" id="text5">
  <div class="email" >
    <input type="hidden" name="mail" value="ConfirmDemande">
    <h1>Confirmation de trajet</h1>
    <label for="h1">Titre:</label>
    <textarea name="h1"   rows="2" cols="50" wrap="soft" id="textzone" >Salut {{Prenom}} !</textarea>
    <label for="p1">Paragraphe 1:</label>
    <textarea name="p1"   rows="4" cols="25" wrap="soft" id="textzone" > Salut à toi, 
    On a une bonne nouvelle a t'annoncer puisque qu'il semblerait que ta demande ait été acceptée.</textarea>
    <label for="p2">Paragraphe 2:</label>
    <textarea name="p2"   rows="4" cols="25" wrap="soft" id="textzone" >Voici les coordonnées de ton nouveau partenaire de voyage ! </textarea>
    <label for="p3">Paragraphe 3:</label>
    <textarea name="p3"   rows="4" cols="25" wrap="soft" id="textzone" >J'espère que tu passeras un bon moment et fera un bon voyage !</textarea>
    <button type="submit" id="saveButton">Save</button>
</div>


</form>

<form action="emailModif.php" method="post" id="text6">
  <div class="email" >
    <input type="hidden" name="mail" value="ConfirmAccount">
    <h1>Confirmation de création de compte</h1>
    <label for="h1">Titre:</label>
    <textarea name="h1"   rows="2" cols="50" wrap="soft" id="textzone" >Bienvenue {{Prenom}}!</textarea>
    <label for="p1">Paragraphe 1:</label>
    <textarea name="p1"   rows="4" cols="25" wrap="soft" id="textzone" >Merci d'avoir rejoint la plateforme de covoiturage des Briques Rouges.
    D'abord, appuie sur le bouton ci-dessous pour confirmer ton adresse mail.</textarea>
    <label for="p2">Paragraphe 2:</label>
    <textarea name="p2"   rows="4" cols="25" wrap="soft" id="textzone" >Si le bouton ne fonctionne pas, copie le lien
    ci-dessous dans ton navigateur préféré :</textarea>
    <label for="p3">Paragraphe 3:</label>
    <textarea name="p3"   rows="4" cols="25" wrap="soft" id="textzone" >Si tu as des questions, n'hésite pas à nous contacter - on est là pour ça
    !</textarea>
    <label for="p4">Paragraphe 4:</label>
    <textarea name="p4"   rows="4" cols="25" wrap="soft" id="textzone" >A bientôt !<br>L'équipe des Briques Rouges</textarea>
    <button type="submit" id="saveButton">Save</button>
</div>


</form>
<form action="emailModif.php" method="post" id="text7">
  <div class="email" >
    <input type="hidden" name="mail" value="ResetPassword">
    <h1>Réinitialisation du mot de passe</h1>
    <label for="h1">Titre:</label>
    <textarea name="h1"   rows="2" cols="50" wrap="soft" id="textzone" >Tu as oublié ton mot de passe ?</textarea>
    <label for="p1">Paragraphe 1:</label>
    <textarea name="p1"   rows="4" cols="25" wrap="soft" id="textzone" >Pas de panique : c'est super simple de réinitialiser ton mot de passe. Appuie sur le bouton ci-dessous et suis les instructions.</textarea>
    <label for="p2">Paragraphe 2:</label>
    <textarea name="p2"   rows="4" cols="25" wrap="soft" id="textzone" >Si tu as des questions, n'hésite pas à nous contacter - on est là pour ça
    !</textarea>
    <label for="p3">Paragraphe 3:</label>
    <textarea name="p3"   rows="4" cols="25" wrap="soft" id="textzone" >A bientôt !<br>L'équipe des Briques Rouges</textarea>
    <button type="submit" id="saveButton">Save</button>
</div>


</form>
<form action="emailModif.php" method="post" id="text8">
  <div class="email" >
    <input type="hidden" name="mail" value="ConfirmDriver">
    <h1>Confirmation de trajet</h1>
    <label for="h1">Titre:</label>
    <textarea name="h1"   rows="2" cols="50" wrap="soft" id="textzone" >Salut {{Prenom}} !</textarea>
    <label for="p1">Paragraphe 1:</label>
    <textarea name="p1"   rows="4" cols="25" wrap="soft" id="textzone" > Salut à toi, 
    On a une bonne nouvelle a t'annoncer puisque qu'il semblerait que ta demande ait été acceptée.</textarea>
    <label for="p2">Paragraphe 2:</label>
    <textarea name="p2"   rows="4" cols="25" wrap="soft" id="textzone" >Voici les coordonnées de ton nouveau partenaire de voyage ! </textarea>
    <label for="p3">Paragraphe 3:</label>
    <textarea name="p3"   rows="4" cols="25" wrap="soft" id="textzone" >J'espère que tu passeras un bon moment et fera un bon voyage !</textarea>
    <button type="submit" id="saveButton">Save</button>
</div>


</form>

</div>

<p id="save">Save Text</p>


<!--Style JS-->
<script type="text/javascript">
    const tx = document.getElementsByTagName("textarea");
    for (let i = 0; i < tx.length; i++) {
      tx[i].setAttribute("style", "height:" + (tx[i].scrollHeight) + "px;overflow-y:hidden;");
      tx[i].addEventListener("input", OnInput, false);
  }

  function OnInput() {
      this.style.height = "auto";
      this.style.height = (this.scrollHeight) + "px";
  }
</script>

<script type="text/javascript">
   let emailBox1 = document.getElementById('text1');
   let emailBox2 = document.getElementById('text2');
   let emailBox3 = document.getElementById('text3');
   let emailBox4 = document.getElementById('text4');
   let emailBox5 = document.getElementById('text5');
   let emailBox6 = document.getElementById('text6');
   let emailBox7 = document.getElementById('text7');
   let emailBox8 = document.getElementById('text8');

   let showBox1 = document.getElementById('email1');
   let showBox2 = document.getElementById('email2');
   let showBox3 = document.getElementById('email3');
   let showBox4 = document.getElementById('email4');
   let showBox5 = document.getElementById('email5');
   let showBox6 = document.getElementById('email6');
   let showBox7 = document.getElementById('email7');
   let showBox8 = document.getElementById('email8');


   let div = document.getElementById('main');

   for (var i = 0; i < div.children.length; i++) {
    div.children[i].style.display = "none";
}

//Fonction pour cacher tous les formulaires
function cacher(){

    for (var i = 0; i < div.children.length; i++) {
      div.children[i].style.display = "none";
  }
}
emailBox1.style.display = "flex";
//On cache tous les formulaires puis on affiche celui demandé
showBox1.onclick = function(){
    cacher();
    emailBox1.style.display = "flex";

}

showBox2.onclick = function(){
    cacher();
    emailBox2.style.display = "flex";
}

showBox3.onclick = function(){
    cacher();
    emailBox3.style.display = "flex";
}

showBox4.onclick = function(){
    cacher();
    emailBox4.style.display = "flex";
}

showBox5.onclick = function(){
    cacher();
    emailBox5.style.display = "flex";
}

showBox6.onclick = function(){
    cacher();
    emailBox6.style.display = "flex";
}

showBox7.onclick = function(){
    cacher();
    emailBox7.style.display = "flex";
}

showBox8.onclick = function(){
    cacher();
    emailBox8.style.display = "flex";
}



</script>



</body>
</html>




