
<?php
    if(isset($_POST['button'])){
        $rut = $_POST['rut'];
        $dv = $_POST['dv'];
        $cod= $_POST['rfid'];
        $nombre = $_POST['name'];  
        $fechanac= $_POST['fechanac'];
        $genero= $_POST['genero'];  
        $domicilio= $_POST['domicilio'];
        $localidad= $_POST['localidad'];     
        $fono=$_POST['telefono'];
        $prevision= $_POST['prevision'];
        $altura= $_POST['altura'];
        $peso= $_POST['peso'];
        $tiposangre= $_POST['tpsangre'];
        $factorrh= $_POST['rh'];
        $nomfam= $_POST['nombrefam'];
        $fonofam= $_POST['fonofam'];
        
        require "conexion.php";            
        $sql= "Insert into paciente (Rut, Dv, Nombre, FechaNac, Sexo, Domicilio, Localidad, Fono, Prevision, Altura, Peso, TipoSangre, FactorRH, NombreFamiliar, TelefonoFamiliar, CodRFID) values ('$rut','$dv', '$nombre', '$fechanac', '$genero', '$domicilio', '$localidad', '$fono', '$prevision', '$altura', '$peso', '$tiposangre', '$factorrh', '$nomfam', '$fonofam', '$cod')";
        $result = $conn->query($sql);
        $conn->close();
        
        header('Location: /MediSud/pacientes.php');
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
    <!--Modal box-->
    <div class="modal fade" id="login" role="dialog">
      <div class="modal-dialog modal-sm">
      
        <!-- Modal content no 1-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center form-title">Iniciar Sesión</h4>
          </div>
          <div class="modal-body padtrbl">

            <div class="login-box-body">
              <p class="login-box-msg">Ingresa tus Datos para Iniciar Sesión</p>
              <div class="form-group">
                <form name="" id="loginForm">
                 <div class="form-group has-feedback"> <!----- username -------------->
                      <input class="form-control" placeholder="Username"  id="loginid" type="text" autocomplete="off" /> 
                     <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback"><!----- password -------------->
                      <input class="form-control" placeholder="Password" id="loginpsw" type="password" autocomplete="off" />
            <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span><!---Alredy exists  ! -->
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <div class="row">
                      <div class="col-xs-12">
                          <div class="checkbox icheck">
                              <label>
                                <input type="checkbox" id="loginrem" > Recordarme
                              </label>
                          </div>
                      </div>
                      <div class="col-xs-12">
                          <button type="button" class="btn btn-green btn-block btn-flat" onclick="userlogin()">Ingresar</button>
                      </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Modal box-->
    <!--Contact-->
    <section id ="contact" class="section-padding">
      <div class="container">
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

    