<!DOCTYPE HTML>
<html lang="hu">
    <head>
        <meta charset="UTF-8"/>
        <title><?php echo $title;?></title>
        <link rel="shortcut icon" href="<?php echo $reldir."assets/images/favicon.ico"; ?>">
        <meta name="theme-color" content="#212529">
        <meta name="msapplication-navbutton-color" content="#212529">
        <meta name="apple-mobile-web-app-status-bar-style" content="#212529">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css'
              integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
        <link rel="stylesheet" href="<?php echo $reldir."assets/css/mycat.css"; ?>"
    </head>
    <body>
        <?php
        if(in_array("topbar",$widgets)){
            include_once $dir."assets/widgets/topbar.php";
        }

        include $dir."assets/pages/".$page;

        if(in_array("bottombar",$widgets)){
            include_once $dir."assets/widgets/bottombar.php";
        }
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>