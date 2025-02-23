<?php

    $server="localhost";
    $username="root";
    $password="feb62002";
    $db="anti_rabbies";

    $conn = new mysqli($server,$username,$password,$db);

    if($conn->connect_error){
        die("Connection Error".$conn->connect_error);
    }
    else "Connected Succesfully";

?>
