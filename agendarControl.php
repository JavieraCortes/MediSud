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
          <li><form action="agendarControl.php" method="post">
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
                
                $rut=$_GET['agendar'];
                
                date_default_timezone_set('America/Santiago');
                $fecha= date('d-m-Y');
                $hora= time('H:i:s');
                
                require 'conexion.php';
                $s="SELECT * FROM paciente WHERE Rut=$rut";
                $r=$conn->query($s);
                if($r->num_rows>0){
                    while($row=$r->fetch_assoc()){
                        
                        echo '<br>
                                <div class="row">
                                    <div class="col-md-1">
                                        <a href="ficha.php?tag='.$row['CodRFID'].'"><button type="submit" class="btn btn-primary btn-xs"> < </button></a>
                                    </div>
                                    <div class="col-md-11">
                                        <p style="text-align:right"><img src="img/blue.png" width="20" />'.$_SESSION['nombre'].'</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="header-section text-center">
                                        <h2>Registrar Hora Control</h2>
                                        <hr class="bottom-line">
                                    </div>
                                  
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-10">

                                                <form id="form" method="post" class="form-horizontal mitad" action="agendarControl.php">
                                                    <input type="hidden" value="'.$row['CodRFID'].'" name="cod">
                                                    <div class="form-group row">
                                                        <label class="col-xs-3 col-form-label">Nombre Paciente: </label>
                                                        <div class="col-xs-9">'
                                                            .$row['Nombre'].'
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-xs-3 col-form-label">Rut Paciente: </label>
                                                        <div class="col-xs-9">'
                                                            .$row['Rut'].'
                                                        </div>
                                                    </div>                      

                                                    <div class="form-group row">
                                                        <label class="col-xs-5 col-form-label">Se agendará un control Médico con el profesional: </label>
                                                        <div class="col-xs-4">'
                                                            .$_SESSION['nombre'].'
                                                        </div>
                                                    </div> 
                                                    
                                                    <input type="hidden" name="nombre" value="'.$row['Nombre'].'"></input>
                                                    <input type="hidden" name="rut" value="'.$row['Rut'].'"></input>

                                                    <div class="form-group row">
                                                        <label class="col-xs-2 col-form-label">Fecha Control: </label>
                                                        <div class="col-xs-10">
                                                            <input class="form-control" type="date"  name="fecha" placeholder="Motivo por el cual el paciente Consulta" />
                                                        </div>
                                                    </div>  

                                                    <div class="form-group row">
                                                        <label class="col-xs-2 col-form-label">Hora Control: </label>
                                                        <div class="col-xs-10">
                                                            <input class="form-control" type="time" name="hora" placeholder="Motivo por el cual el paciente Consulta" />
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
                            $name = $_POST['nombre'];
                            $rutPac = $_POST['rut'];
                            $nombreMed = $_SESSION['nombre'];  
                            $fechaControl = date_create($_POST['fecha']);
                            $fechaControl = date_format($fechaControl, 'd-m-Y');
                            $horacontrol = $_POST['hora'];
                            $tag = $_POST['cod'];
                            require "conexion.php";            
                            $sql= "insert into agendarcontrol values ('$name',$rutPac, '$nombreMed', '$fechaControl', '$horacontrol')";
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
