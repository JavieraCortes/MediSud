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
                  <form action="loginForm.php" method="post">
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
    <!--/ Modal box-->
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