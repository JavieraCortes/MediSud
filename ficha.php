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
            <div class="row">
                
                <?php
                    $rut=$_GET['rut'];
                    require 'conexion.php';
                    $sql="SELECT *FROM paciente WHERE Rut=$rut";
                    $result=$conn->query($sql);

                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            $peso=$row['Peso'];
                            $altura=$row['Altura'];
                            $imc=round($peso/(($altura)*2),3);
                            
                            echo '<div class="header-section text-center">
                                    <h2>Ficha N°'. $row['Rut'].'</h2>
                                    <img src="img/control.png" width="50">
                                    <hr class="bottom-line">
                                </div>
                                <div class="feature-info">

                                    <div class="row">                    
                                      <div class="col-md-3 col-sm-3 col-xs-3 left">
                                             <a href="controles.php?rut='.$row["Rut"].'"><button type="button" class="btn btn-primary">Controles</button></a>
                                      </div>
                                      <div class="col-md-3 col-sm-3 col-xs-3 left">
                                             <a href="enfermedad.php?ficha='.$row["Rut"].'"><button type="button" class="btn btn-primary">Añadir E.Crónica</button></a>
                                      </div>
                                      <div class="col-md-3 col-sm-3 col-xs-3 left">
                                            <a href="urgencia.php?urgencia='.$row["Rut"].'"><button type="button" class="btn btn-primary">Urgencia</button></a>
                                      </div>
                                  </div>
                                    <br>
                                    <div class="row">                    
                                      <div class="col-md-7 col-sm-7 col-xs-7 left">
                                            <h4>Información Personal:</h4><br>
                                            Nombre: '.$row['Nombre'].'<br>
                                            RUT: '.$row['Rut'].' - '.$row['Dv'].'<br>
                                            Tag RFID Asociado: '.$row['CodRFID'].'<br>
                                            Fecha Nacimiento: '.$row['FechaNac'].'<br>
                                            Domicilio: '.$row['Domicilio'].', '.$row['Localidad'].'<br>
                                            Telefono Contacto: '.$row['Fono'].'<br>
                                            Previsión: '.$row['Prevision'].'<br><br>
                                      </div>
                                      <div class="col-md-5 col-sm-5 col-xs-5 left">
                                            <h4>Información Médica: </h4><br>
                                            Tipo Sangre: '.$row['TipoSangre'].'  '.$row['FactorRH'].'<br>
                                            Altura: '.$row['Altura'].'<br>
                                            Peso: '. $row['Peso'].'<br>
                                            IMC: '.$imc.'<br>
                                            Enfermedades Cronicas:<br>
                                            Alergias:<br>
                                            Medicamentos:<br><br>
                                      </div>
                                  </div>

                                    <h4>Información Familiar Contacto: </h4><br>
                                    Nombre Familiar: '.$row['NombreFamiliar'].'<br>
                                    Telefono Familiar: '. $row['TelefonoFamiliar'].'<br>

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
</html>';
    }
}else{
    echo 'La ficha no Existe';
}
?>