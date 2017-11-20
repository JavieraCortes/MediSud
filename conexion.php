<?php
    $servername = "localhost";
    $username = "root";
    $password="";
    $dbname="medisud";
        
    $conn = new mysqli($servername, $username, $password, $dbname);
        if($conn->connect_error){
            die('Error al conectar');
        }
?>
