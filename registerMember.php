<?php
    include('connect.php');

    $nm = $_POST['name'];
    $eml = $_POST['email'];
    $pwd = $_POST['password'];
    $role = $_POST['role'];
    $checkbox1 = $_POST["interest"];

    $chk="";
    
    foreach($checkbox1 as $chk1)  {  
          $chk .= $chk1.",";  
       }

    $sql = "INSERT INTO member(name, email, password, role, interest, badge_id) VALUES ('$nm','$eml','$pwd','$role','$chk', '1004')" or die("Error inserting data into table.");
    
    if($conn->query($sql) == TRUE) {
        echo "<script type='text/javascript'> alert('New record created successfully.') </script>";
        echo "<meta http-equiv=\"refresh\" content=\"3;URL=login1.php\">";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>