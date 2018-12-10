


<div class="container-fluid" style="max-width:1000px;margin-top:5px;">
  <div class="row">
    <div class="col-sm" style="">
<?php 
define('TIMEZONE', 'Europe/Paris');
date_default_timezone_set(TIMEZONE);
include_once("db.php");
$dalyfirst= $row["napielso"];
$dalybe = $row["napielsobe"];
$jutalom = $row["catexp"];
$date = date('Y-m-d');
$nameee= $row["name"];
$daly=0;
if ( $dalyfirst <> $date ) {
	$conn = new mysqli($servername, $username, $password, $dbname);
	mysqli_set_charset($conn,"utf8");
	$jutalom = $jutalom + 5;
	$sql =" UPDATE users SET napielsobe = '1',napielso = '$date', catexp = '$jutalom' WHERE name ='$userteszt' ;";
	if ($conn->query($sql) === TRUE) { 
		$daly = 1;
 } else { 
			
    echo "Error updating record: " . $conn->error;
	
 }
 }




?>
<?php if ( $daly == 1 ) { ?>
<div class="alert alert-info alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Üdv újra itt!</strong> Jutalmad 5xp.
</div>
<?php } ?> 


<div class="card" style="">
	
    <img class="card-img-top" src="<?php echo $row["profkep"];echo $row["profkieg"];?>" alt="Card image" style="width:100;">
    <div class="card-body">
      <h4 class="card-title"><?php echo $row["catname"] ?></h4>
      <p class="card-text">
	 <a href="index.php?page=rangok" > <button type="button" class="btn btn-light">A te rangod:  <?php echo $row["catrang"]; echo " (".$row["catlvl"].")";   ?></button> </a></p>
	  <div class="progress">
	<div class="progress-bar bg-info" style="width:<?php echo $bx; ?>%;"><?php echo $bx; ?>%</div></div>
	  <p class="card-text"style="vertical-align:center;">Következő rang : <?php echo $cx; echo "xp ("; echo $kovirangexp; echo "xp /"; echo $row["catexp"]; echo "xp )"; ?></p>

</div>
</div>

<?php

?>
</div>   <div class="col-sm" style="">
<div class="card" style="min-width:330px;">
    <div class="card-body">
      <div class="alert alert-success"><strong>Étel: </strong><?php echo $row["foodtype"]." 10/".$row["foodcount"]; ?></div>
	  <div class="alert alert-light">
	
     	<?php if ( $row["foodcount"]>= 1 ) { ?> <img src="image/kaja.png" class="rounded" alt="food"style="max-height:2px;max-width:22px;"> <?php } else { ?>
	<img src="image/kajaures.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } ?>
	<?php if ( $row["foodcount"]>= 2 ) { ?> <img src="image/kaja.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } else { ?>
	<img src="image/kajaures.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } ?>
	<?php if ( $row["foodcount"]>= 3 ) { ?> <img src="image/kaja.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } else { ?>
	<img src="image/kajaures.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } ?>
	<?php if ( $row["foodcount"]>= 4 ) { ?> <img src="image/kaja.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } else { ?>
	<img src="image/kajaures.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } ?>
	<?php if ( $row["foodcount"]>= 5 ) { ?> <img src="image/kaja.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } else { ?>
	<img src="image/kajaures.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } ?>
	<?php if ( $row["foodcount"]>= 6 ) { ?> <img src="image/kaja.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } else { ?>
	<img src="image/kajaures.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } ?>
	<?php if ( $row["foodcount"]>= 7 ) { ?> <img src="image/kaja.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } else { ?>
	<img src="image/kajaures.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } ?>
	<?php if ( $row["foodcount"]>= 8 ) { ?> <img src="image/kaja.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } else { ?>
	<img src="image/kajaures.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } ?>
	<?php if ( $row["foodcount"]>= 9 ) { ?> <img src="image/kaja.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } else { ?>
	<img src="image/kajaures.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } ?>
	<?php if ( $row["foodcount"]>= 10 ) { ?> <img src="image/kaja.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } else { ?>
	<img src="image/kajaures.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } ?>
	  </div>
	  
	  <div class="alert alert-success"><strong>Ital: </strong><?php echo $row["drinktype"]." 10/".$row["drinkcount"]; ?></div>
	  <div class="alert alert-light">
      
     	<?php if ( $row["drinkcount"]>= 1 ) { ?> <img src="image/kola.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } else { ?>
	<img src="image/kolaures.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } ?>
	<?php if ( $row["drinkcount"]>= 2 ) { ?> <img src="image/kola.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } else { ?>
	<img src="image/kolaures.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } ?>
	<?php if ( $row["drinkcount"]>= 3 ) { ?> <img src="image/kola.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } else { ?>
	<img src="image/kolaures.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } ?>
	<?php if ( $row["drinkcount"]>= 4 ) { ?> <img src="image/kola.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } else { ?>
	<img src="image/kolaures.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } ?>
	<?php if ( $row["drinkcount"]>= 5 ) { ?> <img src="image/kola.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } else { ?>
	<img src="image/kolaures.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } ?>
	<?php if ( $row["drinkcount"]>= 6 ) { ?> <img src="image/kola.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } else { ?>
	<img src="image/kolaures.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } ?>
	<?php if ( $row["drinkcount"]>= 7 ) { ?> <img src="image/kola.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } else { ?>
	<img src="image/kolaures.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } ?>
	<?php if ( $row["drinkcount"]>= 8 ) { ?> <img src="image/kola.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } else { ?>
	<img src="image/kolaures.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } ?>
	<?php if ( $row["drinkcount"]>= 9 ) { ?> <img src="image/kola.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } else { ?>
	<img src="image/kolaures.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } ?>
	<?php if ( $row["drinkcount"]>= 10 ) { ?> <img src="image/kola.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } else { ?>
	<img src="image/kolaures.png" class="rounded" alt="food"style="max-height:22px;max-width:22px;"> <?php } ?>
	

	 
	  </div>
</div>
</div>

 </div>
</div>
 

</div>