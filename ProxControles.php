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
    <link rel="stylesheet" type="text/css" href="css/tabla.css">
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
            <a class="navbar-brand" href="accesoPac.php">MEDI<span>SUD</span></a><img src="img/logo2.png" width="50" />
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="formPac.php">Ingresar Paciente</a></li>
            <li><a href="pacientes.php">Pacientes</a></li>
            <li><a href="ProxControles.php">Proximos Controles</a></li>
            <li><a href="estadisticas.php">Estadisticas</a></li>
            <li><a href="mapa.php">Geolocalización</a></li>  
            <li><form action="ProxControlesPac.php" method="post">
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
            <div class="row" style="text-align: right">
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
          </div>
            <div class="row">
                
                <div class="header-section text-center">
                    <h2>Controles Agendados</h2>                                   
                </div>
            <?php
            
                $usu = $_SESSION['nombre'];
                
                
                date_default_timezone_set('America/Santiago');
                $fecha_hora_actual = date('d-m-Y H:i:s');
                    
                $hoy = getdate();
                $d = $hoy['mday'];
                $m = $hoy['mon'];
                $y = $hoy['year'];
            
                
                require 'conexion.php';
                $sql="SELECT *FROM agendarcontrol WHERE nombreMed='$usu'";
                $result=$conn->query($sql);

                if($result->num_rows>0){
                    
                    echo '<div class="row">
                                
                                <div class="feature-info">
                                
                                <table class="pacientes">
                                <thead>
                                <tr>
                                <th>Paciente</th>
                                <th>Rut Paciente</th>
                                <th>Fecha</th>
                                <th>Hora</th>   
                                </tr>
                                </thead>
                                <tbody>';
                    
                    $horas =0;
                    while($row = $result->fetch_assoc()){
                        
                        $fec = explode("-",$row['fecha']);
                        $dia = $fec[0];
                        $mes = $fec[1];
                        $ano = $fec[2];
                        
                        if($dia>=$d && $mes>=$m && $ano>=$y){
                            
                            echo'<tr>
                                <td>'. $row['nombrePac'] . '</td> 
                                <td>'. $row['rutPac'] . '</td> 
                                <td>'. $row['fecha'].'</td>                          
                                <td>'.$row['hora'].'</td>
                                
                            </tr>';
                            
                            $horas = $horas+1;
                        }
                        
                        
                    }
                      
                    
                    echo '</tbody></table>'
                        . '</div>
                        </div>';
                    
                    if($horas == 0){
                        echo '<center><h2>No hay nuevos controles agendados</h2></center>';
                    }
                }else{
                    echo '<center><h2>No hay nuevos controles agendados</h2></center>';
                }
            ?>
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