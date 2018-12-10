
		<style>
	* {
		box-sizing: border-box;
	}

	.columns {
		float: left;
		width:25%;
		padding: 8px;
	}

	.price {
		list-style-type: none;
		border: 1px solid #eee;
		background-color: rgba(226, 227, 229, 0.7);
		margin: 0;
		padding: 0;
		-webkit-transition: 0.3s;
		transition: 0.3s;
		
	}

	.price:hover {
		box-shadow: 0 15px 15px 0 rgba(255,255,255,0.7)
	}

	.price .header {
		background-color: #111;
		color: white;
		font-size: 25px;

	}

	.price li {
		border-bottom: 1px solid #eee;
		padding: 5px;
		text-align: center;
	}

	.price .grey {
		background-color: #eee;
		font-size: 20px;
	}
	.price1 {
		list-style-type: none;
		border: 1px solid #eee;
		background-color: rgba(226, 227, 229, 0.7);
		margin: 0;
		padding: 0;
		-webkit-transition: 0.3s;
		transition: 0.3s;
		
	}

	.price1:hover {
		box-shadow: 0 20px 20px 0 rgba(226,0,26,0.7)
	}

	.price1 .header {
		background-color: #111;
		color: white;
		font-size: 25px;

	}

	.price1 li {
		border-bottom: 1px solid #eee;
		padding: 5px;
		text-align: center;
	}

	.price1 .grey {
		background-color: #eee;
		font-size: 20px;
	}
	
	@media only screen and (max-width: 600px) {
		.columns {
			width: 100%;
		}
		.col {
			min-width:100%;
		}
	}
	  body {
		  position: relative; 
		background-image: url("image/pub.png");
		background-color: #cccccc;
		background-repeat: no-repeat;
		background-size: cover;
		 background-attachment: fixed;
		 padding-top:0px;
		 margin-top:0px;
		padding-bottom:2rem;}
	  }
	  
	  
	</style>

	
	<?php 
	
	include('session.php');
	include('questtime.php');
	include('energytest.php');
	include('db.php');
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	mysqli_set_charset($conn,"utf8");
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$userteszt = $_SESSION['login_user'];
	$sql = "SELECT * FROM uquest WHERE status='1' AND username='$userteszt';";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) { $row = $result->fetch_assoc(); 
	} else{ 
	}
	if ( $row["active"]== 1 ) {  } else { }  
	$idoke=$row["questtime"];
	$idokemax=$row["questtimemax"];
	$aktiv=$row["active"];
	$aktivq = $row["activequest"];
	$q1 = $row["q1"];
	$q2 = $row["q2"];
	$q3 = $row["q3"];
	$q4 = $row["q4"];
	$q5 = $row["q5"];
	$itemid = $row["itemid"];
	$itemcount = $row["itemcount"];
	
	$sql = "SELECT * FROM kaja WHERE tipus ='3' AND id='$itemid';";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) { $row = $result->fetch_assoc(); 
	} else{ 
	}

	?>
	 <div class="container-fluid" style="margin-top:20px">
  <div class="row">
	
  
 


 
	<?php $block=1; 
	//blokkos 
	$sql = "SELECT * FROM quest WHERE extraid = '$q1' and extra = '1';";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) { $row = $result->fetch_assoc(); }
	$idothis = $row["ido"];
	$aa= floor($idothis/600);
	$bb = floor($idothis/60);
	$cc = $idothis-($bb*60); 
	$kk = "";
	if ( $cc < 10 ) { $kk = "0";}
	$idos = "Munka ideje: ".$bb.":".$kk."".$cc."";

	
	?>
	
	
	
	
	
	 <div class="col-3" id="valami" style="min-width:280px;width:100%;">
	  <ul class="price<?php if($aktiv == 1 and $block <> $aktivq ){ echo 1; } ?>" style="min-width:260px;"> 
		<li class="header"><?php echo $row["name"]; ?></li>
		
		<li class="grey"><button type="button" class="btn btn-info" style="font-weight: bold;"><i class='fas fa-gem' style='font-size:20px;color:white;'></i> +<?php echo $row["bcoin"]; ?></button>
		<button type="button" class="btn btn" style="font-weight: bold;color:white;background-color:#E344FF;"><i class='fas fa-battery-half' style='font-size:20px;color:white;vertical-align:-2px;'></i> -<?php echo $row["energy"]; ?> </button>
		<button type="button" class="btn btn" style="font-weight: bold;color:black;background-color:#white;"><?php echo $row["exp"]; ?> <img src="image/exp.png" alt="exp" height="20" width="25"> </button>
		</li>
		<li style="padding:5px"><img src="image/quest/<?php echo $row["link"]; ?>" class="img-responsive" alt="quest" width="100%" style="max-height:auto;"> </li>
		<?php 
		$itemid = $row["itemid"];
		$itemcount = $row["itemcount"];
		$sql = "SELECT * FROM kaja WHERE tipus ='3' AND id='$itemid';";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) { $row = $result->fetch_assoc(); 
			}		 else{
			} 
			?>
		
		<li style="padding:5px;font-weight:bold;"> + <?php echo $itemcount; ?> <?php echo $row["name"]; ?><img src="image/Food/<?php echo $row["link"]; ?>" class="img-responsive" alt="quest" width="40px" height="40px"> </li>
		<?php
			$sql = "SELECT * FROM quest WHERE extraid = '$q1' and extra = '1';";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) { $row = $result->fetch_assoc(); }
		?>
		<li style="padding:5px"><div style="text-align: center;width:100%;height:100%;background-color:rgba(226, 227, 229, 0.7)"> 
		<?php echo $row["leiras"]; ?>
		</div></li>
		 <div class="alert alert-secondary" style=" text-align: center;">
			 <strong id="ido<?php if ($aktiv == 1 and $aktivq <> $block ) { echo "1"; } ?>" ><?php echo $idos ?></strong> 
		 </div>
		
		<?php if( $aktiv == 1 and $aktivq == $block ) { ?> <li id="teszt" >
		<progress value="0" max="<?php echo $idokemax; ?>" id="progressBar" style="visibility: visible;"></progress></li>
		<?php } ?> 
		<li class="grey">
		
		<?php if ( $aktivq == $block ) { 
		?> <div id="mydivtag"></div> <?php 
		} else { 
		if ( $myenergy < $row["energy"] ) { ?><button type="button" class="btn btn-danger" style="font-weight: bold;color:white;" disabled><i class='fas fa-battery-half' style='font-size:20px;color:white;vertical-align:-2px;'></i> <?php echo ($myenergy-$row["energy"]); ?> </button>       <?php }
		if ( $aktiv == 0 and $myenergy >= $row["energy"] ) {
			
			?> 
		
		<form action="questsystem.php" method="post" style="padding-right:5px;" >  
			<input type="text" name="block" value="<?php echo $block; ?>" hidden >
			<input type="text" name="id" value="<?php echo $row["id"]; ?>" hidden >
			<input type="text" name="itemid" value="<?php echo $row["itemid"]; ?>" hidden >
			<input type="text" name="itemcount" value="<?php echo $row["itemcount"]; ?>" hidden >
			<input type="text" name="energy" value="<?php echo $row["energy"]; ?>" hidden >
		<button type="submit" class="btn btn-primary" style="min-width:100px;"
		<?php if ( $aktivq <> $block and $aktiv == 1 ) { echo "disabled";} ?>
		>Start</button>  </form>
		<?php } }
		if ( $aktivq == $block and $aktiv == 1 ) { ?>
		<div id="mydivtag"></div> <?php } ?>
		</li>
		
		
	  </ul>
	</div>

 
 
	<?php $block=2; 
	//blokkos 
	$sql = "SELECT * FROM quest WHERE extraid = '$q2' and extra = '1';";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) { $row = $result->fetch_assoc(); }
	$idothis = $row["ido"];
	$aa= floor($idothis/600);
	$bb = floor($idothis/60);
	$cc = $idothis-($bb*60); 
	$kk = "";
	if ( $cc < 10 ) { $kk = "0";}
	$idos = "Munka ideje: ".$bb.":".$kk."".$cc."";

	
	?>
	
	
	
	
	
	 <div class="col-3" id="valami" style="min-width:280px;width:100%;">
	  <ul class="price<?php if($aktiv == 1 and $block <> $aktivq ){ echo 1; } ?>" style="min-width:260px;"> 
		<li class="header"><?php echo $row["name"]; ?></li>
		
		<li class="grey"><button type="button" class="btn btn-info" style="font-weight: bold;"><i class='fas fa-gem' style='font-size:20px;color:white;'></i> +<?php echo $row["bcoin"]; ?></button>
		<button type="button" class="btn btn" style="font-weight: bold;color:white;background-color:#E344FF;"><i class='fas fa-battery-half' style='font-size:20px;color:white;vertical-align:-2px;'></i> -<?php echo $row["energy"]; ?> </button>
		<button type="button" class="btn btn" style="font-weight: bold;color:black;background-color:#white;"><?php echo $row["exp"]; ?> <img src="image/exp.png" alt="exp" height="20" width="25"> </button>
		</li>
		<li style="padding:5px"><img src="image/quest/<?php echo $row["link"]; ?>" class="img-responsive" alt="quest" width="100%" style="max-height:auto;"> </li>
		<?php 
		$itemid = $row["itemid"];
		$itemcount = $row["itemcount"];
		$sql = "SELECT * FROM kaja WHERE tipus ='3' AND id='$itemid';";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) { $row = $result->fetch_assoc(); 
			}		 else{
			} 
			
			?>
		
		<li style="padding:5px;font-weight:bold;"> + <?php echo $itemcount; ?> <?php echo $row["name"]; ?><img src="image/Food/<?php echo $row["link"]; ?>" class="img-responsive" alt="quest" width="40px" height="40px"> </li>
		<?php
			$sql = "SELECT * FROM quest WHERE extraid = '$q2' and extra = '1';";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) { $row = $result->fetch_assoc();  }
		?>
		<li style="padding:5px"><div style="text-align: center;width:100%;height:100%;background-color:rgba(226, 227, 229, 0.7)"> 
		<?php echo $row["leiras"]; ?>
		</div></li>
		 <div class="alert alert-secondary" style=" text-align: center;">
			 <strong id="ido<?php if ($aktiv == 1 and $aktivq <> $block ) { echo "1"; } ?>" ><?php echo $idos ?></strong> 
		 </div>
		
		<?php if( $aktiv == 1 and $aktivq == $block ) { ?> <li id="teszt" >
		<progress value="0" max="<?php echo $idokemax; ?>" id="progressBar" style="visibility: visible;"></progress></li>
		<?php } ?> 
		<li class="grey">
		
		<?php if ( $aktivq == $block ) { 
		?> <div id="mydivtag"></div> <?php 
		} else { 
		if ( $myenergy < $row["energy"] ) { ?><button type="button" class="btn btn-danger" style="font-weight: bold;color:white;" disabled><i class='fas fa-battery-half' style='font-size:20px;color:white;vertical-align:-2px;'></i> <?php echo ($myenergy-$row["energy"]); ?> </button>       <?php }
		if ( $aktiv == 0 and $myenergy >= $row["energy"] ) {
			
			?> 
		
		<form action="questsystem.php" method="post" style="padding-right:5px;" >  
			<input type="text" name="block" value="<?php echo $block; ?>" hidden >
			<input type="text" name="id" value="<?php echo $row["id"]; ?>" hidden >
			
			<input type="text" name="itemid" value="<?php echo $row["itemid"]; ?>" hidden >
			<input type="text" name="itemcount" value="<?php echo $row["itemcount"]; ?>" hidden ><input type="text" name="energy" value="<?php echo $row["energy"]; ?>" hidden >
		<button type="submit" class="btn btn-primary" style="min-width:100px;"
		<?php if ( $aktivq <> $block and $aktiv == 1 ) { echo "disabled";} ?>
		>Start</button>  </form>
		<?php } }
		if ( $aktivq == $block and $aktiv == 1 ) { ?>
		<div id="mydivtag"></div> <?php } ?>
		</li>
		
		
	  </ul>
	</div>
	
 
	<?php $block=3; 
	//blokkos 
	$sql = "SELECT * FROM quest WHERE extraid = '$q3' and extra = '2';";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) { $row = $result->fetch_assoc(); }
	$idothis = $row["ido"];
	$aa= floor($idothis/600);
	$bb = floor($idothis/60);
	$cc = $idothis-($bb*60); 
	$kk = "";
	if ( $cc < 10 ) { $kk = "0";}
	$idos = "Munka ideje: ".$bb.":".$kk."".$cc."";

	
	?>
	
	
	
	
	
	 <div class="col-3" id="valami" style="min-width:280px;width:100%;">
	  <ul class="price<?php if($aktiv == 1 and $block <> $aktivq ){ echo 1; } ?>" style="min-width:260px;"> 
		<li class="header"><?php echo $row["name"]; ?></li>
		
		<li class="grey"><button type="button" class="btn btn-info" style="font-weight: bold;"><i class='fas fa-gem' style='font-size:20px;color:white;'></i> +<?php echo $row["bcoin"]; ?></button>
		<button type="button" class="btn btn" style="font-weight: bold;color:white;background-color:#E344FF;"><i class='fas fa-battery-half' style='font-size:20px;color:white;vertical-align:-2px;'></i> -<?php echo $row["energy"]; ?> </button>
		<button type="button" class="btn btn" style="font-weight: bold;color:black;background-color:#white;"><?php echo $row["exp"]; ?> <img src="image/exp.png" alt="exp" height="20" width="25"> </button>
		</li>
		<li style="padding:5px"><img src="image/quest/<?php echo $row["link"]; ?>" class="img-responsive" alt="quest" width="100%" style="max-height:auto;"> </li>
		<?php 
		$itemid = $row["itemid"];
		$itemcount = $row["itemcount"];
		$sql = "SELECT * FROM kaja WHERE tipus ='3' AND id='$itemid';";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) { $row = $result->fetch_assoc(); 
			}		 else{
			} ?>
		
		<li style="padding:5px;font-weight:bold;"> + <?php echo $itemcount; ?> <?php echo $row["name"]; ?><img src="image/Food/<?php echo $row["link"]; ?>" class="img-responsive" alt="quest" width="40px" height="40px"> </li>
		<?php
			$sql = "SELECT * FROM quest WHERE extraid = '$q3' and extra = '2';";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) { $row = $result->fetch_assoc(); }
		?>
		<li style="padding:5px"><div style="text-align: center;width:100%;height:100%;background-color:rgba(226, 227, 229, 0.7)"> 
		<?php echo $row["leiras"]; ?>
		</div></li>
		 <div class="alert alert-secondary" style=" text-align: center;">
			 <strong id="ido<?php if ($aktiv == 1 and $aktivq <> $block ) { echo "1"; } ?>" ><?php echo $idos ?></strong> 
		 </div>
		
		<?php if( $aktiv == 1 and $aktivq == $block ) { ?> <li id="teszt" >
		<progress value="0" max="<?php echo $idokemax; ?>" id="progressBar" style="visibility: visible;"></progress></li>
		<?php } ?> 
		<li class="grey">
		
		<?php if ( $aktivq == $block ) { 
		?> <div id="mydivtag"></div> <?php 
		} else { 
		if ( $myenergy < $row["energy"] ) { ?><button type="button" class="btn btn-danger" style="font-weight: bold;color:white;" disabled><i class='fas fa-battery-half' style='font-size:20px;color:white;vertical-align:-2px;'></i> <?php echo ($myenergy-$row["energy"]); ?> </button>       <?php }
		if ( $aktiv == 0 and $myenergy >= $row["energy"] ) {
			
			?> 
		
		<form action="questsystem.php" method="post" style="padding-right:5px;" >  
			<input type="text" name="block" value="<?php echo $block; ?>" hidden >
			<input type="text" name="id" value="<?php echo $row["id"]; ?>" hidden >
			
			<input type="text" name="itemid" value="<?php echo $row["itemid"]; ?>" hidden >
			<input type="text" name="itemcount" value="<?php echo $row["itemcount"]; ?>" hidden ><input type="text" name="energy" value="<?php echo $row["energy"]; ?>" hidden >
		<button type="submit" class="btn btn-primary" style="min-width:100px;"
		<?php if ( $aktivq <> $block and $aktiv == 1 ) { echo "disabled";} ?>
		>Start</button>  </form>
		<?php } }
		if ( $aktivq == $block and $aktiv == 1 ) { ?>
		<div id="mydivtag"></div> <?php } ?>
		</li>
		
		
	  </ul>
	</div>
	
 
	<?php $block=4; 
	//blokkos 
	$sql = "SELECT * FROM quest WHERE extraid = '$q4' and extra = '2';";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) { $row = $result->fetch_assoc(); }
	$idothis = $row["ido"];
	$aa= floor($idothis/600);
	$bb = floor($idothis/60);
	$cc = $idothis-($bb*60); 
	$kk = "";
	if ( $cc < 10 ) { $kk = "0";}
	$idos = "Munka ideje: ".$bb.":".$kk."".$cc."";

	
	?>
	
	
	
	
	
	 <div class="col-3" id="valami" style="min-width:280px;width:100%;">
	  <ul class="price<?php if($aktiv == 1 and $block <> $aktivq ){ echo 1; } ?>" style="min-width:260px;"> 
		<li class="header"><?php echo $row["name"]; ?></li>
		
		<li class="grey"><button type="button" class="btn btn-info" style="font-weight: bold;"><i class='fas fa-gem' style='font-size:20px;color:white;'></i> +<?php echo $row["bcoin"]; ?></button>
		<button type="button" class="btn btn" style="font-weight: bold;color:white;background-color:#E344FF;"><i class='fas fa-battery-half' style='font-size:20px;color:white;vertical-align:-2px;'></i> -<?php echo $row["energy"]; ?> </button>
		<button type="button" class="btn btn" style="font-weight: bold;color:black;background-color:#white;"><?php echo $row["exp"]; ?> <img src="image/exp.png" alt="exp" height="20" width="25"> </button>
		</li>
		<li style="padding:5px"><img src="image/quest/<?php echo $row["link"]; ?>" class="img-responsive" alt="quest" width="100%" style="max-height:auto;"> </li>
		<?php 
		$itemid = $row["itemid"];
		$itemcount = $row["itemcount"];
		$sql = "SELECT * FROM kaja WHERE tipus ='3' AND id='$itemid';";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) { $row = $result->fetch_assoc(); 
			}		 else{
			} ?>
		
		<li style="padding:5px;font-weight:bold;"> + <?php echo $itemcount; ?> <?php echo $row["name"]; ?><img src="image/Food/<?php echo $row["link"]; ?>" class="img-responsive" alt="quest" width="40px" height="40px"> </li>
		<?php
			$sql = "SELECT * FROM quest WHERE extraid = '$q4' and extra = '2';";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) { $row = $result->fetch_assoc(); }
		?>
		<li style="padding:5px"><div style="text-align: center;width:100%;height:100%;background-color:rgba(226, 227, 229, 0.7)"> 
		<?php echo $row["leiras"]; ?>
		</div></li>
		 <div class="alert alert-secondary" style=" text-align: center;">
			 <strong id="ido<?php if ($aktiv == 1 and $aktivq <> $block ) { echo "1"; } ?>" ><?php echo $idos ?></strong> 
		 </div>
		
		<?php if( $aktiv == 1 and $aktivq == $block ) { ?> <li id="teszt" >
		<progress value="0" max="<?php echo $idokemax; ?>" id="progressBar" style="visibility: visible;"></progress></li>
		<?php } ?> 
		<li class="grey">
		
		<?php if ( $aktivq == $block ) { 
		?> <div id="mydivtag"></div> <?php 
		} else { 
		if ( $myenergy < $row["energy"] ) { ?><button type="button" class="btn btn-danger" style="font-weight: bold;color:white;" disabled><i class='fas fa-battery-half' style='font-size:20px;color:white;vertical-align:-2px;'></i> <?php echo ($myenergy-$row["energy"]); ?> </button>       <?php }
		if ( $aktiv == 0 and $myenergy >= $row["energy"] ) {
			
			?> 
		
		<form action="questsystem.php" method="post" style="padding-right:5px;" >  
			<input type="text" name="block" value="<?php echo $block; ?>" hidden >
			<input type="text" name="id" value="<?php echo $row["id"]; ?>" hidden >
			
			<input type="text" name="itemid" value="<?php echo $row["itemid"]; ?>" hidden >
			<input type="text" name="itemcount" value="<?php echo $row["itemcount"]; ?>" hidden ><input type="text" name="energy" value="<?php echo $row["energy"]; ?>" hidden >
		<button type="submit" class="btn btn-primary" style="min-width:100px;"
		<?php if ( $aktivq <> $block and $aktiv == 1 ) { echo "disabled";} ?>
		>Start</button>  </form>
		<?php } }
		if ( $aktivq == $block and $aktiv == 1 ) { ?>
		<div id="mydivtag"></div> <?php } ?>
		</li>
		
		
	  </ul>
	</div>
	
	</div>
	</div>

	<?php 
	
	?>

	<?php 
	
	if ( $aktiv == 1 ) { 
	$idosav = $idokemax -$idoke;
	
	?>
	<script type="text/javascript">


	var timeleft = <?php echo $idoke; ?>;
	var downloadTimer = setInterval(function(){

	var d = Math.floor(timeleft/600);
	  document.getElementById("progressBar").value = (<?php echo $idoke; ?> - --timeleft)+<?php echo $idosav; ?>;
		var c = Math.floor(timeleft);
		var c = Math.floor(timeleft/60);
		var e = timeleft-(c*60);
		var k = "";
	if ( e < 10 ) { k = "0";}
	  document.getElementById("ido").innerHTML = d+""+c+":"+k+""+e;
	  if(timeleft <= 0) {
		 document.getElementById('mydivtag').innerHTML = "<a href='qend.php'><button type='button' class='btn btn-success' style='min-width:100px;'>Kész</button></a>";
		clearInterval(downloadTimer);
		document.getElementById("ido").innerHTML = "";
		document.getElementById("progressBar").style.visibility = "hidden";
		document.getElementById("teszt").style.height = "0px";
		
	}
	},1000);
	</script>
	
	<?php } ?>

