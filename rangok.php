<style>
  body {
      position: relative; 
	  background-image: url("");
	background-color: #cccccc;
	background-repeat: no-repeat;
    background-size: auto;
	 background-attachment: fixed;
	 padding-top:0px;
	 margin-top:0px;
	 
  }
  @media screen and (max-width:800px) {
  #fontos {
	  font-size:3vw;
  }
  #fontos3 {
	  font-size:1vw;
	 

  }

}
  </style>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<?php 
include('session.php'); 
$loginname=$login_session;
?>

	<table class="table table-bordered" style="background-color:white;max-width:1000px;" id="retek" >
    <thead>
      <tr>
        <th id="fontos3"style="text-align: center;">Rang</th>
		<th id="fontos3"style="text-align: center;" >Profil</th>
        <th id="fontos3"style="text-align: center;" >Tulajdonos</th>
        <th id="fontos3"style="text-align: center;" >Macskaneve</th>
		<th id="fontos3"style="text-align: center;" >Szint</th>
		<th id="fontos"style="text-align: center;">Exp</th>
		<th id="fontos"style="text-align: center;" ><i class="material-icons"style="width:25px;">&#xe7fd;</i></th>
      </tr>
    </thead>
    <tbody>
	<?php 
include('dpc.php');
$sql = "SELECT * FROM users ORDER BY catexp desc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
	$i=1;
    while($row = $result->fetch_assoc()) {
		?>
	
	
      <tr <?php if ($loginname == $row["name"]) { ?> style="background-color: rgba(40, 167, 69, 0.4);" <?php } ?>  >
        <td id="fontos" style="text-align: center; font-weight:bold;"><?php echo $i; $i = $i+1; ?></td>
		<td id="fontos" style="text-align: center;"> <img src="<?php echo $row["profkep"]; ?><?php echo $row["profkieg"]; ?>" alt="John Doe" class="" style="width:100%;height:auto;max-width:30px;"></td>
        <td id="fontos" style="text-align: center;"><a href="index.php?page=proff&name=<?php echo $row["name"]; ?>" style="text-decoration: none;color:black" ><?php echo $row["name"]; ?> </a></td>
        <td id="fontos3" style="text-align: center;"><?php echo $row["catname"]; ?></td>
		<td id="fontos" style="text-align: center;"><?php echo $row["catlvl"]; ?></td>
		<td id="fontos" style="text-align: center;"><?php echo $row["catexp"]; ?></td>
		<td id="fontos" style="text-align: center;cursor: pointer;"> <a href="index.php?page=proff&name=<?php echo $row["name"]; ?>" ><i class="material-icons"  style="width:25px;">&#xe7fe;</i></a> </td>
      </tr>
	  
<?php } } ?>
    </tbody>
  </table>
	
	




<table class="table table-bordered" style="background-color: white;max-width:1000px;">
    <thead>
      <tr>
        <th>LvL</th>
        <th>Rang neve</th>
        <th>Szükséges exp</th>
		<th>Rangban lévők:</th>
		
      </tr>
    </thead>
    <tbody>
	<?php 
$servername = "vps.dornyayse.hu";
$username = "misiek";
$password = "19970227";
$dbname = "misiek";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT catlvl FROM users WHERE name='$loginname';";
$result = $conn->query($sql);
$i=0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); 
} else {
    echo "0 results";
}
$catlvl=$row["catlvl"];
$level = 1;
$sql = "SELECT count(*) FROM rang WHERE okstatus ='1';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); 
} else {
    echo "0 results";
}
$osszes = $row['count(*)'];
$i = 1 ;
while ( $i <= $osszes ) {
$sql = "SELECT count(*) FROM users WHERE catlvl='$i';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); 
} else {
    echo "0 results";
}
$valami[$i] = $row['count(*)'];	
$i=$i+1;	
}



 
 
$sql = "SELECT * FROM rang WHERE okstatus='1';";
$result = $conn->query($sql);
$i=0;
if ($result->num_rows > 0) {
    // output data of each row
	$i= 1;
    while($row = $result->fetch_assoc()) {
		?>
	
	
      <tr <?php if ($catlvl == $row["szint"]) { ?> style="background-color: rgba(40, 167, 69, 0.4);" <?php } ?> >
        <td style="text-align: center; font-weight:bold;"><?php echo $row["szint"]; ?></td>
        <td id="fontos" style="text-align: center;"><?php echo $row["rangname"]; ?></td>
        <td style="text-align: center;"><?php echo $row["exp"]; ?></td>
		<td style="text-align: center;"><?php echo $valami[$i]; $i=$i+1;?></td>
      </tr>
	  
<?php } } ?>
    </tbody>
  </table>


    

 <div class="container-fluid">
  <div class="row" style="position:fixed;bottom:0;">
    <div class="col-12" style="background-color:lavender;"><?php echo "ID: ". $row["id"]. " - Verzi�: ". $row["verzio"]. " Date:" . $row["date"] ."" ?></div>
  </div>
</div>
 
 

