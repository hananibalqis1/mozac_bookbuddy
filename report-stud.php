<?php
    include('connect.php');
    session_start();

    $isbn = $_POST['book_id'];
    $m_id = $_SESSION['id'];
    $c_date = date('Y-m-d', strtotime($_POST['current_date']));
    $r_date = date('Y-m-d', strtotime($_POST['return_date']));

    $sql = "INSERT INTO report(isbn, id, borrow_date, return_date) VALUES ('$isbn','$m_id','$c_date','$r_date')" or die("Error inserting data into table.");
    
    if($conn->query($sql) == TRUE) {
        echo "<script type='text/javascript'> alert('Book issued successfully.') </script>";
        echo "<meta http-equiv=\"refresh\" content=\"3;URL=listBook-stud.php\">";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>