<?php
    session_start();
    
    include('connect.php');
    include('navside-stud.php');

    $m_id = $_SESSION['id'];

    $sql= "SELECT * FROM badge INNER JOIN member ON badge.badge_id = member.badge_id WHERE badge.badge_id='" . $_REQUEST['badge_id'] . "' AND member.id = '" . $m_id . "'";

    $result = $conn->query($sql);
    
    if($result !== false && $result->num_rows > 0) {
        echo "<body><div class='wrapper'>
        <h1>Badge Received</h1><br>";
            
        while($row = $result->fetch_assoc()) {
            echo "<img src='images/". $row['badge_img'] ."' width='250'>";
            echo "<br>";
            echo "<p> " . $row['badge_desc'] . " </p> <br>";  
        }
            ?>
            <input type="button" value="Return Back" onclick="javascript:history.go(-1)" />
        </div>
    </div>

    <?php }
    else {
    echo "0 results";
    }

    $conn->close(); ?>
</body>
</html>