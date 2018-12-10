<?php
include_once('session.php');
include('time.php');
include('rangcalc.php');
include_once('db.php');
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$userteszt = $_SESSION['login_user'];
$sql = "SELECT * FROM users WHERE name='$userteszt'; ";
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
$bcoin=$row[bcoin];
$vipcoin=$row[vipcoin];



?>


	<nav class="navbar sticky-top navbar-expand-sm bg-dark navbar-dark" style="width:100%;" >
	
	<div class="container-fluid" >
	<div class="row">
	<a class="navbar-brand" href="index.php"><img src="catlogo.png" alt="logo" style="width:40px;"></a>
	<div class="col"  > 
	
	<button type="button" class="btn btn-success" style="margin-left:10px;width:100%;" ><?php echo $userteszt ?></button>
	</div>	

		<div class="col" > 
		 
		
		<table style="width:100%">
		<tr>
		<th><button type="button" class="btn btn-info" style="font-weight: bold;min-width:100%;"><i class='fas fa-gem' style='font-size:20px;color:white;'></i> <?php echo $bcoin ?></button></th>
		<th><button type="button" class="btn btn-warning" style="font-weight: bold; color:white;min-width:100%;"><i class='fas fa-gem' style='font-size:20px;color:white;'></i> <?php echo $vipcoin ?></button></th> 
		<th><button type="button" class="btn btn" style="font-weight: bold;color:white; background-color:#E344FF;min-width:100%;"><i class='fas fa-battery-half' style='font-size:20px;color:white;vertical-align:-2px;'></i> <b id="energycount"><?php echo $row["catenergy"]; ?></b> <b id="energy"></b> </button></th>
		</tr>
		</table>	
		
		
		
		</div>	
	
		
		<div class="col" > 
		<table style="width:100%">
		<tr>
		<th><a href="index.php"><button type="button" class="btn btn-secondary"style="min-width:100%;">MyCat</button> </a></th> 
		<th><a href="index.php?page=rangok">	<button type="button" class="btn btn-light"style="min-width:100%;">TopList</button> </a></th>
		<th><a href="index.php?page=kocsma">	<button type="button" class="btn btn-light"style="min-width:100%;">Kocsma</button> </a></th>
		
		<th><a href="raktaram.php"><button type="button" class="btn btn-light"style="min-width:100%;">Raktár</button></a></th>
		</tr>
		
		</table>
		</div>
		
		<div class="col" > 
		<table style="width:100%">
		<tr>
		<th><a href="index.php?page=szoba"><button type="button" class="btn btn-light"style="width:100%;"<?php if($row["userRang"]==3 ) { echo "disabled"; } ?>>Szoba</button></a> </th>
		<th><a href="index.php?page=shop"><button type="button" class="btn btn-light"style="width:100%;min-width:100%;" >Bolt</button></a></th>
		<th><a href="index.php?page=forum"><button type="button" class="btn btn-light"style="width:100%;min-width:100%;" >Fórum</button></a></th>

		<th><a href = "logout.php"><button type="button" class="btn btn-danger"style="width:100%;min-width:100%;" >Logout</button></a></th>
		</tr>
		</table>
		</div>
		</div>
		
	</div>
	

  </nav>



<?php 

if ( $row["catenergy"] < 100 ) {
?>
<script type="text/javascript">


	var timeleft2 = <?php echo $tkovienergy; ?>;
	var valami = 0;
	var downloadTimer2 = setInterval(function(){
	var d = Math.floor(timeleft2/600);
	   <?php echo $tkovienergy; ?> - --timeleft2;
		var c = Math.floor(timeleft2);
		var c = Math.floor(timeleft2/60);
		var e = timeleft2-(c*60);
		var k = "";
	if ( e < 10 ) { k = "0";}
	  document.getElementById("energy").innerHTML = ""+c+":"+k+""+e;
	  if(timeleft2 <= 0) {	 
		timeleft2 = 600;
		valami = valami +1;
		if ( valami < 100 ) {
		 szar =  <?php echo $row["catenergy"]; ?> + valami;
		document.getElementById("energycount").innerHTML =szar;
		}
	}
	},1050);
	</script>
<?php } ?>	
 
