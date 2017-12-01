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
          <li><form action="formPac.php" method="post">
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
                    echo '<br><p style="text-align:right"><img src="img/blue.png" width="20" />'.$_SESSION['nombre'].'</p>';
                    if(isset($_POST['salir'])){
                    session_destroy();
                    header('Location: index.php');
                    }
           ?>
          
          
        <div class="row">
          <div class="header-section text-center">
            <h2>Ingreso Nuevo Paciente</h2>
            <p>Para el ingreso de un nuevo Paciente debe completar todos los datos solicitados a continuación.</p>
            <hr class="bottom-line">
          </div>

          <form action="formPac.php" method="post" role="form" class="contactForm" onsubmit="return validacion()">
              <div class="col-md-6 col-sm-6 col-xs-12 left">
                <div class="form-group">
                    Nombre:
                    <input type="text" name="name" class="form-control form" id="name" placeholder="Nombre Paciente" maxlength="80"/>
                    <div class="validation"></div>
                </div>
                  <div class="form-group">
                       RUT:
                  <div class="row">                    
                      <div class="col-md-8 col-sm-8 col-xs-8 left">
                          <input type="number" class="form-control" name="rut" id="rut" placeholder="RUT Paciente" min="0" maxlength="8" />
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-4 left">
                          <input type="text" class="form-control" name="dv" id="dv" placeholder="dv" maxlength="1" />
                      </div>
                  </div>
                  <div class="form-group">
                    Tag RFID:
                    <input type="text" class="form-control" name="rfid" id="rfid" placeholder="Tag RFID asociado al Paciente"/>
                    <div class="validation"></div>
                </div>
                    </div>
                <div class="form-group">
                    Fecha Nacimiento:
                    <input type="date" class="form-control" name="fechanac" id="fechanac" placeholder="Fecha Nacimiento Paciente" />
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    Género: <br>
                    <input type="radio" name="genero" value="Masculino">Masculino
                    <input type="radio" name="genero" value="Femenino">Femenino
                    <div class="validation"></div>
                </div>               
                <div class="form-group">
                    Domicilio:
                    <input type="text" class="form-control" name="domicilio" id="domicilio" placeholder="Domicilio del Paciente" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    Comuna
                    <input type="text" class="form-control" name="comuna" id="comuna" placeholder="Comuna" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    Localidad
                    <input type="text" class="form-control" name="localidad" id="localidad" placeholder="Localidad" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    Telefono:
                    <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Telefono Contacto" min="0" maxlength="8"/>
                    <div class="validation"></div>
                </div>
              </div>
              
              
              <div class="col-md-6 col-sm-6 col-xs-12 right">
                <div class="form-group">
                    Tipo Sangre:
                      <div class="row">                    
                      <div class="col-md-3 col-sm-3 col-xs-3 left">
                          <select name="prevision">
                            <optgroup label="Tipo Prevision"> 
                            <option value="FONASA A">FONASA A</option> 
                            <option value="FONASA B">FONASA B</option> 
                            <option value="FONASA C">FONASA C</option>
                            <option value="FONASA D">FONASA D</option> 
                            <option value="ISAPRE">ISAPRE</option> 
                            </optgroup>
                         </select>
                      </div>
                    <div class="validation"></div>
                </div>
                </div>
                <div class="form-group">
                    Altura:
                    <input type="float" class="form-control" name="altura" id="altura" placeholder="Altura Paciente" />
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    Peso:
                    <input type="number" class="form-control" name="peso" id="peso" placeholder="Peso Paciente (kg)" />
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    Tipo Sangre:
                      <div class="row">                    
                      <div class="col-md-3 col-sm-3 col-xs-3 left">
                          <select name="tpsangre">
                            <optgroup label="Tipo Sangre"> 
                            <option value="A">Tipo A</option> 
                            <option value="B">Tipo B</option> 
                            <option value="AB">Tipo AB</option>
                            <option value="O">Tipo O</option> 
                            </optgroup>
                         </select>
                      </div>
                      <div class="col-md-9 col-sm-9 col-xs-9 left">
                        <select name="rh">
                            <optgroup label="Factor RH"> 
                            <option value="POSITIVO">Positivo</option> 
                            <option value="NEGATIVO">Negativo</option> 
                            </optgroup>
                         </select>
                      </div>

                    <div class="validation"></div>
                </div>
                </div>
                <div class="form-group">
                            Alergias:
                            <input type="text" class="form-control" name="alergia" id="alergia" placeholder="Ingrese Alergias del Paciente" />
                            <div class="validation"></div>
                        </div>    
                <div class="form-group">
                    <br>Datos Familiar Contacto:<br><br>
                    Nombre Familiar:
                    <input type="text" name="nombrefam" class="form-control form" id="nombrefam" placeholder="Nombre Familiar Contacto" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    Telefono Familiar:
                    <input type="number" class="form-control" name="fonofam" id="fonofam" placeholder="Telefono Contacto Familiar" min="0" maxlength="8"/>
                    <div class="validation"></div>
                </div>
              </div>

              <div class="col-xs-12">
                <button type="submit" id="button" name="button" class="form contact-form-button light-form-button oswald light">Ingresar Paciente</button>
              </div>
          </form>  
                              
            <?php
                if(isset($_POST['button'])){
                    $rut = $_POST['rut'];
                    $dv = $_POST['dv'];
                    $cod= $_POST['rfid'];
                    $nombre = $_POST['name'];  
                    $fechanac= $_POST['fechanac'];
                    $genero= $_POST['genero'];  
                    $domicilio= $_POST['domicilio'];
                    $comuna= $_POST['comuna'];
                    $localidad= $_POST['localidad'];     
                    $fono=$_POST['telefono'];
                    $prevision= $_POST['prevision'];
                    $altura= $_POST['altura'];
                    $peso= $_POST['peso'];
                    $tiposangre= $_POST['tpsangre'];
                    $factorrh= $_POST['rh'];
                    $alergia = $_POST['alergia'];
                    $nomfam= $_POST['nombrefam'];
                    $fonofam= $_POST['fonofam'];

                    require "conexion.php";            
                    $sql= "Insert into paciente (Rut, Dv, Nombre, FechaNac, Sexo, Domicilio, Comuna, Localidad, Fono, Prevision, Altura, Peso, TipoSangre, FactorRH, alergias, NombreFamiliar, TelefonoFamiliar, CodRFID) values ('$rut','$dv', '$nombre', '$fechanac', '$genero', '$domicilio', '$comuna', '$localidad', '$fono', '$prevision', '$altura', '$peso', '$tiposangre', '$factorrh', '$alergia', '$nomfam', '$fonofam', '$cod')";
                    $result = $conn->query($sql);
                    
                    if($result->num_rows>0){
                        //header('Location: MediSud/pacientes.php');
                        echo "<script languaje='javascript'>window.location='pacientes.php'</script>";
                    }else{
                        echo '<h2>No se pudo ingresar el paciente</h2>';
                    }
                    
                    $conn->close();

                    
                }  

                ?>
        </div>
      </div>
        
    </section>


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
    <script src="js/Validacion.js"></script>
    
  </body>
</html>

    