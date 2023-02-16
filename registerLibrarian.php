<?php
    include('connect.php');

    $nm = $_POST['name'];
    $eml = $_POST['email'];
    $pwd = $_POST['password'];
    $role = $_POST['role'];

    $sql = "INSERT INTO librarian(name, email, password, role) VALUES ('$nm','$eml','$pwd','$role')" or die("Error inserting data into table.");
    
    if($conn->query($sql) == TRUE) {
        echo "\nNew record created successfully.";
        echo "<meta http-equiv=\"refresh\" content=\"3;URL=login1.php\">";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>