<?php 
session_start();

include('navside.php');
include('connect.php');

//important
$isbn=$_REQUEST['isbn'];


$sql = "SELECT * FROM report INNER JOIN member ON report.id = member.id INNER JOIN book ON report.isbn = book.isbn WHERE book.isbn='".$isbn."'";

$result=$conn->query($sql);

if($result->num_rows>0 ) {
    ?>
<body>
  <div class="wrapper">
    <h1>Book Issued History</h1>
       <br>
       <form method="post">
        <table>
                <tr>
                    <td colspan="2">
    <?php
    while($row = $result->fetch_assoc()) {
?>

                    <h2>Issued History of Book: <?php echo $row['book_title'] ?></h2>
                    </td>
                </tr>
                <table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse" width="40%" align="center">
                    <tr> 
		                <tr><th> ID </th><th>Borrower Name</th><th>Date Issued</th><th>Due date</th><th>Status </th></tr>
	                </tr>
                    <!-- something to be here -->
                    <tr>
                        <tr align="center"><td><?php echo $row['id']; ?></td><td><?php echo $row['name']; ?></td><td><?php echo $row['borrow_date']; ?></td><td><?php echo $row['return_date']; ?></td><td> WIP </td></tr>
                    
  <?php
    }
}else{
    ?>

<div class="wrapper">
    <h1>Book Issued History</h1>
       <br>
       <form method="post">
        <table>
                <tr>
                    <td colspan="2">
                    <h2>Issued History of ISBN: <?php echo $isbn; //yang ni mcm nak display title book tu tpi sbb 'select report' kot ?></h2>
                    </td>
                </tr>
                <table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse" width="40%" align="center">
                    <tr> 
		                <tr><th> ID </th><th>Borrower Name</th><th>Date Issued</th><th>Due date</th><th>Status </th></tr>
	                </tr>
                    <!-- something to be here -->
                    <tr>
                        <tr align="center"><td> - </td><td> No History </td><td> - </td><td> - </td><td> WIP </td></tr>
                    </tr>
                </table>

        </table>
        <p align='right'><a href='view-lib.php'><input type='button' value='Continue'></a></p>
        </form>
  </div>

    <?php
}
?>

</tr>
                </table>

        </table>
        <p align='right'><a href='view-lib.php'><input type='button' value='Continue'></a></p>
        </form>
  </div>
</body>
</html>