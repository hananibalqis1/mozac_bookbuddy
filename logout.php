<?php 
    // session_start();

    // if(isset($_SESSION['id'])) {
    //     $_SESSION = array();
    //     session_destroy();

    //     echo "You're successfully logged out!";
    //     echo "<meta http-equiv=\"refresh\" content=\"3;URL=index1.php\">";
    // }
    // else {
    //     echo "error logout";
    // }

    session_start();
    unset($_SESSION["id"]);
    unset($_SESSION["name"]);
    // header("Location:login1.php");
    echo "<script type='text/javascript'> alert('You're successfully logged out!') </script>";
    echo "<meta http-equiv=\"refresh\" content=\"3;URL=login1.php\">";
?>