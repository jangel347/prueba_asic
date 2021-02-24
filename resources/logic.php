<?php 
date_default_timezone_set('America/Bogota');
require('connection/connection.php');

function register_programmer($id,$name,$last_name,$email,$languages){
    $conn = connect();
    $validation = check_id($id,$conn);
    $sql = "INSERT INTO programador VALUES ('$id','$name','$last_name','$email','$languages','". date("Y-m-d H:i:s")."');";
    switch ($validation){
        case 'OK':
            $res = mysqli_query($conn,$sql);
            if ($res){
                write_log('INGRESADO: '.$sql);
                return '{"code":"1","description":"El programador fue ingresado"}';
            } else {
                write_log('ERROR EN LA INSERCIÓN: '.$sql);
                return '{"code":"-1","description":"Algo ha salido mal. Intenta nuevamente"}';
            }
        break;
        case 'DUPLICATED':
            write_log('Entrada duplicada '.$sql);
            return '{"code":"-2","description":"Ya hay un registro con la cédula"}';
        break;
        case 'ERROR':
            write_log('Entrada duplicada '.$sql);
            return '{"code":"-1","description":"Algo ha salido mal. Intenta nuevamente"}';
        break;
    }
}

function check_id($id,$conn){
    $sql = "SELECT cedula FROM programador WHERE cedula='$id'";
    $res = mysqli_query($conn,$sql);
    if ($res){
        $count = 0;
        while ($row = mysqli_fetch_array($res)){
            $count++;
        }
        return ($count == 0)? 'OK' : 'DUPLICATED';
    } else {
        write_log('ERROR EN LA CONSULTA '.$sql);
        return 'ERROR';
    }
}