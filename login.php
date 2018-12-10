<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
 
	include('dp.php');
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM admin WHERE username = '$myusername';";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); 
	} else { }
   if (password_verify($mypassword, $row["passcode"])) {
	$count = 1;
	}
	else {
	$count = 0;
	}
 
      $active = $row['active'];
 
      if($count == 1) {
        // session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
		 $sql = "SELECT * FROM users WHERE name = '$myusername';";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		$row = $result->fetch_assoc(); 
		} else { }
		if ( $row["firstlogin"] == 10 ) {
			header("location: index.php?page=firstlogin");
		} else {		
		header("location: index.php");
		}
      }else { 
         $error = "A felhasználónév vagy a jelszó nem helyes!";
		 $design ="alert alert-danger";
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body, html {
    height: 100%;
    font-family: Arial, Helvetica, sans-serif;
}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Set a style for the submit button */
.btn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}
.btn2 {
    background-color: blue;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}
.btn:hover {
    opacity: 1;
}
.btn2:hover {
    opacity: 1;
}
</style>
</head>
<body>
<?php 
$page ="login";
if(isset($_GET["page"]))$page=$_GET["page"]; 


if ( $page <> "reg") { 
?>

<div class="container">
  <div class="row">
    <div class="col-sm-4" style=""></div>
    <div class="col-sm-4" style="">
	<img src="image/prof.png" class="img-fluid" alt="Responsive image" style="max-width:100%;">
	 <?php if ($_GET["reg"] == "siker" ) { ?> <div class="alert alert-success">
  <strong>Gratulálok!</strong> Sikeres regisztráció! </div> <?php }?>
	<form action = "" method = "post">
    <h1>MyCat</h1>

    <label for="email"><b>Felhasználónév</b></label>
    <input type="text" placeholder="Enter username" id="username" name = "username" required>

    <label for="psw"><b>Jelszó</b></label>
    <input type="password" placeholder="Enter Password" id="password" name = "password"required>

    <button type="submit" class="btn">Belépés</button>
	
  </form>
<a href="login.php?page=reg&hiba=0"><button type="btn" class="btn2">Regisztráció</button></a>	
</div>
    <div class="col-sm-4" style=""></div>
  </div>
</div>
<?php } else { include('register.php');?>
  
  
<?php } ?>  
</body>
</html>