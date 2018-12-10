<?php
include('db.php');
include('session.php');
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$userteszt = $_SESSION['login_user'];

?>
<style>
  body {
      position: relative; 
	  background-image: url("image/craft.png");
	background-color: #cccccc;
	background-repeat: no-repeat;
    background-size: auto;
	 background-attachment: fixed;
	 padding-top:0px;
	 margin-top:0px;
	 
  }
  </style>


<div class="container-fluid" style="margin-top:10px;">
  <div class="row">
    <div class="col-sm-1" style=""></div>
    <div class="col-sm-10" style="background-color:rgba(53, 58, 64, 0.6);">
	<table style="width:100%;opacity: 1.0;">
  <tr>
	<th style="width:5%;font-size:2vw;color:white;">Profilkép</th>
    <th style="width:10%;height:100%;"><img src="<?php $sql = "SELECT * FROM users WHERE name ='$userteszt' ;";
							$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						$row = $result->fetch_assoc();
						echo $row["profkep"]; } else {echo "0";} ?>-01.png
	
	
	" alt="mikulas" class="img-fluid" style="max-height:150px;width:auto;opacity: 1.0;"></th>
    
    <th style="width:5%;font-size:2vw;color:white;"><?php $sql = "SELECT * FROM raktar WHERE name ='$userteszt' AND itemid ='19'; ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			echo $row["itemcount"]; } else {echo "0";} ?>/100
		</th>
		<th align="left" style="width:10%;"><img src="image/Food/craft7.png" alt="mikulassapi" class="img-fluid" style="max-height:50px;width:auto;opacity: 1.0;"></th> 
	<th style="width:5%;font-size:4vw;color:white;"><img src="image/kovacs.png" alt="mikulassapi" class="img-fluid" style="max-height:100px;width:auto;opacity: 1.0;"></th>
  </tr>
</table>
	
	
	</div>
    <div class="col-sm-1" style=""></div>
  </div>
</div>

<div class="container-fluid" style="margin-top:10px;">	
  <div class="row">
    <div class="col-sm-1" style=""></div>
    <div class="col-sm-10" style="background-color:rgba(53, 58, 64, 0.6);">
	<table style="width:100%;opacity: 1.0;">
  <tr>
	<th style="width:5%;font-size:2vw;color:white;">Dekor</th>
    <th style="width:10%;height:100%;"><img src="image/karifa.png" alt="mikulas" class="img-fluid" style="max-height:150px;width:auto;opacity: 1.0;"></th>
    
    <th style="width:5%;font-size:2vw;color:white;"><?php $sql = "SELECT * FROM raktar WHERE name ='$userteszt' AND itemid ='13'; ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			echo $row["itemcount"]; } else {echo "0";} ?>/30
		</th>
		<th align="left" style="width:5%;"><img src="image/Food/craft1.png" alt="mikulassapi" class="img-fluid" style="max-height:50px;width:auto;opacity: 1.0;"></th> 
		
    <th style="width:5%;font-size:2vw;color:white;"><?php $sql = "SELECT * FROM raktar WHERE name ='$userteszt' AND itemid ='14'; ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			echo $row["itemcount"]; } else {echo "0";} ?>/10
		</th>
		<th align="left" style="width:5%;"><img src="image/Food/craft2.png" alt="mikulassapi" class="img-fluid" style="max-height:50px;width:auto;opacity: 1.0;"></th> 
	
    <th style="width:5%;font-size:2vw;color:white;"><?php $sql = "SELECT * FROM raktar WHERE name ='$userteszt' AND itemid ='15'; ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			echo $row["itemcount"]; } else {echo "0";} ?>/10
		</th>
			<th align="left" style="width:5%;"><img src="image/Food/craft3.png" alt="mikulassapi" class="img-fluid" style="max-height:50px;width:auto;opacity: 1.0;"></th> 
	
    <th style="width:5%;font-size:2vw;color:white;"><?php $sql = "SELECT * FROM raktar WHERE name ='$userteszt' AND itemid ='16'; ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			echo $row["itemcount"]; } else {echo "0";} ?>/10
		</th>
			<th align="left" style="width:5%;"><img src="image/Food/craft4.png" alt="mikulassapi" class="img-fluid" style="max-height:50px;width:auto;opacity: 1.0;"></th> 
		
    <th style="width:5%;font-size:2vw;color:white;"><?php $sql = "SELECT * FROM raktar WHERE name ='$userteszt' AND itemid ='17'; ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			echo $row["itemcount"]; } else {echo "0";} ?>/10
		</th>
		<th align="left" style="width:5%;"><img src="image/Food/craft5.png" alt="mikulassapi" class="img-fluid" style="max-height:50px;width:auto;opacity: 1.0;"></th> 
		 
    <th style="width:5%;font-size:2vw;color:white;"><?php $sql = "SELECT * FROM raktar WHERE name ='$userteszt' AND itemid ='18'; ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			echo $row["itemcount"]; } else {echo "0";} ?>/10
		</th>
	<th align="left" style="width:5%;"><img src="image/Food/craft6.png" alt="mikulassapi" class="img-fluid" style="max-height:50px;width:auto;opacity: 1.0;"></th>	
	<th style="width:5%;font-size:4vw;color:white;"><img src="image/kovacs.png" alt="mikulassapi" class="img-fluid" style="max-height:100px;width:auto;opacity: 1.0;"></th>
  </tr>
</table>
	
	
	</div>
    <div class="col-sm-1" style=""></div>
  </div>
</div>
<div class="container-fluid" style="margin-top:10px;">
  <div class="row">
    <div class="col-sm-1" style=""></div>
    <div class="col-sm-10" style="background-color:rgba(53, 58, 64, 0.6);">
	<table style="width:100%;opacity: 1.0;">
  <tr>
	<th style="width:5%;font-size:2vw;color:white;">Bónusz -1perc</th>
    <th style="width:10%;height:100%;"><img src="image/szanko.png" alt="mikulas" class="img-fluid" style="max-height:150px;width:auto;opacity: 1.0;"></th>
    
    <th style="width:5%;font-size:2vw;color:white;"><?php $sql = "SELECT * FROM raktar WHERE name ='$userteszt' AND itemid ='14'; ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			echo $row["itemcount"]; } else {echo "0";} ?>/30
		</th>
		<th align="left" style="width:10%;"><img src="image/Food/craft2.png" alt="mikulassapi" class="img-fluid" style="max-height:50px;width:auto;opacity: 1.0;"></th> 
	<th style="width:5%;font-size:4vw;color:white;"><img src="image/kovacs.png" alt="mikulassapi" class="img-fluid" style="max-height:100px;width:auto;opacity: 1.0;"></th>
  </tr>
</table>
	
	
	</div>
    <div class="col-sm-1" style=""></div>
  </div>
</div>