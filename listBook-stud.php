<?php
    session_start();

    include('connect.php');
    include('navside-stud.php');

    $sql = "SELECT * FROM book INNER JOIN publisher ON book.publisher_id = publisher.publisher_id INNER JOIN category ON book.category_id = category.category_id";
    $result = $conn->query($sql);

    if($result !== false && $result->num_rows > 0) {
        echo "<body><div class='wrapper'>
        <h1>List of Books</h1><br>
        <form action='search.php' method='post'><input type='search' name='search' value='Search here..'>&nbsp;<input type ='submit'></form><br>";
        echo "<table>";
        // echo "<tr><th>ISBN</th><th>Book Cover</th><th>Book Details</th><th>Action</th></tr>";
        echo "<tr><th>ISBN</th><th>Book Details</th><th>Action</th></tr>";

        while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row['isbn']."</td>";
        // echo "<td><img src='data:image/jpg;base64," . $row['book_cvr'] . "/></td>";
        // echo "<td><img src='images/". $row['book_cvr'] ."' width='200'></td>";
        // echo "<td><img src='images/history.jpg' width='200'></td>";
        // <img width='300' src='data:image;base64,".$rows['book_cvr']."'>'
        echo "<td>
                <h3>".$row['book_title']."</h3>
                <p><i>".$row['publisher_name']."</i>,&nbsp;".$row['date_published']." <div class='bookCategory'>".$row['category_name']."</div>
                <p>".$row['book_desc']."</p>
              </td>";
        ?>
            <td>
                <a href="issuebook.php?isbn=<?php echo $row['isbn'] ?>"><input type="button" value="Issue Book"/></a>
            </td>
        <?php
        }
        echo "</table></div><br></body>";
    }
    else {
    echo "0 results";
    }

    $conn->close();
?>
