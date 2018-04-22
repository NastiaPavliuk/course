<?php
include 'db.php';
error_reporting(E_ALL);
$mysqli = new mysqli($link,$username,$password,$dbname);
$mysqli->query("SET NAMES 'utf8'");
if(isset($_GET['access'])) {
    $mail = mb_substr($_GET['access'],0,-1);
    $mysqli->query("
            UPDATE users
            SET access = 1 
            WHERE mail = $mail;
        ");
    mail($mail, "Change Access", "Ви отримали доступ!",
        "From: nas.pa1997@ukr.net");
    //header('Location: accessPage.php');
}
if(isset($_GET['unaccess'])) {
    $mail = mb_substr($_GET['unaccess'], 0, -1);
    $mysqli->query("
            UPDATE users
            SET access = 0 
            WHERE mail = $mail;
        ");
    mail($mail, "Change Access", "Ваш доступ скасовано!",
        "From: nas.pa1997@ukr.net");
    //header('Location: accessPage.php');
}
?>