<?php
error_reporting(E_ALL);
include_once "db.php";

$myErr = "";
$data = array();

$mysqli = new mysqli($link,$username,$password,$dbname);
$mysqli->query("SET NAMES 'utf8'");
if(isset($_POST["addStudent"])){
    $name = strip_tags(trim($_POST["name"]));
    $mail = strip_tags(trim($_POST["mail"]));
    $phone = strip_tags(trim($_POST["phone"]));
    $dateOfBirth = $_POST["dateOfBirth"];
    $webSite = strip_tags(trim($_POST["webSite"]));
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
    if($_SESSION['register']=='Admin')
        if($name !="") {
            $groupNum = strip_tags(trim($_POST["groupNum"]));
            $mysqli->query("
              INSERT INTO student(name,email,phone,groupNum,status,dateOfBirth,address,numberOfRoom,school,nameOfDirector,programmingLanguage,achievement,interest,suggestions,parentsInfo,website) 
              VALUES ('$name','$mail','$phone', '$groupNum', '$status', '$dateOfBirth', '$address', '$roomNum', '$school', '$director', '$proLang', '$achievement', '$interest', '$suggestions', '$parentsInfo', '$webSite')
            ");
            header('Location: students-list.php');
        }
    if (isset($_SESSION['register'])){
            $groupAccess = $_SESSION['register'];
            $mysqli->query("
                INSERT INTO student(name,email,phone,groupNum,status,dateOfBirth,address,numberOfRoom,school,nameOfDirector,programmingLanguage,achievement,interest,suggestions,parentsInfo,website) 
                VALUES ('$name','$mail','$phone', $groupAccess, '$status', '$dateOfBirth', '$address', '$roomNum', '$school', '$director', '$proLang', '$achievement', '$interest', '$suggestions', '$parentsInfo', '$webSite')
            ");
            header('Location: students-list.php');
        }
    //else $myErr = "<h4 class='alert alert-danger'>Введіть коректні значення</h4></br>";
}

?>