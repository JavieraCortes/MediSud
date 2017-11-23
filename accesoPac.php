<?php
/*$medico=$_REQUEST['usuario'];
require 'conexion.php';
$sql="SELECT *FROM usuario WHERE usuario=$medico";
$result=$conn->query($sql);

if($result->num_rows>0){
while($row=$result->fetch_assoc()){*/
echo '<!DOCTYPE html>
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
            <a class="navbar-brand" href="index.php">MEDI<span>SUD</span></a><img src="img/logo2.png" width="50" />
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="pacientes.php">Mi Ficha</a></li>
          <li><a href="estadisticas.php">Controles</a></li>  
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
                    <h2>Bienvenido(a)</h2>
                    <img src="img/pac.png" width="55">
                    <hr class="bottom-line">
                </div>
                <div class="feature-info">
                
                    <div class="row">                    
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <p style="text-align:justify">Has accedido a tu perfil como paciente de un centro de Salud que cuenta con 
                        la aplicación web MediSud, que está orientada a entregarte una atención más rápida y expedita a la hora de 
                        atenderte en tus controles o urgencias médicas.</p>
                        <p style="text-align:justify">Siéntase libre de navegar por las opciones ofrecidas en la página, dentro de 
                        las cuales podrá encontrar su ficha medica que cuenta con sus datos personales, de familiar de contacto (urgencias) 
                        y sus enfermedades, alergias y medicamentos asociados, en esta sección usted podrá modificar sus datos personales y 
                        de contacto en caso de urgencia.</p>
                        <p style="text-align:justify">También encontrará una sección que contiene los controles médicos o de urgencia que 
                        se han realizado hasta la fecha. </p>
                      </div>
                      <br<<br>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <a href="pacientes.php"><img src="img/paxid.png" width="200"></a><br>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <a href="estadisticas.php"><img src="img/miscontroles.png" width="150"></a><br>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <a href="formPac.php"><img src="img/ingresar.png" width="200"></a><br>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <a href="geolocal.php"><img src="img/geolocalizacion.png" width="200"></a><br>
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
</html>';
    /*}
}else{
    echo 'La ficha no Existe';
}*/
?>
