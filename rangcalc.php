<?php 
include('session.php');
include('dp.php');
$userteszt = $_SESSION['login_user'];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM users WHERE status='1' AND name ='$userteszt';";
$result = $conn->query($sql);
if ($result->num_rows > 0) { $row = $result->fetch_assoc();  } else { echo "Noresult"; }
$rang = $row["catexp"];
$catlvl = $row["catlvl"];


$sql = "SELECT * FROM rang WHERE okstatus='1';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$eleg = 0;
    while($row = $result->fetch_assoc()) {
	if ( $rang < $row["exp"] and $eleg == 0 ) {
		 $rangki = $rangszint;
		 $kovirangexp = $row["exp"];
		 $rangnameki = $rangname;
		 $regiexp = $rangexp;
		$eleg = 1;
    }
		$rangname = $row["rangname"];
		$rangszint = $row["szint"];
		$rangexp = $row["exp"];
	}
} else {
    echo "0 results";
}
$ax = $kovirangexp - $regiexp;
$cx = $kovirangexp - $rang;  
$bx = floor((($rang-$regiexp) / $ax)*100);


	
if ( $rangki <> $catlvl ) {
	 $sql =" UPDATE users SET catlvl='$rangki', catrang='$rangnameki' WHERE name ='$userteszt';";
 if ($conn->query($sql) === TRUE) {
 } else {
    echo "Error updating record: " . $conn->error;
 }
	
}


?>