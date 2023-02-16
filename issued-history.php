<?php 
session_start();

include('navside.php');
include('connect.php');

//important
$isbn=$_REQUEST['isbn'];

// $sql = "SELECT member_id, name, borrow_date, return_date FROM report INNER JOIN member ON report.member_id = member.id WHERE isbn='".$isbn."'";
$sql = "SELECT * FROM book INNER JOIN report ON book.isbn = report.isbn INNER JOIN member ON report.id = member.id WHERE book.isbn='" . $isbn . "'";

$result=$conn->query($sql);

if($result !== false && $result->num_rows > 0) {
    echo "<body><div class='wrapper'><input type='button' value='Back' onclick='javascript:history.go(-1)' /><br><br><h1>Book Issued History</h1><br><table>";
    echo "<tr><td colspan='5'><h2>Issued History of ISBN: " .  $isbn . "</h2></td></tr>";
    echo "<tr><th>ID</th><th>Borrower Name</th><th>Date Issued</th><th>Due Date</th><th>Status</th></tr>";
    // echo "<tr><th>ID</th><th>Borrower Name</th><th>Date Issued</th><th>Due Date</th></tr>";

    while($row = $result->fetch_assoc()) {
        // echo "<tr><td>";
        // echo $row['book_title'];
        // echo "<h2> " . $row['book_title'] . " </h2>";
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['borrow_date']; ?></td>
            <td><?php echo $row['return_date']; ?></td>
            <td><?php echo $row['status']; ?></td>
        </tr>   
        <?php
    }
        echo "</table><br><input type='button' onclick='printHistory()' value='Print History' style='float:right;'/>";
        echo "<script>function printHistory() { id=prompt('Please re-enter ISBN number to print:',''); document.location = 'downloads.php?isbn='+id+'';}</script></div>";
    }else{
        echo "<body><div class='wrapper'><h1>Book Issued History</h1><br><form method='post'><table>";
        echo "<tr><td colspan='5'><h2>Issued History of ISBN: " . $isbn . "</h2></td></tr>";
        echo "<tr><th>ID</th><th>Borrower Name</th><th>Date Issued</th><th>Due Date</th><th>Status</th></tr>";
        echo "<tr><td colspan='5' style='text-align: center;'>No history</td></tr></table></form>";
    }
?>
</body>
</html>