<?php
include('connect.php');
include('navside.php');

$search = $_POST['search'];

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "SELECT * FROM book INNER JOIN publisher ON book.publisher_id = publisher.publisher_id INNER JOIN category ON book.category_id = category.category_id WHERE book_title LIKE '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
    echo "<body><div class='wrapper'>
        <h1>List of Books</h1><br>
        <form action='searchDel-lib.php' method='post'><input type='search' name='search' placeholder='Search here..'>&nbsp;<input type ='submit'></form><br>";
        echo "<table>";
        echo "<tr><th>ISBN</th><th>Book Details</th><th>Action</th></tr>";
while($row = $result->fetch_assoc() ){
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
        <td align="center">
            <a href="deleteLib.php?isbn=<?php echo $row['isbn'] ?>"><input type="button" value="Delete"/></a>
        </td>
    <?php
}
} else {
    echo "<body><div class='wrapper'><h1>No record found</h1><br>";
	echo "<p>Seems the book are unavailable..</p><br>";
    echo "<input type='button' value='Back' onclick='javascript:history.go(-1)' /><br><br>";
}

$conn->close();

?>