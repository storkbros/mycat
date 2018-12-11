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
        text-decoration: none;
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
     <div class="row" >
         <div class ="col-6">
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
    $olvas=0;
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
                    <a href="index.php?page=msn&olvas=<?php echo $row["id"]; ?>" >     <i class="fa fa-envelope-o" style="font-size:24px;color:#091534"></i> <?php } ?> </a>
                <td class="check"> <a href="index.php?page=msn&olvas=<?php echo $row["id"]; ?>" ><?php echo $row["sendname"]; ?></a></td>
                <td class="check"> <a href="index.php?page=msn&olvas=<?php echo $row["id"]; ?>" ><?php echo $row["title"]; ?></a></td>
                <td class="check"> <a href="index.php?page=msn&olvas=<?php echo $row["id"]; ?>" ><?php echo $row["date"]; ?></a></td>
            </tr>





            <?php


        }
    } else { echo "nincs";

    }
    ?>
</table>
</div>

<?php if ( isset($_GET["olvas"]) && $_GET["olvas"] > 0 ) {
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
$energy = $row["energy"];
$href = $row["href"];
$kapta = $row["megkapta"];
    ?>
    <div class="modal fade" id="overlay" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Üzenet : <?php echo $row["sendname"]; ?>  <?php echo $row["title"]; ?>  <?php echo $row["date"]; ?> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"><div class="row">
                        <div class="col"> <?php echo $row["szoveg"]; ?> </div>
                    </div>
                    <br><hr>
                    <?php if ($row["itemid"] <> 0 ) { ?>
                        x <?php echo $itemcount; ?>
                        <img class="card-img-top" src="image/Food/<?php echo $href; ?>" alt="Card image" style="width:100%;max-height:245px;max-width:50px;min-height:50px">
                        Te kaptál tőle <?php echo $itemname; echo " "; echo $itemcount; echo " darabot"; ?>
                        <?php }?>
                    <br><hr>
                    <?php if ( $bcoin <> 0 ) { ?> <button type="button" class="btn btn-info" style="font-weight: bold;min-width:100%;"disabled><i class='fas fa-gem' style='font-size:20px;color:white;'></i> + <?php echo $bcoin ?></button>   <?php } ?>
                      <?php if ( $vipcoin<> 0 ) { ?> <button type="button" class="btn btn-warning" style="font-weight: bold; color:white;min-width:100%;"disabled><i class='fas fa-gem' style='font-size:20px;color:white;'></i> + <?php echo $vipcoin ?></button> <?php } ?>
                    <?php if ( $energy <> 0 ) { ?> <button type="button" class="btn btn" style="font-weight: bold;color:white; background-color:#E344FF;min-width:100%;"disabled><i class='fas fa-battery-half' style='font-size:20px;color:white;vertical-align:-2px;'></i> + <?php echo $energy; ?> </button><?php } ?>




                </div>
                <div class="modal-footer">
                    <?php
                    $id = $row["id"];
                    $sql =" UPDATE msn SET uj = '0' WHERE kapname ='$userteszt' AND id = '$id';";
                    if ($conn->query($sql) === TRUE) {
                    } else {

                        echo "Error updating record: " . $conn->error;

                    }
                    if ($row["uj"]== 1) {
                        $sql = "SELECT * FROM users WHERE name='$loginname';";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                        } else {
                        }
                        $bcoina = $row["bcoin"];
                        $vipcoina = $row["vipcoin"];
                        $bcoina = $bcoina + $bcoin;
                        $vipcoina = $vipcoina + $vipcoin;


                        $sql = " UPDATE users SET bcoin= '$bcoina', vipcoin='$vipcoina' WHERE name ='$userteszt' ;";
                        if ($conn->query($sql) === TRUE) {
                        } else {

                            echo "Error updating record: " . $conn->error;

                        }

                    }

                    ?>

                    <a href="index.php?page=msn"><button type="button" class="btn btn-danger" >Bezárás</button></a>
                </div>
            </div>
        </div>
    </div>
     </div>
    <div class="col-6" >

        <table class="table table-hover table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
            </tbody>
        </table>


    </div>
</div>

</div>
    <script>
        $('#overlay').modal('show');

    </script>

<?php } ?>



