<!DOCTYPE html>
<html>
<head>
  <title>LBR Covoiturage</title>
  <link rel="stylesheet" type="text/css" href="../css/addtravels.css">
  <link rel="stylesheet" type="text/css" href="../css/nav.css">
  <!--Google Fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-1.6.4.js"></script>

</head>
<body>

  <?php
  include 'Connexion.php';
  include 'NavbarConn.php';
  ?>


  <img class="ovni" id="ovni" src="../images/icon/ovni.png">

  <div class="container">
    
    <a id="tab_traveler" class="btn btn-1">
      <svg>
        <rect id="travdriv"x="0" y="0" fill="none" width="100%" height="100%"/>
      </svg>
     TRAVELER
    </a>


 <a id="tab_driver" class="btn btn-1">
      <svg>
        <rect id="travdriv2" x="0" y="0" fill="none" width="100%" height="100%"/>
      </svg>
     DRIVER
    </a> 
  </div>


  <div class="big-form">
   <form action="ActionDemandeAjout" method="post" id="traveler" class="form-example">
    <div class="form-traveler">
      <div class="radio-but">
       <label class="form-control" class="active">
        <input type="radio"  name="radio" id="aller" value="a_to_r" checked='checked' />
        <span> ALLER</span>
      </label>

      <label class="form-control">
        <input type="radio" name="radio" id="retour" value="r_to_a"/>
        <span> RETOUR </span>
      </label>
    </div>
    <label for="field1">
      <span> Lieu de départ :</span><input type="text" name="field1" required="true" id="departure" />
    </label>
    <label for="field2">
      <span> Adresse :</span><input type="text" name="field10" required="true" id="adress" />
    </label>
    <label for="field2">
      <span> Vers :</span><input type="text" name="field2" required="true" id="arrival"/>
    </label>
    <label for="field3">
      Date de départ:
      <input type="date" name="date">
    </label>
    <label for="field4">
      <span> Choisir une heure de départ :</span>
    </label>
    <label>
    <select name="time"><option value="00:00">00:00</option><option value="00:10">00:10</option><option value="00:20">00:20</option><option value="00:30">00:30</option><option value="00:40">00:40</option><option value="00:50">00:50</option><option value="01:00">01:00</option><option value="01:10">01:10</option><option value="01:20">01:20</option><option value="01:30">01:30</option><option value="01:40">01:40</option><option value="01:50">01:50</option><option value="02:00">02:00</option><option value="02:10">02:10</option><option value="02:20">02:20</option><option value="02:30">02:30</option><option value="02:40">02:40</option><option value="02:50">02:50</option><option value="03:00">03:00</option><option value="03:10">03:10</option><option value="03:20">03:20</option><option value="03:30">03:30</option><option value="03:40">03:40</option><option value="03:50">03:50</option><option value="04:00">04:00</option><option value="04:10">04:10</option><option value="04:20">04:20</option><option value="04:30">04:30</option><option value="04:40">04:40</option><option value="04:50">04:50</option><option value="05:00">05:00</option><option value="05:10">05:10</option><option value="05:20">05:20</option><option value="05:30">05:30</option><option value="05:40">05:40</option><option value="05:50">05:50</option><option value="06:00">06:00</option><option value="06:10">06:10</option><option value="06:20">06:20</option><option value="06:30">06:30</option><option value="06:40">06:40</option><option value="06:50">06:50</option><option value="07:00">07:00</option><option value="07:10">07:10</option><option value="07:20">07:20</option><option value="07:30">07:30</option><option value="07:40">07:40</option><option value="07:50">07:50</option><option value="08:00">08:00</option><option value="08:10">08:10</option><option value="08:20">08:20</option><option value="08:30">08:30</option><option value="08:40">08:40</option><option value="08:50">08:50</option><option value="09:00">09:00</option><option value="09:10">09:10</option><option value="09:20">09:20</option><option value="09:30">09:30</option><option value="09:40">09:40</option><option value="09:50">09:50</option><option value="10:00">10:00</option><option value="10:10">10:10</option><option value="10:20">10:20</option><option value="10:30">10:30</option><option value="10:40">10:40</option><option value="10:50">10:50</option><option value="11:00">11:00</option><option value="11:10">11:10</option><option value="11:20">11:20</option><option value="11:30">11:30</option><option value="11:40">11:40</option><option value="11:50">11:50</option><option value="12:00">12:00</option><option value="12:10">12:10</option><option value="12:20">12:20</option><option value="12:30">12:30</option><option value="12:40">12:40</option><option value="12:50">12:50</option><option value="13:00">13:00</option><option value="13:10">13:10</option><option value="13:20">13:20</option><option value="13:30">13:30</option><option value="13:40">13:40</option><option value="13:50">13:50</option><option value="14:00">14:00</option><option value="14:10">14:10</option><option value="14:20">14:20</option><option value="14:30">14:30</option><option value="14:40">14:40</option><option value="14:50">14:50</option><option value="15:00">15:00</option><option value="15:10">15:10</option><option value="15:20">15:20</option><option value="15:30">15:30</option><option value="15:40">15:40</option><option value="15:50">15:50</option><option value="16:00">16:00</option><option value="16:10">16:10</option><option value="16:20">16:20</option><option value="16:30">16:30</option><option value="16:40">16:40</option><option value="16:50">16:50</option><option value="17:00">17:00</option><option value="17:10">17:10</option><option value="17:20">17:20</option><option value="17:30">17:30</option><option value="17:40">17:40</option><option value="17:50">17:50</option><option value="18:00">18:00</option><option value="18:10">18:10</option><option value="18:20">18:20</option><option value="18:30">18:30</option><option value="18:40">18:40</option><option value="18:50">18:50</option><option value="19:00">19:00</option><option value="19:10">19:10</option><option value="19:20">19:20</option><option value="19:30">19:30</option><option value="19:40">19:40</option><option value="19:50">19:50</option><option value="20:00">20:00</option><option value="20:10">20:10</option><option value="20:20">20:20</option><option value="20:30">20:30</option><option value="20:40">20:40</option><option value="20:50">20:50</option><option value="21:00">21:00</option><option value="21:10">21:10</option><option value="21:20">21:20</option><option value="21:30">21:30</option><option value="21:40">21:40</option><option value="21:50">21:50</option><option value="22:00">22:00</option><option value="22:10">22:10</option><option value="22:20">22:20</option><option value="22:30">22:30</option><option value="22:40">22:40</option><option value="22:50">22:50</option><option value="23:00">23:00</option><option value="23:10">23:10</option><option value="23:20">23:20</option><option value="23:30">23:30</option><option value="23:40">23:40</option><option value="23:50">23:50</option></select>
  </label>

  <label>
    <div class="form-item">
      <span> Nous serons : </span>
      <input value="1" min="1" step="1" max="7" type="number" name="">
    </div>
  </label>

<input class="inp-cbx" id="cbx" type="checkbox" style="display: none;"/>
<label class="cbx" for="cbx"><span>
    <svg width="12px" height="9px" viewbox="0 0 12 9">
      <polyline points="1 5 4 8 11 1"></polyline>
    </svg></span><span>Renseignez son numéro de téléphone </span></label>
  <label>

  <label>        
    <textarea name="Description" id="Description" placeholder="Écris içi la description de ton trajet" rows="8" cols="65"></textarea>
  </label>
<br>
  <div class="subbutt">
    <label><input type="submit" value="Publier Trajet" /></label>
  </div>
</div>
</form>



<form action="ActionAjout" method="post" class="form-example" id="driver">
  <div class="form-traveler">
    <div class="radio-but">
     <label class="form-control">
      <input type="radio" name="radio" id="aller2" value="a_to_r" checked />
      <span>ALLER</span>
    </label>

    <label class="form-control">
      <input type="radio" name="radio" id="retour2" value="r_to_a"/>
     <span> RETOUR </span>
    </label>
  </div>
  <label for="field5">
    <span> Lieu de départ :</span><input type="text" name="field5" required="true" id="departure2" />
  </label>
  <label for="field6">
    <span> Pour aller à :</span><input type="text" name="field6" required="true" id="arrival2"/>
  </label>
  <label for="field7">
    Date de départ:
    <input type="date" name="date">
  </label>
  <label for="field8">
    <span> Choisir une heure de départ :</span>
  </label>
  <label>
  <select name="time"><option value="00:00">00:00</option><option value="00:10">00:10</option><option value="00:20">00:20</option><option value="00:30">00:30</option><option value="00:40">00:40</option><option value="00:50">00:50</option><option value="01:00">01:00</option><option value="01:10">01:10</option><option value="01:20">01:20</option><option value="01:30">01:30</option><option value="01:40">01:40</option><option value="01:50">01:50</option><option value="02:00">02:00</option><option value="02:10">02:10</option><option value="02:20">02:20</option><option value="02:30">02:30</option><option value="02:40">02:40</option><option value="02:50">02:50</option><option value="03:00">03:00</option><option value="03:10">03:10</option><option value="03:20">03:20</option><option value="03:30">03:30</option><option value="03:40">03:40</option><option value="03:50">03:50</option><option value="04:00">04:00</option><option value="04:10">04:10</option><option value="04:20">04:20</option><option value="04:30">04:30</option><option value="04:40">04:40</option><option value="04:50">04:50</option><option value="05:00">05:00</option><option value="05:10">05:10</option><option value="05:20">05:20</option><option value="05:30">05:30</option><option value="05:40">05:40</option><option value="05:50">05:50</option><option value="06:00">06:00</option><option value="06:10">06:10</option><option value="06:20">06:20</option><option value="06:30">06:30</option><option value="06:40">06:40</option><option value="06:50">06:50</option><option value="07:00">07:00</option><option value="07:10">07:10</option><option value="07:20">07:20</option><option value="07:30">07:30</option><option value="07:40">07:40</option><option value="07:50">07:50</option><option value="08:00">08:00</option><option value="08:10">08:10</option><option value="08:20">08:20</option><option value="08:30">08:30</option><option value="08:40">08:40</option><option value="08:50">08:50</option><option value="09:00">09:00</option><option value="09:10">09:10</option><option value="09:20">09:20</option><option value="09:30">09:30</option><option value="09:40">09:40</option><option value="09:50">09:50</option><option value="10:00">10:00</option><option value="10:10">10:10</option><option value="10:20">10:20</option><option value="10:30">10:30</option><option value="10:40">10:40</option><option value="10:50">10:50</option><option value="11:00">11:00</option><option value="11:10">11:10</option><option value="11:20">11:20</option><option value="11:30">11:30</option><option value="11:40">11:40</option><option value="11:50">11:50</option><option value="12:00">12:00</option><option value="12:10">12:10</option><option value="12:20">12:20</option><option value="12:30">12:30</option><option value="12:40">12:40</option><option value="12:50">12:50</option><option value="13:00">13:00</option><option value="13:10">13:10</option><option value="13:20">13:20</option><option value="13:30">13:30</option><option value="13:40">13:40</option><option value="13:50">13:50</option><option value="14:00">14:00</option><option value="14:10">14:10</option><option value="14:20">14:20</option><option value="14:30">14:30</option><option value="14:40">14:40</option><option value="14:50">14:50</option><option value="15:00">15:00</option><option value="15:10">15:10</option><option value="15:20">15:20</option><option value="15:30">15:30</option><option value="15:40">15:40</option><option value="15:50">15:50</option><option value="16:00">16:00</option><option value="16:10">16:10</option><option value="16:20">16:20</option><option value="16:30">16:30</option><option value="16:40">16:40</option><option value="16:50">16:50</option><option value="17:00">17:00</option><option value="17:10">17:10</option><option value="17:20">17:20</option><option value="17:30">17:30</option><option value="17:40">17:40</option><option value="17:50">17:50</option><option value="18:00">18:00</option><option value="18:10">18:10</option><option value="18:20">18:20</option><option value="18:30">18:30</option><option value="18:40">18:40</option><option value="18:50">18:50</option><option value="19:00">19:00</option><option value="19:10">19:10</option><option value="19:20">19:20</option><option value="19:30">19:30</option><option value="19:40">19:40</option><option value="19:50">19:50</option><option value="20:00">20:00</option><option value="20:10">20:10</option><option value="20:20">20:20</option><option value="20:30">20:30</option><option value="20:40">20:40</option><option value="20:50">20:50</option><option value="21:00">21:00</option><option value="21:10">21:10</option><option value="21:20">21:20</option><option value="21:30">21:30</option><option value="21:40">21:40</option><option value="21:50">21:50</option><option value="22:00">22:00</option><option value="22:10">22:10</option><option value="22:20">22:20</option><option value="22:30">22:30</option><option value="22:40">22:40</option><option value="22:50">22:50</option><option value="23:00">23:00</option><option value="23:10">23:10</option><option value="23:20">23:20</option><option value="23:30">23:30</option><option value="23:40">23:40</option><option value="23:50">23:50</option>
  </select>

</label>
<label>
 <div class="form-item">
  <span> Nombre de passagers possible : </span>
  <input value="1" min="1" step="1" max="7" type="number" name="">
</div>
</label>

<label>
  <span> </span><input type="submit" value="Publier Trajet" />
</label>
</div>
</form>
</div>


<script type="text/javascript">
   let rectAnimation = document.getElementById('travdriv');
  let buttonAnimation = document.getElementById('tab_traveler');

  let buttonAnimation2 = document.getElementById('tab_driver');

  let ovniAnimation = document.getElementById('ovni');


  buttonAnimation.addEventListener('click',() =>{
    buttonAnimation.classList.add("btn-1-click");
    buttonAnimation2.classList.add("btn-1");
    buttonAnimation2.classList.remove("btn-1-click");
    ovniAnimation.classList.remove("ovni-walk");
    ovniAnimation.classList.add("ovni-return");

  } )


   buttonAnimation2.addEventListener('click',() =>{
    buttonAnimation2.classList.add("btn-1-click");
    buttonAnimation.classList.add("btn-1");
    buttonAnimation.classList.remove("btn-1-click");
     ovniAnimation.classList.remove("ovni-return");
    ovniAnimation.classList.add("ovni-walk");
  } )

</script>


<script type="text/javascript">
 let driverForm = document.getElementById('driver');
 driverForm.style.display = "none";
 let travelerForm = document.getElementById('traveler');

 let showTravel = document.getElementById('tab_traveler');
 let showDrive = document.getElementById('tab_driver');


 showTravel.onclick = function(){
  driverForm.style.display = "none";
  travelerForm.style.display = "flex";

}

showDrive.onclick = function(){
  driverForm.style.display = "flex";
  travelerForm.style.display = "none";
}

</script>


<script type="text/javascript">



  let allerRadio = document.getElementById('aller');
  let retourRadio = document.getElementById('retour');


  if (allerRadio.checked === true){
    document.getElementById('departure').disabled = false;
    document.getElementById('arrival').disabled = true;
    document.getElementById('arrival').value = "LBR Festival"; 
    document.getElementById('departure').value ="";
  }

  document.getElementById('aller').onclick = function() {

    document.getElementById('departure').disabled = false;
    document.getElementById('arrival').disabled = true;
    document.getElementById('arrival').value = "LBR Festival"; 
    document.getElementById('departure').value ="";
  };


  document.getElementById('retour').onclick = function() {

    document.getElementById('departure').disabled = true;
    document.getElementById('arrival').disabled = false;
    document.getElementById('departure').value = "LBR Festival"; 
    document.getElementById('arrival').value = "";

  };



  let allerRadio2 = document.getElementById('aller2');
  let retourRadio2 = document.getElementById('retour2');


  if (allerRadio2.checked === true){
    document.getElementById('departure2').disabled = false;
    document.getElementById('arrival2').disabled = true;
    document.getElementById('arrival2').value = "LBR Festival"; 
    document.getElementById('departure2').value ="";
  }

  document.getElementById('aller2').onclick = function() {

    document.getElementById('departure2').disabled = false;
    document.getElementById('arrival2').disabled = true;
    document.getElementById('arrival2').value = "LBR Festival"; 
    document.getElementById('departure2').value ="";
  };


  document.getElementById('retour2').onclick = function() {

    document.getElementById('departure2').disabled = true;
    document.getElementById('arrival2').disabled = false;
    document.getElementById('departure2').value = "LBR Festival"; 
    document.getElementById('arrival2').value = "";

  };

</script>



</body>
</html>