<?php
include 'db.php';
error_reporting(E_ALL);
$mysqli = new mysqli($link,$username,$password,$dbname);
$mysqli->query("SET NAMES 'utf8'");
session_start();
if(isset($_POST["login"])){
    if (($_POST["user"] == "ADMIN") && ($_POST["passLog"] == "Password123")){
        $_SESSION['register'] = "Admin";
        header('Location: students-list.php');
    }
    else{
        $userLogin = $_POST["user"];
        $userPass = $_POST["passLog"];
        $dataUser = readFromDb($mysqli,false,array("*"),'users',"mail='$userLogin'");
        foreach ($dataUser as $dt){
            if(count($dataUser) && $dt[3]==$userPass && $dt[6]){
                $_SESSION['register'] = $dt[5];
                header("Location: students-list.php");
            }
            if($dt[3]!=$userPass){
                echo "<h4 class='alert alert-danger'>Невірний пароль</h4></br>";
            }
            if(!$dt[5]){
                echo "<h4 class='alert alert-danger'>Даний акаунт ще не затверджено адміністратором</h4></br>";
            }
        }
    }
}
?>