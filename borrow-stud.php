<?php
    session_start();

    include('connect.php');
    include('navside-stud.php');

    $m_id = $_SESSION['id'];

    // $sql = "SELECT * FROM book INNER JOIN publisher ON book.publisher_id = publisher.publisher_id INNER JOIN category ON book.category_id = category.category_id INNER JOIN report ON book.isbn = report.isbn WHERE book.book_type='On Read' AND report.id = '" . $m_id . "'";
    $sql = "SELECT * FROM book INNER JOIN report ON book.isbn = report.isbn INNER JOIN publisher ON book.publisher_id = publisher.publisher_id INNER JOIN category ON book.category_id = category.category_id WHERE report.id = '" . $m_id . "'";
    $result = $conn->query($sql);

    if($result !== false && $result->num_rows > 0) {
        echo "<body><div class='wrapper'>
        <h1>List of Borrowed Books</h1><br>";
        echo "<table>";
        // echo "<tr><th>ISBN</th><th>Book Cover</th><th>Book Details</th><th>Action</th></tr>";
        echo "<tr><th>ISBN</th><th>Book Details</th><th>Book Status</th></tr>";

        while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row['isbn']."</td>";
        // echo "<td><img src='images/". $row['book_cvr'] ."' width='200'></td>";
        echo "<td>
                <h3>".$row['book_title']."</h3>
                <p><i>".$row['publisher_name']."</i>,&nbsp;".$row['date_published']." <div class='bookCategory'>".$row['category_name']."</div>
                <p>".$row['book_desc']."</p>
              </td>
              <td>
                <div class='badge'>".$row['status']."</div>
              </td>";
        }
        echo "</table></div><br></body>";
    }
    else {
        echo "<body><div class='wrapper'>
        <h1>List of Books</h1><br>
        <form action='search.php' method='post'><input type='search' name='search' value='Search here..'>&nbsp;<input type ='submit'></form><br>
        <table><tr><th>ISBN</th><th>Book Details</th><th>Action</th></tr>
        <tr><td colspan='4'><center>No books.</center></td></tr>
        </div></body>";
    }

    $conn->close();
?>
