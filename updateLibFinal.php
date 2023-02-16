<?php
session_start();

include "connect.php";

$isbn = $_POST["isbn"];
$title = $_POST["title"];
$descrip = $_POST["desc"];
$book_type = $_POST["book_type"];
$status = $_POST["status"];
$date_publish = $_POST["date_publish"];
$category = $_POST["category"];

$fName = $_POST["firstName"];
$lName = $_POST["lastName"];
$publshr = $_POST["publish"];

$sql1 = "UPDATE book INNER JOIN author ON book.author_id = author.author_id SET author_fname = '" . $fName . "', author_lname = '" . $lName . "' WHERE book.isbn = '" . $isbn . "'";

if ($conn->query($sql1) == true) {
    $au_id = mysqli_insert_id($conn);
    // echo "<p style='text-align:center'>AUTHOR updated successfully";
} else {
    echo "<p style='text-align:center' Unable to update new author due to " . $sql1 . "<br>" . $conn->error;
}

$sql2 = "UPDATE book INNER JOIN publisher ON book.publisher_id = publisher.publisher_id SET publisher_name = '" . $publshr . "' WHERE book.isbn = '" . $isbn . "'";

if ($conn->query($sql2) == true) {
    $pb_id = mysqli_insert_id($conn);
    // echo "<p style='text-align:center'>PUBLISHER updated successfully";
} else {
    echo "<p style='text-align:center' Unable to update new publisher due to  " . $sql2 . "<br>" . $conn->error;
}

$sql = "UPDATE book SET isbn = '" . $isbn . "', book_title = '" . $title . "', category_id = '" . $category . "', book_desc = '" . $descrip . "', book_type ='" . $book_type . "', status = '" . $status . "', date_published = '" . $date_publish . "' WHERE book.isbn = '" . $isbn . "'";

if ($conn->query($sql) == true) {
    echo "<script type='text/javascript'> alert('BOOK updated successfully') </script>";
    echo "<meta http-equiv=\"refresh\" content=\"3;URL=listBook-lib.php\">";
} else {
    echo "<p style='text-align:center' Unable to update new book due to  " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
