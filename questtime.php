<?php
include_once('session.php');
define('TIMEZONE', 'Europe/Paris');
date_default_timezone_set(TIMEZONE);
$userteszt = $_SESSION['login_user'];
include('dp.php');
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM uquest WHERE status='1' AND username='$userteszt';";
$result = $conn->query($sql);
if ($result->num_rows > 0) { $row = $result->fetch_assoc();  } 

$startido = $row["queststart"]; 
$endido = $row["questend"];
$tart = $row["questtime"];


	
$cur_time=date("Y-m-d H:i:s");


if ($cur_time > $row["questend"] ) {
	
	
 $sql =" UPDATE uquest SET questtime ='0' WHERE username ='$userteszt';";
 if ($conn->query($sql) === TRUE) {
 } else {
    echo "Error updating record: " . $conn->error;
 }

  } else {
	  
$d=strtotime($row["questend"]);$hnap = date('m', $d);$nap = date('d', $d);$ora = date('H', $d);$perc = date('i', $d);$mp = date('s', $d);
$idoa = $mp + $perc *60 + $ora*60*60 + $nap*24*60*60 + $hnap*24*60*60*12;	
$hnap = date('m');$nap = date('d');$ora = date('H');$perc = date('i');$mp = date('s');
$idoa2 = $mp + $perc *60 + $ora*60*60 + $nap*24*60*60 + $hnap*24*60*60*12;
$idoa3 = $idoa-$idoa2;

if ( $idoa3 > 0 ) {
 $sql =" UPDATE uquest SET questtime ='$idoa3' WHERE username ='$userteszt';";
 if ($conn->query($sql) === TRUE) {
 } else {
    echo "Error updating record: " . $conn->error;
 }
}	
  
$endido = $endido - $startido;
	
		

}


?>
