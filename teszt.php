
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

    echo $row["q1"]; echo " ";
    echo $row["q2"];echo " ";
        echo $row["q3"];echo " ";
        echo $row["q4"];echo " ";
        echo $row["q5"];echo " ";
        echo $row["q6"];echo " ";
        echo $row["q7"];echo " ";
        echo $row["q8"];echo " ";
        echo $row["q9"];echo " ";
        echo $row["q10"];echo " ";
        echo "<br>";

    }
}
?>