<?php
  session_start();

  include('connect.php');

  //count number of books
  $query = "SELECT * FROM book";
  $result = mysqli_query($conn, $query);

  $num_rows = mysqli_num_rows($result);

  //count number of book issued
  $query1 = "SELECT * FROM book WHERE status = 'On Read'";
  $result1 = mysqli_query($conn, $query1);

  $num_rows1 = mysqli_num_rows($result1);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/icon" href="images/logo.png" sizes="768x768" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mozac BookBuddy</title>
</head>
<body>
    <?php include('navside.php'); ?>

    <div class="wrapper">
      <h1>BookBuddy for Mozac</h1>
      <p>This library management system allows the administration/librarian to manage book information and issued/returned books as well as monitor library use through the use of tools that capture user activity such as issued tracking and library card activity.</p>
      <br>
      <div class="card" style="margin-left:15%;">
        <center><h2><?php echo $num_rows; ?></h2></center>
        <p>Number of Books</p>
      </div>
      <div class="card" style="margin-left:15%;">
        <center><h2><?php echo $num_rows1; ?></h2></center>
        <p>Book Issued</p>
      </div>
    </div>

</body>
</html>
