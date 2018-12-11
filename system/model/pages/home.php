<?php
$dalyfirst= $row["napielso"];
$dalybe = $row["napielsobe"];
$jutalom = $row["catexp"];
$date = date('Y-m-d');
$nameee= $row["name"];
$daly=0;
if ( $dalyfirst <> $date ) {
    $jutalom = $jutalom + 5;
    $sql =" UPDATE users SET napielsobe = '1',napielso = '$date', catexp = '$jutalom' WHERE name ='$userteszt' ;";
    if ($conn->query($sql) === TRUE) {
        $daly = 1;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

