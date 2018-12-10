<?php 
include 'dbc.php';
$sql = "SELECT usr FROM userlogin";
$result = $conn->query($sql);
$i=0;
if ($result->num_rows > 0) {
       echo "<br> id: ". $row["id"]. " - Name: ". $row["user_name"]. " " . $row["user_pass"] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>