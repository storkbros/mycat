<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin cuccok</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<?php
    include('../dpc.php');

$sql = "SELECT * FROM system ORDER BY id DESC LIMIT 1; ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if(isset($_POST['version'])){
    echo "he";
        shell_exec("sudo cp -a /var/www/html/teszt/. /var/www/html/");
        $ses_sql = mysqli_query($conn,"INSERT INTO system (verzio, note, date,extra) VALUES ('".$_POST['note']."','".$_POST['note']."',NOW(),'admin page');");
}
?>

<div class="container">
    <form action="index.php" method="post">
        <div class="form-group">
            <label for="version">Version</label>
            <input type="text" class="form-control" id="version" placeholder="last version: <?php echo $row['verzio'] ?>">
        </div>
        <div class="form-group">
            <label for="note">Note</label>
            <input type="text" class="form-control" id="note" placeholder="last note: <?php echo $row['note'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>