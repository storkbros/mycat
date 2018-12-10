<?php 
include('session.php');
include('db.php');
define('TIMEZONE', 'Europe/Paris');
date_default_timezone_set(TIMEZONE);
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$tipus= $_POST["type"];
$text = $_POST["teszt"];

$userteszt = $_SESSION['login_user'];
$sql = "SELECT * FROM users WHERE name='$userteszt'; ";
$result = $conn->query($sql);
$i=0;
if ($result->num_rows > 0) {$row = $result->fetch_assoc(); 
} else {
    echo "0 results";
}
$profkep=$row["profkep"];
$profkieg=$row["profkieg"];

$date = date('Y-m-d H:i:s');

	echo $_POST["message-text"];
	$sql = "INSERT INTO forum ( username,text,datetime,profil,profilkieg,tipus)
		VALUES ('$userteszt','$text','$date','$profkep','$profkieg','$tipus')";
		if ($conn->query($sql) === TRUE) {
			
		} else {
		echo "Error updating record: " . $conn->error;
		}
	header("location:index.php?page=forum");

?>