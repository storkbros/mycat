<?php
include_once('session.php');
include_once('db.php');
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

	




?>

<div class="container" style="background-color:white;padding-bottom:10px;"> 
<div class="row" style="margin-top:10px;" > 
  <div class="col" > <h2>Forum</h2> </div>
<div class="col" >  <button type="button" style="margin-top:5px" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Írok</button></div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Új üzenet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="forumpost.php" method="post" >
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Téma:</label>
            <select name="type">
					<option value="1"selected>Üzenet</option>
					<option value="2">Bugreport</option>
					<option value="3" >Ötlet</option>
					<option value="4">Egyéb</option>
			</select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Üzenet:</label>
            <textarea class="form-control" id="teszt" name="teszt"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			 <button type="submit" class="btn btn-primary">Send message</button> 
	</form>
      </div>
    </div>
  </div>
</div>
  
  
	<?php 
	$sql = "SELECT * FROM forum ORDER BY id desc";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		?>
  <div class="media border p-3">
    <img src="<?php echo $row["profil"]; echo $row["profilkieg"]; ?>" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
    <div class="media-body" style="width:100%;">
      <h4><?php echo $row["username"]; ?><small><i>  <?php echo $row["datetime"]; ?></i>  Tipus: <?php 
	  if ( $row["tipus"] == 1 ) { echo "üzenet"; } 
	  if ( $row["tipus"] == 2 ) { echo "BUG"; } 
	  if ( $row["tipus"] == 3 ) { echo "Ötlet"; } 
	  if ( $row["tipus"] == 4 ) { echo "Egyéb"; } 
	   if ( $row["tipus"] == 5 ) { echo "BUG-Javítva"; } 
	  ?>
	  </small></h4>
     <span style="display:block;width:80%;word-wrap:break-word;"> <?php echo $row["text"]; ?> </span>   
    </div>
  </div>
	<?php } }?>
  
</div>


