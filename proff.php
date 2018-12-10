<?php
include('session.php'); 
$loginname=$login_session;
include 'db.php';  
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name = $_GET["name"];
$sql = "SELECT * FROM users WHERE name='$name';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {  header("location:index.php?page=rangok"); } 

?>

<div class="card-deck" style="margin:10px;">
<div class="card" style="width: 20rem;max-width:330px;">
      <img class="card-img-top" src="<?php echo $row["profkep"]; ?><?php echo $row["profkieg"]; ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row["name"]; ?></h5>
    <p class="card-text"><?php echo $row["profiltext"]; ?></p>
  </div>
  <ul class="list-group list-group-flush"> 
  
    <li class="list-group-item">Amit eszek: <img class="card-img-top" src="image/Food/<?php $kajaneve = $row["foodtype"]; $pianeve = $row["drinktype"];
  $sql = "SELECT * FROM kaja WHERE name='$kajaneve';";$result = $conn->query($sql);if ($result->num_rows > 0) {$row = $result->fetch_assoc(); echo $row["link"]; } else {  echo "No result";} ?> " alt="Card image cap" style="max-width:50px;width:100%;height:auto;"> Amit iszok :<img class="card-img-top" src="image/Food/<?php
  $sql = "SELECT * FROM kaja WHERE name='$pianeve';";$result = $conn->query($sql);if ($result->num_rows > 0) {$row = $result->fetch_assoc(); echo $row["link"]; } else {  echo "No result";} ?> " alt="Card image cap" style="width:100%;height:auto;max-width:50px;"></li>
    <li class="list-group-item">Achievements: 
	
	
	</li>
    <li class="list-group-item">
	<?php $sql = "SELECT * FROM gyujtemeny WHERE username='$name';"; $result = $conn->query($sql);if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) {	 ?>
		<img class="card-img-top" src="<?php echo $row["href"]; ?>" alt="Card image cap" style="max-width:90px;width:100%;height:auto;"> 
	<?php }
} else {
    echo "0 results";
}?>
	</li>
  </ul>

</div>
<!--  <div class="card">
    <img class="card-img-top" src="image/cat1.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Misiek</h5>
      <p class="card-text">Profleiras</p>
      <p class="card-text"><small class="text-muted">X napos</small></p>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <img class="card-img-top" src="image/Food/kaja1.png" alt="Card image cap" style="max-width:100px;">
	  <img class="card-img-top" src="image/Food/pia1.png" alt="Card image cap" style="max-width:100px;">
    </div>
  </div>
-->
</div>