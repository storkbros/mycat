<?php 
include('session.php');
define('TIMEZONE', 'Europe/Paris');
date_default_timezone_set(TIMEZONE);
echo $_POST["itemid"];
echo $_POST["tipus"];
echo $_POST["kajaid"];
$foodname = $_POST["food"];
echo $_POST["food"];
$loginname=$login_session;
$da = date("Y-m-d H:i:s");
include('dpc.php');
echo "halo";

if ( $_POST["tipus"] == 1) {
 $sql =" UPDATE users SET foodtype = '$foodname', foodcount = '10', foodtime = '$da' WHERE name = '$loginname';";
if ($conn->query($sql) === TRUE) {
	$hiba = "sikeres tranzakcio";
	echo "sikeres";
//	header("location:index.php");
} else {
    echo "Error updating record: " . $conn->error;
	$hiba = "sikeretelen tranzakcio";
}
}
if ( $_POST["tipus"] == 2) {
 $sql =" UPDATE users SET drinktype = '$foodname', drinkcount = '10', drinktime = '$da' WHERE name = '$loginname';";
if ($conn->query($sql) === TRUE) {
	$hiba = "sikeres tranzakcio";
	echo "sikeres";
//	header("location:index.php");
} else {
    echo "Error updating record: " . $conn->error;
	$hiba = "sikeretelen tranzakcio";
}
}
//raktar -1 
// mennyi van belole
$itemid = $_POST["itemid"];
echo $itemid;
$sql = "SELECT * FROM raktar WHERE name='$loginname' AND itemid='$itemid';";
$result = $conn->query($sql);
$i=0;
if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc(); 
       // echo "id: ". $row["id"]. " - Name: ". $row["name"]. " " . $row["money"] ."";
		
    
} else {
    echo "0 results";
}  
$levon = $row["itemcount"]-1;
$sql =" UPDATE raktar SET itemcount = '$levon' WHERE name = '$loginname' AND itemid='$itemid';";
if ($conn->query($sql) === TRUE) {
	$hiba = "sikeres tranzakcio";
	echo "sikeres";
	header("location:index.php");
} else {
    echo "Error updating record: " . $conn->error;
	$hiba = "sikeretelen tranzakcio";
}

 

?>
