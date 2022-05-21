<?php
    $conn = new mysqli("localhost","root","","db_user_system");

    if($conn->connect_error){
        die("Could not connect to the Database!".$conn->connect_error);
    }
?>