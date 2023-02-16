<?php
    session_start();

    include('connect.php');
    include('navside-stud.php');

    $sql = "SELECT * FROM member INNER JOIN badge ON member.badge_id = badge.badge_id WHERE id='" . $_SESSION['id'] . "'";
    $result = $conn->query($sql);

    $i = 1;

    if($result !== false && $result->num_rows > 0) {
        echo "<body><div class='wrapper'>
        <h1>Badge Collected</h1><br>";
        echo "<table>";
        // echo "<tr><th>No</th><th>Badges</th><th>Details</th><th>Action</th></tr>";
        echo "<tr><th>No</th><th>Badges</th><th>Details</th><th>Action</th></tr>";

        while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>" . $i++ . "</td>";
        echo "<td><center><img src='images/". $row['badge_img'] ."' width='200'></center></td>";
          ?>
              <td>
                <p> <?php echo $row["badge_desc"] ?></p>
              </td>
              <td>
                  <a href="badge.php?badge_id=<?php echo $row['badge_id'] ?>"><input type="button" value="View Badge"/></a>
              </td>
          <?php
          }
          echo "</table></div><br></body>";
    }
    else {
        echo "<body><br>
        <table><tr><th>No</th><th>Badges</th><th>Details</th><th>Action</th></tr>
        <tr><td colspan='4'>No badge received.</td></tr>
        </div></body>";
    }

    $conn->close();
?>
