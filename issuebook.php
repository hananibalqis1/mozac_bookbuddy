<?php
    session_start();
    
    include('connect.php');
    include('navside-stud.php');

    $sql= "SELECT * FROM book WHERE isbn='" . $_REQUEST['isbn'] . "'";

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

    <form method = "POST" action="report-stud.php">
        <table>
            <tr>
                <th><p style="font-size:24px; float: left;">Book Information</style></th>
            </tr>
                <td><p>Borrow a book from library</style></td>
            </tr>
            <tr>
                <td>
                    <label for="bookId" style="float: left; font-weight: bold;">Book ID:</label>
                    <input required="required" type="text" name="book_id" id="book_id" value="<?php echo $row['isbn'] ?>" size="100" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="author" style="float: left; font-weight: bold;"> Book Title:</label>
                    <input required="required" type="text" name="book_title" id="book_title" size="100" value="<?php echo $row['book_title'] ?>" readonly>
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
                    <label for="current_date" style="float: left; font-weight: bold;">Borrow Date:</label>
                    <br>
                    <input type="date" name="current_date" id="current_date" size="100" required="required" >
                </td>
            </tr>
            <tr>
                <td>
                    <label for="return_date" style="float: left; font-weight: bold;">Return Date:</label>
                    <br>
                    <input type="date" name="return_date" id="return_date" size="100" required="required" >
                </td>
            </tr>
         
            <tr>
                <td>
                    <input type="reset" value="Clear" onclick="BackPage()" style="margin-left: 80%;">
                    <input type="submit" value="Issue Book" onclick="process()">
                </td>
            </tr>
        </table>
    </form>
   
    </div>

    <?php  //include('footer.php'); ?>

</body>
</html>
