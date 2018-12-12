
<?php
include_once('db.php');
include_once('session.php');
$loginname=$login_session;
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM teszt2 ;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $i = 1;
    $f = 0;
    $y = 1;
    while ($row = $result->fetch_assoc()) {
        $i = 1;
        $f = $f+25;
        while ( $i <= 50) {

           // echo $row["x".$i]; echo " ";
            ?> <a href="teszt.php?poz=<?php echo $i; ?>&poz2=<?php echo $y; ?>"> <div style="background-color: <?php if ($row["x".$i] ==1 ) { echo "yellow";} else {echo "blue";} ?>;position:fixed;left:<?php echo $i*25; ?>px;top:<?php echo $f; ?>px; height: 25px;width: 25px;" ></div> </a>

            <?php
            $i = $i+1;
        }
        $y=$y +1 ;

    }

}
?>