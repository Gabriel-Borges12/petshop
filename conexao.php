<?php
    $hostname = 'localhost';
    $user = 'root';
    $senha = '';
    $bd = 'bd_petshop';

    $mysqli = new mysqli($hostname, $user, $senha, $bd);
    if($mysqli->connect_error){
        die($mysqli->connect_error);
    }
?>