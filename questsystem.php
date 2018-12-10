<?php 
include('session.php');
include('dp.php');
define('TIMEZONE', 'Europe/Paris');
date_default_timezone_set(TIMEZONE);
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$questem = $_POST["id"]; // questid 
$questem2 = $_POST["block"]; //blockid q1-q2-q3-q4
$questem3 = $_POST["energy"]; //energy a küldihez 
$userteszt = $_SESSION['login_user']; // ff név
$itemid = $_POST["itemid"];
$itemcount = $_POST["itemcount"];
$lista = "Küldetes id:".$questem." ";
// kaja-pia-energy test 
$sql = "SELECT * FROM users WHERE name='$userteszt';";
$result = $conn->query($sql);
if ($result->num_rows > 0) { $row = $result->fetch_assoc(); }
$foodcount = $row["foodcount"];
$drinkcount = $row["drinkcount"];
$catenergy = $row["catenergy"];
 
if ( $questem3 <= $row["catenergy"] and $foodcount > 0 and $drinkcount > 0 ) {
 
	
	

// bejott quest kivalsztasa adatok kikerese 


$sql = "SELECT * FROM quest WHERE status='1' AND id='$questem';";
$result = $conn->query($sql);
if ($result->num_rows > 0) { $row = $result->fetch_assoc(); echo "quest ";echo $row["name"]; 
$ido=$row["ido"];
$questid = $row["id"];
} else { }
// I. usercheck 
$sql = "SELECT * FROM uquest WHERE status='1' AND username='$userteszt';";
$result = $conn->query($sql);
if ($result->num_rows > 0) { $row = $result->fetch_assoc(); echo "be"; } else { }

//active questcheck 
if ( $row["active"] == 1 ) { } else { 

//idoadas
$ido = $ido - $row["bonus"];
strtotime($ido);
$starttime = date('Y-m-d H:i:s');
$cur_time=date("Y-m-d H:i:s");
$duration="+ ".$ido." seconds";
$questend = date('Y-m-d H:i:s', strtotime($duration, strtotime($cur_time)));

$mert = 0;
//questindtias 
$sql =" UPDATE uquest SET activequest = '$questem2', active = '1',queststart ='$starttime', questid = '$questid',questend ='$questend', questtime ='$ido',questtimemax ='$ido', itemid='$itemid', itemcount='$itemcount' WHERE username ='$userteszt';";

if ($conn->query($sql) === TRUE)  {  //header
} else {
    echo "Error updating record: " . $conn->error;  
}

// enrgia kaja - pia levonás 
if ( $foodcount > 0 ) { $foodos = $foodcount - 1; } else { $foodos = 0; }
if ( $drinkcount > 0 ) { $drinkes = $drinkcount - 1;} else { $drinkes = 0; }

$energys = $catenergy - $_POST["energy"];
echo $userteszt;

//update 
$sql =" UPDATE users SET foodcount= '$foodos', drinkcount='$drinkes', catenergy= '$energys' WHERE name ='$userteszt';";

if ($conn->query($sql) === TRUE)  {  //header
} else {
    echo "Error updating record: " . $conn->error;  
}

header("location:index.php?page=kocsma");
echo "  nemaktiv";}
}
// miért nem ment végbe update 
// kizaro 
else {
	if ( $foodcount == 0 ) {    
		$mert = 1;
	} 
	if ( $drinkcount == 0 ) {    
		$mert = 2;
	} 
	if ( $catenergy == 0 ) {    
		$mert = 3;
	} 
	header("location:index.php?page=kocsma");
}	
	












	
	
	
	


?>