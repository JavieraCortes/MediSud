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
    
    
    <script type="text/javascript" src="js/loader.js"></script>
    
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
            
            <li><a href="FichaPac.php">Mi Ficha</a></li>
            <li><a href="ControlesPac.php">Controles Realizados</a></li>
            <li><a href="ProxControlesPac.php">Proximos Controles</a></li>
            <li><a href="EstadisticasPac.php">Estadisticas</a></li>
            
                
            <li><form action="EstadisticasPac.php" method="post">
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
            <br>
            <div class="row">
                    <div class="col-md-1">
                        <a href="accesoPac.php"><button type="submit" class="btn btn-primary btn-xs"> < </button></a>
                    </div>
                
            
            
                <?php
                    session_start();
                    
                    if(isset($_POST['salir'])){
                    session_destroy();
                    header('Location: index.php');
                    }
                     
                    echo '<div class="col-md-11">
                        <p style="text-align:right"><img src="img/blue.png" width="20" />'.$_SESSION['nombre'].'</p>
                    </div>';
                    
                    $rut = $_SESSION['user'];
                ?>
            </div> 
            
            <div class="row">
                <div class="header-section text-center">
                    <?php
                        
                        $meses = array('Ene','Feb','Mar','Abr','May','Jun','Jul','Agos','Sep',
                                'Oct','Nov','Dic');
                        $valMeses = array(0,0,0,0,0,0,0,0,0,0,0,0);
                        
                        $hoy = getdate();
                        $m = $hoy['mon'];
                        $y = $hoy['year'];
                        
                        
                        require 'conexion.php';
                        $sql="SELECT fecha FROM urgencia WHERE run=$rut";
                        $result=$conn->query($sql);

                        if($result->num_rows>0){
                            
                            while($row=$result->fetch_assoc()){
                                    $fec = explode(" ",$row['fecha']);
                                    $fecha = explode("-",$fec[0]);
                                    
                                    $mes = $fecha[1];
                                    $ano = $fecha[2];
                                    
                                    if($ano == $y || $ano == $y-1){
                                        $valMeses[$mes-1] = $valMeses[$mes-1] + 1;
                                    }
                            }
                            
                            echo "<script type='text/javascript'>
                                    google.charts.load('current', {packages:['corechart']});
                                    google.charts.setOnLoadCallback(drawChart);
                                    function drawChart() {
                                      var data = google.visualization.arrayToDataTable([
                                        ['Mes', 'Cantidad', { role: 'style' } ],";
                                
                                $m = $m-1;
                                for($i=0; $i<12 ; $i++){
                                    echo "['$meses[$m]',$valMeses[$m],'#084B8A'],";
                                    if($m == 11){
                                        $m = 0;
                                    }
                                    $m++;
                                }
                                        

                            echo     "]);

                                      var view = new google.visualization.DataView(data);
                                      view.setColumns([0, 1,
                                                       { calc: 'stringify',
                                                         sourceColumn: 1,
                                                         type: 'string',
                                                         role: 'annotation' },
                                                       2]);

                                      var options = {
                                        title: 'Cantidad de emergencias medicas de el ultimo año',
                                        width: 1200,
                                        height: 500,
                                        bar: {groupWidth: '95%'},
                                        legend: { position: 'none' },
                                      };
                                      var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_values'));
                                      chart.draw(view, options);
                                  }
                                  </script>";
                            
                            
                        }else{
                            echo '<center><h2>No hay emergencias registrados</h2></center>';
                        }
                        
                        $conn->close();
                        
                ?>
                    
                    <div id="columnchart_values" style="width: 100%; height: 500px;"></div>
                    
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