<?php
error_reporting(E_ALL);
include_once "db.php";

$myErr = "";
$data = array();

$mysqli = new mysqli($link,$username,$password,$dbname);
$mysqli->query("SET NAMES 'utf8'");
if(isset($_POST["deleteStudent"])){
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

    if($name !="") {
        $mysqli->query("
            DELETE FROM student WHERE name = '$name';
        ");
        header('Location: students-list.php');
    }
    else $myErr = "<h4 class='alert alert-danger'>Видалення не вдалося</h4></br>";
}

?>