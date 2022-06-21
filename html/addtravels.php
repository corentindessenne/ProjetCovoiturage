<!DOCTYPE html>
<html>
<head>
  <title>LBR Covoiturage</title>
  <!--CSS files-->
  <link rel="stylesheet" type="text/css" href="../css/addtravels.css">
  <link rel="stylesheet" type="text/css" href="../css/nav.css">
  <!--Favicon-->
	<link rel="icon" href="../images/LBR Ressources/intiniales.png" type="images/png"/> 
  <!--Google Fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--Library-->
  <script src="https://code.jquery.com/jquery-1.6.4.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <!--Google Maps API-->
  <script async
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzOGPYwZqOFb6hCGtZo68-nQ4sxwum7Hg">
  </script>


</head>
<body>


  <?php
  include 'Connexion.php';
  include 'NavbarConn.php';
  if(!isset($_SESSION['login'])){
    header("Location:home.php");
    
  }

  $requete="SELECT IdCompte FROM compte WHERE Email='".$_SESSION["mail"]."'";
  $result = $conn->query($requete);
  $verifAller=0;        //var pour vérifier si l'utilisateur a déjà créer ou fait une demande de trajet pour aller vers le lieu du festival
  $verifRetour=0;       //var pour vérifier si l'utilisateur a déjà créer ou fait une demande de trajet pour partir depuis le lieu du festival
  if($result->num_rows >  0){
    $row = $result->fetch_assoc();
    $idCompte=$row["IdCompte"];   //get Idcompte depuis la base de donnée pour vérifier les trajets de l'utilisateur
    $requete="SELECT TypeTrajet FROM trajet WHERE IdCompte='".$idCompte."'  AND AnneeEdition='2022'";  //2022 a changer en fonction de l'édition quna don aura fait ça
    $result = $conn->query($requete);
    while ($row = mysqli_fetch_assoc($result)){
      
      if($row["TypeTrajet"]=="Aller"){
        $verifAller=1;                                 //vérification des trajets de l'utilisateur
      }
      else if($row["TypeTrajet"]=="Retour"){
        $verifRetour=1;
      }
    }
    /*if(isset($_SESSION["role"])&& $_SESSION["role"] == 1){
      $verifAller=0;
      $verifRetour=0;
    }*/
  }


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
   <form action="ActionDemandeAjout.php" method="post" id="traveler" class="form-example">
    <div class="form-traveler">

      <input type="hidden" name="isDemande"  id="isDemande" value="1">
      <input type="hidden" name="NbPassagers"  id="nbPass" value="1">
      <input type="hidden" name="Prix"  id="Prix" value="0">

      <input type="hidden" name="lat" id="lat" value="">
      <input type="hidden" name="long" id="long" value="">
      

      <div class="radio-but">
       <label class="form-control" class="active">
        <input type="radio" required="required" name="aller-retour" id="aller" value="Aller" <?php if($verifAller==0){ ?>checked='checked' <?php } ?>/> <!-- On ne check pas la box si l'utilisateur a déjà un trajet de type aller enregistré -->
        <span id="spanAller"> ALLER</span>
      </label>

      <label class="form-control">
        <input type="radio" required="required" name="aller-retour" id="retour" value="Retour" <?php if($verifAller==1 && $verifRetour==0){ ?>checked='checked' <?php } ?>/> <!-- On check la box si l'utilisateur a déjà un trajet de type aller enregistré mais pas de trrajet de type retour -->
        <span id="spanRetour"> RETOUR </span>
      </label>
    </div>
    <label for="departure">
      <span id="departureSpan"> Lieu de départ :</span><input type="text" name="departure" required="true" id="departure" />
    </label>
    <label for="adresse">
      <span id="adresseSpan"> Adresse :</span><input type="text" name="adresse" required="true" id="adresse" />
    </label>
    <label for="arrival">
      <span id="arrivalSpan"> Vers :</span><input type="text" name="arrival" required="true" id="arrival"/>
    </label>
    <label for="date">
      Date de départ:
      <input type="date" id="date" name="date" required="required">
    </label>
    <label for="time">
      <span> Choisir une heure de départ :</span>
    </label>

    <label>
      <select name="time" id="heureDepart"><option value="00:00">00:00</option><option value="00:10">00:10</option><option value="00:20">00:20</option><option value="00:30">00:30</option><option value="00:40">00:40</option><option value="00:50">00:50</option><option value="01:00">01:00</option><option value="01:10">01:10</option><option value="01:20">01:20</option><option value="01:30">01:30</option><option value="01:40">01:40</option><option value="01:50">01:50</option><option value="02:00">02:00</option><option value="02:10">02:10</option><option value="02:20">02:20</option><option value="02:30">02:30</option><option value="02:40">02:40</option><option value="02:50">02:50</option><option value="03:00">03:00</option><option value="03:10">03:10</option><option value="03:20">03:20</option><option value="03:30">03:30</option><option value="03:40">03:40</option><option value="03:50">03:50</option><option value="04:00">04:00</option><option value="04:10">04:10</option><option value="04:20">04:20</option><option value="04:30">04:30</option><option value="04:40">04:40</option><option value="04:50">04:50</option><option value="05:00">05:00</option><option value="05:10">05:10</option><option value="05:20">05:20</option><option value="05:30">05:30</option><option value="05:40">05:40</option><option value="05:50">05:50</option><option value="06:00">06:00</option><option value="06:10">06:10</option><option value="06:20">06:20</option><option value="06:30">06:30</option><option value="06:40">06:40</option><option value="06:50">06:50</option><option value="07:00">07:00</option><option value="07:10">07:10</option><option value="07:20">07:20</option><option value="07:30">07:30</option><option value="07:40">07:40</option><option value="07:50">07:50</option><option value="08:00">08:00</option><option value="08:10">08:10</option><option value="08:20">08:20</option><option value="08:30">08:30</option><option value="08:40">08:40</option><option value="08:50">08:50</option><option value="09:00">09:00</option><option value="09:10">09:10</option><option value="09:20">09:20</option><option value="09:30">09:30</option><option value="09:40">09:40</option><option value="09:50">09:50</option><option value="10:00">10:00</option><option value="10:10">10:10</option><option value="10:20">10:20</option><option value="10:30">10:30</option><option value="10:40">10:40</option><option value="10:50">10:50</option><option value="11:00">11:00</option><option value="11:10">11:10</option><option value="11:20">11:20</option><option value="11:30">11:30</option><option value="11:40">11:40</option><option value="11:50">11:50</option><option value="12:00">12:00</option><option value="12:10">12:10</option><option value="12:20">12:20</option><option value="12:30">12:30</option><option value="12:40">12:40</option><option value="12:50">12:50</option><option value="13:00">13:00</option><option value="13:10">13:10</option><option value="13:20">13:20</option><option value="13:30">13:30</option><option value="13:40">13:40</option><option value="13:50">13:50</option><option value="14:00">14:00</option><option value="14:10">14:10</option><option value="14:20">14:20</option><option value="14:30">14:30</option><option value="14:40">14:40</option><option value="14:50">14:50</option><option value="15:00">15:00</option><option value="15:10">15:10</option><option value="15:20">15:20</option><option value="15:30">15:30</option><option value="15:40">15:40</option><option value="15:50">15:50</option><option value="16:00">16:00</option><option value="16:10">16:10</option><option value="16:20">16:20</option><option value="16:30">16:30</option><option value="16:40">16:40</option><option value="16:50">16:50</option><option value="17:00">17:00</option><option value="17:10">17:10</option><option value="17:20">17:20</option><option value="17:30">17:30</option><option value="17:40">17:40</option><option value="17:50">17:50</option><option value="18:00">18:00</option><option value="18:10">18:10</option><option value="18:20">18:20</option><option value="18:30">18:30</option><option value="18:40">18:40</option><option value="18:50">18:50</option><option value="19:00">19:00</option><option value="19:10">19:10</option><option value="19:20">19:20</option><option value="19:30">19:30</option><option value="19:40">19:40</option><option value="19:50">19:50</option><option value="20:00">20:00</option><option value="20:10">20:10</option><option value="20:20">20:20</option><option value="20:30">20:30</option><option value="20:40">20:40</option><option value="20:50">20:50</option><option value="21:00">21:00</option><option value="21:10">21:10</option><option value="21:20">21:20</option><option value="21:30">21:30</option><option value="21:40">21:40</option><option value="21:50">21:50</option><option value="22:00">22:00</option><option value="22:10">22:10</option><option value="22:20">22:20</option><option value="22:30">22:30</option><option value="22:40">22:40</option><option value="22:50">22:50</option><option value="23:00">23:00</option><option value="23:10">23:10</option><option value="23:20">23:20</option><option value="23:30">23:30</option><option value="23:40">23:40</option><option value="23:50">23:50</option></select>
    </label>

    <label id="arrivalHour" style="color:white"></label>;
    <input type="hidden" name="heureArrivee" id="heureArrivee" value="">
    <input type="hidden" name="dateArr" id="dateArr" value="">

    <input class="inp-cbx" id="cbx" type="checkbox" name="tel" style="display: none;" value="1"/>
    <label class="cbx" for="cbx"><span>
      <svg width="12px" height="9px" viewbox="0 0 12 9">
        <polyline points="1 5 4 8 11 1"></polyline>
      </svg></span><span>Renseignez son numéro de téléphone </span>
    </label>
    <label>

      <label>        
        <textarea name="Description" id="Description" placeholder="Écris içi la description de ton trajet" rows="8" cols="65"></textarea>
      </label>
      <br>
      <div class="subbutt">
        <label><input type="submit" value="Publier Trajet"/></label>
      </div>
    </div>
  </form>



  <form action="ActionDemandeAjout.php" method="post" class="form-example" id="driver">
    <div class="form-traveler">

     <input type="hidden" name="isDemande"  id="isDemande" value="0">
     <input type="hidden" name="lat" id="lat2" value="">
      <input type="hidden" name="long" id="long2" value="">

      <div class="radio-but">
       <label class="form-control">
        <input type="radio" name="aller-retour" id="aller2" value="Aller" <?php if($verifAller==0){ ?>checked='checked' <?php } ?>/> <!-- On ne check pas la box si l'utilisateur a déjà un trajet de type aller enregistré -->
        <span id="spanAller2">ALLER</span>
      </label>

      <label class="form-control">
        <input type="radio" name="aller-retour" id="retour2" value="Retour" <?php if($verifAller==1 && $verifRetour==0){ ?>checked='checked' <?php } ?>/> <!-- On check la box si l'utilisateur a déjà un trajet de type aller enregistré mais pas de trrajet de type retour -->
        <span id="spanRetour2"> RETOUR </span>
      </label>
    </div>
    <label for="departure">
      <span id="departureSpan2"> Lieu de départ :</span><input type="text" name="departure" required="true" id="departure2" />
    </label>
    <label for="adresse">
      <span id="adresseSpan2"> Adresse :</span><input type="text" name="adresse" required="required" id="adresse2"  />
    </label>
    <label for="arrival2">
      <span id="arrivalSpan2"> Pour aller à :</span><input type="text" name="arrival" required="true" id="arrival2"/>
    </label>
    <label for="date">
      Date de départ:
      <input type="date" name="date" id="date2">
    </label>
    <label for="time">
      <span> Choisir une heure de départ :</span>
    </label>
    <label>
      <select name="time" id="heureDepart2"><option value="00:00">00:00</option><option value="00:10">00:10</option><option value="00:20">00:20</option><option value="00:30">00:30</option><option value="00:40">00:40</option><option value="00:50">00:50</option><option value="01:00">01:00</option><option value="01:10">01:10</option><option value="01:20">01:20</option><option value="01:30">01:30</option><option value="01:40">01:40</option><option value="01:50">01:50</option><option value="02:00">02:00</option><option value="02:10">02:10</option><option value="02:20">02:20</option><option value="02:30">02:30</option><option value="02:40">02:40</option><option value="02:50">02:50</option><option value="03:00">03:00</option><option value="03:10">03:10</option><option value="03:20">03:20</option><option value="03:30">03:30</option><option value="03:40">03:40</option><option value="03:50">03:50</option><option value="04:00">04:00</option><option value="04:10">04:10</option><option value="04:20">04:20</option><option value="04:30">04:30</option><option value="04:40">04:40</option><option value="04:50">04:50</option><option value="05:00">05:00</option><option value="05:10">05:10</option><option value="05:20">05:20</option><option value="05:30">05:30</option><option value="05:40">05:40</option><option value="05:50">05:50</option><option value="06:00">06:00</option><option value="06:10">06:10</option><option value="06:20">06:20</option><option value="06:30">06:30</option><option value="06:40">06:40</option><option value="06:50">06:50</option><option value="07:00">07:00</option><option value="07:10">07:10</option><option value="07:20">07:20</option><option value="07:30">07:30</option><option value="07:40">07:40</option><option value="07:50">07:50</option><option value="08:00">08:00</option><option value="08:10">08:10</option><option value="08:20">08:20</option><option value="08:30">08:30</option><option value="08:40">08:40</option><option value="08:50">08:50</option><option value="09:00">09:00</option><option value="09:10">09:10</option><option value="09:20">09:20</option><option value="09:30">09:30</option><option value="09:40">09:40</option><option value="09:50">09:50</option><option value="10:00">10:00</option><option value="10:10">10:10</option><option value="10:20">10:20</option><option value="10:30">10:30</option><option value="10:40">10:40</option><option value="10:50">10:50</option><option value="11:00">11:00</option><option value="11:10">11:10</option><option value="11:20">11:20</option><option value="11:30">11:30</option><option value="11:40">11:40</option><option value="11:50">11:50</option><option value="12:00">12:00</option><option value="12:10">12:10</option><option value="12:20">12:20</option><option value="12:30">12:30</option><option value="12:40">12:40</option><option value="12:50">12:50</option><option value="13:00">13:00</option><option value="13:10">13:10</option><option value="13:20">13:20</option><option value="13:30">13:30</option><option value="13:40">13:40</option><option value="13:50">13:50</option><option value="14:00">14:00</option><option value="14:10">14:10</option><option value="14:20">14:20</option><option value="14:30">14:30</option><option value="14:40">14:40</option><option value="14:50">14:50</option><option value="15:00">15:00</option><option value="15:10">15:10</option><option value="15:20">15:20</option><option value="15:30">15:30</option><option value="15:40">15:40</option><option value="15:50">15:50</option><option value="16:00">16:00</option><option value="16:10">16:10</option><option value="16:20">16:20</option><option value="16:30">16:30</option><option value="16:40">16:40</option><option value="16:50">16:50</option><option value="17:00">17:00</option><option value="17:10">17:10</option><option value="17:20">17:20</option><option value="17:30">17:30</option><option value="17:40">17:40</option><option value="17:50">17:50</option><option value="18:00">18:00</option><option value="18:10">18:10</option><option value="18:20">18:20</option><option value="18:30">18:30</option><option value="18:40">18:40</option><option value="18:50">18:50</option><option value="19:00">19:00</option><option value="19:10">19:10</option><option value="19:20">19:20</option><option value="19:30">19:30</option><option value="19:40">19:40</option><option value="19:50">19:50</option><option value="20:00">20:00</option><option value="20:10">20:10</option><option value="20:20">20:20</option><option value="20:30">20:30</option><option value="20:40">20:40</option><option value="20:50">20:50</option><option value="21:00">21:00</option><option value="21:10">21:10</option><option value="21:20">21:20</option><option value="21:30">21:30</option><option value="21:40">21:40</option><option value="21:50">21:50</option><option value="22:00">22:00</option><option value="22:10">22:10</option><option value="22:20">22:20</option><option value="22:30">22:30</option><option value="22:40">22:40</option><option value="22:50">22:50</option><option value="23:00">23:00</option><option value="23:10">23:10</option><option value="23:20">23:20</option><option value="23:30">23:30</option><option value="23:40">23:40</option><option value="23:50">23:50</option>
      </select>
  
    </label>
    <label id="arrivalHour2" style="color:white"></label>;
    <input type="hidden" name="heureArrivee" id="heureArrivee2" value="">
    <input type="hidden" name="dateArr" id="dateArr2" value="">
    <label>
     <div class="form-item">
      <span> Nombre de passagers possible : </span>
      <input value="1" min="1" step="1" max="7" type="number" name="NbPassagers">
    </div>
  </label>
  <label>
    <div class="PrixSelect">
      <span> Prix par passagers : </span>
      <input type="number" required="required" class="Prix" name="Prix" id ="Prix" step="1" min="0">
      <i>€</i>
    </div>
  </label>
  <input class="inp-cbx2" id="cbx2" type="checkbox" name="tel" style="display: none;" value="1" />
  <label class="cbx2" for="cbx2"><span>
    <svg width="12px" height="9px" viewbox="0 0 12 9">
      <polyline points="1 5 4 8 11 1"></polyline>
    </svg></span><span>Renseignez son numéro de téléphone </span>
  </label>
  <label>        
    <textarea name="Description" id="Description" placeholder="Écris içi la description de ton trajet" rows="8" cols="65"></textarea>
  </label>
  <br>

  <label>
    <span> </span><input type="submit" value="Publier Trajet" />
  </label>
</div>
</form>
</div>
        
<?php

    if($verifAller==1 && $verifRetour==1){
      ?>
        <div class="modal_info">
            <h2>Important</h2>
            <p>Tu ne peux créer qu'un seul aller et un seul retour si tu veux en créer un nouveau supprime ton trajet précédent</p>   <!-- Si l'utilisateur a déjà un trajet allé et un trajet retour modal redirigeant vers la page d'accueil car il ne doit pas pouvoir faire de nouveau trajet pour cette édition -->
            <br/>
            <a href="Profil.php">Aller sur mon profil</a>
        </div>
        <div class="modal_overlay">
        </div>
                              <!-- Code js du modal -->
<script>
      (function(){
        var $content = $('.modal_info').detach();

        $(document).ready(function(e){
          modal.open({
            content: $content,
            width: 540,
            height: 270,
          });
          $content.addClass('modal_content');
          $('.modal, .modal_overlay').addClass('display');
        });
      }());

      var modal = (function(){

        var $content = $('<div class="modal_content"/>');
        var $modal = $('<div class="modal"/>');
        var $window = $(window);

        $modal.append($content);


        return {
          center: function(){
            var top = Math.max($window.height() - $modal.outerHeight(), 0) / 2;
            var left = Math.max($window.width() - $modal.outerWidth(), 0) / 2;
            $modal.css({
              top: top + $window.scrollTop(),
              left: left + $window.scrollLeft(),
            });
          },
          open: function(settings){
            $content.empty().append(settings.content);

            $modal.css({
              width: settings.width || 'auto',
              height: settings.height || 'auto'
            }).appendTo('body');

            modal.center();
            $(window).on('resize', modal.center);
          },
          close: function(){
            $content.empty();
            $modal.detach();
            $(window).off('resize', modal.center);
          }
        };
      }());
    </script>


      <?php                       
    }
    else if($verifAller==1){                          //suppression d'un radio si nécessaire en fonction des vérifications faires plus haut
      ?>  
        <script type="text/javascript">

          document.getElementById("aller").style.borderColor = "#424242";
          document.getElementById("spanAller").style.color = "#424242";
          document.getElementById("aller2").style.borderColor = "#424242";
          document.getElementById("spanAller2").style.color = "#424242";


          document.getElementById("aller").onchange = function(){
            document.getElementById("aller").checked=false;
            document.getElementById("retour").checked=true;
            alert("Tu as déjà créer ou réserver un trajet pour ton aller vers notre festival annule ta réservation ou supprime ton trajet puis réessaye");
          }

          document.getElementById("aller2").onchange = function(){
            document.getElementById("aller2").checked=false;
            document.getElementById("retour2").checked=true;
            alert("Tu as déjà créer ou réserver un trajet pour ton aller vers notre festival annule ta réservation ou supprime ton trajet puis réessaye");
          }


          document.getElementById("retour").style.borderColor = "#FFFEE6";
          document.getElementById("spanRetour").style.color = "#FFFEE6";
          document.getElementById("retour2").style.borderColor = "#FFFEE6";
          document.getElementById("spanRetour2").style.color = "#FFFEE6";
        </script>
      <?php
    }
    else if($verifRetour==1){
      ?>
        <script type="text/javascript">

          document.getElementById("retour").style.borderColor = "#424242";
          document.getElementById("spanRetour").style.color = "#424242";
          document.getElementById("retour2").style.borderColor = "#424242";
          document.getElementById("spanRetour2").style.color = "#424242";


          document.getElementById("retour").onchange = function(){
            document.getElementById("retour").checked=false;
            document.getElementById("aller").checked=true;
            alert("Tu as déjà créer ou réserver un trajet pour ton retour depuis notre festival annule ta réservation ou supprime ton trajet puis réessaye");
          }   

          document.getElementById("retour2").onchange = function(){
            document.getElementById("retour2").checked=false;
            document.getElementById("aller2").checked=true;
            alert("Tu as déjà créer ou réserver un trajet pour ton retour depuis notre festival annule ta réservation ou supprime ton trajet puis réessaye");
          }   


          document.getElementById("aller").style.borderColor = "#FFFEE6";
          document.getElementById("spanAller").style.color = "#FFFEE6";
          document.getElementById("aller2").style.borderColor = "#FFFEE6";
          document.getElementById("spanAller2").style.color = "#FFFEE6";

        
        </script>
      <?php
    }
    

?>



<script type="text/javascript">                                                 //animation
 let rectAnimation = document.getElementById('travdriv');
 let buttonAnimation = document.getElementById('tab_traveler');

 let buttonAnimation2 = document.getElementById('tab_driver');

 let ovniAnimation = document.getElementById('ovni');

 let demande = document.getElementById('isDemande');

 buttonAnimation.addEventListener('click',() =>{
  buttonAnimation.classList.add("btn-1-click");
  buttonAnimation2.classList.add("btn-1");
  buttonAnimation2.classList.remove("btn-1-click");
  ovniAnimation.classList.remove("ovni-walk");
  ovniAnimation.classList.add("ovni-return");
  demande.setAttribute('value', "1");

} )


 buttonAnimation2.addEventListener('click',() =>{
  buttonAnimation2.classList.add("btn-1-click");
  buttonAnimation.classList.add("btn-1");
  buttonAnimation.classList.remove("btn-1-click");
  ovniAnimation.classList.remove("ovni-return");
  ovniAnimation.classList.add("ovni-walk");
  demande.setAttribute('value', "1");
} )

</script>


<script type="text/javascript">
 let driverForm = document.getElementById('driver');            //animation selection de form
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

    //préremplissage des formulaires en fonction des radio

  let allerRadio = document.getElementById('aller');
  let retourRadio = document.getElementById('retour');
  let allerRadio2 = document.getElementById('aller2');
  let retourRadio2 = document.getElementById('retour2');

  if(retourRadio.checked==true){
    document.getElementById("departureSpan").innerHTML="Lieu de départ :";
    document.getElementById("adresseSpan").innerHTML="Adresse d'arrivée :";
    document.getElementById("arrivalSpan").innerHTML="Ville d'arrivée :";
  }
  if(retourRadio2.checked==true){
    document.getElementById("departureSpan2").innerHTML="Lieu de départ :";
    document.getElementById("adresseSpan2").innerHTML="Adresse d'arrivée :";
    document.getElementById("arrivalSpan2").innerHTML="Ville d'arrivée :";
  }
  if(allerRadio2.checked==true){
    document.getElementById("departureSpan2").innerHTML="Ville de départ :";
    document.getElementById("adresseSpan2").innerHTML="Adresse de départ :";
    document.getElementById("arrivalSpan2").innerHTML="Lieu d'arrivée :";
  }
  if(allerRadio.checked==true){
    document.getElementById("departureSpan").innerHTML="Ville de départ :";
    document.getElementById("adresseSpan").innerHTML="Adresse de départ :";
    document.getElementById("arrivalSpan").innerHTML="Lieu d'arrivée :";
  }



  if(<?php echo $verifAller; ?>=="0"){    //vérification que le radio n'as pas été supprimé
    if (allerRadio.checked === true ){
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

  }



  if(<?php echo $verifRetour; ?>=="0"){
    if (retourRadio.checked === true){
      document.getElementById('departure').disabled = true;
      document.getElementById('arrival').disabled = false;
      document.getElementById('departure').value = "LBR Festival"; 
      document.getElementById('arrival').value = "";
    }

  document.getElementById('retour').onclick = function() {

    document.getElementById('departure').disabled = true;
    document.getElementById('arrival').disabled = false;
    document.getElementById('departure').value = "LBR Festival"; 
    document.getElementById('arrival').value = "";

  };




  if (retourRadio2.checked === true){
      document.getElementById('departure2').disabled = true;
      document.getElementById('arrival2').disabled = false;
      document.getElementById('departure2').value = "LBR Festival"; 
      document.getElementById('arrival2').value = "";
    }

    document.getElementById('retour2').onclick = function() {

      document.getElementById('departure2').disabled = true;
      document.getElementById('arrival2').disabled = false;
      document.getElementById('departure2').value = "LBR Festival"; 
      document.getElementById('arrival2').value = "";

    };
  }

  

</script>



  <script>
    let queryCoord = {lat : 0, lng : 0};
    let Duree=0;
    
  
   
      document.getElementById("arrival").onchange = function(){ changeLieu(1);}
      document.getElementById("departure").onchange = function(){ changeLieu(1);}  
      document.getElementById("arrival2").onchange = function(){ changeLieu(0);}
      document.getElementById("departure2").onchange = function(){ changeLieu(0);}
      
      document.getElementById("adresse").onchange = function(){ changeLieu(1);}  
      document.getElementById("adresse2").onchange = function(){ changeLieu(0);}
    

    function changeLieu(demande){
      let sens=document.getElementById("retour").checked;
      let quer="";
      if(demande==0){
        query=document.getElementById("adresse2").value;
      }
      else{
        query=document.getElementById("adresse").value;
      }
      
      if(demande==0){
        if(sens==true){
          query += " "+document.getElementById("arrival2").value;
        }
        else{
          query += " "+document.getElementById("departure2").value;
        }        
      }
      else{

        if(sens==true){
          query += " "+document.getElementById("arrival").value;
        }
        else{
          query += " "+document.getElementById("departure").value;
        }
      }
      getDataFromForm(query);
    }






  
    function getDataFromForm(query){
    
        
        console.log(query);
        $.getJSON('http://api.positionstack.com/v1/forward?access_key=3afeb3b8f8e21edd8aa31037edcdc1b6&query=' + query, function(data) {
            let arrivee="";
            let depart="";
            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer = new google.maps.DirectionsRenderer();

            queryCoord.lat = data.data[0].latitude;
            queryCoord.lng = data.data[0].longitude;
            document.getElementById("lat").value=queryCoord.lat;
            document.getElementById("long").value=queryCoord.lng;
            document.getElementById("lat2").value=queryCoord.lat;
            document.getElementById("long2").value=queryCoord.lng;
            if(document.getElementById("retour").checked==true){
              depart="21 Rue de Linselles, Wervicq-Sud";
              arrivee=queryCoord;
              
            }
            else{
              arrivee="21 Rue de Linselles, Wervicq-Sud";
              depart=queryCoord;
            }
            
            
            let request = {
                origin: depart,
                destination: arrivee,
                travelMode: google.maps.TravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.METRIC,
                avoidHighways: false,
                avoidTolls: false,
            };
            
              
            directionsService.route(request, function(result, status) {
              if (status == 'OK') {
                directionsRenderer.setDirections(result);
                let Direction=directionsRenderer.getDirections();
                let Route=Direction.routes[0];
                Duree=Math.round(Route.legs[0].duration.value/60);
                console.log(queryCoord.lng);
                
              }
            });


        });
      }

    document.getElementById("heureDepart").onchange= function(){EditArrival(1);}
    document.getElementById("heureDepart2").onchange= function(){EditArrival(0);}
    document.getElementById("date").onchange= function(){EditArrival(1);}
    document.getElementById("date2").onchange= function(){EditArrival(0);}


    function EditArrival(isDemande){
      let DureeHeure=0;
      let temp=Duree;
      while (Duree>60){
              DureeHeure++;
              Duree-=60;
            }
            let FinalDuree=DureeHeure+":"+Duree;
            let HeureDepart="";
            
            if(isDemande==1){
              heureDep=document.getElementById("heureDepart").value;
            }
            else{
              heureDep=document.getElementById("heureDepart2").value;
            }
            
            let DureeTab = FinalDuree.split(":");
            var DepTab = heureDep.split(":");
            let FinalMin=0;
            let FinalHour=0;
            if(parseInt(DureeTab[1])+parseInt(DepTab[1])>60){
              FinalHour++;
              FinalMin=-60;
            }
            FinalHour+=parseInt(DureeTab[0])+parseInt(DepTab[0]);
            FinalMin+=parseInt(DureeTab[1])+parseInt(DepTab[1]);
            let dateDep="";
            if(isDemande==1){
              dateDep=new Date(document.getElementById("date").value);
            }
            else{
              dateDep=new Date(document.getElementById("date2").value);
            }
            
            
            if(FinalMin<10){
              FinalMin="0"+FinalMin;
            }
            if(FinalHour<10){
              FinalHour="0"+FinalHour;
            }
            else if(FinalHour>23){
              while(FinalHour>23){
                FinalHour-=24;
                dateDep.setUTCDate(dateDep.getUTCDate() + 1);
              }
            }
            
            if(isDemande==1){
              document.getElementById("arrivalHour").innerHTML="Heure d'arrivée estimée: "+FinalHour+":"+FinalMin;
              document.getElementById("dateArr").value=dateDep;
              document.getElementById("heureArrivee").value=FinalHour+":"+FinalMin;
            }
            else{
              document.getElementById("arrivalHour2").innerHTML="Heure d'arrivée estimée: "+FinalHour+":"+FinalMin;
              document.getElementById("dateArr2").value=dateDep;
              document.getElementById("heureArrivee2").value=FinalHour+":"+FinalMin;
            }
            
            
            
            
            Duree=temp;
            
            //document.getElementById("heureArrivee").value
            console.log(document.getElementById("dateArr").value);
      }
  </script>
 



  
</body>
</html>