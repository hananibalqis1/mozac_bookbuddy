<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <link rel="stylesheet" href="style2.css">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mozac BookBuddy</title>
</head>
<body>
    <?php include('navside.php'); ?>

    <div class="wrapper">
      <h1>Remove Book</h1>
      <br>
      <form action="searchDel-lib.php" method="post">
        <table>
            <tr>
                <td colspan="2">
                    <h2>Book Information</h2>
                    <p>Delete book from the library</p>
                </td>
            </tr>
            <tr>
                <th>Enter Book Title:</th>
                <td><input type="text" placeholder="" name="search" size="60" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="reset" class="button" value="Clear" style="float: right;">
                    <input type="submit" class="button" value="Search Book" style="float: right;">
                </td>
            </tr>
            <!-- <tr>
                <td><p style="font-size:24px">Book Information</style></td>
            </tr>
                <td><p style="font-size:20px"s>Delete a book from library</style></td>
            </tr>
            <tr>
                <td><label for="bookID">Enter Book ID: &nbsp;</label>
                <input required="required" type="text" size="30" ></td>
            </tr>
            <tr>
                <td><input type="button" value="Delete Book" style="margin-left:60%;">
                <input type="reset" class="btn" value="Cancel"></td>
            </tr> -->
        </table>
      </form>
    </div>

</body>
</html>
