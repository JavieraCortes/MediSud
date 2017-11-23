 <?php
    require 'conexion.php'; 
    require 'geolocalizar.php';

    $pac = $_POST['pac'];
    $direccion = $_POST['ubicacion'];
    $temperatura = $_POST['temperatura'];  
    $pulso = $_POST['pulso'];
    $ritmo = $_POST['ritmo'];  
    $presion = $_POST['presion'];
    $saturacion = $_POST['saturacion'];  
    $accion = $_POST['accion']; 

    $return = Maps::buscaLugar($direccion);

    $latitud = $return[0];
    $longitud = $return[1];

    $sql= "Insert into urgencia (run, direccion, latitud, longitud, temperatura, pulso, frespiratorio, presion, saturacion, acciones) values ('$pac','$direccion', '$latitud', '$longitud', '$temperatura', '$pulso', '$ritmo', '$presion', '$saturacion', '$accion')";
    
    $result=$conn->query($sql);
    
    $conn->close();
    
?>