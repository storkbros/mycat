<?php
include_once('session.php');
$loginname=$login_session;
include_once 'db.php';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM uquest WHERE username='$loginname';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else { }
$questszam = $row["questszam"];
if( $questszam  > 50 ) {
$sql = "SELECT * FROM gyujtemeny WHERE username='$loginname' AND szint = '2';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
	$azotven = 2;
} else { $azotven = 1;
$title ="50küldetés";
$href ="image/acc/acc1.png";
$leiras = "Gratulalok az 50 teljesített küldetésedhez!";
$sql = "INSERT INTO gyujtemeny ( username,title,href,szint,leiras)
		VALUES ('$loginname','$title','$href','2','$leiras')";
		if ($conn->query($sql) === TRUE) {
			
		} else {
		echo "Error updating record: " . $conn->error;
		}

}

}
if( $questszam  > 100 ) {
$sql = "SELECT * FROM gyujtemeny WHERE username='$loginname' AND szint = '3';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
	$azotven = 2;
} else { $azotven = 10;
$title ="50küldetés";
$href ="image/acc/acc2.png";
$leiras = "Gratulalok az 100 teljesített küldetésedhez!";
$sql = "INSERT INTO gyujtemeny ( username,title,href,szint,leiras)
		VALUES ('$loginname','$title','$href','2','$leiras')";
		if ($conn->query($sql) === TRUE) {
			
		} else {
		echo "Error updating record: " . $conn->error;
		}

}

}	
if( $questszam  > 1000 ) {
$sql = "SELECT * FROM gyujtemeny WHERE username='$loginname' AND szint = '4';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
	$azotven = 2;
} else { $azotven = 100;
$title ="50küldetés";
$href ="image/acc/acc3.png";
$leiras = "Gratulalok az 1000 teljesített küldetésedhez!";
$sql = "INSERT INTO gyujtemeny ( username,title,href,szint,leiras)
		VALUES ('$loginname','$title','$href','2','$leiras')";
		if ($conn->query($sql) === TRUE) {
			
		} else {
		echo "Error updating record: " . $conn->error;
		}

}

}
$sql = "SELECT * FROM gyujtemeny WHERE username='$loginname' AND szint = '5';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
	$top1 = 0;
} else { $top1= 1; 

$sql = "SELECT * FROM users ORDER BY catexp desc LIMIT 1";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); } else { }
 if ( $row["name"] == $loginname ) {
	 echo "be";
	 $title ="Top1";
	$href ="image/acc/acc5.png";
	$leiras = "Te vagy a top1.";
		$top1=3;
	$sql = "INSERT INTO gyujtemeny ( username,title,href,szint,leiras)
		VALUES ('$loginname','$title','$href','5','$leiras')";
		if ($conn->query($sql) === TRUE) {
			
		} else {
		echo "Error updating record: " . $conn->error;
		}

 
 }
 
}

	




$sql = "SELECT * FROM gyujtemeny WHERE username='$loginname';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
	$elsobelepes = 2;
} else { 

$title ="Első belépés";
$href ="image/acc/acc4.png";
$leiras = "Gratulalok az elso belépésedhez.";
$elsobelepes = 1; 
$sql = "INSERT INTO gyujtemeny ( username,title,href,szint,leiras)
		VALUES ('$loginname','$title','$href','1','$leiras')";
		if ($conn->query($sql) === TRUE) {
			
		} else {
		echo "Error updating record: " . $conn->error;
		}





}


?>

<?php if ( $elsobelepes == 1 ) { ?>
<div class="modal fade" id="overlay" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">New achievement!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"><div class="row">
		<div class="col-4"> <img src="image/acc1.png" alt="elso" class="img-thumbnail"></div>
	
		<div class="col"> Köszöntelek a Mycat cica nevelde oldalán. Már el is nyerted az első belépésért járó jutalmad.</div>
</div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?> 


<?php if ( $azotven == 1 ) { ?>
<div class="modal fade" id="overlay" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">New achievement!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"><div class="row">
		<div class="col-4"> <img src="image/acc/acc1.png" alt="elso" class="img-thumbnail"></div>
	
		<div class="col"> Gratulálok az 50 teljesített küldetésedhez!</div>
</div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?> 


<?php if ( $azotven == 10 ) { ?>
<div class="modal fade" id="overlay" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">New achievement!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"><div class="row">
		<div class="col-4"> <img src="image/acc/acc2.png" alt="elso" class="img-thumbnail"></div>
	
		<div class="col"> Gratulálok a 100 teljesített küldetésedhez!</div>
</div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?> 

<?php if ( $azotven == 100 ) { ?>
<div class="modal fade" id="overlay" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">New achievement!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"><div class="row">
		<div class="col-4"> <img src="image/acc/acc3.png" alt="elso" class="img-thumbnail"></div>
	
		<div class="col"> Gratulálok az 1000 teljesített küldetésedhez!</div>
</div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?> 
<?php if ( $top1 == 3 ) { ?>
<div class="modal fade" id="overlay" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">New achievement!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"><div class="row">
		<div class="col-4"> <img src="image/acc/acc5.png" alt="elso" class="img-thumbnail"></div>
	
		<div class="col"> Gratulálok! Az első helyen szerepelsz a ranglistán ezért megkapod az érte járó jutalmat!</div>
</div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?> 


<script>
$('#overlay').modal('show');

setTimeout(function() {
    $('#overlay').modal('hide');
}, 10000);
</script>
