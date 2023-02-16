<?php
session_start();

include('navside.php');
include('connect.php');

//important
$isbn=$_REQUEST['isbn'];

$sql = "DELETE FROM book WHERE isbn='".$isbn."'";

if($conn->query($sql) === TRUE) {
    // echo "<div class='wrapper'>";
    echo "<script type='text/javascript'> alert('ISBN Number " . $isbn . " successfully deleted from the library!') </script>";
    echo "<meta http-equiv=\"refresh\" content=\"3;URL=listBook-lib.php\">";
    // echo "<p>";
    // echo "<br>";
    // echo "<p align='center'><a href='remove-lib.php'><input type='button' value='Continue'></a></p>";
    // echo "</div>";
}
else {
    echo "<p>";
    echo "<p style='text-align:center'>Error: ".$sql."<br>".$conn->error;
    echo "<p>";
}

$conn->close();
// include('footer.php');
?>