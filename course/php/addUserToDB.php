<?php
error_reporting(E_ALL);
include "readFromDB.php";
include_once "db.php";

$myErr = "";
$data = array();
$mysqli = new mysqli($link,$username,$password,$dbname);
$mysqli->query("SET NAMES 'utf8'");
if(isset($_POST["regestrate"])){
    $name=strip_tags(trim($_POST["userName"]));
    $mail = strip_tags(trim($_POST["mail"]));
    $groupNum = strip_tags(trim($_POST["groupNum"]));
    $pass = strip_tags(trim($_POST["pass"]));
    if($name !="" &&
        $mail !="" &&
        $groupNum !="" &&
        $pass !="") {
        $mysqli->query("
            INSERT INTO users(name,mail,pass,groupNum) 
            VALUES ('$name','$mail','$pass', '$groupNum')
        ");
        echo "<h4 class='alert alert-success'>Дякуємо за регестрацію! Очікуйте повідомлення з підтвердженням на email</h4></br>";
    }
    else $myErr = "<h4 class='alert alert-danger'>Введіть коректні значення</h4></br>";
}

$mysqli->close();
print_r($myErr);
?>