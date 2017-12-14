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
          <li><a href="formPac.php">Ingresar Paciente</a></li>
          <li><a href="pacientes.php">Pacientes</a></li>
          <li><a href="ProxControles.php">Proximos Controles</a></li>
          <li><a href="estadisticas.php">Estadisticas</a></li>
          <li><a href="mapa.php">Geolocalización</a></li>  
          <li><form action="enfermedad.php" method="post">
                  <button type="submit" class="btn btn-green btn-block btn-flat" name="salir" style="margin-top:10%">Salir</button>
          </form>
        </ul>
        </div>
      </div>
    </nav>
    <!--/ Navigation bar-->
    <!--Feature-->
    <section id ="feature" class="section-padding">
        <div class="container">
            <?php
                    session_start();
                    
                    $rut=$_GET['ficha'];
                    require 'conexion.php';
                    $s="SELECT CodRFID FROM paciente WHERE Rut=$rut";
                    $r=$conn->query($s);

                    $row=$r->fetch_assoc();

                    echo '<br><div class="row">
                        <div class="col-md-1">
                            <a href="ficha.php?tag='.$row['CodRFID'].'"><button type="submit" class="btn btn-primary btn-xs"> < </button></a>

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
                  <h2>Añadir Enfermedad Crónica</h2>
                  <?php
                    $r=$_GET['ficha'];
                    require 'conexion.php';
                    $sql="SELECT *FROM paciente WHERE Rut=$r";
                    $result=$conn->query($sql);
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                    echo '
                  <p>Se Registrará una enfermedad Crónica al paciente '.$row['Nombre']. ' Rut: '.$row['Rut'].' </p>
                  <hr class="bottom-line">
                </div>
                <form id="form" method="post" class="form-horizontal mitad" action="enfermedad.php">
                    
                        <input type="hidden" value="'.$row['Rut'].'" name="cedula">                           
                        
                        <div class="form-group row">
                            <label class="col-xs-3 col-form-label">Seleccionar Enfermedad Crónica: </label>
                            <div class="col-xs-9">
                                <select name="enfermedad" size="5">
                                <option value="Enfermedad Renal Cronica">Enfermedad Renal Crónica</option> 
                                <option value="Diabetes Mellitus">Diabetes Mellitus</option> 
                                <option value="VIH/SIDA">VIH/SIDA</option>
                                <option value="Hipertension">Hipertensión</option> 
                                <option value="Hemofilia">Hemofilia</option>
                                <option value="Enfermedad Pulmonar Obstructiva Cronica">Enfermedad Pulmonar Obstructiva Crónica</option> 
                                <option value="Artrosis">Artrosis</option>
                                <option value="Fribrosis Quistica">Fribrosis Quística</option> 
                                <option value="Artritis Reumatoidea">Artritis Reumatoídea</option> 
                                <option value="Epilepsia">Epilepsia</option>
                                <option value="Asma Bronquial">Asma bronquial</option> 
                                <option value="Parkinson">Parkinson</option> 
                                <option value="Artritis Idiopatica Juvenil">Artritis Idiopática Juvenil</option>
                                <option value="Esclerosis Multiple">Esclerosis Múltiple</option> 
                                <option value="Hepatitis B">Hepatitis B</option> 
                                <option value="Hepatitis C">Hepatitis C</option>
                                <option value="Hipotiroidismo">Hipotiroidismo</option> 
                                <option value="Lupus Eritematoso Sistemico">Lupus Eritematoso Sistémico</option> 
                             </select>
                            </div>
                        </div>
                            
                        <div class="form-group row">
                            <label class="col-xs-3 col-form-label">Medicamento Recetado: </label>
                            <div class="col-xs-9">
                                <input class="form-control" type="text"  name="medicamento" placeholder="Prescripción Medica" />                            
                            </div>
                        </div>
                            
                        <div class="form-group row">
                            <label class="col-xs-3 col-form-label">Dosis: </label>
                            <div class="col-xs-2">
                                <input class="form-control" type="text"  name="dosis" placeholder="Dosis(mg)" />                            
                            </div>
                            <label class="col-xs-1 col-form-label"> </label>
                            <label class="col-xs-2 col-form-label">Frecuencia: </label>
                            
                            <div class="col-xs-3">
                                <input class="form-control" type="text"  name="frecuencia" placeholder="Frecuencia(horas)" /> 
                            </div>
                        </div>
                            
                        <div class="col-xs-12">
                            <button type="submit" id="submit" name="botton" class="form contact-form-button light-form-button oswald light">Registrar Enfermedad Cronica</button>
                        </div>
                    </form>';
                }}

                $r=$_GET['ficha'];

                if(isset($_POST['botton'])){
                    $cedula = $_POST['cedula'];
                    $enfermedad = $_POST['enfermedad'];
                    $medicamento = $_POST['medicamento'];
                    $dosis = $_POST['dosis'];  
                    $frecuencia= $_POST['frecuencia'];
                    require "conexion.php";            
                    $sql1= "Insert into enfermedad (Rut, NomEnfermedad, NomMedicamento, DosisMg, PeriodoHr) values ('$cedula','$enfermedad', '$medicamento', '$dosis', '$frecuencia')";
                    $result = $conn->query($sql1);
                    $conn->close();
                    header('Location: /MediSud/pacientes.php');
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