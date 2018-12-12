
<?php
include_once('db.php');
include_once('session.php');
$loginname=$login_session;
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM teszt2 ;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $i = 1;
    while ($row = $result->fetch_assoc()) {
        $i = 0;
        while ( $i <= 50) {
            echo $row["x".$i];
            $i = $i+1;
        }

    }
}
?>