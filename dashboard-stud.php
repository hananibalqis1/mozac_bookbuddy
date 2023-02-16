<?php
  session_start();

  include('connect.php');

  $m_id = $_SESSION['id'];

  //count total unfinished book
  $query = "SELECT * FROM report WHERE id='" . $m_id . "'";
  $result = mysqli_query($conn, $query);

  $num_rows = mysqli_num_rows($result);

  //count borrowed books
  $query1 = "SELECT * FROM book INNER JOIN report ON book.isbn = report.isbn WHERE book.category_id = 406 AND report.id='" . $m_id . "'";
  $result1 = mysqli_query($conn, $query1);

  $num_rows1 = mysqli_num_rows($result1);

  //count badge collected
  $query2 = "SELECT * FROM member INNER JOIN badge ON member.badge_id = badge.badge_id WHERE member.id = '" . $m_id . "'";
  $result2 = mysqli_query($conn, $query2);

  $num_rows2 = mysqli_num_rows($result2);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <link rel="stylesheet" href="style2.css">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mozac BookBuddy</title>
</head>
<body>
    <?php include('navside-stud.php'); ?>

    <div class="wrapper">
      <h1>BookBuddy for Mozac</h1>
      <p>Start your reading to gain knowledge about history, documentary, articles, educations or religion in the ancient world.<br>Would you like to learn more? Find your book based on your interest.</p>
      <br>
      <div class="card" style="margin-left:5%;">
        <center><h2><?php echo $num_rows; ?></h2></center>
        <p>Unfinished Books</p>
      </div>
      <div class="card" style="margin-left:5%;">
        <center><h2><?php echo $num_rows1; ?></h2></center>
        <p>Borrowed Books</p>
      </div>
      <div class="card" style="margin-left:5%;">
        <center><h2><?php echo $num_rows2; ?></h2></center>
        <p>Badge Collected</p>
      </div>
    </div>

</body>
</html>
