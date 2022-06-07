=======
	<title>LBR Covoiturage</title>
	<link rel="stylesheet" type="text/css" href="../css/test.css">
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
  if ((isset($_SESSION['login']) && $_SESSION['login'] != '') && $_SESSION["role"] == 1) {
    echo $_SESSION["role"];
  include 'NavBar3.php';

  }
  else if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
      include 'NavBar.php';
  }
  else{
      include 'NavBar2.php';
  }
  ?>


  
  <ul class="bar">
    <li class="nav-item">
      <a id="tab_traveler" data-toggle="tab" role="tab" aria-controls="vacations" aria-selected="true" class="">
        <div><span class="nav-title">Traveler</span></div>
      </a>
    </li>
    <li><a id="tab_driver" data-toggle="tab" role="tab" aria-selected="true" class=""><span class="nav-title">Driver</span>
    </li>
  </ul>

  <div class="big-form">
   <form action="" method="get" id="traveler" class="form-example">
    <div class="form-traveler">
      <div class="radio-but">
       <label class="form-control" class="active">
        <input type="radio"  name="radio" id="aller" value="a_to_r" checked='checked' />
        ALLER
      </label>

      <label class="form-control">
        <input type="radio" name="radio" id="retour" value="r_to_a"/>
        RETOUR
      </label>
    </div>
    <label for="field1">
      <span> J'aimerai partir de</span><input type="text" name="field1" required="true" id="departure" />
    </label>
    <label for="field2">
      <span> Vers</span><input type="text" name="field2" required="true" id="arrival"/>
    </label>
    <label for="field3">
      Date de départ:
      <input type="date" name="date">
    </label>
    <label for="field4">
    Choisir une heure de départ</label>
    <select name="time"><option value="00:00">00:00</option><option value="00:10">00:10</option><option value="00:20">00:20</option><option value="00:30">00:30</option><option value="00:40">00:40</option><option value="00:50">00:50</option><option value="01:00">01:00</option><option value="01:10">01:10</option><option value="01:20">01:20</option><option value="01:30">01:30</option><option value="01:40">01:40</option><option value="01:50">01:50</option><option value="02:00">02:00</option><option value="02:10">02:10</option><option value="02:20">02:20</option><option value="02:30">02:30</option><option value="02:40">02:40</option><option value="02:50">02:50</option><option value="03:00">03:00</option><option value="03:10">03:10</option><option value="03:20">03:20</option><option value="03:30">03:30</option><option value="03:40">03:40</option><option value="03:50">03:50</option><option value="04:00">04:00</option><option value="04:10">04:10</option><option value="04:20">04:20</option><option value="04:30">04:30</option><option value="04:40">04:40</option><option value="04:50">04:50</option><option value="05:00">05:00</option><option value="05:10">05:10</option><option value="05:20">05:20</option><option value="05:30">05:30</option><option value="05:40">05:40</option><option value="05:50">05:50</option><option value="06:00">06:00</option><option value="06:10">06:10</option><option value="06:20">06:20</option><option value="06:30">06:30</option><option value="06:40">06:40</option><option value="06:50">06:50</option><option value="07:00">07:00</option><option value="07:10">07:10</option><option value="07:20">07:20</option><option value="07:30">07:30</option><option value="07:40">07:40</option><option value="07:50">07:50</option><option value="08:00">08:00</option><option value="08:10">08:10</option><option value="08:20">08:20</option><option value="08:30">08:30</option><option value="08:40">08:40</option><option value="08:50">08:50</option><option value="09:00">09:00</option><option value="09:10">09:10</option><option value="09:20">09:20</option><option value="09:30">09:30</option><option value="09:40">09:40</option><option value="09:50">09:50</option><option value="10:00">10:00</option><option value="10:10">10:10</option><option value="10:20">10:20</option><option value="10:30">10:30</option><option value="10:40">10:40</option><option value="10:50">10:50</option><option value="11:00">11:00</option><option value="11:10">11:10</option><option value="11:20">11:20</option><option value="11:30">11:30</option><option value="11:40">11:40</option><option value="11:50">11:50</option><option value="12:00">12:00</option><option value="12:10">12:10</option><option value="12:20">12:20</option><option value="12:30">12:30</option><option value="12:40">12:40</option><option value="12:50">12:50</option><option value="13:00">13:00</option><option value="13:10">13:10</option><option value="13:20">13:20</option><option value="13:30">13:30</option><option value="13:40">13:40</option><option value="13:50">13:50</option><option value="14:00">14:00</option><option value="14:10">14:10</option><option value="14:20">14:20</option><option value="14:30">14:30</option><option value="14:40">14:40</option><option value="14:50">14:50</option><option value="15:00">15:00</option><option value="15:10">15:10</option><option value="15:20">15:20</option><option value="15:30">15:30</option><option value="15:40">15:40</option><option value="15:50">15:50</option><option value="16:00">16:00</option><option value="16:10">16:10</option><option value="16:20">16:20</option><option value="16:30">16:30</option><option value="16:40">16:40</option><option value="16:50">16:50</option><option value="17:00">17:00</option><option value="17:10">17:10</option><option value="17:20">17:20</option><option value="17:30">17:30</option><option value="17:40">17:40</option><option value="17:50">17:50</option><option value="18:00">18:00</option><option value="18:10">18:10</option><option value="18:20">18:20</option><option value="18:30">18:30</option><option value="18:40">18:40</option><option value="18:50">18:50</option><option value="19:00">19:00</option><option value="19:10">19:10</option><option value="19:20">19:20</option><option value="19:30">19:30</option><option value="19:40">19:40</option><option value="19:50">19:50</option><option value="20:00">20:00</option><option value="20:10">20:10</option><option value="20:20">20:20</option><option value="20:30">20:30</option><option value="20:40">20:40</option><option value="20:50">20:50</option><option value="21:00">21:00</option><option value="21:10">21:10</option><option value="21:20">21:20</option><option value="21:30">21:30</option><option value="21:40">21:40</option><option value="21:50">21:50</option><option value="22:00">22:00</option><option value="22:10">22:10</option><option value="22:20">22:20</option><option value="22:30">22:30</option><option value="22:40">22:40</option><option value="22:50">22:50</option><option value="23:00">23:00</option><option value="23:10">23:10</option><option value="23:20">23:20</option><option value="23:30">23:30</option><option value="23:40">23:40</option><option value="23:50">23:50</option></select>

  </label>
  <label>
    <div class="form-item">
      <img class="icon" src="../images/icon/1077114 1.png">
      <input value="1" min="0" step="1" max="7" type="number" name="">
    </div>
  </label>

  <label>
    <span> </span><input type="submit" value="Publier Trajet" />
  </label>
</div>
</form>



<form action="" method="get" class="form-example" id="driver">
  <div class="form-traveler">
  <div class="radio-but">
       <label class="form-control">
        <input type="radio" name="radio" id="aller" value="a_to_r" checked />
        ALLER V2
      </label>

      <label class="form-control">
        <input type="radio" name="radio" id="retour" value="r_to_a"/>
        RETOUR
      </label>
    </div>
  <label for="field1">
    <span> Lieu de départ</span><input type="text" name="field5" required="true" id="departure" />
  </label>
  <label for="field2">
    <span> Destination</span><input type="text" name="field6" required="true" id="arrival"/>
  </label>
  <label for="field7">
    Date de départ:
    <input type="date" name="date">
  </label>
  <label for="field8">
  Choisir une heure de départ</label>
  <select name="time"><option value="00:00">00:00</option><option value="00:10">00:10</option><option value="00:20">00:20</option><option value="00:30">00:30</option><option value="00:40">00:40</option><option value="00:50">00:50</option><option value="01:00">01:00</option><option value="01:10">01:10</option><option value="01:20">01:20</option><option value="01:30">01:30</option><option value="01:40">01:40</option><option value="01:50">01:50</option><option value="02:00">02:00</option><option value="02:10">02:10</option><option value="02:20">02:20</option><option value="02:30">02:30</option><option value="02:40">02:40</option><option value="02:50">02:50</option><option value="03:00">03:00</option><option value="03:10">03:10</option><option value="03:20">03:20</option><option value="03:30">03:30</option><option value="03:40">03:40</option><option value="03:50">03:50</option><option value="04:00">04:00</option><option value="04:10">04:10</option><option value="04:20">04:20</option><option value="04:30">04:30</option><option value="04:40">04:40</option><option value="04:50">04:50</option><option value="05:00">05:00</option><option value="05:10">05:10</option><option value="05:20">05:20</option><option value="05:30">05:30</option><option value="05:40">05:40</option><option value="05:50">05:50</option><option value="06:00">06:00</option><option value="06:10">06:10</option><option value="06:20">06:20</option><option value="06:30">06:30</option><option value="06:40">06:40</option><option value="06:50">06:50</option><option value="07:00">07:00</option><option value="07:10">07:10</option><option value="07:20">07:20</option><option value="07:30">07:30</option><option value="07:40">07:40</option><option value="07:50">07:50</option><option value="08:00">08:00</option><option value="08:10">08:10</option><option value="08:20">08:20</option><option value="08:30">08:30</option><option value="08:40">08:40</option><option value="08:50">08:50</option><option value="09:00">09:00</option><option value="09:10">09:10</option><option value="09:20">09:20</option><option value="09:30">09:30</option><option value="09:40">09:40</option><option value="09:50">09:50</option><option value="10:00">10:00</option><option value="10:10">10:10</option><option value="10:20">10:20</option><option value="10:30">10:30</option><option value="10:40">10:40</option><option value="10:50">10:50</option><option value="11:00">11:00</option><option value="11:10">11:10</option><option value="11:20">11:20</option><option value="11:30">11:30</option><option value="11:40">11:40</option><option value="11:50">11:50</option><option value="12:00">12:00</option><option value="12:10">12:10</option><option value="12:20">12:20</option><option value="12:30">12:30</option><option value="12:40">12:40</option><option value="12:50">12:50</option><option value="13:00">13:00</option><option value="13:10">13:10</option><option value="13:20">13:20</option><option value="13:30">13:30</option><option value="13:40">13:40</option><option value="13:50">13:50</option><option value="14:00">14:00</option><option value="14:10">14:10</option><option value="14:20">14:20</option><option value="14:30">14:30</option><option value="14:40">14:40</option><option value="14:50">14:50</option><option value="15:00">15:00</option><option value="15:10">15:10</option><option value="15:20">15:20</option><option value="15:30">15:30</option><option value="15:40">15:40</option><option value="15:50">15:50</option><option value="16:00">16:00</option><option value="16:10">16:10</option><option value="16:20">16:20</option><option value="16:30">16:30</option><option value="16:40">16:40</option><option value="16:50">16:50</option><option value="17:00">17:00</option><option value="17:10">17:10</option><option value="17:20">17:20</option><option value="17:30">17:30</option><option value="17:40">17:40</option><option value="17:50">17:50</option><option value="18:00">18:00</option><option value="18:10">18:10</option><option value="18:20">18:20</option><option value="18:30">18:30</option><option value="18:40">18:40</option><option value="18:50">18:50</option><option value="19:00">19:00</option><option value="19:10">19:10</option><option value="19:20">19:20</option><option value="19:30">19:30</option><option value="19:40">19:40</option><option value="19:50">19:50</option><option value="20:00">20:00</option><option value="20:10">20:10</option><option value="20:20">20:20</option><option value="20:30">20:30</option><option value="20:40">20:40</option><option value="20:50">20:50</option><option value="21:00">21:00</option><option value="21:10">21:10</option><option value="21:20">21:20</option><option value="21:30">21:30</option><option value="21:40">21:40</option><option value="21:50">21:50</option><option value="22:00">22:00</option><option value="22:10">22:10</option><option value="22:20">22:20</option><option value="22:30">22:30</option><option value="22:40">22:40</option><option value="22:50">22:50</option><option value="23:00">23:00</option><option value="23:10">23:10</option><option value="23:20">23:20</option><option value="23:30">23:30</option><option value="23:40">23:40</option><option value="23:50">23:50</option></select>

</label>
<label>
  <div class="form-item">
    <img class="icon" src="../images/icon/1077114 1.png">
    <input value="1" min="0" step="1" max="7" type="number" name="">
  </div>
</label>

<label>
  <span> </span><input type="submit" value="Publier Trajet" />
</label>
</div>
</form>
</div>



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
    document.getElementById('departure').value ="";q
  };


  document.getElementById('retour').onclick = function() {

    document.getElementById('departure').disabled = true;
    document.getElementById('arrival').disabled = false;
    document.getElementById('departure').value = "LBR Festival"; 
    document.getElementById('arrival').value = "";

  };

</script>
<script type="text/javascript">let bar = Array.from(document.querySelectorAll("li"));

bar.forEach(function(it) {
  it.onclick = function() {
    bar.forEach(function(el) {
      el.classList.remove("active");
    });
    this.classList.toggle("active");
  };
});
</script>

</body>
</html>







>>>>>>> Stashed changes
