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
        
      </div>
    </nav>
    <!--/ Navigation bar-->
    
    <br>
    <section id ="contact" class="section-padding">
      <div class="container">
        <a href="index.php"><button type="submit" class="btn btn-primary btn-xs"> < </button></a>
    </div>     
    </section>
    
    
    
    
          <div class="header-section text-center">
            <h2>Lector RFID</h2>
            <p>Lector de pulseras medicas, presione el boton buscar y deslice la pulsera por el lector </p>
            <img src="img/RFID1.png" width="80"  />
            <hr class="bottom-line">
          </div>
  
  
    <center>
        
        <div class="row " >
            <form action="lectorIndex.php" method="post">
                <button type="submit"class="btn btn-primary" name="buscar">Buscar</button>
            </form> 
            <br>
            <?php

            
                if(isset($_POST['buscar'])){

                    $loop = true;

                    while($loop){

                        $exist = file_exists("Archivo.txt");

                        if($exist){

                            $archivo = "Archivo".".txt";
                            $fp = fopen($archivo, "r");
                            $linea = fgets($fp);
                            fclose($fp);

                            /*echo '<a href="ficha.php?tag='.$linea.'">
                                       <button  class="btn btn-primary">Ir a ficha</button></a>';*/

                            echo "<script language='javascript'>
                                    window.location='fichaIndex.php?tag=$linea';
                                    window.opener.location.reload();
                                    window.close();
                                  </script>";


                            $loop = false;                           

                        }
                    }

                }

            ?>
    
        </div>
    </center>
  
  <br><br>
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
