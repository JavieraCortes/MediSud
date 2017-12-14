<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MEDISUD</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAXfFInlegk98fN6AEjmRXUz_GS-ozziLc"> </script>

<script type='text/javascript'>
var map;
var marker;

 function init(){
        var mapOption = {
         center: new google.maps.LatLng(-32.834545, -70.603576),
         zoom: 14,
         mapTypeId:google.maps.MapTypeId.ROADMAP
        };
    map = new google.maps.Map(document.getElementById("map"),mapOption);
 
 var place = new google.maps.LatLng(-32.834545, -70.603576);
 marker = new google.maps.Marker({
     position: place,
     tittle: "Urgencia Medica",
     map: map
 });
 
 var place = new google.maps.LatLng(-32.8337899,-70.5988067);
 marker = new google.maps.Marker({
     position: place,
     tittle: "Urgencia Medica",
     map: map
 });
 }

google.maps.event.addDomListener(window, 'load', init);

</script>

</head>
<body>
    <!--Navigation bar-->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
            <a class="navbar-brand" href="accesoMed.php">MEDI<span>SUD</span></a><img src="img/logo2.png" width="50" />
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="pacientes.php">Pacientes</a></li>
          <li><a href="estadisticas.php">Estadisticas</a></li>
          <li><a href="mapa.php">Geolocalización</a></li> 
          <li><a href="formPac.php">Ingresar Paciente</a></li> 
          <li><form action="formControl.php" method="post">
                  <button type="submit" class="btn btn-green btn-block btn-flat" name="salir" style="margin-top:10%">Salir</button>
          </form>
          </li> 
        </ul>
        </div>
      </div>
    </nav>
    <!--/ Navigation bar-->
    
        <!--Contact-->
    <section id ="contact" class="section-padding">
      <div class="container">
                    <?php
                    session_start();
                    echo '<br><div class="row">
                            <div class="col-md-1">
                                <form action="accesoMed.php">
                                    <button type="submit" class="btn btn-primary btn-xs"> < </button>
                                </form>

                            </div>
                            <div class="col-md-11">
                                <p style="text-align:right"><img src="img/blue.png" width="20" />'.$_SESSION['nombre'].'</p>
                            </div>
                        </div>';
                    
                    if(isset($_POST['salir'])){
                    session_destroy();
                    header('Location: index.php');
                    }
           ?>
        <div class="row">
          <div class="header-section text-center">  
              <br>
             <div id="map" style="width:500px; height: 400px; border: solid; border-color: #00FFFF  "></div>
            </div>
            </div>
        </div>
        </div>
      </div>
    </section>
    <!--/ Contact-->
    


    <!--Footer-->
    <footer id="footer" class="footer">
      <div class="container text-center">  
      <h4>MediSud</h4>
      <h5>Medicina y Salud</h5>
      <br>©2016 Mentor Theme. All rights reserved  
      </div>
    </footer>
    <!--/ Footer-->

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>﻿