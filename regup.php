<?php
include_once "db.php";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$username = $_POST["username"];
$catname= $_POST["catname"];
$email= $_POST["email"];
$age= $_POST["age"];
$passw1= $_POST["pword"];
$passw2= $_POST["repword"];

if ( $passw1 == $passw2 ){
$sql = "SELECT * FROM admin WHERE username = '$username';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); 
	header("location:login.php?page=reg&hiba=1");
} else {

$passw1= $_POST["pword"];
 $options = [
    'cost' => 12,
	];
 $pwwd= password_hash($passw1, PASSWORD_BCRYPT, $options);
 echo $pwwd;
		
$sql = "INSERT INTO admin ( username, passcode, email, age)
VALUES ('$username','$pwwd','$email','$age')";
if ($conn->query($sql) === TRUE) {
	$date = date('Y-m-d H:i:s');
	$date2 = date('Y-m-d');
	$sql = "INSERT INTO users ( name,catname,regdate,foodtime,drinktime,catenergytime,energyvaltozas,napielso)
		VALUES ('$username','$catname','$date','$date','$date','$date','$date','$date2')";
		if ($conn->query($sql) === TRUE) {
			echo "siker";
		} else {
		echo "Error updating record: " . $conn->error;
		}
	$sql = "INSERT INTO uquest ( username)
		VALUES ('$username')";
		if ($conn->query($sql) === TRUE) {
			echo "siker";
		} else {
		echo "Error updating record: " . $conn->error;
		}
    $sql = "INSERT INTO friend ( name,name2,barat)
		VALUES ('$username','Misiek','1')";
    if ($conn->query($sql) === TRUE) {
        echo "siker";
    } else {
        echo "Error updating record: " . $conn->error;
    }
	header("location:login.php?reg=siker");
	
	
} else {
    echo "Error updating record: " . $conn->error;
}

	
	
    
}
} else {
	header("location:login.php?page=reg&hiba=2");
}
?>