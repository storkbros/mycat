<?php
session_set_cookie_params(604800);
session_start();
$logged = false;
$login_session = "";
if(isset($_SESSION['login_user'])){
    //todo is this neccesary?
    $user_check = $_SESSION['login_user'];
    $ses_sql = mysqli_query($conn,"select username from admin where username = '$user_check' ");
    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    $login_session = $row['username'];
    $logged=true;
}
