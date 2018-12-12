
<?php
include_once('db.php');
include_once('session.php');
$loginname=$login_session;
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM teszt ;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $i = 1;
    while ($row = $result->fetch_assoc()) {

    echo $row["x1"]; echo " ";
    echo $row["x2"];echo " ";
        echo $row["x3"];echo " ";
        echo $row["x4"];echo " ";
        echo $row["x5"];echo " ";
        echo $row["x6"];echo " ";
        echo $row["x7"];echo " ";
        echo $row["x8"];echo " ";
        echo $row["x9"];echo " ";
        echo $row["x10"];echo " ";
        echo "<br>";

    }
}
?>