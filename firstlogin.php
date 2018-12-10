<?php 
include 'db.php'; 
include('session.php');
$userteszt = $_SESSION['login_user'];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ( $_GET["cat"] <> 0 ) {
$cat = $_GET["cat"];
$url = "image/cat".$cat."";
$sql =" UPDATE users SET profkep='$url',profkieg='.png',firstlogin='1' WHERE name ='$userteszt';";
 if ($conn->query($sql) === TRUE) {  
 } else { 		
    echo "Error updating record: " . $conn->error;
 }
header("location:index.php");



}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container"style="margin:10px">
 


   <div class="card-deck">
  <div class="card">
    <img class="card-img-top" src="image/cat1.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Japanese bobtail</h5>
      <p class="card-text">A japán csonkafarkú a házi macska Japánban őshonos fajtája. </p>
    </div>
    <div class="card-footer">
     <a href="index.php?page=firstlogin&cat=1" > <button type="button" class="btn btn-secondary btn-lg btn-block">Választ</button> </a>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="image/cat2.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Russian Blue</h5>
      <p class="card-text">Az orosz kék az egyik legrégebb óta ismert macskafajta.</p>
    </div>
    <div class="card-footer">
     <a href="index.php?page=firstlogin&cat=2" ><button type="button" class="btn btn-secondary btn-lg btn-block">Választ</button></a>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="image/cat3.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Maine Coon</h5>
      <p class="card-text">A Maine Coon az Egyesült Államok nemzeti macskája.</p>
    </div>
    <div class="card-footer">
     <a href="index.php?page=firstlogin&cat=3" ><button type="button" class="btn btn-secondary btn-lg btn-block">Választ</button></a>
    </div>
  </div>
</div>
 </div> 
<div class="container"style="margin:10px"	>
 


  <div class="card-deck">
  <div class="card">
    <img class="card-img-top" src="image/cat4.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Ragdoll</h5>
      <p class="card-text">A ragdoll az egyik legbarátságosabb macskafajta, nagyon könnyű elnyerni a bizalmát. </p>
    </div>
    <div class="card-footer">
     <a href="index.php?page=firstlogin&cat=4" > <button type="button" class="btn btn-secondary btn-lg btn-block">Választ</button></a>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="image/cat5.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Scottish Fold</h5>
      <p class="card-text">Gömbölyű fej, kerek szemek, fülek a fejre borulnak.</p>
    </div>
    <div class="card-footer">
     <a href="index.php?page=firstlogin&cat=5" > <button type="button" class="btn btn-secondary btn-lg btn-block">Választ</button></a>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="image/cat6.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Persa</h5>
      <p class="card-text">A perzsa macska az egyik legrégebbi és legismertebb macskafajta.</p>
    </div>
    <div class="card-footer">
     <a href="index.php?page=firstlogin&cat=6" > <button type="button" class="btn btn-secondary btn-lg btn-block">Választ</button> </a>
    </div>
  </div>
</div>
 </div> 
 
 
</body>








