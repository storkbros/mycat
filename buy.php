<?php
include_once('session.php');
include_once('dpc.php');
$userteszt = $_SESSION['login_user'];
$sql = "SELECT * FROM users WHERE name='$userteszt'; ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); 
} else {
    echo "0 results";
}
$userid = $row["id"];
$bcoin = $row["bcoin"];
$kajaid = $_POST["id"];
echo $_POST["normalcoin"];
echo $_POST["vipcoin"];

$sql = "SELECT * FROM kaja WHERE id='$kajaid'; ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); 
} else {
    echo "0 results";
}
$itemname = $row["name"];
if( $bcoin >= $row[normalcoin] ) {
echo "ok";
	$boltvalt="1";
	$bcoin = $bcoin - $row[normalcoin];
	$levont = $row[normalcoin];
//raktárba rakás 
$sql = "SELECT * FROM raktar WHERE itemid='$kajaid' AND name='$userteszt';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
	echo $row[itemcount];
	$raktarp = $row[itemcount]+1; 
	echo "felulirva a regi";
	echo $raktarp;
    $sql =" UPDATE raktar SET itemcount = '$raktarp' WHERE itemid = '$kajaid' AND name='$userteszt';";
	if ($conn->query($sql) === TRUE) {
	echo "sikeres update";
	} else { 
	
	echo "Error updating record: " . $conn->error;
	}
} else {
echo $raktarp; 
echo"miért lépide?";
$sql = "INSERT INTO raktar (id, name, itemcount, okstatus, itemid)
VALUES ('1', '$userteszt','1', '1','$kajaid')";
if ($conn->query($sql) === TRUE) {
	echo "siker";
} else {
    echo "Error updating record: " . $conn->error;
}
	
    echo "0 results";
}	
//raktárbarakás vége	
	

	
$sql =" UPDATE users SET bcoin = '$bcoin' WHERE id = '$userid'";
if ($conn->query($sql) === TRUE) {
   // header("location:index.php?page=shop");
	$hiba = "sikeres tranzakcio";
} else {
    echo "Error updating record: " . $conn->error;
	$hiba = "sikeretelen tranzakcio";
}

$sql = "SELECT * FROM shistory ORDER BY id DESC LIMIT 1; ";
$result = $conn->query($sql);
$i=0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();     
} else {
    echo "0 results";
}
echo $row[id];
$idegy = 1;
$lastid = intval($row[id])+1;
echo $lastid;


$sql = "INSERT INTO shistory (id, shopstory, username, bcoin, vipcoin, itemname, itemid, siker)
VALUES ('$lastid', '$hiba','$userteszt', '$levont', '0' , '$itemname', '$kajaid', '1')";
if ($conn->query($sql) === TRUE) {
	$_POST["sikeres"]=1;
    header("location:index.php?page=shop");
			
} else {
    echo "Error updating record: " . $conn->error;
}


} 
	


?>
