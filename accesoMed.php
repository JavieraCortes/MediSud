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
          <li><a href="formPac.php">Ingresar Paciente</a></li>
          <li><a href="pacientes.php">Pacientes</a></li>
          <li><a href="ProxControles.php">Proximos Controles</a></li>
          <li><a href="estadisticas.php">Estadisticas</a></li>
          <li><a href="mapa.php">Geolocalización</a></li>
          
          
          <li><form action="accesoMed.php" method="post">
                  <button type="submit" class="btn btn-green btn-block btn-flat" name="salir" style="margin-top:10%">Salir</button>
          </form>
          </li> 
        </ul>
        </div>
      </div>
    </nav>
    <!--/ Navigation bar-->
    <!--Feature-->
    <section id ="feature" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="header-section text-center">
                    
                <?php
                
                    session_start();
                    echo '<h2>Bienvenido(a): '.$_SESSION['nombre'].'</h2>';
                    if(isset($_POST['salir'])){
                    session_destroy();
                    header('Location: index.php');
                    }
                    
                   ?>     

                </div>
                <div class="feature-info">
                
                    <div class="row">                    
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <p style="text-align:justify">MediSud es una aplicación web orientada a entregar una atención más rápida y 
                        expedita a la hora de atender un paciente, facilitando la entrega de información al personal médico.</p>
                        <p style="text-align:justify">Siéntase libre de navegar por las opciones ofrecidas en la página, dentro 
                        de las cuales podrá encontrar formularios para el ingreso de nuevos pacientes, de registro de enfermedades 
                        o registro de controles médicos, además tendrá acceso a la ficha personalizada de cada paciente y a un 
                        registro con cada uno de los pacientes.</p>
                        <p style="text-align:justify">MediSud también incorpora geolocalización, con el fin de facilitar el 
                        reconocimiento de zonas con potenciales focos infecciosos a investigar.</p>
                        <p style="text-align:justify">Recuerde que MediSud utiliza tecnología RFID para facilitar el acceso a 
                        los datos de cada paciente crónico que cuente con su pulsera de atención.</p>
                      </div>
                      <br<<br>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <a href="pacientes.php"><img src="img/paciente.png" width="200"></a><br>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <a href="estadisticas.php"><img src="img/estadistica.png" width="200"></a><br>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <a href="formPac.php"><img src="img/ingresar.png" width="200"></a><br>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <a href="mapa.php"><img src="img/geolocalizacion.png" width="200"></a><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ feature-->
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
