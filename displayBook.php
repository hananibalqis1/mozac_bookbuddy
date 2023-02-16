<?php
    session_start();
    
    include('connect.php');
    include('navside.php');

    // $sql= "SELECT * FROM book WHERE isbn='" . $_REQUEST['isbn'] . "'";
    $sql = "SELECT * FROM book INNER JOIN publisher ON book.publisher_id = publisher.publisher_id INNER JOIN category ON book.category_id = category.category_id INNER JOIN author ON book.author_id = author.author_id WHERE isbn='" . $_REQUEST['isbn'] . "'";

    $result = $conn->query($sql);
        
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <link rel="stylesheet" href="style2.css">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mozac BookBuddy</title>
    <script>
        function process() {
            if(document.myForm.current_date.value == "" || document.myForm.return_date.value == "") {
                alert("Please fill in the date!");
                return false;
            }
            else {
                
            }
        }

     </script>
</head>
<body>
    <?php //include('navside-stud.php'); ?>

    <div class="wrapper">
    <input type="button" value="Back" onclick="javascript:history.go(-1)" /><br><br>

    <?php if($result !== false && $result->num_rows > 0) {
        //output data of each row

        while($row = $result->fetch_assoc()) {
            
    ?>

    <form method = "POST" action="updateLib.php">
        <table>
            <tr>
                <th><p style="font-size:24px; float: left;">Book Information</p></th>
            <tr>
                <td>
                    <label for="isbn" style="float: left; font-weight: bold;">ISBN:</label>
                    <input type="text" name="isbn" id="isbn" value="<?php echo $row['isbn'] ?>" size="100" readonly>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="category" style="float: left; font-weight: bold;">Category:</label>
                    <input type="text" name="category" id="category" value="<?php echo $row['category_name'] ?>" size="100" readonly>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="title" style="float: left; font-weight: bold;"> Book Title:</label>
                    <input type="text" name="book_title" id="book_title" size="100" value="<?php echo $row['book_title'] ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="book_desc" style="float: left; font-weight: bold;"> Book Description:</label>
                    <input type="text" name="book_desc" id="book_desc" size="100" value="<?php echo $row['book_desc'] ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="book_type" style="float: left; font-weight: bold;"> Book Type:</label>
                    <input type="text" name="book_type" id="book_type" size="100" value="<?php echo $row['book_type'] ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="status" style="float: left; font-weight: bold;"> Status:</label>
                    <input type="text" name="status" id="status" size="100" value="<?php echo $row['status'] ?>" readonly>
                </td>
            </tr>

            <tr>
                <th><p style="font-size:24px; float: left;">Author Information</p></th>
            </tr>
            <tr>
                <td>
                    <label for="author_id" style="float: left; font-weight: bold;">Author:</label>
                    <input type="text" name="author_id" id="author_id" value="<?php echo $row['author_fname'] . " " . $row['author_lname'] ?>" size="100" readonly>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="publisher" style="float: left; font-weight: bold;">Publisher:</label>
                    <input type="text" name="publisher" id="publisher" value="<?php echo $row['publisher_name'] ?>" size="100" readonly>
                </td>
            </tr>

            <?php }
            }
            else {
                echo "0 results";
            }
            $conn->close(); 
            
            ?>

            <tr>
                <td>
                    <input type="submit" value="Update Book" onclick="process()" style="float: right;">
                </td>
            </tr>
        </table>
    </form>
   
    </div>

    <?php  //include('footer.php'); ?>

</body>
</html>
