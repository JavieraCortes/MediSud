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
    <!--Contact-->

    
    <section id ="contact" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
            <h2>Pacientes</h2>
            <p>Registros de Pacientes MediSud </p>
            <hr class="bottom-line">
          </div>
            
              <div class="col-lg-10">
                  <form id="form1" method="post" class="form-horizontal mitad" action="seleccionPac.php">
                    <div class="form-group row">
                            <label class="col-xs-3 col-form-label">Tag RFID Asociado:</label>
                            <div class="col-xs-5">
                              <input class="form-control" type="text" min="0" maxlength="20" name="tag" />
                            </div>
                            <div class="col-xs-3 "> 
                            <button type="submit" name="buscar" class="btn btn-primary">Buscar Paciente</button>
                        </div>
                        </div>
                      <!-- form contact-form-button   -->
                    </form>
                </div>
            
          <div id="sendmessage">Control Registrado</div>
          <div id="errormessage"></div>
          <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <?php
                    require 'conexion.php';
                    
                    $sql = "select *from paciente";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        echo'<table class="pacientes" align="center">
                        <thead>
                        <tr>
                        <th>Rut</th>
                        <th>Pulsera</th>
                        <th>Nombre</th>
                        <th>Prevision</th>     
                        <th>Control</th>
                        <th>Ficha</th>
                        </tr>
                        </thead>
                        <tbody>';
                        while($row = $result->fetch_assoc()){
                            echo '<tr>
                            <td>'. $row['Rut'] . "-". $row['Dv'].'</td> 
                            <td>'.$row['CodRFID'].'</td>
                            <td>'. $row['Nombre'].'</td>                          
                            <td>'.$row['Prevision'].'</td>
                            <td>'. "<a href = 'formControl.php?rut=" . $row["Rut"]."'> Control </a>".'</td>
                            <td>'. "<a href = 'ficha.php?rut=" . $row["Rut"]."'> Ver </a>".'</td>
                            </tr>';
                        }   
                    }else{
                        echo 'No hay pacientes registrados';
                    }
                    echo '</tbody></table>';
                    ?>
                    
                        
                        
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