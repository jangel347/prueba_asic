<?php 
require('connection/connection.php');

function register_programmer($id,$name,$last_name,$email,$languages){
    $conn = connect();
    return $conn;
    // $validation = check_id($id,$conn);
    // if ($validation != 'ERROR'){
    //     $sql = "INSERT INTO programador VALUES ('$id','$name','$last_name','$email','$languages');";
    //     $res = mysqli_query($sql,$conn);
    //     if ($res){
    //         return '{"code":"1","description":"El programador no pudo ser ingresado"}';
    //     } else {
    //         write_log('ERROR EN LA INSERCIÓN: '.$sql);
    //         return '{"code":"-1","description":"Algo ha salido mal. Intenta nuevamente"}';
    //     }
    // } else {
    //     write_log('Entrada duplicada '.$sql);
    //     return '{"code":"-2","description":"Ya hay un registro con la cédula"}';
    // }
}

function check_id($id,$conn){
    $sql = "SELECT cedula FROM programador WHERE cedula='$id'";
    mysqli_query($sql,$conn);
    if ($res){
        $count = 0;
        while ($row = mysqli_fetch_array($res)){
            $count++;
        }
        return $count;
    } else {
        write_log('ERROR EN LA CONSULTA '.$sql);
        return 'ERROR';
    }
}