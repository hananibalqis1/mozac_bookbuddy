<?php
    session_start();
    
    include('connect.php');
    include('navside.php');

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

    <div class="wrapper">
    <input type="button" value="Back" onclick="javascript:history.go(-1)" /><br><br>

    <?php if($result !== false && $result->num_rows > 0) {
        //output data of each row

        while($row = $result->fetch_assoc()) {
            
    ?>

    <form method = "POST" action="updateLibFinal.php">
        <table>
            <tr>
                <th><p style="font-size:24px; float: left;">Book Information</p></th>
            <tr>
                <td>
                    <label for="isbn" style="font-weight: bold;">ISBN</label>
                    <input type="text" name="isbn" id="isbn" value="<?php echo $row['isbn'] ?>" size="100">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="title" style="font-weight: bold;"> Book Title</label>
                    <input type="text" name="title" id="title" size="100" value="<?php echo $row['book_title'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="desc" style="font-weight: bold;"> Book Description</label>
                    <input type="text" name="desc" id="desc" size="100" value="<?php echo $row['book_desc'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="book_type" style="font-weight: bold;"> Book Type</label>
                    <!-- <input type="text" name="book_type" id="book_type" size="100" value="<?php //echo $row['book_type'] ?>"> -->
					<select name="book_type" id="book_type">
						<option value="Ebook">Ebook</option>
						<option value="Physical">Physical</option>
					</select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="status" style="font-weight: bold;">Status</label>
                    <!-- <input type="text" name="status" id="status" size="100" value="<?php //echo $row['status'] ?>"> -->
					<select name="status" id="status">
						<option value="Available">Available</option>
						<option value="Not Available">Not Available</option>
						<option value="Not Available">On Read</option>
					</select>
                </td>
            </tr>

			<tr>
				<td>
					<label for="date_publish" style="font-weight: bold;">Date Published</label>
					<input type="date" name="date_publish" id="date_publish" value="<?php echo $row['date_published'] ?>">
				</td>
			</tr>
			
            <tr>
                <td>
                    <label for="category" style="font-weight: bold;">Category</label>
                    <!-- <input type="text" name="category" id="category" value="<?php //echo $row['category_name'] ?>" size="100"> -->
					<select id="category" name="category">
						<option value="401">Mathematics</option>
						<option value="402">Articles</option>
						<option value="403">Dictionary</option>
						<option value="404">Documentary</option>
						<option value="405">Encyclopedia</option>
						<option value="406">Historical</option>
						<option value="407">Literature</option>
						<option value="408">Science</option>
					</select>
                </td>
            </tr>

			

            <tr>
                <th><p style="font-size:24px; float: left;">Author Information</p></th>
            </tr>
            <tr>
                <td>
                    <label for="author_id" style="font-weight: bold;">Author</label>
                    <input type="text" name="firstName" id="firstName" value="<?php echo $row['author_fname'] ?>" size="100">
                    <input type="text" name="lastName" id="lastName" value="<?php echo $row['author_lname'] ?>" size="100">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="publisher" style="font-weight: bold;">Publisher</label>
                    <input type="text" name="publish" id="publish" value="<?php echo $row['publisher_name'] ?>" size="100">
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
                    <input type="reset" value="Clear" style="float: right;">
                    <input type="submit" value="Update Book" onclick="process()" style="float: right;">
                </td>
            </tr>
        </table>
    </form>
   
    </div>

    <?php  //include('footer.php'); ?>

</body>
</html>
