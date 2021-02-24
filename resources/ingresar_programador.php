<?php 
require('logic.php');
if (isset($_POST['action'])){
    if ($_POST['action'] == 'register_programmer'){
    echo register_programmer($_POST['id'],$_POST['name'],$_POST['last_name'],$_POST['email'],$_POST['languages']);
    }
}