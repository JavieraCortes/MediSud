
<?php

require 'conexion.php';

$username = $_POST['usuario'];
$password = md5($_POST['contra']);
 
$sql = "SELECT * FROM usuario WHERE usuario = '$username'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {     
 
    $row = $result->fetch_assoc();
  
    
     echo $row['pass']."<br>";
     echo $password."<br>";
    
    if ($password == $row['pass']) {

        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

        echo "Bienvenido! " . $_SESSION['username'];
        header('Location: /MediSud/acceso.php');

    } else { 

       echo "Contraseña incorrecta";
       header('Location: /MediSud/index.php');
    } 
}else{
    header('Location: /MediSud/index.php');
    echo "El usuario no existe";
}

 $conn->close();
 
?>

