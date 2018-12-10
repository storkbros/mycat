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
<div class="container" style="margin-top:10px;">
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
                    <a href="index.php?page=admin2&olvas=<?php echo $row["id"]; ?>" >     <i class="fa fa-envelope-o" style="font-size:24px;color:#091534"></i> <?php } ?> </a>
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
</div>

<?php if ( $_GET["olvas"] > 0 ) {
$olvas= $_GET["olvas"];
$sql = "SELECT * FROM msn WHERE kapname='$loginname' AND id= '$olvas';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else { }
$itemid = $row["itemid"];
$itemcount = $row["itemcount"];
$itemname= $row["itemname"];
$bcoin = $row["bcoin"];
$vipcoin = $row["vipcoin"];
$status = $row["status"];
$href = $row["href"];
    ?>
    <div class="modal fade" id="overlay" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Üzenet : <?php echo $row["sendname"]; ?>  // <?php echo $row["title"]; ?> // <?php echo $row["date"]; ?> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"><div class="row">
                        <div class="col"> <?php echo $row["szoveg"]; ?> </div>
                    </div>
                    <?php if ($row["itemid"] <> 0 ) { ?>
                        <img class="card-img-top" src="image/Food/<?php echo $href; ?>" alt="Card image" style="width:100%;max-height:245px;max-width:245px;min-height:245px">

                        <?php }?>
                    <br><hr>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Kérem</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Bezárás</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#overlay').modal('show');

    </script>

<?php } ?>



