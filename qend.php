<?php 
include('session.php');
define('TIMEZONE', 'Europe/Paris');
date_default_timezone_set(TIMEZONE);
$userteszt = $_SESSION['login_user'];
include('dp.php');
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// idocheck

$sql = "SELECT * FROM uquest WHERE status='1' AND username='$userteszt';";
$result = $conn->query($sql);
if ($result->num_rows > 0) { $row = $result->fetch_assoc(); echo "ok";} else { echo "error"; }
$cur_time=date("Y-m-d H:i:s");
$questemid = $row["questid"];
$queatszam = $row["questszam"];
if ($cur_time > $row["questend"] ) { echo "ok"; 

//UPDATE q1
$sql = "SELECT * FROM quest WHERE status='1' AND extra='1';";
$result = $conn->query($sql);
if ($result->num_rows > 0) { $row = $result->fetch_assoc(); echo "ok";} else { echo "error"; }
$rowcount=mysqli_num_rows($result);
echo $rowcount;
$q1=rand(1,$rowcount);
//q2
$sql = "SELECT * FROM quest WHERE status='1' AND extra='1';";
$result = $conn->query($sql);
if ($result->num_rows > 0) { $row = $result->fetch_assoc(); echo "ok";} else { echo "error"; }
$rowcount=mysqli_num_rows($result);
$q2=rand(1,$rowcount);
//q3

$sql = "SELECT * FROM quest WHERE status='1' AND extra='2';";
$result = $conn->query($sql);
if ($result->num_rows > 0) { $row = $result->fetch_assoc(); echo "ok";} else { echo "error"; }
$rowcount=mysqli_num_rows($result);
$q3=rand(1,$rowcount);
//q4
$sql = "SELECT * FROM quest WHERE status='1' AND extra='2';";
$result = $conn->query($sql);
if ($result->num_rows > 0) { $row = $result->fetch_assoc(); echo "ok";} else { echo "error"; }
$rowcount=mysqli_num_rows($result);
$q4=rand(1,$rowcount);
//q5
$sql = "SELECT * FROM quest WHERE status='1' AND extra='2';";
$result = $conn->query($sql);
if ($result->num_rows > 0) { $row = $result->fetch_assoc(); echo "ok";} else { echo "error"; }
$rowcount=mysqli_num_rows($result);
$q5=rand(1,$rowcount);

$queatszam = $queatszam +1;
$sql =" UPDATE uquest SET active = '0',activequest = '0', q1 ='$q1',q2 ='$q2',q3 ='$q3',q4 ='$q4',q5 ='$q5',questszam ='$queatszam' WHERE username ='$userteszt';";
 if ($conn->query($sql) === TRUE) {  
 } else { 
			
    echo "Error updating record: " . $conn->error;
	
 }

 //rewards 
$sql = "SELECT * FROM quest WHERE id = '$questemid';";
$result = $conn->query($sql);
if ($result->num_rows > 0) { $row = $result->fetch_assoc(); echo "ok";} else { echo "error"; }
 
$bcoin = $row["bcoin"];
$vipcoin = $row["vipcoin"];
$exp = $row["exp"];
$itemid = $row["itemid"];
$itemcount = $row["itemcount"];

$sql = "SELECT * FROM users WHERE name = '$userteszt';";
$result = $conn->query($sql);
if ($result->num_rows > 0) { $row = $result->fetch_assoc(); echo "ok";} else { echo "error"; } 

$ubcoin = $row["bcoin"];
$uvipcoin = $row["vipcoin"]; 
$uexp = $row["catexp"]; 

$ubcoin = $ubcoin+$bcoin; 
$uvipcoin = $uvipcoin+$vipcoin;
$uexp = $uexp + $exp;

$sql =" UPDATE users SET bcoin ='$ubcoin', vipcoin = '$uvipcoin', catexp = '$uexp' WHERE name ='$userteszt';";
 if ($conn->query($sql) === TRUE) {  
 } else { 
			
    echo "Error updating record: " . $conn->error;
	
 }
 
$sql = "SELECT * FROM raktar WHERE name = '$userteszt' AND itemid='$itemid';";
$result = $conn->query($sql);
if ($result->num_rows > 0) { $row = $result->fetch_assoc(); 
$itemes = $row["itemcount"] + $itemcount;
$sql =" UPDATE raktar SET itemcount='$itemes' WHERE name ='$userteszt' AND itemid='$itemid';";
 if ($conn->query($sql) === TRUE) {  
 } else { 
				
    echo "Error updating record: " . $conn->error;
	
 }

} else 

{ echo 
$sql = "INSERT INTO raktar ( name,itemcount,okstatus,itemid)
		VALUES ('$userteszt','$itemcount','1','$itemid')";
		if ($conn->query($sql) === TRUE) {
			
		} else {
		echo "Error updating record: " . $conn->error;
		}

}  
 
 
 
 
 header("location:index.php?page=kocsma");

} else { header("location:index.php?page=kocsma");  } 
?>