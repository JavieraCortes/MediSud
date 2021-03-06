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
                
                if(isset($_POST['salir'])){
                    session_destroy();
                    header('Location: index.php');
                }
                
                $run=$_GET['rut'];
                date_default_timezone_set('America/Santiago');
                $fecha_hora_actual = date('d-m-Y H:i:s');
                
                require 'conexion.php';
                $sql="SELECT *FROM paciente WHERE Rut=$run";
                $result=$conn->query($sql);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        
                        echo '<br><div class="row">
                        <div class="col-md-1">
                            <a href="ficha.php?tag='.$row['CodRFID'].'"><button type="submit" class="btn btn-primary btn-xs"> < </button></a>

                        </div>
                        <div class="col-md-11">
                            <p style="text-align:right"><img src="img/blue.png" width="20" />'.$_SESSION['nombre'].'</p>
                        </div>
                    </div>';
                        
                    
                    echo'<div class="row">

                        <div class="header-section text-center">
                            <h2>Control Paciente</h2>                              
                            <p>Registrando Control Medico para el paciente: '.$row['Nombre']. ' Rut: '.$row['Rut'].' </p>
                            <p>Control Registrado en la Fecha: '.$fecha_hora_actual.'</p>
                            <hr class="bottom-line">
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">

                                    <form id="form" method="post" class="form-horizontal mitad" action="formControl.php">

                                        <input type="hidden" value="'.$row['Rut'].'" name="run">
                                        <input type="hidden" value="'.$row['CodRFID'].'" name="cod">

                                        <div class="form-group row">
                                            <label class="col-xs-2 col-form-label">Motivo Consulta: </label>
                                            <div class="col-xs-10">
                                                <input class="form-control" type="text"  name="motcon" placeholder="Motivo por el cual el paciente Consulta" />
                                            </div>
                                        </div>                      

                                        <input type="hidden" value="'.$fecha_hora_actual.'" name="date">

                                        <div class="form-group row">
                                            <label class="col-xs-2 col-form-label">Diagnostico: </label>                        
                                                <div class="row">                    
                                                    <div class="col-md-2 col-sm-2 col-xs-2 left">
                                                        <h5>Respiratorias:</h5>
                                                        <input type="radio" name="diagnostico" value="Ira Alta">Ira Alta<br>
                                                        <input type="radio" name="diagnostico" value="Influenza">Influenza<br>
                                                        <input type="radio" name="diagnostico" value="Neumonia">Neumonia<br>
                                                        <input type="radio" name="diagnostico" value="Bronquitis">Bronquitis<br>
                                                        <input type="radio" name="diagnostico" value="Crisis Obstructiva">Crisis Obstructiva<br>
                                                        <input type="radio" name="diagnostico" value="Otras Respiratorias">Otras Respiratorias<br>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-2 left">
                                                        <h5>Circulatorias:</h5>
                                                        <input type="radio" name="diagnostico" value="Infarto Miocardio">Infarto Miocardio<br>
                                                        <input type="radio" name="diagnostico" value="Accidente Vascular">Accidente Vascular<br>
                                                        <input type="radio" name="diagnostico" value="Crisis Hipertensiva">Crisis Hipertensiva<br>
                                                        <input type="radio" name="diagnostico" value="Arritmia Grave">Arritmia Grave<br>
                                                        <input type="radio" name="diagnostico" value="Otras Circulatorias">Otras Circulatorias<br>
                                                    </div>
                                                    <div class="col-md-3 col-sm-3 col-xs-3 left">
                                                        <h5>Traum. y Envenenamientos:</h5>
                                                        <input type="radio" name="diagnostico" value="Ac. Transito">Ac. Tránsito<br>
                                                        <input type="radio" name="diagnostico" value="Causas Externas">Causas Externas<br>
                                                        <input type="radio" name="diagnostico" value="Otros Traum. y Envenenamientos">Otros Traum. y Envenenamientos<br>
                                                        <input type="radio" name="diagnostico" value="Diarrea">Diarrea<br>
                                                        <input type="radio" name="diagnostico" value="Colico Biliar">Colico Biliar<br>
                                                        <input type="radio" name="diagnostico" value="Otras Causas Digestivas">Otras Causas Digestivas<br>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-2 left">
                                                        <h5>Otras Morbilidades:</h5>
                                                        <input type="radio" name="diagnostico" value="Cefalea">Cefalea<br>
                                                        <input type="radio" name="diagnostico" value="Conjuntivitis">Conjuntivitis<br>
                                                        <input type="radio" name="diagnostico" value="Dolor Abdominal">Dolor Abdominal<br>
                                                        <input type="radio" name="diagnostico" value="Sd. Vertiginoso">Sd. Vertiginoso<br>
                                                        <input type="radio" name="diagnostico" value="Lumbago">Lumbago<br>
                                                        <input type="radio" name="diagnostico" value="Otras Morbilidades">Otras Morbilidades<br>
                                                    </div>
                                                </div>                            
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xs-2 col-form-label">Complemento Diagnostico: </label>
                                            <div class="col-xs-10">
                                                <input class="form-control" type="text"  name="comdiag" placeholder="Diagnostico Complementario" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xs-2 col-form-label">Procedimiento Diagnostico: </label>
                                            <div class="col-xs-10">
                                                <input class="form-control" type="text"  name="procedimiento" placeholder="Procedimiento Aplicado" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xs-2 col-form-label">Indicaciones Medicas: </label>
                                            <div class="col-xs-10">
                                                <input class="form-control" type="text"  name="indicacion" placeholder="Indicaciones Medicas a Seguir" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xs-2 col-form-label">Egreso: </label>
                                            <div class="col-xs-10">
                                                <input type="radio" name="egreso" value="Alta Medica">Alta Medica<br>
                                                <input type="radio" name="egreso" value="Hospitalizacion">Hospitalizacion<br>
                                            </div>
                                        </div>

                                        <div class="col-xs-12">
                                            <button type="submit" id="submit" name="submit" class="form contact-form-button light-form-button oswald light">Registrar Control</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>';
                    }

                }

                $conn->close();

                if(isset($_POST['submit'])){
                    $run = $_POST['run'];
                    $motconsulta = $_POST['motcon'];
                    $fecha = $_POST['date'];
                    $diagnostico = $_POST['diagnostico'];  
                    $complemento= $_POST['comdiag'];
                    $procedimiento= $_POST['procedimiento'];  
                    $indicacion= $_POST['indicacion'];
                    $egreso= $_POST['egreso']; 
                    $tag = $_POST['cod'];
                    
                    require "conexion.php";            
                    $sql= "insert into control (Rut, motivo ,fecha, diagnostico, complemento, procedimiento, indicacion, egreso)
                            values ($run,'$motconsulta', '$fecha', '$diagnostico', '$complemento', '$procedimiento',
                            '$indicacion', '$egreso')";
                    $result = $conn->query($sql);
                    if($conn->affected_rows==0){                
                        echo "<script>alert('No se pudo ingresar el control')</script>";
                    }else{
                        echo "<script>alert('Control Ingresado')</script>";
                    }

                    echo "<script language='javascript'>
                            window.location='ficha.php?tag=$tag';
                            window.opener.location.reload();
                            window.close();
                          </script>";
                    $conn->close();
                }   

        ?>  


            
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