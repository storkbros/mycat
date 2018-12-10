<?php
include_once('session.php');
include_once('db.php');
$loginname=$login_session; 
$userteszt = $_SESSION['login_user'];
date_default_timezone_set(TIMEZONE);

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM users WHERE name='$userteszt';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); 
} else {
    echo "0 results";
}
$date3 = date('Y-m-d');
$date = date('Y-m-d H:i:s');
$catenergy=strtotime($row["energyvaltozas"]);
$catdrink=strtotime($row["drinktime"]);
$hnap = date('m');$nap = date('d');$ora = date('H');$perc = date('i');$mp = date('s');
$idoa2 = $mp + $perc *60 + $ora*60*60 + $nap*24*60*60 + $hnap*24*60*60*12;


//itt kapja a szerver datumot 
$d=strtotime($row["energyvaltozas"]);$hnap = date('m', $d);$nap = date('d', $d);$ora = date('H', $d);$perc = date('i', $d);$mp = date('s', $d);
$idoa = $mp + $perc *60 + $ora*60*60 + $nap*24*60*60 + $hnap*24*60*60*12;

//maidatum
//idoa2 a mostani dátum
$idoa3 = $idoa2-$idoa;

$percered = $idoa3/60;
$percem = $percered;
$ta = 0;
while ( $percem >= 10 ) {
	$ta = $ta+1;
	$percem = $percem - 10;
}

$tb = floor($percered)-($ta*10);

$kovi = $percered-floor($percered);
$kovi = $kovi * (60/100)*100;
$tkovienergy = ($tb*60)+$kovi;
$tbe = "-".$tkovienergy." second";
$tkovienergy =600-$tkovienergy;

$tbefaszom = date("Y/m/d H:i:s", strtotime($tbe));

 if ( $ta > 0 ) {
	$tc = $row["catenergy"] + $ta;
	if ( $tc > 100 ) { $tc = 100; }
	$sql =" UPDATE users SET energyvaltozas = '$date', catenergy= '$tc'  WHERE name ='$userteszt';";
	if ($conn->query($sql) === TRUE) {  
} else { 
			
 echo "Error updating record: " . $conn->error;
  }
} else {  } 
if ( $date3 <> $row['energydate'] ) {
	$sql =" UPDATE users SET energyvaltozas = '$date', catenergy= '100', energydate = '$date' WHERE name ='$userteszt';";
	if ($conn->query($sql) === TRUE) {  
} else { echo "Error updating record: " . $conn->error;}
}


// kaja szamolos 

$d=strtotime($row["foodtime"]);$hnap = date('m', $d);$nap = date('d', $d);$ora = date('H', $d);$perc = date('i', $d);$mp = date('s', $d);
$idoa = $mp + $perc *60 + $ora*60*60 + $nap*24*60*60 + $hnap*24*60*60*12;

//maidatum
//idoa2 a mostani dátum
$idoa3 = $idoa2-$idoa;
$td = 0;
while ( $idoa3 >= 7200 ) {
  $idoa3 = $idoa3 - 7200; 
	$td = $td +1;
}
if ( (10 - $td) < $row["foodcount"] ) { 

if ( $td > 10 ) { $td = 10; }
$te = 10- $td;
$sql =" UPDATE users SET foodcount = '$te'  WHERE name ='$userteszt';";
	if ($conn->query($sql) === TRUE) {  
} else { 
			
 echo "Error updating record: " . $conn->error;
  }
 
}  


//Drink count 
$d=strtotime($row["drinktime"]);$hnap = date('m', $d);$nap = date('d', $d);$ora = date('H', $d);$perc = date('i', $d);$mp = date('s', $d);
$idoa = $mp + $perc *60 + $ora*60*60 + $nap*24*60*60 + $hnap*24*60*60*12;
$idoa3 = $idoa2-$idoa;
$td = 0;
while ( $idoa3 >= 7200 ) {
  $idoa3 = $idoa3 - 7200; 
	$td = $td +1;
}
if ( (10 - $td) < $row["drinkcount"] ) { 

if ( $td > 10 ) { $td = 10; }
$te = 10- $td;
$sql =" UPDATE users SET drinkcount = '$te'  WHERE name ='$userteszt';";
	if ($conn->query($sql) === TRUE) {  
} else { 
			
 echo "Error updating record: " . $conn->error;
  }
 
}  






?>
