<?php
    session_start();
    
    if(count($_POST)>0) {
        include('connect.php');

        if($_POST["role"] == "Student" || $_POST["role" == "Teacher"]) {
          include('registerMember.php');
        }
        else if($_POST["role"] == "Librarian"){
            include('registerLibrarian.php');
        }
        else {
          echo "<script type='text/javascript'> alert('Invalid registration! Please try again.') </script>";
        }
    }
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="style2.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mozac BookBuddy</title>
  <script type="text/javascript">
      function hideForm() {
      var lib = document.getElementById("Librarian");
      var x = document.getElementById("interestForm");

      if (lib.checked) {
        x.style.display = "none";
      } else {
        x.style.display = "block";
      }
    }
  </script>
</head>
<body>
    <header style="top: 0;">
        <a href="index.php" class="center">BookBuddy</a>
        <a class="profile" href="login1.php"><img src="account-circle.svg" alt=""></a>
    </header>

    <div id="wrapper">
      <form action="" method="POST">
        <table style="width: 40%; margin: 5% auto 0% auto;">
          <tr>
            <th>
              <h2>Welcome to BookBuddy</h2>
              <h5>Register your account here.</h5>
            </th>
          </tr>
          
          <tr>
            <td>
              <label for="name"><b>Full Name</b></label>
              <input type="text" placeholder="Enter your name.." name="name" required>
            </td>
          </tr>
          <tr>
            <td>
              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Enter your email.." name="email" required>
            </td>
          </tr>
          <tr>
            <td>
              <label for="password"><b>Password</b></label>
              <input type="password" placeholder="Enter your password.." name="password" required>
            </td>
          </tr>
          <tr>
            <td>
              <label for="role"><b>What role are you?</b></label> 
              <br>
              <input type="radio" name="role" id="Student" value="Student" onchange="hideForm()" required> Student &nbsp;
              <input type="radio" name="role" id="Teacher" value="Teacher" onchange="hideForm()"> Teacher &nbsp;
              <input type="radio" name="role" id="Librarian" value="Librarian" onchange="hideForm()"> Librarian
            </td>
          </tr>
            <tr>
              <td>
                <div id="interestForm">
                  <label for="interest"><b>Interest</b></label>
                  <br>
                  <input type="checkbox" value="Articles" name="interest[]" /> Articles &nbsp;
                  <input type="checkbox" value="Dictionary" name="interest[]" /> Dictionary &nbsp;
                  <input type="checkbox" value="Documentary" name="interest[]" /> Documentary &nbsp;
                  <input type="checkbox" value="Encyclopedia" name="interest[]" /> Encyclopedia &nbsp;
                  <input type="checkbox" value="Historical" name="interest[]" /> Historical &nbsp; <br>
                  <input type="checkbox" value="IT" name="interest[]" /> IT &nbsp;
                  <input type="checkbox" value="Literature" name="interest[]" /> Literature &nbsp;
                  <input type="checkbox" value="Mathematics" name="interest[]" /> Mathematics &nbsp;
                  <input type="checkbox" value="Science" name="interest[]" /> Science
                </div>
              </td>
          </tr>
          <tr>
            <td>
              <center>
                <input type="submit" name="submit" id="button" value="Sign Up">
                <input type="reset" id="cancelbtn" value="Clear">
              </center>
            </td>
          </tr>
        </table>
      </form>
    </div>
    <?php
    include('footer.php'); ?>
</body>
</html>
