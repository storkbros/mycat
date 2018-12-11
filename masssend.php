<?php
include_once('db.php');
include_once('session.php');
$loginname=$login_session;
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$kapname= $_POST["kapname"];
$sendname= $_POST["sendname"];
$title = $_POST["title"];
$text = $_POST["text"];
$itemid = $_POST["itemid"];
$itemcount = $_POST["itemcount"];
$bcoin = $_POST["bcoin"];
$href = 'valami';
$date = date("Y-m-d H:i:s");
echo "<br>";

$sql = "INSERT INTO MyGuests (sendname, kapname, title,szoveg,itemid,itemname,bcoin,date,href)
VALUES ('$sendname','$kapname','$title','$text','$itemid','$itemcount','$date','$href')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>