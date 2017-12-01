
<?php

    //Leer archivo de texto donde esta el tag
    error_reporting(0);
        
    $tag = $_GET['tag'];
    
    //Creamos un archivo de texto
    $archivo = "Archivo".".txt";
    $fp = fopen($archivo, "w");
    fputs($fp, $tag);
    fclose($fp);

?>