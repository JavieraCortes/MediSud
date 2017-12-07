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
            <a class="navbar-brand" href="index.php">MEDI<span>SUD</span></a><img src="img/logo2.png" width="50" />
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="pacientes.php">Lectura de Urgencia</a></li>
          <li class="btn-trial"><a href="#" data-target="#login" data-toggle="modal">INGRESAR</a></li>
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
                               
                 <form action="index.php" method="post">
                    <div class="form-group has-feedback">
                        <input class="form-control" placeholder="Usuario" name="usuario" type="number" autocomplete="off" /> 
                    </div>
                    <div class="form-group has-feedback">
                        <input class="form-control" placeholder="Contraseña" name="contra" type="password" autocomplete="off" />
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button type="submit" id="boton" name="boton" class="btn btn-green btn-block btn-flat">Ingresar</button>
                        </div>
                    </div>
                </form>
           
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
       
    <div class="row">
        
        <?php

            if(isset($_POST['boton'])){
                $user = $_POST['usuario'];
                $pass = md5($_POST['contra']);

                require 'conexion.php';
                $sql="select * from usuario where usuario=$user";
                $result = $conn->query($sql);

                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){

                        if($pass == $row['pass']){

                            session_start();
                            $_SESSION['activo'] = true;
                            $_SESSION['user'] = $row['usuario'];
                            $_SESSION['nombre'] = $row['nombre'];
                            $_SESSION['tipo'] = $row['tipoUsuario'];

                            if($row['tipoUsuario'] == 'Paciente'){
                                header('Location: accesoPac.php');
                            }
                            if($row['tipoUsuario'] == 'Doctor'){
                                header('Location: accesoMed.php');
                            }
                            if($row['tipoUsuario'] == 'Admin'){
                                header('Location: accesoAdm.php');
                            }
                        }else{
                            echo '<script>alert("Contraseña incorrecta");</script>';
                        }
                    }
                }else{
                    echo '<script>alert("El usuario no Existe");</script>';
                }
                $conn->close();
            }
        ?>
        
    </div>
    
    <!--/ Modal box-->
    <!--Feature-->
    <section id ="feature" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="header-section text-center">
                    <h2><img src="img/logo2.png" width="35">¿Comó nace MediSud? </h2>
                    <br>
                </div>
                <div class="feature-info">               
                    <div class="row">                    
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <p style="text-align:justify">En las últimas décadas, se ha masificado la cantidad de enfermedades que 
                            padecen las personas. La OMS (Organización mundial de la salud) certifica que: En Chile, al igual 
                            que en la mayoría del mundo, las ENT (Enfermedades no transmisibles o crónicas) son la principal 
                            causa de muerte. </p>
                        <p style="text-align:justify">Esto es una realidad en Chile por lo que los organismos de salud deben 
                            estar preparados para afrontar estas enfermedades al momento de ocurrir alguna emergencia, por 
                            ejemplo, una persona que sufra una crisis en la vía pública y no cuente con sus documentos o 
                            identificación. Cuando obtenga su primera atención médica, se perdería tiempo al intentar reconocerlo 
                            para evaluar el tratamiento adecuado a su salud. </p>
                        <div align="center"><img src="img/med.jpg" width="350" ></div>
                        <p style="text-align:justify">Conocer la información oportunamente, es un factor provechoso a favor del 
                            diagnóstico y el actuar médico. Por lo tanto, este proyecto busca aprovechar las primeras horas que 
                            son primordiales en la atención de un paciente descompensado.</p>
                        <p style="text-align:justify">Tomando en consideración lo anterior, nace la necesidad de crear una aplicación
                        web en conjunto con tecnología RFID para facilitar la entrega de información médica de pacientes crónicos o 
                        de riesgo a los asistentes de salud, creandose asi la posibilidad de que exista una atención más expedita 
                        y eficiente.</p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ feature-->
    <!--Courses-->
    <section id ="courses" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
            <h2>¿Qué puedes hacer?</h2>
            <p>En MediSud puede contar con las siguientes opciones.</p>
            <hr class="bottom-line">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6 padleft-right">
            <figure class="imghvr-fold-up">
                <img src="img/geo.png" class="img-responsive">
              <figcaption>
                  <h3>Geolocalización</h3>
                  <p>Podrás ver la ubicación de los pacientes que solicitaron atención de urgencia, con la finalidad de encontrar posibles focos infecciosos.</p>
              </figcaption>
              <a href="#"></a>
            </figure>
          </div>
          <div class="col-md-4 col-sm-6 padleft-right">
            <figure class="imghvr-fold-up">
                <img src="img/citas.jpeg" class="img-responsive">
              <figcaption>
                  <h3>Estadisticas</h3>
                  <p>Tendrás acceso a estadisticas sobre la cantidad de personas enfermas de un cierto tipo de enfermdad y en que sector se encuentran.</p>
              </figcaption>
              <a href="#"></a>
            </figure>
          </div>
          <div class="col-md-4 col-sm-6 padleft-right">
            <figure class="imghvr-fold-up">
                <img src="img/ficha.jpeg" class="img-responsive">
              <figcaption>
                  <h3>Información Paciente</h3>
                  <p>Acceso a información detallada de cada paciente, encontrando también sus controles medicos y de urgencia. </p>
              </figcaption>
              <a href="#"></a>
            </figure>
          </div>
        </div>
      </div>
    </section>
    <!--/ Courses-->     
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