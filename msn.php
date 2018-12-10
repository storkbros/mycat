<style>
    tr.teszt {
        background-color:#396EFE;
        cursor: pointer;

    }
    td {
        background-color:#e9e9ed	;
        border:none;
        cursor: pointer;
    }
    td.check {
        background-color:#e9e9ed	;
        border:none;
        color: black;
        cursor: pointer;
    }

    th {
        background-color:#b4bcc0;
        border:none;
        color:black;
    }

    table {
        border-collapse: collapse;

    }

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<table style="width:auto;text-align:center;min-width:50%;font-color:#091534">
    <tr class="teszt">
        <th style="width:30px;"><i class="fa fa-envelope-square" style="font-size:24px;"></i></th>
        <th>Feladó</th>
        <th>Téma</th>
        <th style="width:auto;">Dátum</th>
    </tr>

    <?php
    include_once('session.php');
    $loginname=$login_session;

    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_set_charset($conn,"utf8");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM msn WHERE kapname ='$loginname';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td class="check">
                   <?php if ( $row["uj"]== 1) { ?> <i class="fa fa-envelope" style="font-size:24px;color:#091534"></i> <?php } else { ?>
                        <i class="fa fa-envelope-o" style="font-size:24px;color:#091534"></i> <?php } ?>
                <td class="check"><?php echo $row["sendname"]; ?></td>
                <td class="check"><?php echo $row["title"]; ?></td>
                <td class="check"><?php echo $row["date"]; ?></td>
            </tr>

            <?php


        }
    } else { echo "nincs";

    }
    ?>
</table>