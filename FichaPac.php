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
            <a class="navbar-brand" href="accesoPac.php">MEDI<span>SUD</span></a><img src="img/logo2.png" width="50" />
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="FichaPac.php">Mi Ficha</a></li>
            <li><a href="ControlesPac.php">Controles</a></li> 
              
            <li><form action="FichaPac.php" method="post">
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
            <div class="row" style="text-align: right">
              <?php
                session_start();
                echo '<br><p style="text-align:right">'.$_SESSION['nombre'].'</p>';
                
                
                
                if(isset($_POST['salir'])){
                    session_destroy();
                    header('Location: index.php');
                }
              ?>
          </div>
            <div class="row">
            <?php
            
                $usu = $_SESSION['user'];
            
                require 'conexion.php';
                $sql="SELECT * FROM paciente WHERE Rut=$usu";
                $result=$conn->query($sql);

                if($result->num_rows>0){
                    
                    while($row = $result->fetch_assoc()){
                        
                        echo '<div class="row">                    
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
                                            Alergias: '. $row['alergias'].'<br>
                                      </div>
                            </div>
                            
                            <div class="row">
                                  <div class="col-md-7 col-sm-7 col-xs-7 left">
                                        <h4>Información Familiar Contacto: </h4><br>
                                        Nombre Familiar: '.$row['NombreFamiliar'].'<br>
                                        Telefono Familiar: '. $row['TelefonoFamiliar'].'<br>
                                   </div>
                                   
                                   <div class="col-md-5 col-sm-5 col-xs-5 left">
                                        <a href="#" data-target="#loginMod" data-toggle="modal">
                                            <button type="submit" class="btn btn-primary" name="modificar" style="margin-top:10%">Modificar datos</button>
                                        </a>
                                   </div>
                            </div>';
                        
                        
                        //Modal
                        
                        
                        echo ' <!--Modal modificar-->
    
                                <div class="modal fade" id="loginMod" role="dialog">
                              <div class="modal-dialog modal-sm">     
                                <!-- Modal content no 1-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title text-center form-title">Modificacion de datos</h4>
                                  </div>
                                  <div class="modal-body padtrbl">
                                    <div class="login-box-body">
                                      <p class="login-box-msg">Ingresa los datos a modificar</p>
                                      <div class="form-group">


                                         <form action="FichaPac.php" method="post">
                                            <div class="form-group has-feedback">
                                                <label>Nombre Familiar:</label>
                                                <input class="form-control"  name="nomFami" type="text" value="'.$row['NombreFamiliar'].'" autocomplete="off" /> 
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label>Telefono Familiar:</label>
                                                <input class="form-control"  name="telFami" type="number" value="'.$row['TelefonoFamiliar'].'" autocomplete="off" />
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <button type="submit" id="boton" name="botonModi" class="btn btn-green btn-block btn-flat">Ingresar</button>
                                                </div>
                                            </div>
                                        </form>



                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <!--Fin modal-->';
                    }
                    
                }else{
                    echo '<center><h2>Ficha inexistente</h2></center>';
                }
                
                $conn->close();
                
                
                if(isset($_POST['botonModi'])){
                    
                    $nomFami = $_POST['nomFami'];
                    $telFami = $_POST['telFami'];
                    
                    
                    require 'conexion.php';
                    
                    if($nomFami!=NULL && $telFami!=NULL){
                        $sql="UPDATE paciente SET NombreFamiliar = '$nomFami', TelefonoFamiliar = $telFami WHERE Rut=$usu";
                    }
                    if($nomFami!=NULL && $telFami==NULL){
                        $sql="UPDATE paciente SET NombreFamiliar = '$nomFami' WHERE Rut=$usu";
                    }
                    if($nomFami==NULL && $telFami!=NULL){
                        $sql="UPDATE paciente SET TelefonoFamiliar = $telFami WHERE Rut=$usu";
                    }
                    
                    $result=$conn->query($sql);

                    if($conn->affected_rows>0){
                        //echo '<script>alert("Datos modificados");</script>';
                        echo '<script>
                            window.opener.location.reload();
                            window.close();
                            </script>';
                        
                    }else{
                        echo '<script>alert("No se pudo modificar");</script>';
                    }
                    
                    $conn->close();
                    echo "<script language='javascript'>window.location='FichaPac.php'</script>";
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