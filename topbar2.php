<?php
include('session.php');
include('time.php');
include('rangcalc.php');
include('db.php');
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

  <style>
 @media screen and (max-width:800px) {
	th {
	font-size:3vw; 
	}
	#fasz {
	font-size:4vw; 
	}
	
	
  }
  
</style>
<body>

<nav class="navbar sticky-top navbar-expand-lg bg-dark navbar-dark" style="height:100%">
    <div class="container">
    <div class="navbar-brand" style="height:36px;">
	  	  <table id="teszt" name="teszt" style="width:100%;margin-top:-10px;">
		<tr style="height:40px;">
			<th><a class="navbar-brand" href="index.php"><img src="catlogo.png" alt="logo" style="width:30px;"></a></th>
			<th><a class="navbar-brand" id="fasz";href="#"style="color:white;">Mycat</a></th> 
			<th style="background-color:#17a2b8;padding:5px;border-radius: 15px 0px 0px 15px;height:30px; "><a href="#" style="background-color:#17a2b8;color:white;height:50px;"><i id="valami" name="valami" class='fas fa-gem' style='font-size:auto;color:white;'></i> <?php echo $bcoin ?></a></th>
			<th style="background-color:#ffc107;padding:5px;height:30px; "><a href="#" style="background-color:#ffc107;color:white;height:50px;"><i id="valami"class='fas fa-gem' style='font-size:auto;color:white;'></i> <?php echo $vipcoin ?></a>  </th>
			<th style="background-color:#E344FF;padding:5px;border-radius: 0px 15px 15px 0px;height:30px;" ><a href="#" style="background-color:#E344FF;color:white;height:50px"><i id="valami" class='fas fa-battery-half' style='font-size:auto;color:white;vertical-align:-2px;'></i><b id="energycount"> <?php echo $row["catenergy"]; ?></b> <b id="energy"></b></a> </th>
			<th>  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
	  </th>
		
		</tr>
	</table>

    </div>
	  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

    <ul class="navbar-nav mr-auto mt-2 mt-lg-0" style="margin-top:5px;">
      <li class="nav-item"style="margin:5px;margin-top:10px;"><a href="#"><i class="material-icons"style="width:25px;color:white;">&#xe7fd;</i> <span class="badge badge-light">0</span></a></li>
		<li class="nav-item"style="margin:5px;margin-top:10px;"><a href="#"><i class="material-icons"style="width:25px;color:white;">&#xe0be;</i> <span class="badge badge-light">0</span></a></li>
		<li class="nav-item"style="margin:5px;margin-top:10px;"><a href="index.php?page=index"><button type="button" class="btn btn-light"style="min-width:100%;margin-top:-5px;color:#333;">MyCat</button> </a></li>
		<li class="nav-item"style="margin:5px;margin-top:10px;"><a href="index.php?page=kocsma"><button type="button" class="btn btn-light"style="min-width:100%;margin-top:-5px;color:#333;">Kocsma</button> </a></li>
        <li class="nav-item"style="margin:5px;margin-top:10px;"><a href="index.php?page=szoba"><button type="button" class="btn btn-light"style="width:100%;margin-top:-5px;color:#333;">Szoba</button></a></li>
		<li class="nav-item"style="margin:5px;margin-top:10px;"><a href="index.php?page=shop"><button type="button" class="btn btn-light"style="width:100%;min-width:100%;margin-top:-5px;color:#333;" >Bolt</button></a></li>
		<li class="nav-item"style="margin:5px;margin-top:10px;"><a href="index.php?page=raktar"><button type="button" class="btn btn-light"style="min-width:100%;margin-top:-5px;color:#333;">Raktár</button></a></li>
		<li class="nav-item"style="margin:5px;margin-top:10px;"><a href="index.php?page=craft"><button type="button" class="btn btn-light"style="min-width:100%;margin-top:-5px;color:#333;">Craft</button></a></li>
	 <li class="nav-item dropdown"style="margin:5px;">
		<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="border-radius: 5px;background-color:#f8f9fa;color:black">
			Info</a>
           <div class="dropdown-menu">
           <a href="index.php?page=forum"><button type="button" class="btn btn-light"style="width:100%;min-width:100%;" >Fórum</button></a>
           <a href="index.php?page=rangok">	<button type="button" class="btn btn-light"style="min-width:100%;">Ranglista</button> </a>
            <a href="index.php?page=rangok">	<button type="button" class="btn btn-light"style="min-width:100%;">Rangok</button> </a>
			<a href="index.php?page=rangok">	<button type="button" class="btn btn-light"style="min-width:100%;"disabled>Achievements</button> </a>
			</div>
        </li>
     <li class="nav-item"style="margin:5px;margin-top:10px;"><a href="logout.php"><button type="button" class="btn btn-danger"style="min-width:100%;margin-top:-5px;color:white;"> <i class='fas fa-sign-out-alt'></i></button></a></li>
    </ul>
    
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
 
