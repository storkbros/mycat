<!DOCTYPE html>
<html lang="en">
<head>
  <title>MyCat</title>
  <link rel="shortcut icon" href="favicon.ico">

  
	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#212529;">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#212529;">
	<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="#212529;">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    <meta charset="utf-8">
</head>
<style>
  body {
      position: relative; 
	  background-image: url("image/szoba.png");
	background-color: #cccccc;
	background-repeat: no-repeat;
    background-size: auto;
	 background-attachment: fixed;
	 padding-top:0px;
	 margin-top:0px;
	 
  }
  </style>
<body>

<?php
$page ="index";
if(isset($_GET["page"]))$page=$_GET["page"];  
include_once 'db.php';

if ( $page == "firstlogin") {
include 'firstlogin.php';
} else {
    include 'topbar2.php';
if ( $page == "admin2" ) {

include 'msn.php';
} else {	

}
if ( $page == "index") {
include 'profil.php';
include 'acchiv.php';
}
if ( $page == "kocsma") {
include 'kocsma.php';
}
if ( $page == "shop") {
include 'kaja.php';
}
if ( $page == "admin") {
include 'proff.php';
}
if ( $page == "szoba") {
include 'szoba.php';
}
if ( $page == "rangok") {
include 'rangok.php';
}
if ( $page == "proff") {
include 'proff.php';
}
if ( $page == "forum") {
include 'forum.php';
}
if ( $page == "raktar") {
include 'raktaram.php';
}
if ( $page == "craft") {
include 'craft.php';
}
}
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM system ORDER BY id DESC LIMIT 1; ";
$result = $conn->query($sql);
$i=0;
if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc(); 
       // echo "id: ". $row["id"]. " - Name: ". $row["name"]. " " . $row["money"] ."";
		
    
} else {
    echo "0 results";
}
$conn->close();
 ?>
 <!-- </div>
 <div class="container-fluid">
  <div class="row" style="position:fixed;bottom:0;">
    <div class="col-12" style="background-color:lavender;"><?php echo "ID: ". $row["id"]. " - Verzió: ". $row["verzio"]. " Date:" . $row["date"] ."" ?></div>
  </div>
</div> -->
 
 
</body>
</html>
