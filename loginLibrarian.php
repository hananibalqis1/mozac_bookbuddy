<?php
    $result = mysqli_query($conn,"SELECT * FROM librarian WHERE email='" . $_POST["email"] . "' and password = '". $_POST["password"]."'");
    $row  = mysqli_fetch_array($result);
    
    if(is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
        $_SESSION["role"] = $row['role'];
    } else {
        echo "<script type='text/javascript'> alert('Invalid email and password! Please try again.') </script>";
    }

    if(isset($_SESSION["id"])) {
      header("Location:dashboard-lib.php?success=1");
    }
?>