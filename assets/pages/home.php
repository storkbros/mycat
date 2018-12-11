<?php
//todo
?>

<div class="container-fluid" style="max-width:1000px;margin-top:5px;">
    <div class="row">
        <div class="col-sm" style="">
            <?php if ($daly == 1) { ?>
                <div class="alert alert-info alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Üdv újra itt!</strong> Jutalmad 5xp.
                </div>
            <?php } ?>


            <div class="card" style="">

                <img class="card-img-top" src="<?php echo $row["profkep"];
                echo $row["profkieg"]; ?>" alt="Card image" style="width:100;">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $row["catname"] ?></h4>
                    <p class="card-text">
                        <a href="index.php?page=rangok">
                            <button type="button" class="btn btn-light">A te rangod: <?php echo $row["catrang"];
                                echo " (" . $row["catlvl"] . ")"; ?></button>
                        </a></p>
                    <div class="progress">
                        <div class="progress-bar bg-info" style="width:<?php echo $bx; ?>%;"><?php echo $bx; ?>%</div>
                    </div>
                    <p class="card-text" style="vertical-align:center;">Következő rang : <?php echo $cx;
                        echo "xp (";
                        echo $kovirangexp;
                        echo "xp /";
                        echo $row["catexp"];
                        echo "xp )"; ?></p>

                </div>
            </div>

            <?php

            ?>
        </div>
        <div class="col-sm" style="">
            <div class="card" style="min-width:330px;">
                <div class="card-body">
                    <div class="alert alert-success">
                        <strong>Étel: </strong><?php echo $row["foodtype"] . " 10/" . $row["foodcount"]; ?></div>
                    <div class="alert alert-light">

                          <?php if ($row["foodcount"] >= 1) { ?> <img src="image/kaja.png" class="rounded" alt="food"
                                                                      style="max-height:2px;max-width:22px;"> <?php } else { ?>
                            <img src="image/kajaures.png" class="rounded" alt="food"
                                 style="max-height:22px;max-width:22px;"> <?php } ?>
                        <?php if ($row["foodcount"] >= 2) { ?> <img src="image/kaja.png" class="rounded" alt="food"
                                                                    style="max-height:22px;max-width:22px;"> <?php } else { ?>
                            <img src="image/kajaures.png" class="rounded" alt="food"
                                 style="max-height:22px;max-width:22px;"> <?php } ?>
                        <?php if ($row["foodcount"] >= 3) { ?> <img src="image/kaja.png" class="rounded" alt="food"
                                                                    style="max-height:22px;max-width:22px;"> <?php } else { ?>
                            <img src="image/kajaures.png" class="rounded" alt="food"
                                 style="max-height:22px;max-width:22px;"> <?php } ?>
                        <?php if ($row["foodcount"] >= 4) { ?> <img src="image/kaja.png" class="rounded" alt="food"
                                                                    style="max-height:22px;max-width:22px;"> <?php } else { ?>
                            <img src="image/kajaures.png" class="rounded" alt="food"
                                 style="max-height:22px;max-width:22px;"> <?php } ?>
                        <?php if ($row["foodcount"] >= 5) { ?> <img src="image/kaja.png" class="rounded" alt="food"
                                                                    style="max-height:22px;max-width:22px;"> <?php } else { ?>
                            <img src="image/kajaures.png" class="rounded" alt="food"
                                 style="max-height:22px;max-width:22px;"> <?php } ?>
                        <?php if ($row["foodcount"] >= 6) { ?> <img src="image/kaja.png" class="rounded" alt="food"
                                                                    style="max-height:22px;max-width:22px;"> <?php } else { ?>
                            <img src="image/kajaures.png" class="rounded" alt="food"
                                 style="max-height:22px;max-width:22px;"> <?php } ?>
                        <?php if ($row["foodcount"] >= 7) { ?> <img src="image/kaja.png" class="rounded" alt="food"
                                                                    style="max-height:22px;max-width:22px;"> <?php } else { ?>
                            <img src="image/kajaures.png" class="rounded" alt="food"
                                 style="max-height:22px;max-width:22px;"> <?php } ?>
                        <?php if ($row["foodcount"] >= 8) { ?> <img src="image/kaja.png" class="rounded" alt="food"
                                                                    style="max-height:22px;max-width:22px;"> <?php } else { ?>
                            <img src="image/kajaures.png" class="rounded" alt="food"
                                 style="max-height:22px;max-width:22px;"> <?php } ?>
                        <?php if ($row["foodcount"] >= 9) { ?> <img src="image/kaja.png" class="rounded" alt="food"
                                                                    style="max-height:22px;max-width:22px;"> <?php } else { ?>
                            <img src="image/kajaures.png" class="rounded" alt="food"
                                 style="max-height:22px;max-width:22px;"> <?php } ?>
                        <?php if ($row["foodcount"] >= 10) { ?> <img src="image/kaja.png" class="rounded" alt="food"
                                                                     style="max-height:22px;max-width:22px;"> <?php } else { ?>
                            <img src="image/kajaures.png" class="rounded" alt="food"
                                 style="max-height:22px;max-width:22px;"> <?php } ?>
                    </div>

                    <div class="alert alert-success">
                        <strong>Ital: </strong><?php echo $row["drinktype"] . " 10/" . $row["drinkcount"]; ?></div>
                    <div class="alert alert-light">
                         
                          <?php if ($row["drinkcount"] >= 1) { ?> <img src="image/kola.png" class="rounded" alt="food"
                                                                       style="max-height:22px;max-width:22px;"> <?php } else { ?>
                            <img src="image/kolaures.png" class="rounded" alt="food"
                                 style="max-height:22px;max-width:22px;"> <?php } ?>
                        <?php if ($row["drinkcount"] >= 2) { ?> <img src="image/kola.png" class="rounded" alt="food"
                                                                     style="max-height:22px;max-width:22px;"> <?php } else { ?>
                            <img src="image/kolaures.png" class="rounded" alt="food"
                                 style="max-height:22px;max-width:22px;"> <?php } ?>
                        <?php if ($row["drinkcount"] >= 3) { ?> <img src="image/kola.png" class="rounded" alt="food"
                                                                     style="max-height:22px;max-width:22px;"> <?php } else { ?>
                            <img src="image/kolaures.png" class="rounded" alt="food"
                                 style="max-height:22px;max-width:22px;"> <?php } ?>
                        <?php if ($row["drinkcount"] >= 4) { ?> <img src="image/kola.png" class="rounded" alt="food"
                                                                     style="max-height:22px;max-width:22px;"> <?php } else { ?>
                            <img src="image/kolaures.png" class="rounded" alt="food"
                                 style="max-height:22px;max-width:22px;"> <?php } ?>
                        <?php if ($row["drinkcount"] >= 5) { ?> <img src="image/kola.png" class="rounded" alt="food"
                                                                     style="max-height:22px;max-width:22px;"> <?php } else { ?>
                            <img src="image/kolaures.png" class="rounded" alt="food"
                                 style="max-height:22px;max-width:22px;"> <?php } ?>
                        <?php if ($row["drinkcount"] >= 6) { ?> <img src="image/kola.png" class="rounded" alt="food"
                                                                     style="max-height:22px;max-width:22px;"> <?php } else { ?>
                            <img src="image/kolaures.png" class="rounded" alt="food"
                                 style="max-height:22px;max-width:22px;"> <?php } ?>
                        <?php if ($row["drinkcount"] >= 7) { ?> <img src="image/kola.png" class="rounded" alt="food"
                                                                     style="max-height:22px;max-width:22px;"> <?php } else { ?>
                            <img src="image/kolaures.png" class="rounded" alt="food"
                                 style="max-height:22px;max-width:22px;"> <?php } ?>
                        <?php if ($row["drinkcount"] >= 8) { ?> <img src="image/kola.png" class="rounded" alt="food"
                                                                     style="max-height:22px;max-width:22px;"> <?php } else { ?>
                            <img src="image/kolaures.png" class="rounded" alt="food"
                                 style="max-height:22px;max-width:22px;"> <?php } ?>
                        <?php if ($row["drinkcount"] >= 9) { ?> <img src="image/kola.png" class="rounded" alt="food"
                                                                     style="max-height:22px;max-width:22px;"> <?php } else { ?>
                            <img src="image/kolaures.png" class="rounded" alt="food"
                                 style="max-height:22px;max-width:22px;"> <?php } ?>
                        <?php if ($row["drinkcount"] >= 10) { ?> <img src="image/kola.png" class="rounded" alt="food"
                                                                      style="max-height:22px;max-width:22px;"> <?php } else { ?>
                            <img src="image/kolaures.png" class="rounded" alt="food"
                                 style="max-height:22px;max-width:22px;"> <?php } ?>


                    </div>
                </div>
            </div>

        </div>
    </div>


</div>


<?php if ( $elsobelepes == 1 ) { ?>
    <div class="modal fade" id="overlay" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">New achievement!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"><div class="row">
                        <div class="col-4"> <img src="image/acc1.png" alt="elso" class="img-thumbnail"></div>

                        <div class="col"> Köszöntelek a Mycat cica nevelde oldalán. Már el is nyerted az első belépésért járó jutalmad.</div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<?php if ( $azotven == 1 ) { ?>
    <div class="modal fade" id="overlay" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">New achievement!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"><div class="row">
                        <div class="col-4"> <img src="image/acc/acc1.png" alt="elso" class="img-thumbnail"></div>

                        <div class="col"> Gratulálok az 50 teljesített küldetésedhez!</div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<?php if ( $azotven == 10 ) { ?>
    <div class="modal fade" id="overlay" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">New achievement!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"><div class="row">
                        <div class="col-4"> <img src="image/acc/acc2.png" alt="elso" class="img-thumbnail"></div>

                        <div class="col"> Gratulálok a 100 teljesített küldetésedhez!</div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ( $azotven == 100 ) { ?>
    <div class="modal fade" id="overlay" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">New achievement!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"><div class="row">
                        <div class="col-4"> <img src="image/acc/acc3.png" alt="elso" class="img-thumbnail"></div>

                        <div class="col"> Gratulálok az 1000 teljesített küldetésedhez!</div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ( $top1 == 3 ) { ?>
    <div class="modal fade" id="overlay" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">New achievement!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"><div class="row">
                        <div class="col-4"> <img src="image/acc/acc5.png" alt="elso" class="img-thumbnail"></div>

                        <div class="col"> Gratulálok! Az első helyen szerepelsz a ranglistán ezért megkapod az érte járó jutalmat!</div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<script>
    $('#overlay').modal('show');

    setTimeout(function() {
        $('#overlay').modal('hide');
    }, 10000);
</script>

