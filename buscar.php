 <?php
    require 'conexion.php'; 
    require 'geolocalizar.php';

    $pac = $_POST['pac'];
    $fecha = $_POST['datte'];
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

    $sql= "Insert into urgencia (run, fecha, direccion, latitud, longitud, temperatura, pulso, frespiratorio, presion, saturacion, acciones) values ('$pac', '$fecha', '$direccion', '$latitud', '$longitud', '$temperatura', '$pulso', '$ritmo', '$presion', '$saturacion', '$accion')";
    
    $result=$conn->query($sql);
    
    $conn->close();
    header('Location: /MediSud/pacientes.php');
?>