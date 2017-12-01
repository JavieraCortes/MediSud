<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MEDISUD</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDy01C5ms9olCyr_FfZ5x0F4csltUGFx70"></script>
    
    <script>
        function initMap() {
            var map;
            var bounds = new google.maps.LatLngBounds();
            var mapOptions = {
                mapTypeId: 'roadmap'
            };

            // Display a map on the web page
            map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
            map.setTilt(50);

            // Multiple markers location, latitude, and longitude
            var markers = [
                ['Brooklyn Museum, NY', 40.671531, -73.963588],
                ['Brooklyn Public Library, NY', 40.672587, -73.968146],
                ['Prospect Park Zoo, NY', 40.665588, -73.965336]
            ];

            // Info window content
            var infoWindowContent = [
                ['<div class="info_content">' +
                '<h3>Brooklyn Museum</h3>' +
                '<p>The Brooklyn Museum is an art museum located in the New York City borough of Brooklyn.</p>' + '</div>'],
                ['<div class="info_content">' +
                '<h3>Brooklyn Public Library</h3>' +
                '<p>The Brooklyn Public Library (BPL) is the public library system of the borough of Brooklyn, in New York City.</p>' +
                '</div>'],
                ['<div class="info_content">' +
                '<h3>Prospect Park Zoo</h3>' +
                '<p>The Prospect Park Zoo is a 12-acre (4.9 ha) zoo located off Flatbush Avenue on the eastern side of Prospect Park, Brooklyn, New York City.</p>' +
                '</div>']
            ];

            // Add multiple markers to map
            var infoWindow = new google.maps.InfoWindow(), marker, i;

            // Place each marker on the map  
            for( i = 0; i < markers.length; i++ ) {
                var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                bounds.extend(position);
                marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    title: markers[i][0]
                });

                // Add info window to marker    
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infoWindow.setContent(infoWindowContent[i][0]);
                        infoWindow.open(map, marker);
                    }
                })(marker, i));

                // Center the map to fit all markers on the screen
                map.fitBounds(bounds);
            }

            // Set zoom level
            var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                this.setZoom(14);
                google.maps.event.removeListener(boundsListener);
            });

        }
        // Load initialize function
        google.maps.event.addDomListener(window, 'load', initMap);
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
            <a class="navbar-brand" href="acceso.php">MEDI<span>SUD</span></a><img src="img/logo2.png" width="50" />
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="pacientes.php">Pacientes</a></li>
          <li><a href="estadisticas.php">Estadisticas</a></li>
          <li><a href="formPac.php">Ingresar Paciente</a></li>    
          <li><form action="Mapas.php" method="post">
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
          <div class="row" style="text-align: right">
              <?php
                session_start();
                echo '<h2><img src="img/blue.png" width="20" />Sr(a): '.$_SESSION['nombre'].'</h2>';
                if(isset($_POST['salir'])){
                    session_destroy();
                    header('Location: index.php');
                }
              ?>
          </div>
        <div class="row">
            
            <div id="mapCanvas" style="width: 100%;height: 100%;"></div>
            
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
</html>