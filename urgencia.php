<?php 
$paciente=$_GET['urgencia'];
date_default_timezone_set('America/Santiago');
$fecha_hora_actual = date('d-m-y H:i:s');
require 'conexion.php';
$sql="SELECT *FROM paciente WHERE Rut=$paciente";
$result=$conn->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        echo'
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
          <li><a href="pacientes.php">Pacientes</a></li>
          <li><a href="estadisticas.php">Estadisticas</a></li>
          <li><a href="formPac.php">Ingresar Paciente</a></li>    
        </ul>
        </div>
      </div>
    </nav>
    <!--/ Navigation bar-->
    <!--Contact-->
    <section id ="contact" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
            <h2>Control Paciente</h2>
            <p>Registrando Control Medico para el paciente: '.$row['Nombre']. ' Rut: '.$row['Rut'].' </p>
            <p>Control Registrado en la Fecha: '.$fecha_hora_actual.'</p>
            <hr class="bottom-line">
          </div>
          <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <form id="form" method="post" class="form-horizontal mitad" action="buscar.php">
                    
                        <input type="hidden" value="'.$row['Rut'].'" name="pac">
                            
                        <div class="form-group row">
                            <label class="col-xs-2 col-form-label">Ubicación Paciente: </label>
                            <div class="col-xs-10">
                                <input class="form-control" type="text"  name="ubicacion" placeholder="Lugar donde se encontro al paciente" />
                            </div>
                        </div>                      

                        <div class="form-group row">
                            <label class="col-xs-2 col-form-label">Signos Vitales: </label>                                               
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-xs-2 col-form-label">Temperatura: </label>
                                <div class="row">                    
                                    <div class="col-md-4 col-sm-4 col-xs-4 left">
                                        <input class="form-control" type="text"  name="temperatura" placeholder="Temperatura" />
                                    </div>
                                </div>                             
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-xs-2 col-form-label">Pulso: </label>
                                <div class="row">                                                   
                                <div class="col-md-4 col-sm-4 col-xs-4 left">
                                    <input class="form-control" type="text"  name="pulso" placeholder="Pulso" />
                                </div>
                                </div>                             
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-xs-2 col-form-label">Ritmo Respiratorio:</label>
                                <div class="row">     
                                    <div class="col-md-4 col-sm-4 col-xs-4 left">
                                        <input class="form-control" type="text"  name="ritmo" placeholder="Frecuencia Respiratoria" />
                                    </div>
                                </div>                             
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-xs-2 col-form-label">Presión Arterial: </label>
                                <div class="row">                    
                                    <div class="col-md-4 col-sm-4 col-xs-4 left">
                                        <input class="form-control" type="text"  name="presion" placeholder="Presión Arterial" />
                                    </div>
                                </div>                             
                        </div>

                        <div class="form-group row">
                            <label class="col-xs-2 col-form-label">Saturación: </label>
                                <div class="row">                    
                                    <div class="col-md-4 col-sm-4 col-xs-4 left">
                                        <input class="form-control" type="text"  name="saturacion" placeholder="Saturación de Oxígeno" />
                                    </div>
                                </div>                             
                        </div>

                        <div class="form-group row">
                            <label class="col-xs-2 col-form-label">Procedimiento Realizado: </label>
                            <div class="col-xs-10">
                                <textarea style="overflow: hidden" name="accion" rows="2" cols="98%" placeholder="Procedimiento Médico Realizado"></textarea>
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <button type="submit" id="submit" name="submit" class="form contact-form-button light-form-button oswald light">Registrar Urgencia</button>
                        </div>
                    </form>    
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
</html>';
    }
    
    }else{
        echo 'No se pudo Generar Control';
    }
    
     $conn->close();
     ?>