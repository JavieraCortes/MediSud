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
            <a class="navbar-brand" href="accesoAdm.php">MEDI<span>SUD</span></a><img src="img/logo2.png" width="50" />
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
            <?php           
            session_start();
            ?>
            
            <li><form action="accesoPac.php" method="post">
                    <button type="submit" class="btn btn-green btn-block btn-flat" name="salir" style="margin-top:10%">Salir</button>
            </form>
            </li> 
        </ul>
        </div>
      </div>
    </nav>
    <!--/ Navigation bar-->
    <!--Feature-->
    <section id ="feature" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="header-section text-center">
                    <?php
                    
                    echo '<br><p style="text-align:right"><img src="img/blue.png" width="20" />Bienvenido(a): '.$_SESSION['nombre'].'</p>';
                    if(isset($_POST['salir'])){
                    session_destroy();
                    header('Location: index.php');
                    }
                    ?>
                    <h3>Ingresar Usuario</h3>
                    <img src="img/security.png" width="55">
                    <hr class="bottom-line">
                </div>
                <div class="feature-info">
                
                    <div class="row">                    
                         <form id="form" method="post" class="form-horizontal mitad" action="accesoAdm.php">
                                                
                        <div class="form-group row">
                            <label class="col-xs-2 col-form-label">Usuario: </label>
                            <div class="col-xs-10">
                                <input class="form-control" type="number"  name="usuario" placeholder="Usuario (rut)" />
                            </div>
                        </div>    
                             
                        <div class="form-group row">
                            <label class="col-xs-2 col-form-label">Contraseña: </label>
                            <div class="col-xs-10">
                                <input class="form-control" type="password"  name="pass" placeholder="Contraseña" />
                            </div>
                        </div>        
                             
                        <div class="form-group row">
                            <label class="col-xs-2 col-form-label">Nombre: </label>
                            <div class="col-xs-10">
                                <input class="form-control" type="text"  name="nombre" placeholder="Nombre" />
                            </div>
                        </div>       
    
                        <div class="form-group row">
                            <label class="col-xs-2 col-form-label">Tipo Usuario: </label>
                            <div class="col-xs-10">
                                <input type="radio" name="tipoUsuario" value="Doctor">Doctor<br>
                                <input type="radio" name="tipoUsuario" value="Paciente">Paciente<br>
                                <input type="radio" name="tipoUsuario" value="Admin">Admin<br>
                            </div>
                        </div>
                        
                        <div class="col-xs-12">
                            <button type="submit" id="submit" name="submit" class="form contact-form-button light-form-button oswald light">Crear Usuario</button>
                        </div>
                    </form>
                         <?php
                            if(isset($_POST['submit'])){
                                $user = $_POST['usuario'];
                                $pass = $_POST['pass'];
                                $nombre= $_POST['nombre'];
                                $tipoUsuario = $_POST['tipoUsuario'];  

                                require "conexion.php";            
                                $sql= "Insert into usuario (usuario, pass, nombre, tipoUsuario) values ('$user', md5('$pass'), '$nombre', '$tipoUsuario')";
                                $result = $conn->query($sql);
                                
                                echo '<script>alert("El usuario se ha Ingresado Correctamente")</script>';
                                $conn->close();

                            }  

                        ?>
                    </div>
                </div>
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


