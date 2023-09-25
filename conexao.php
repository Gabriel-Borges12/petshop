<?php
    $hostname = 'localhost';
    $user = 'root';
    $senha = '';
    $bd = 'bd_petshop';

    $conn = new mysqli($hostname, $user, $senha, $bd);
    if($conn->connect_error){
        die($conn->connect_error);
    }
?>