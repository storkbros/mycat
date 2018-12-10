<style>
  body {
      position: relative; 
	  background-image: url("image/store.png");
	background-color: #cccccc;
	background-repeat: no-repeat;
    background-size: auto;
	 background-attachment: fixed;
	 padding-top:0px;
	 margin-top:0px;
	 
  }
  </style>

<?php 
include_once 'session.php';
include_once 'db.php';
$userteszt = $_SESSION['login_user'];
?>




<nav class="navbar navbar-expand-sm bg-light navbar-dark ">  
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#section1"><button type="button" class="btn btn btn-dark">
		Ételek <span class="badge badge-light">7</span>
	</button>
	</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#section2"><button type="button" class="btn btn btn-dark">
		Ital <span class="badge badge-light">5</span>
	</button></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#section3"><button type="button" class="btn btn btn-dark">
		Craft <span class="badge badge-light">6</span>
	</button></a>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="#section4"><button type="button" class="btn btn btn-dark">
		Ruházat <span class="badge badge-light">0</span>
	</button></a>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="#section5"><button type="button" class="btn btn btn-dark">
		Lakberendezés <span class="badge badge-light">0</span>
	</button></a>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="#section6" ><button type="button" class="btn btn btn-dark">
		Extra <span class="badge badge-light">0</span>
	</button></a>
    </li>
	
  </ul>
</nav>
<div id="section7" class="container-fluid bg-dark" style="padding-top:0px;padding-bottom:0px;color:#f8f9fa;">
<center><h4 style="font-color:##ffc107">Ételek <?php echo $_POST["sikeres"]; ?></h4></center>
  </div>
<div id="section1" class="container-fluid" style="padding-top:20px;padding-bottom:70px">
<?php 
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM shistory WHERE username='$userteszt' ORDER BY id DESC LIMIT 1; ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();  
} else {
    echo "0 results";
}
$vettitem = $row['id'];
if ( $row['siker']== 1 ) { ?>
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Sikeres vásárlás!</strong> Gratulálok a/az <?php echo $row[itemname] ?>-hoz/hez.</div>
<?php } 
$sql =" UPDATE shistory SET siker = '0' WHERE id = '$vettitem'";
if ($conn->query($sql) === TRUE) {
} else {
    echo "Error updating record: " . $conn->error;
}


?>
  <div class="row">

 <?php

$sql = "SELECT * FROM kaja WHERE okstatus='1' AND tipus='1' ORDER BY normalcoin;";
$result = $conn->query($sql);
$i=0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      //  echo "<br> id: ". $row["id"]. " - Name: ". $row["name"]. " " . $row["penz"] . "<br>";
		?>
		
	<div class="col-sm" style="margin-top:10px">
	 <div class="card" style="width:250px;border:solid;border-color:#343a40;paddig-top:1%;">
    <img class="card-img-top" src="image/Food/<?php echo $row["link"]; ?>" alt="Card image" style="width:100%;max-height:245px;max-width:245px;min-height:245px">
	<div class="card-img-overlay"style="max-height:250px;">
<?php 
	if ($row["vipstatus"]== 1 or $row["event"]== 1 ) { ?>	
	<button type="button" class="<?php if ($row["event"]== 1 )  echo "btn btn-danger";  else  echo "btn btn-warning"; ?>"disabled>
<?php 
	if ($row["vipstatus"]== 1 ) { ?>
		<img src="vip.png" alt="logo" style="width:40px; title="Header" data-toggle="popover" data-placement="bottom" data-content="Csak VIP használhatja"">
	<?php }  
	if ($row["event"]== 1 ) { ?>
		<img src="event.png" alt="logo" style="width:40px; ">
	<?php } ?>
<?php } ?>
	</button>
    </div>
    <div class="card-body"style="border-top:solid;border-color:#343a40;">
      <h4 class="card-title"style="padding-left:1%;"><?php echo $row["name"]; ?></h4>
	<div class="row"> 
	<form action="buy.php" method="post" style="padding-right:5px;" >  
	  <input type="text" name="normalcoin" value="<?php echo $row["normalcoin"]; ?>" hidden >
	  <input type="text" name="id" value="<?php echo $row["id"]; ?>" hidden >
      <button type="submit" class="btn btn-info" style="font-weight: bold;"<?php if($bcoin < $row["normalcoin"]) echo "disabled"  ?>><i class='fas fa-gem' style='font-size:20px;color:white;'></i><?php echo " ". $row["normalcoin"]; ?></button>
	 </form>
	 <form action="vipbuy.php" method="post" style="padding-right:5px;" >  
	  <input type="text" name="id" value="<?php echo $row["id"]; ?>" hidden >
	   <button type="submit" class="btn btn-warning" style="font-weight: bold;color:white;"<?php if($bcoin < $row["vipcoin"]) echo "disabled"  ?>><i class='fas fa-gem' style='font-size:20px;color:white;'></i> <?php echo " ".$row["vipcoin"]; ?></button> 
	</form>
	</div>


    </div>
		</div>
		</div>

		<?php
    }
} else {
    echo "0 results";
}

?> 
</div>
</div>
<div id="section7" class="container-fluid bg-dark" style="padding-top:0px;padding-bottom:0px;color:#f8f9fa;">
<center><h4>Italok</h4></center>
  </div>
<div id="section2" class="container-fluid " style="padding-top:10px;padding-bottom:10px"> <div class="row">
 <?php
 
$sql = "SELECT * FROM kaja WHERE okstatus='1' AND tipus='2' ORDER BY normalcoin;";
$result = $conn->query($sql);
$i=0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      //  echo "<br> id: ". $row["id"]. " - Name: ". $row["name"]. " " . $row["penz"] . "<br>";
		?>
		
	<div class="col-sm" style="margin-top:10px">
	 <div class="card" style="width:250px;border:solid;border-color:#343a40;paddig-top:1%;">
    <img class="card-img-top" src="image/Food/<?php echo $row["link"]; ?>" alt="Card image" style="width:100%;max-height:245px;max-width:245px;min-height:245px">
	<div class="card-img-overlay"style="max-height:250px;">
<?php 
	if ($row["vipstatus"]== 1 or $row["event"]== 1 ) { ?>	
	<button type="button" class="<?php if ($row["event"]== 1 )  echo "btn btn-danger";  else  echo "btn btn-warning"; ?>"disabled>
<?php 
	if ($row["vipstatus"]== 1 ) { ?>
		<img src="vip.png" alt="logo" style="width:40px; title="Header" data-toggle="popover" data-placement="bottom" data-content="Csak VIP használhatja"">
	<?php }  
	if ($row["event"]== 1 ) { ?>
		<img src="event.png" alt="logo" style="width:40px; ">
	<?php } ?>
<?php } ?>
	</button>
    </div>
    <div class="card-body"style="border-top:solid;border-color:#343a40;">
      <h4 class="card-title"style="padding-left:1%;"><?php echo $row["name"]; ?></h4>
	<div class="row"> 
	<form action="buy.php" method="post" style="padding-right:5px;" >  
	  <input type="text" name="normalcoin" value="<?php echo $row["normalcoin"]; ?>" hidden >
	  <input type="text" name="id" value="<?php echo $row["id"]; ?>" hidden >
      <button type="submit" class="btn btn-info" style="font-weight: bold;"<?php if($bcoin < $row["normalcoin"]) echo "disabled"  ?>><i class='fas fa-gem' style='font-size:20px;color:white;'></i><?php echo " ". $row["normalcoin"]; ?></button>
	 </form>
	 <form action="vipbuy.php" method="post" style="padding-right:5px;" >  
	  <input type="text" name="id" value="<?php echo $row["id"]; ?>" hidden >
	   <button type="submit" class="btn btn-warning" style="font-weight: bold;"<?php if($bcoin < $row["vipcoin"]) echo "disabled"  ?>><i class='fas fa-gem' style='font-size:20px;color:white;'></i> <?php echo " ".$row["vipcoin"]; ?></button> 
	</form>
	</div>


    </div>
		</div>
		</div>

		<?php
    }
} else {
    echo "0 results";
}

?> 
</div></div>
<div id="section8" class="container-fluid bg-dark" style="padding-top:0px;padding-bottom:0px;color:#f8f9fa;">
<center><h4>Craft</h4></center>
  </div>
<div id="section3" class="container-fluid" style="padding-top:70px;padding-bottom:70px">
<div class="row">
 <?php
 
$sql = "SELECT * FROM kaja WHERE okstatus='1' AND tipus='3' ORDER BY normalcoin;";
$result = $conn->query($sql);
$i=0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      //  echo "<br> id: ". $row["id"]. " - Name: ". $row["name"]. " " . $row["penz"] . "<br>";
		?>
		
	<div class="col-sm" style="margin-top:10px">
	 <div class="card" style="width:250px;border:solid;border-color:#343a40;paddig-top:1%;">
    <img class="card-img-top" src="image/Food/<?php echo $row["link"]; ?>" alt="Card image" style="width:100%;max-height:245px;max-width:245px;min-height:245px">
	<div class="card-img-overlay"style="max-height:250px;">
<?php 
	if ($row["vipstatus"]== 1 or $row["event"]== 1 ) { ?>	
	<button type="button" class="<?php if ($row["event"]== 1 )  echo "btn btn-danger";  else  echo "btn btn-warning"; ?>"disabled>
<?php 
	if ($row["vipstatus"]== 1 ) { ?>
		<img src="vip.png" alt="logo" style="width:40px; title="Header" data-toggle="popover" data-placement="bottom" data-content="Csak VIP használhatja"">
	<?php }  
	if ($row["event"]== 1 ) { ?>
		<img src="event.png" alt="logo" style="width:40px; ">
	<?php } ?>
<?php } ?>
	</button>
    </div>
    <div class="card-body"style="border-top:solid;border-color:#343a40;">
      <h4 class="card-title"style="padding-left:1%;"><?php echo $row["name"]; ?></h4>
	<div class="row"> 
	<form action="buy.php" method="post" style="padding-right:5px;" >  
	  <input type="text" name="normalcoin" value="<?php echo $row["normalcoin"]; ?>" hidden >
	  <input type="text" name="id" value="<?php echo $row["id"]; ?>" hidden >
      <button type="submit" class="btn btn-info" style="font-weight: bold;"<?php if($bcoin < $row["normalcoin"]) echo "disabled"  ?>><i class='fas fa-gem' style='font-size:20px;color:white;'></i><?php echo " ". $row["normalcoin"]; ?></button>
	 </form>
	 <form action="vipbuy.php" method="post" style="padding-right:5px;" >  
	  <input type="text" name="id" value="<?php echo $row["id"]; ?>" hidden >
	   <button type="submit" class="btn btn-warning" style="font-weight: bold;"<?php if($bcoin < $row["vipcoin"]) echo "disabled"  ?>><i class='fas fa-gem' style='font-size:20px;color:white;'></i> <?php echo " ".$row["vipcoin"]; ?></button> 
	</form>
	</div>


    </div>
		</div>
		</div>

		<?php
    }
} else {
    echo "0 results";
}

?> 


</div>
</div>
<div id="section4" class="container-fluid bg-secondary" style="padding-top:70px;padding-bottom:70px">
</div>
<div id="section5" class="container-fluid bg-secondary" style="padding-top:70px;padding-bottom:70px">
</div>
 <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();      
});
</script>
 

