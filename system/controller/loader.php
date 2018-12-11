<?php
require_once $dir . "system/db/database.php";
require_once $dir . "system/controller/session.php";

$widgets = array();
$page = '';

//$widgets[] = "topbar";
$title = "MyCat";
if ($logged) {
    $page = 'home.php';
    if (isset($_GET["page"])) {
        switch ($_GET["page"]) {

            case "home":
                $widgets[] = "topbar";
                $page = 'home.php';
                break;

            case "kocsma":
                $widgets[] = "topbar";
                $page = 'kocsma.php';
                break;

            default:
                //todo 404
                break;
        }
    }
} else {
    $page = "login";
    //todo reg
}
include_once $dir . "system/model/pages/" . $page;
include $dir . "assets/scheme.php";
