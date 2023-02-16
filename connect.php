<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bookbuddy";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Connection failed!" . $conn->connect_error);
    }
    
    //echo "<script>alert('Connected successfully');</script>";
?>