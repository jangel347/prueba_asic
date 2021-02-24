<?php
function connect(){
    $mysqli = mysqli_connect('localhost','root','','jeison_angel');
    if ($mysqli->connect_error){
        die('Error de conexión '.$mysqli->connect_error);
    }
    return $mysqli;
}

function write_log($text){
    $file = fopen('log.txt','a');
    fputs($file,"----------------------------------\n");
    fputs($file,$text);
    fclose($file);
}