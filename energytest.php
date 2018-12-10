<?php
include_once('session.php');
include_once('dp.php');
$userteszt = $_SESSION['login_user'];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM users WHERE status='1' AND name ='$userteszt';";
$result = $conn->query($sql);
if ($result->num_rows > 0) { $row = $result->fetch_assoc();  } else { echo "Noresult"; }
$myenergy =$row["catenergy"];
$myfoodcount =$row["foodcount"]; 
$mydrinkcount =$row["drinkcount"];
?>