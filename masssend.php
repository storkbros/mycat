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
$nemok = 0;


$itemid = $_POST["itemid"];
$itemcount = $_POST["itemcount"];

$sql = "SELECT * FROM kaja WHERE name='$itemid';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {  }
$itemid = $row["id"];
$href = $row["link"];

if ( $itemcount == "") { $itemcount = 0;}
if ( $itemcount > 0 or $itemcount < 9999 ) { } else { $itemcount = 0;}
$sql = "SELECT * FROM raktar WHERE name='$loginname' and itemid='$itemid';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {  }
if ( $row["itemcount"] < $itemcount ) {
 $nemok = 1;
}


$bcoin = $_POST["bcoin"];







$date = date("Y-m-d H:i:s");
echo "<br>";

$sql = "INSERT INTO msn (sendname, kapname, title,szoveg,itemid,itemname,bcoin,date,href)
VALUES ('$sendname','$kapname','$title','$text','$itemid','$itemcount','$bcoin','$date','$href')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>