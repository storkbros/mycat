<?php
require_once $dir . "system/db/user.php";
$dalyfirst = $user["napielso"];
$dalybe = $user["napielsobe"];
$jutalom = $user["catexp"];
$date = date('Y-m-d');
$nameee = $user["name"];
$daly = 0;
if ($dalyfirst <> $date) {
    $jutalom = $jutalom + 5;
    $sql = " UPDATE users SET napielsobe = '1',napielso = '$date', catexp = '$jutalom' WHERE name ='" . $user['name'] . "' ;";
    if ($conn->query($sql) === TRUE) {
        $daly = 1;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$sql = "SELECT * FROM uquest WHERE username='$nameee';";
$result = $conn->query($sql);
$row = '';
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
}
$questszam = $row["questszam"];
if ($questszam > 50) {
    $sql = "SELECT * FROM gyujtemeny WHERE username='$nameee' AND szint = '2';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $azotven = 2;
    } else {
        $azotven = 1;
        $title = "50küldetés";
        $href = "image/acc/acc1.png";
        $leiras = "Gratulalok az 50 teljesített küldetésedhez!";
        $sql = "INSERT INTO gyujtemeny ( username,title,href,szint,leiras)
		VALUES ('$nameee','$title','$href','2','$leiras')";
        if ($conn->query($sql) === TRUE) {

        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}
if ($questszam > 100) {
    $sql = "SELECT * FROM gyujtemeny WHERE username='$nameee' AND szint = '3';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $azotven = 2;
    } else {
        $azotven = 10;
        $title = "50küldetés";
        $href = "image/acc/acc2.png";
        $leiras = "Gratulalok az 100 teljesített küldetésedhez!";
        $sql = "INSERT INTO gyujtemeny ( username,title,href,szint,leiras)
		VALUES ('$nameee','$title','$href','2','$leiras')";
        if ($conn->query($sql) === TRUE) {
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}
if ($questszam > 1000) {
    $sql = "SELECT * FROM gyujtemeny WHERE username='$nameee' AND szint = '4';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $azotven = 2;
    } else {
        $azotven = 100;
        $title = "50küldetés";
        $href = "image/acc/acc3.png";
        $leiras = "Gratulalok az 1000 teljesített küldetésedhez!";
        $sql = "INSERT INTO gyujtemeny ( username,title,href,szint,leiras)
		VALUES ('$nameee','$title','$href','2','$leiras')";
        if ($conn->query($sql) === TRUE) {
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}
$sql = "SELECT * FROM gyujtemeny WHERE username='$nameee' AND szint = '5';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $top1 = 0;
} else {
    $top1 = 1;

    $sql = "SELECT * FROM users ORDER BY catexp desc LIMIT 1";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
    }
    if ($row["name"] == $loginname) {
        echo "be";
        $title = "Top1";
        $href = "image/acc/acc5.png";
        $leiras = "Te vagy a top1.";
        $top1 = 3;
        $sql = "INSERT INTO gyujtemeny ( username,title,href,szint,leiras)
		VALUES ('$nameee','$title','$href','5','$leiras')";
        if ($conn->query($sql) === TRUE) {
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}
$sql = "SELECT * FROM gyujtemeny WHERE username='$nameee';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $elsobelepes = 2;
} else {
    $title = "Első belépés";
    $href = "image/acc/acc4.png";
    $leiras = "Gratulalok az elso belépésedhez.";
    $elsobelepes = 1;
    $sql = "INSERT INTO gyujtemeny ( username,title,href,szint,leiras)
		VALUES ('$nameee','$title','$href','1','$leiras')";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

