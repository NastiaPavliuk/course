<?php
error_reporting(E_ALL);
include "readFromDB.php";
include_once "db.php";

$myErr = "";
$data = array();

$mysqli = new mysqli($link,$username,$password,$dbname);
$mysqli->query("SET NAMES 'utf8'");
if(isset($_POST["updateStudent"])){
    $name = strip_tags(trim($_POST["name"]));
    $mail = strip_tags(trim($_POST["mail"]));
    $phone = strip_tags(trim($_POST["phone"]));
    $dateOfBirth = $_POST["dateOfBirth"];
    $webSite = strip_tags(trim($_POST["webSite"]));
    $groupNum = strip_tags(trim($_POST["groupNum"]));
    $status = strip_tags(trim($_POST["status"]));
    $address = strip_tags(trim($_POST["address"]));
    $roomNum = strip_tags(trim($_POST["numberOfRoom"]));
    $school = strip_tags(trim($_POST["school"]));
    $director = strip_tags(trim($_POST["nameOfDirector"]));
    $proLang = strip_tags(trim($_POST["proLang"]));
    $achievement = strip_tags(trim($_POST["achievement"]));
    $interest = strip_tags(trim($_POST["interest"]));
    $suggestions = strip_tags(trim($_POST["suggestions"]));
    $parentsInfo = strip_tags(trim($_POST["parentsInfo"]));

    if($name !="" &&
        $mail !="" &&
        $phone !="") {
        $mysqli->query("
            UPDATE student
            SET email = '$mail', phone = '$phone', groupNum = '$groupNum', status = '$status', dateOfBirth = '$dateOfBirth', address = '$address', numberOfRoom = '$roomNum', school = '$school',nameOfDirector = '$director',programmingLanguage = '$proLang',achievement = '$achievement',interest = '$interest',suggestions = '$suggestions',parentsInfo = '$parentsInfo',website = '$webSite' 
            WHERE name = '$name';
        ");
        header('Location: students-list.php');
    }
    else $myErr = "<h4 class='alert alert-danger'>Введіть коректні значення</h4></br>";
}

$data = readFromDB($mysqli,false,array("*"),"student");
$mysqli->close();
print_r($myErr);
?>