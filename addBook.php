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

$sql1 = "INSERT INTO author(author_fname, author_lname) VALUES ('$fName', '$lName')";

if ($conn->query($sql1) == true) {
    $au_id = mysqli_insert_id($conn);
    // echo $au_id;
    // echo "<p style='text-align:center'>New AUTHOR created successfully";
} else {
    echo "<p style='text-align:center' Unable to add new author due to " . $sql1 . "<br>" . $conn->error;
}

$sql2 = "INSERT INTO publisher(publisher_name) VALUES ('$publshr') LIMIT 0";

if ($conn->query($sql2) == true) {
    $pb_id = mysqli_insert_id($conn);
    // echo $pb_id;
    // echo "<p style='text-align:center'>New PUBLISHER created successfully";
} else {
    echo "<p style='text-align:center' Unable to add new publisher due to  " . $sql2 . "<br>" . $conn->error;
}

$sql = "INSERT INTO book(isbn, book_title, book_cvr, publisher_id, category_id, book_desc, book_type, status, date_published, author_id) VALUES ('$isbn', '$title', NULL, '$pb_id', '$category', '$descrip', '$book_type', '$status', '$date_publish', '$au_id')";

if ($conn->query($sql) == true) {
    echo "<script type='text/javascript'> alert('New BOOK created successfully') </script>";
    echo "<meta http-equiv=\"refresh\" content=\"3;URL=listBook-lib.php\">";
} else {
    echo "<p style='text-align:center' Unable to add new book due to  " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
