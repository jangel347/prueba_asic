<?php
function connect(){
    $mysqli = mysqli_connect('localhost','root','','jeison_angel');
    if ($mysqli->connect_error){
        die('Error de conexión '.$mysqli->connect_error);
    }
    return $mysqli;
}

function write_log($text){
    $file = open('log.txt','a');
    fputs($file,'----------------------------------\n'.$text.'----------------------------------\n');
    fclose($file);
}