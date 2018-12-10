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

<div class="container"  >
   <div class="col-sm-8" style="background-color: rgba(226, 227, 229, 0.3);padding-bottom:15px;min-width:660px;max-width:660px;"> 
   
   <div class="alert alert-secondary" >
    <strong>Raktáram:</strong></div>
	<div class="row">
	
<?php
include('dpc.php');
mysqli_set_charset($conn,"utf8");
 
$sql = "SELECT raktar.itemid, raktar.itemcount, kaja.id, kaja.tipus, kaja.link, kaja.name 
FROM kaja
INNER JOIN raktar 
ON kaja.id=raktar.itemid
WHERE raktar.name='$login_session';";
$result = $conn->query($sql);
$i=0;
$itemid = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		
		if ( $row[itemcount] > 0 ) {
			
	 ?>
	
	<div class="card" style="width:200px;margin-left:15px;margin-bottom:10px;">
    <img class="card-img-top" src="image/Food/<?php echo $row["link"]; ?>" alt="Card image" style="width:100%;max-height:200px;">
    <div class="card-body">
      <p class="card-text" style="font-weight:bold;"><?php 
	  $da = date("Y-m-d h:i:s");
		echo $row["name"]; ?></p>
    
	<form action="<?php if($row["tipus"] == 1 or $row["tipus"] == 2) {echo "zaba.php"; } if($row["tipus"]==3) { echo "index.php?page=craft";}?> " method="post" style="padding-right:5px;" >  
	  <input type="text" name="itemid" value="<?php echo $row["itemid"]; ?>" hidden >
	  <input type="text" name="tipus" value="<?php echo $row["tipus"]; ?>" hidden >
      <input type="text" name="kajaid" value="<?php echo $row["id"]; ?>" hidden >
	<input type="text" name="food" value="<?php echo $row["name"]; ?>" hidden >
	  <button type="submit" class="btn btn-outline-secondary">
	<?php if( $row["tipus"]=="1" ) { echo "Megeszem"; } if( $row["tipus"]=="2" ) { echo "Megiszom"; }if( $row["tipus"]=="3" ) { echo "Craft"; }	
	?> <span class="badge badge-dark"><?php echo $row["itemcount"]; ?></span>
	<span class="sr-only">darab</span></button> </form>
	  
	
	
	
    </div>
	</div>
	 
	 <?php
		}
	}
}


?>	
	
	
	
	
	
</div>
</div>
</div>
</body>
</html>
