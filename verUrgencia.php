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
            <?php
        
            session_start();
            if($_SESSION['tipo'] == 'Doctor'){
                echo '<a class="navbar-brand" href="accesoMed.php">MEDI<span>SUD</span></a><img src="img/logo2.png" width="50" /> ';
            }else{
                echo '<a class="navbar-brand" href="accesoPac.php">MEDI<span>SUD</span></a><img src="img/logo2.png" width="50" />';
            }
            ?>  
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
        <?php
 
            if($_SESSION['tipo'] == 'Doctor'){
                echo '<li><a href="formPac.php">Ingresar Paciente</a></li>
                    <li><a href="pacientes.php">Pacientes</a></li>
                    <li><a href="ProxControles.php">Proximos Controles</a></li>
                    <li><a href="estadisticas.php">Estadisticas</a></li>
                    <li><a href="mapa.php">Geolocalización</a></li> ';
            }else{
                echo '<li><a href="FichaPac.php">Mi Ficha</a></li>
                     <li><a href="ControlesPac.php">Controles Realizados</a></li>
                     <li><a href="ProxControlesPac.php">Proximos Controles</a></li>
                     <li><a href="EstadisticasPac.php">Estadisticas</a></li>';
            }
                              
           ?>

          <li><form action="verUrgencia.php" method="post">
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
             <?php

                    
                    if(isset($_POST['salir'])){
                    session_destroy();
                    header('Location: index.php');
                    }
                    $rut=$_GET['run'];
                    
                    echo '<br><div class="row">';
                    
                    if($_SESSION['tipo']=='Doctor'){
                        echo '
                        <div class="col-md-1">
                            <a href="controles.php?rut='.$rut.'"><button type="submit" class="btn btn-primary btn-xs"> < </button></a>
                        </div>'; 
                    }else{
                        echo '<div class="col-md-1">
                            <a href="controlesPac.php?rut='.$rut.'"><button type="submit" class="btn btn-primary btn-xs"> < </button></a>
                        </div>'; 
                    }
                          
                    
                    echo '<div class="col-md-11">
                        <p style="text-align:right"><img src="img/blue.png" width="20" />'.$_SESSION['nombre'].'</p>
                    </div>
                </div>';       
                    ?>
            <div class="row">
                <div class="header-section text-center">
                    <?php
                        $codUrg=$_GET['codUrgencia'];
                        require 'conexion.php';
                        $sql="SELECT *FROM urgencia WHERE run=$rut and codUrgencia=$codUrg";
                        $result=$conn->query($sql);

                        if($result->num_rows>0){
                            while($row=$result->fetch_assoc()){
                        echo '
                    <h2><img src="img/control.png" width="22"> Urgencia N°'. $row['codUrgencia'].'</h2>
                    <p>Control Medico del paciente Rut: '.$row['run'].' - Registrado en la Fecha y Hora: '.$row['fecha'].'</p>
                    <hr class="bottom-line">
                </div>
                
                <div class="row">
                <div class="col-lg-10">
                    
                        <div class="form-group row">
                            <label class="col-xs-3 col-form-label">Dirección Urgencia: </label>
                            <div class="col-xs-9">'.
                                $row['direccion']
                            .'</div>
                        </div>                               

                        <div class="form-group row">
                            <label class="col-xs-3 col-form-label">Temperatura: </label>                        
                                <div class="col-xs-4">'.
                                $row['temperatura']
                            .'</div>                          
                        </div>
                            
                        <div class="form-group row">
                            <label class="col-xs-3 col-form-label">Pulso Cardiaco: </label>
                            <div class="col-xs-4">'.
                                $row['pulso']
                            .'</div>
                        </div>
                            
                        <div class="form-group row">
                            <label class="col-xs-3 col-form-label">Ritmo Cardiaco: </label>
                            <div class="col-xs-4">'.
                                $row['frespiratorio']
                            .'</div>
                        </div>
                            
                        <div class="form-group row">
                            <label class="col-xs-3 col-form-label">Presión Arterial: </label>
                            <div class="col-xs-4">'.
                                $row['presion']
                            .'</div>
                        </div>
                              
                        <div class="form-group row">
                            <label class="col-xs-3 col-form-label">Saturación Oxigeno: </label>
                            <div class="col-xs-4">'.
                                $row['saturacion']
                            .'</div>                            
                        </div>'.
                        '<div class="form-group row">
                            <label class="col-xs-3 col-form-label">Procedimiento Diagnostico: </label>
                            <div class="col-xs-9">'.
                                $row['acciones']
                            .'</div>';
                    }
                }else{
                    echo '<script>alert("Error al acceder a la urgencia medica");</script>';
                }
                ?>
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