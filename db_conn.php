<?php
    $server = "localhost";
    $username = "root";
    $password = "feb62002";
    $db = "anti_rabbies";

    $conn = new mysqli($server,$username,$password,$db);

    if($conn->connect_error){
        die("Connection Failed".$conn->connect_error);
    }
    
?>