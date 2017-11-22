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
            <a class="navbar-brand" href="acceso.php">MEDI<span>SUD</span></a><img src="img/logo2.png" width="50" />
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
    <!--Feature-->
    <section id ="feature" class="section-padding">
        <div class="container">
            
            <?php
            
                $rut=$_GET['rut'];
                require 'conexion.php';
                $sql="SELECT *FROM control WHERE Rut=$rut";
                $result=$conn->query($sql);

                if($result->num_rows>0){
                    
                    echo '<div class="row">
                                <div class="header-section text-center">
                                    <h2>Ficha N°'. $rut.'</h2>
                                    <img src="img/control.png" width="50">
                                    <hr class="bottom-line">
                                </div>
                                <div class="feature-info">
                                
                                <table class="pacientes">
                                <thead>
                                <tr>
                                <th>Fecha Control</th>
                                <th>Motivo</th>
                                <th>Egreso</th>     
                                <th>Control</th>
                                </tr>
                                </thead>
                                <tbody>';
                    
                    while($row = $result->fetch_assoc()){
                        
                        echo'<tr>
                                <td>'. $row['fecha'] . '</td> 
                                <td>'. $row['motivo'].'</td>                          
                                <td>'.$row['egreso'].'</td>
                                <td>'. "<a href = 'verControl.php?rut=" . $row["Rut"]. '&registro='. $row["Registro"]."'>Ver Control </a>".'</td>
                            </tr>';
                    }
                            
                    echo '</tbody></table>'
                        . '</div>
                        </div>';
                }else{
                    echo 'No hay Controles registrados';
                }
            ?>
                        

                    
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

