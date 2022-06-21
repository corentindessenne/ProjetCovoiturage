<!doctype html>
<html>
<head>
<title>Rich Text Editor</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <li class="nav__items" id="email1">
      <img src="../images/icon/nocar.png">
      <a id="email1">Supr. compte</a>
    </li>
    
    <li class="nav__items" id="email2">
      <img src="../images/icon/email.png">
      <a id="email2">Supr. trajet</a>
    </li>
      
    <li class="nav__items" id="email3">
     <img src="../images/icon/car.png">
     <a id="email3">Festivalier</a>
    </li>
      
<li class="nav__items" id="email4">
      <img src="../images/icon/driver.png">
      <a id="email4">Conducteur</a>
    </li>

    <li class="nav__items" id="email5">
      <img src="../images/icon/check.png">
      <a id="email5">Confirmation</a>
    </li>
  </ul>
</nav>

<div class="main" id="main">
  <form action="" method="POST" id="text1">
    <div class="email" >
      <h1>Suppression de compte</h1>
      <textarea  readonly rows="10" cols="70" wrap="soft" id="textzone" >
        On te confirme la suppression de ton compte LBR.
        Merci d'avoir participé à notre festival ! 
        Tu as pris part à "??" trajets au cours de ton périple !
        On espère te revoir bientôt.
      </textarea>
    </div>
   <button type="button" id="editButton">Edit</button>
   <button type="button" id="saveButton">Save</button>
  </form>

  <form action="" method="POST" id="text2">
    <div class="email" >
      <h1>Suppression de trajet</h1>
      <textarea rows="10" cols="70" wrap="soft" >
     

        Je suis désolé de t'annoncer que le conducteur a annulé le trajet "??".
        J'espère que tu trouveras une alternative pour venir au festival, on t'y attend avec impatience ! 
        A bientôt !!

      </textarea>
    </div>
  </form>



  <form action="" method="POST"id="text3">
    <div class="email" >
      <h1>Requête de trajet</h1>
      <textarea  rows="10" cols="70" wrap="soft">
        

        Salut à toi festivalier, 
        On a remarqué que tu cherchais quelqu'un pour te conduire à "??" le "??" et cela tombe bien puisque quelqu'un semble volontaire pour t'aider !

        " notes du conducteur"

        En acceptant la demande, tu acceptes d'envoyer tes coordonnées ainsi que ton numéro de téléphone à ton conducteur.

        Accepter / Refuser

      </textarea>
    </div>
  </form>


  <form action="" method="POST" id="text4">
    <div class="email" >
      <h1>Demande de trajet</h1>
      <textarea contenteditable="false" rows="10" cols="70" wrap="soft" >
        

        Salut à toi conducteur, 
        On a remarqué que tu cherchais des passagers pour t'accompagner de "??" à "??" le "??" et cela tombe bien puisque y semble y avoir des volontaire(s) !

        "notes du festivalier"

        En acceptant la demande, tu acceptes d'envoyer tes coordonnées ainsi que ton numéro de téléphone à ton passager.

        Accepter / Refuser

      </textarea>
    </div>
  </form>



  <form action="" method="POST" id="text5">
    <div class="email" >
      <h1>Confirmation de trajet</h1>
      <textarea contenteditable="true" rows="10" cols="70" wrap="soft">
        

        Salut à toi, 
        On a une bonne nouvelle a t'annoncer puisque qu'il semblerait que ta demande ait été acceptée.

        Voici les coordonnées de ton nouveau partenaire de voyage ! 

        J'espère que tu passeras un bon moment et fera un bon voyage !


      </textarea>
    </div>
  </form>

</div>

<p id="save">Save Text</p>



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

 let showBox1 = document.getElementById('email1');
 let showBox2 = document.getElementById('email2');
 let showBox3 = document.getElementById('email3');
 let showBox4 = document.getElementById('email4');
 let showBox5 = document.getElementById('email5');
 

let div = document.getElementById('main');

for (var i = 0; i < div.children.length; i++) {
  div.children[i].style.display = "none";
}


function cacher(){

for (var i = 0; i < div.children.length; i++) {
  div.children[i].style.display = "none";
}
}
emailBox1.style.display = "flex";

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



</script>

<script type="text/javascript">
let paragraph = document.getElementById("textzone");
let edit_button = document.getElementById("editButton");

edit_button.addEventListener("click", function() {

  paragraph.removeAttribute('readonly');
  paragraph.style.backgroundColor = "#dddbdb";
  emailBox1.style.display ="flex";
} );


</script>


</body>
</html>




