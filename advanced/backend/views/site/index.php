<?php
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Resource Allocation System</h1>

      

        <p><a class="btn btn-lg btn-success" href="http://localhost/ras/advanced/backend/web/index.php?r=employee">Employee</a> <a class="btn btn-lg btn-success" href="http://localhost/ras/advanced/backend/web/index.php?r=item">Inventory</a> <a class="btn btn-lg btn-success" href="http://localhost/ras/advanced/backend/web/index.php?r=empparticipation">Event</a> </p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Notifications</h2>

                <p><?php
        $servername = "localhost";
        $username = "root";
        $password = "1234";
        $dbname = "rasdb";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql1 = "SELECT * FROM event where Seen ='NO'";
$result = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) {
    
    $row = mysqli_fetch_assoc($result);
    echo"<table>";
    echo "<tr>";
    echo"<td style=\"padding-left=10px;padding-bottom=10px;\">   Event</td>";
    echo"<td style=\"padding-left=10px;padding-bottom=10px;\">   Type</td>";
    echo"<td style=\"padding-left=10px;padding-bottom=10px;\">   button</td>";
    echo "</tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style=\"padding-left=10px;padding-bottom=10px;\"><b>" . $row["event_no"]. "      </td><td style=\"padding-left=10px;padding-bottom=10px;\">" . $row["type"]."</td></b>        ";
        echo "<td style=\"padding-left=10px;padding-bottom=10px;\"><a class=\"btn btn-lg btn-success\" href=\"http://localhost/ras/advanced/backend/web/index.php?r=empparticipation/create&id=".$row["event_no"]."\">Assign</a></td>";
        echo "</tr>";

    }
    echo"</table>";
    }
mysqli_close($conn);     

?></p>

                
            </div>
            <div class="col-lg-4">
                <h2>TODAY</h2>
                             <p><?php
        $servername = "localhost";
        $username = "root";
        $password = "1234";
        $dbname = "rasdb";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql1 = "SELECT * FROM event WHERE start_date_time >= CURDATE( ) && start_date_time <= ( CURDATE( ) +1 )";
$result = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) {
    
    $row = mysqli_fetch_assoc($result);
    echo"<table>";
    echo "<tr>";
    echo"<td>   Event</td>";
    echo"<td style=\"padding-left:10px\">   Type</td>";
    echo"<td style=\"padding-left:10px\">   Venue</td>";
    echo"<td style=\"padding-left:10px\">   Button</td>";

    echo "</tr>";
    while($row = $result->fetch_assoc()) {
         echo "<tr>";
        echo "<td>" . $row["event_no"]. "</td>      <td style=\"padding-left:10px\">" . $row["type"]."</td>        <td style=\"padding-left:10px\">". $row["venue"]."</td>    ";
        echo "<td><a class=\"btn btn-lg btn-success\" href=\"http://localhost/ras/advanced/backend/web/index.php?r=employee/check&id=".$row["event_no"]."\">Check</a></td>";
        echo "</tr>";
    }
     echo"</table>";
    }
else {

    echo "<h2>No new Online Orders</h2>";
}
mysqli_close($conn);     

?></p>
</div>

               
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
 <?php
   echo "<script>
setTimeout(function(){
    location = ''
  },10000)</script>";
   ?>