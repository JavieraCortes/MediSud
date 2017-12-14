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
            <a class="navbar-brand" href="accesoMed.php">MEDI<span>SUD</span></a><img src="img/logo2.png" width="50" />
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="formPac.php">Ingresar Paciente</a></li>
          <li><a href="pacientes.php">Pacientes</a></li>
          <li><a href="ProxControles.php">Proximos Controles</a></li>
          <li><a href="estadisticas.php">Estadisticas</a></li>
          <li><a href="mapa.php">Geolocalización</a></li>   
          <li><form action="estadisticas.php" method="post">
                  <button type="submit" class="btn btn-green btn-block btn-flat" name="salir" style="margin-top:10%">Salir</button>
          </form>
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
            <h2>Estadisticas</h2>  
            <hr class="bottom-line">
          </div>
            
              
          <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                    <form action="estadisticas.php" method="post">
                        <label>Localidad : </label>
                        <select name="Localidad">    
                            <option value="Todas" selected="selected">Todas</option>
                            <option value="Los Andes">Los Andes</option>
                            <option value="Calle Larga">Calle Larga</option>
                            <option value="Rinconada">Rinconada</option>
                            <option value="San Esteban">San Esteban</option>
                            <option value="San Felipe">San Felipe</option>
                            <option value="Llai Llay">Llai Llay</option>
                            <option value="Putaendo">Putaendo</option>
                            <option value="Santa Maria">Santa Maria</option>
                            <option value="Catemu">Catemu</option>
                            <option value="Panquehue">Panquehue</option>
                        </select>
                        <button type="submit" class="btn btn-primary" name="button" onclick="">Graficar</button>
                     </form>
                    <br><br>
                    
                    <?php
                       
                        if(isset($_POST['button'])){
                                
                            $local = $_POST['Localidad'];
                            
                            $enfArray = array('Enfermedad Renal Cronica','Diabetes Mellitus','VIH/SIDA','Hipertension','Hemofilia',
                                        'Enfermedad Pulmonar Obstructiva Cronica','Artrosis','Fibrosis Quistica',
                                        'Artritis Reumatoidea','Epilepsia','Asma Bronquial','Parkinson','Artritis Idiopatica Juvenil',
                                        'Esclerosis Multiple','Hepatitis B','Hepatitis C','Hipotiroidismo','Lupus Eritematoso Sistemico');

                            require 'conexion.php';

                            $cantTotal = 0;
                            
                            for($i=0; $i<18; $i++){
                                
                                if($local == 'Todas'){
                                    
                                    $sql="SELECT IFNULL(COUNT(*),0) AS Cantidad FROM ENFERMEDAD EN JOIN PACIENTE PC "
                                   . "ON EN.Rut = PC.Rut WHERE NomEnfermedad = '".$enfArray[$i]."';";
                                    $tit = "Porcentaje de personas padecientes de enfermedades cronicas ";
                                    
                                }else{
                                    
                                    $sql="SELECT IFNULL(COUNT(*),0) AS Cantidad FROM ENFERMEDAD EN JOIN PACIENTE PC "
                                   . "ON EN.Rut = PC.Rut WHERE Comuna = '$local' AND NomEnfermedad = '".$enfArray[$i]."';";
                                    $tit = "Porcentaje de personas padecientes de enfermedades cronicas en la localidad de $local ";
                                }
                                

                                $result=$conn->query($sql); 
                                
                                while($row=$result->fetch_assoc()){

                                    $valArray[$i] = $row['Cantidad'];
                                    $cantTotal = $cantTotal + $row['Cantidad'];
                                
                                }
                            }

                            $conn->close();
                            
                            
                            
                            if($cantTotal>0){
                                
                                echo "<script type='text/javascript'>
                                    google.charts.load('current', {'packages':['corechart']});
                                    google.charts.setOnLoadCallback(drawChart);

                                    function drawChart() {

                                        var data = new google.visualization.DataTable();
                                        data.addColumn('string', 'Topping');
                                        data.addColumn('number', 'Slices');
                                        data.addRows([";
                                          

                                        for($i=0; $i<18; $i++){

                                            if($valArray[$i]>0){
                                                echo "['$enfArray[$i]',$valArray[$i]],";
                                                
                                            }
                                        }
                            
                                        
                                        echo "]);
                                            var options = {
                                            title: '$tit'
                                          };

                                          var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                                          chart.draw(data, options);
                                        }
                                        
                                      </script>";
                                 
                            }else{
                                echo '<center><h2>No existen pacientes con enfermedades cronicas</h2></center>';
                            }
                            
                           
                        }
                            
                        ?>
                    
                    <div id="piechart" style="width: 100%; height: 500px">
                        
                        
                    </div>    
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
</html>