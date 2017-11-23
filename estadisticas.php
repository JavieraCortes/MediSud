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
            <h2>Estadisticas</h2>
            <p>Seleccine la localidad desde la lista de valores para comenzar a graficar</p>
            
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
                            <option value="San Felipe">San Felipe</option>
                        </select>
                        <button type="submit" class="btn btn-primary" name="button" onclick="">Graficar</button>
                     </form>
                    <br><br>
                    <?php
                            if(isset($_POST['button'])){
                                
                                $local = $_POST['Localidad'];
                                
                                if($local=='Todas'){
                                    echo '<p align="center" style="color:black">Porcentaje de personas padecientes '
                                    . 'de enfermedades cronicas </p>';
                                    include "GraficoTO.php";
                                }
                                if($local=='Los Andes'){
                                    echo '<p align="center" style="color:black">Porcentaje de personas padecientes '
                                    . 'de enfermedades cronicas de la localidad de Los Andes</p>';
                                    include "GraficoLA.php";
                                }
                                if($local=='San Felipe'){
                                    echo '<p align="center" style="color:black">Porcentaje de personas padecientes '
                                    . 'de enfermedades cronicas de la localidad de San Felipe</p>';
                                    include "GraficoSF.php";
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