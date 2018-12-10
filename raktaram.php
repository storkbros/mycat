
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

<?php
include 'raktar.php';
$servername = "vps.dornyayse.hu";
$username = "misiek";
$password = "19970227";
$dbname = "misiek";
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
  </div>
 <div class="container-fluid">
  <div class="row" style="position:fixed;bottom:0;">
    <div class="col-12" style="background-color:lavender;"><?php echo "ID: ". $row["id"]. " - Verzió: ". $row["verzio"]. " Date:" . $row["date"] ."" ?></div>
  </div>
</div>
 

