<?php
    session_start();
    
    if(count($_POST)>0) {
        include('connect.php');

        if($_POST["login_type"] == "Member") {
          include('loginMember.php');
        }
        else if($_POST["login_type"] == "Librarian"){
            include('loginLibrarian.php');
        }
        else {
          echo "<script type='text/javascript'> alert('Invalid email and password! Please try again.') </script>";
        }
    }
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <link rel="icon" type="image/icon" href="images/logo.png" sizes="768x768" >
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="style2.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mozac BookBuddy</title>
  <script type="text/javascript">
      function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
  </script>
</head>
<body>
    <header>
        <a href="index.php" class="center">BookBuddy</a>
        <a class="profile" href="login1.php"><img src="account-circle.svg" alt=""></a>
    </header>

    <div id="wrapper">
      <form action="" method="POST">
        <table id="tblCenter">
          <tr>
            <th>
              <h2>Welcome to BookBuddy</h2>
              <h5>Login to continue.</h5>
            </th>
          </tr>
          <tr>
            <td>
              <!-- <center><img src="account-circle.svg" alt="Account Icon"></center> -->
              <center>
              <label for="login_type"><b>Please Choose Login Type</b></label> 
              <br>
              <input type="radio" name="login_type" value="Member" required> Student/Teacher
              <input type="radio" name="login_type" value="Librarian" required> Librarian
              </center>
            </td>
          </tr>
          <tr>
            <td>
              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Enter Email" name="email" required>
            </td>
          </tr>
          <tr>
            <td>
              <label for="password"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="password" id="password" required>
              <input type="checkbox" onclick="showPassword()"> Show Password
              <a href="signup.php" style="float: right; text-decoration:none; color:black;">Not yet registered? <u>Click Here</u></a></center>
            </td>
          </tr>
          <tr>
            <td>
              <center>
                <input type="submit" name="submit" id="button" value="Login">
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
