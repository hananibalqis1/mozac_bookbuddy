<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <link rel="stylesheet" href="style2.css">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mozac BookBuddy</title>
    <script>
      function BackPage(){
        location.href = "listBook-stud.php";
      }

      function Forward(){
        location.href = "issuebook.php";
      }
    </script>
</head>
<body>
    <?php include('navside-stud.php'); ?>

    <div class="wrapper">
    <input type="button" value="Back" onclick="BackPage()" /><br><br>
    
    <form method ="POST" action="">
        <table>
            <tr>
                <th><p style="font-size:24px; float: left;">Book Information</style></th>
            </tr>
                <td><p>Borrow a book from library</style></td>
            </tr>
            <tr>
                <th><label for="bookID" style="float: left;">Enter Book ID:</label>
                <input type="text" name="book" id="book" size="30" placeholder="Please enter book ISBN number.." required="required" ></th>
            </tr>
            <tr>
                <td><input type="reset"  value="Cancel" onclick="BackPage()" style="margin-left: 80%;">
                <input type="button"  value="Issue Book"  onclick="Forward()"></td>
            </tr>
        </table>
    </form>
   
    </div>

    <!-- <?php include('footer.php'); ?> -->

</body>
</html>
