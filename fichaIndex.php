<?php   
    $exist = file_exists("Archivo.txt");
    if($exist){
        $borrado = unlink("Archivo.txt");
    }
?>
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
            <a class="navbar-brand" href="index.php">MEDI<span>SUD</span></a><img src="img/logo2.png" width="50" />
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
        </ul>
        </div>
      </div>
    </nav>
    <!--/ Navigation bar-->
    <!--Feature-->
    
    <section id ="feature" class="section-padding">
        <div class="container">
            <br>
            <div class="col-md-1">
                <a href="lectorIndex.php"><button type="submit" class="btn btn-primary btn-xs"> < </button></a>
            </div>
       
            <div class="row">
                
                <?php
                                
                    $tag=$_GET['tag'];
                    
                    require 'conexion.php';
                    $sql="SELECT *FROM paciente WHERE CodRFID='$tag'";
                    $result=$conn->query($sql);

                    if($result->num_rows>0){
                        
                        while($row=$result->fetch_assoc()){
                            $peso=$row['Peso'];
                            $altura=$row['Altura'];
                            $imc=round($peso/(($altura)*2),3);
                            $rut=$row['Rut'];
                            
                            echo '<div class="header-section text-center">
                                    <h2><img src="img/control.png" width="22"> Ficha N°'. $row['Rut'].'</h2>
                                </div>
                                <div class="feature-info">

                                    
                                    <br><br>';
                            
                                    
                    
                                   echo'<br><div class="row">                    
                                      <div class="col-md-7 col-sm-7 col-xs-7 left">
                                            <h4>Información Personal:</h4><br>
                                            Nombre: '.$row['Nombre'].'<br>
                                            RUT: '.$row['Rut'].' - '.$row['Dv'].'<br>
                                            Tag RFID Asociado: '.$row['CodRFID'].'<br>
                                            Fecha Nacimiento: '.$row['FechaNac'].'<br>
                                            Domicilio: '.$row['Domicilio'].', '.$row['Comuna']. ', '.$row['Localidad'].'<br>
                                            Telefono Contacto: '.$row['Fono'].'<br>
                                            Previsión: '.$row['Prevision'].'<br><br>
                                      </div>
                                      <div class="col-md-5 col-sm-5 col-xs-5 left">
                                            <h4>Información Médica: </h4><br>
                                            Tipo Sangre: '.$row['TipoSangre'].'  '.$row['FactorRH'].'<br>
                                            Altura: '.$row['Altura'].'<br>
                                            Peso: '. $row['Peso'].'<br>
                                            IMC: '.$imc.'<br>
                                            Alergias: '. $row['alergias'].'<br>
                                      </div>
                                  </div>

                                    <h4>Información Familiar Contacto: </h4><br>
                                    Nombre Familiar: '.$row['NombreFamiliar'].'<br>
                                    Telefono Familiar: '. $row['TelefonoFamiliar'].'<br>';
                            }
                        }else{
                            echo '<div style="text-align:center" ><h2>La ficha no existe.</h2></div>';
                        }
                        
                
                  $conn->close();      
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
