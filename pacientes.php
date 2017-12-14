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
            <a class="navbar-brand" href="accesoMed.php">MEDI<span>SUD</span></a><img src="img/logo2.png" width="50" />
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="pacientes.php">Pacientes</a></li>
          <li><a href="estadisticas.php">Estadisticas</a></li>
          <li><a href="mapa.php">Geolocalización</a></li>
          <li><a href="formPac.php">Ingresar Paciente</a></li>  
          <li><form action="pacientes.php" method="post">
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
            <h2>Pacientes</h2>
            <hr class="bottom-line">
          </div>
            
            <div class="row">
              <div class="col-lg-12">    
                    <form id="form1" name="form1" method="get" class="form-horizontal mitad" action="ficha.php">
                        
                        <div class="form-group row" style="margin-right: 0">
                        
                            <label class="col-xs-3 col-form-label">Tag RFID Asociado:</label>
                            <div class="col-xs-5">
                              <input class="form-control" type="text" min="0" maxlength="20" id="tag" name="tag" />
                            </div>
                            
                            <div class="col-xs-2 ">                                 
                                <button type="submit" name="buscar" class="btn btn-primary">Buscar Paciente</button>                                
                            </div>
                            
                            <div class="col-xs-2 ">  
                                <a href="lector.php" class="btn btn-primary">Leer con lector</a>
                            </div>
                        </div>
                    </form>
                </div>              
            </div>

          <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                    
                    <?php
                        require 'conexion.php';

                        $sql = "select * from paciente";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){

                            echo'<table class="pacientes" align="center">
                            <thead>
                            <tr>
                            <th>Rut</th>
                            <th>Pulsera</th>
                            <th>Nombre</th>
                            <th>Prevision</th>     
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
                                <td>'. '<a href = "ficha.php?tag='. $row["CodRFID"].'"> Ver </a>'.'</td>
                                </tr>';
                            }
                            
                            echo '</tbody></table>';
                            
                        }else{
                            echo '<center><h2>No hay pacientes registrados</h2></center>';
                        }
                        
                        
                        $conn->close();
                    
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