<?php
include_once('db.php');
include_once('session.php');
$loginname=$login_session;
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if( $loginname == 'Misiek') {
$kapname= $_POST["kapname"];
$sendname= $_POST["sendname"];
$title = $_POST["title"];
$text = $_POST["text"];

$itemid = $_POST["itemid"];
$itemcount = $_POST["itemcount"];

$sql = "SELECT * FROM kaja WHERE name='$itemid';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {  }
$href = $row["link"];
$itemname = $row["name"];
$date = date("Y-m-d H:i:s");



$sql = "SELECT * FROM users;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        $kapname= $row["name"];


        $sql = "INSERT INTO msn (sendname, kapname, title,szoveg,itemid,itemcount,itemname,bcoin,date,href)
VALUES ('$sendname','$kapname','$title','$text','$itemid','$itemcount','$itemname','$bcoin','$date','$href')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }}
}
?>