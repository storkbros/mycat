 <?php
    include_once('session.php');
    $loginname=$login_session;
    $olvas=0;
    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_set_charset($conn,"utf8");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    ?>

<style>
    a:hover {
        text-decoration: none;
        text-decoration-color: white;
        color: white;
    }
    a {
        text-decoration: none;
        text-decoration-color: white;
        color: white;
    }
    a:link {
        text-decoration: none;
        text-decoration-color: white;
        color: white;
    }


</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container" style="margin-top:10px;">
     <div class="row" >

         <div class="col-6" style="min-width: 350px;width:100%;">

             <table class="table table-hover table-dark">
                 <thead>
                 <tr style="text-align: center">
                     <th scope="col">#</th>
                     <th scope="col">Barátlista</th>
                     <th scope="col">#</th>
                     <th scope="col">#</th>
                 </tr>
                 </thead>
                 <tbody>
                 <?php
                 $sql = "SELECT * FROM friend WHERE name ='$loginname' and elut = '1';";
                 $result = $conn->query($sql);
                 if ($result->num_rows > 0) {
                     $i = 1;
                     while($row = $result->fetch_assoc()) {
                         ?>
                         <tr style="text-align: center">
                             <td class="check"><?php echo $i; ?></td>
                             <td ><?php echo $row["name2"]; ?></td>
                             <td class='clickable-row'  data-href=' <?php if ( $row["barat"] == 1 ) { ?>index.php?page=proff&name=<?php echo $row["name2"]; } else {?>index.php?page=msn&add=<?php echo $row["name2"]; }?>' style="cursor: pointer;" > <?php if($row["barat"] == 10 ) { ?><i class="material-icons" style="font-size:24px;color:green;">check_box</i> <?php } else { ?><i class='fas fa-user' style='font-size:24px;color:white'></i> <?php } ?></td>
                             <td class='clickable-row' data-href='<?php if ( $row["barat"] == 1 ) { ?>index.php?page=msn&mass=<?php echo $row["name2"]; } else {?>index.php?page=msn&ki=<?php echo $row["name2"]; }?>' style="cursor: pointer;" > <?php if ($row["barat"] == 10 ) { ?><i class="material-icons" style="font-size:24px;color:red;">indeterminate_check_box</i> <?php } else { ?><i class="material-icons" style="font-size:24px;color: white;">email</i><?php }?></td>
                         </tr>






                         <?php


                     }
                 } else {}
                 if ( isset($_GET["add"]) && $_GET["add"] <> "" ) {
                     $addname= $_GET["add"];
                     $sql = " UPDATE friend SET barat= '1' WHERE name ='$userteszt' and name2 = '$addname';";
                     if ($conn->query($sql) === TRUE) {
                         ?> <script language="JavaScript">document.location.href = "index.php?page=msn";</script> <?php
                     } else { }
                 }
                 if ( isset($_GET["ki"]) && $_GET["ki"] <> "" ) {
                     $addname= $_GET["ki"];
                     $sql = " UPDATE friend SET barat= '2', elut='2' WHERE name ='$userteszt' and name2 = '$addname';";
                     if ($conn->query($sql) === TRUE) {
                         ?> <script language="JavaScript">document.location.href = "index.php?page=msn";</script> <?php
                     } else { }
                 }



                 ?>
                 </tbody>
             </table>
             <script>
                 jQuery(document).ready(function($) {
                     $(".clickable-row").click(function() {
                         window.location = $(this).data("href");
                     });
                 });
             </script>

         </div>



         <div class="col-6" style="min-width: 350px;width:100%;">
             <table class="table table-hover table-dark">
    <tr >
        <th style="width:30px;"><i class="fa fa-envelope-square" style="font-size:24px;"></i></th>
        <th>Feladó</th>
        <th>Téma</th>
        <th style="width:auto;">Dátum</th>
    </tr>

   <?php
    $sql = "SELECT * FROM msn WHERE kapname ='$loginname';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            ?>
            <tr class='clickable-row' data-href='index.php?page=msn&olvas=<?php echo $row["id"];?>' style="cursor: pointer;">
                <td class="check">
                   <?php if ( $row["uj"]== 1) { ?> <i class="fa fa-envelope" style="font-size:24px;color:white"></i> <?php } else { ?>
                         <i class="fa fa-envelope-o" style="font-size:24px;color:white"></i> <?php } ?></td>
                <td ><?php echo $row["sendname"]; ?></td>
                <td > <?php echo $row["title"]; ?></td>
                <td > <?php echo $row["date"]; ?></td>
            </tr>





            <?php


        }
    } else {

    }
    ?>
                 <script>
                 jQuery(document).ready(function($) {
                 $(".clickable-row").click(function() {
                 window.location = $(this).data("href");
                 });
                 });
                 </script>
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
                       Ajándékod  <?php echo $itemcount; ?> darab
                        <img class="card-img-top" src="image/Food/<?php echo $href; ?>" alt="Card image" style="width:100%;max-height:245px;max-width:50px;min-height:50px">
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
                        echo $itemid;
                        echo $itemcount;
                        $sql = "SELECT * FROM raktar WHERE name='$loginname' and itemid = '$itemid';";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                        } else {
                        }

                        $itemmm = $row["itemcount"] + $itemcount;
                        $sql = " UPDATE raktar SET itemcount = '$itemmm' WHERE name ='$userteszt' and itemid = '$itemid' ;";
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
    <script>
        $('#overlay').modal('show');

    </script>

<?php }

 if ( isset($_GET["mass"]) && $_GET["mass"] <> "" ) {
                     $kapname= $_GET["mass"];
                     $sendname = $userteszt; ?>

         <div class="modal fade" id="overlay" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <form action="masssend.php" method="post">
                        <input type="text" name="kapname" value="<?php echo $kapname; ?>" hidden >
                        <input type="text" name="sendname" value="<?php echo $sendname; ?>" hidden >






                    <h5 class="modal-title" id="exampleModalCenterTitle">Üzenet küldés:  <?php echo $kapname; ?> részére</h5>
                        <label for="message-text" class="col-form-label">Tárgy:</label> <input type="text" class="form-control" name="title">

     </div>
    <div class="modal-body"><div class="row">
            <div class="col">
                <label for="message-text" class="col-form-label">Üzenet:</label>

                <textarea class="form-control" name="text" id="text"></textarea>

            </div>
        </div>
        <br>
        GIFT
        <hr>
        <div class="row" >
            <div class="col-4" >
                Tárgy: <br>
        <input list="itemid" name="itemid">
        <datalist id="itemid" style=" max-height: 300px;overflow-y: auto;">
            <?php
            $sql = "SELECT raktar.itemid, raktar.itemcount, kaja.id, kaja.tipus, kaja.link, kaja.name 
            FROM kaja
            INNER JOIN raktar 
             ON kaja.id=raktar.itemid
            WHERE raktar.name='$login_session'AND raktar.itemcount <> '0';";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>

            <option value="<?php echo $row["name"]; ?>">
            <?php } } ?>
        </datalist>
            </div>
            <div class="col-4" >
        Darabszám
                <input list="itemcount" name="itemcount">
        <datalist id="itemcount" style=" max-height: 300px;overflow-y: auto;">
            <option value="1">
            <option value="2">
            <option value="3">
            <option value="4">
            <option value="5">
            <option value="10">
        </datalist>



            </div>
            <div class="col-4" >
                Gyémánt küldés: <br>
                <div class="row">

                    <div class="col-6"> <button type="button" class="btn btn-info" style="font-weight: bold;min-width:100%;"disabled><i class='fas fa-gem' style='font-size:20px;color:white;'></i></button></div>
                    <div class="col-6"><input type="text" class="form-control" name="bcoin"></div>

                </div>



            </div>
        </div>
            </div>
    <div class="modal-footer">

        <button type="submit" class="btn btn-danger" >Küldés</button>
        </form>
    </div>
</div>
 </div>

 </div>
 <script>
     $('#overlay').modal('show');

 </script>
             <?php    }
?>


</div>
</div>
