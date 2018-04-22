<?php
include 'db.php';
error_reporting(E_ALL);
$mysqli = new mysqli($link,$username,$password,$dbname);
$mysqli->query("SET NAMES 'utf8'");
if(isset($_POST["set_new_password"]) && !empty($_POST["set_new_password"])){
    if(isset($_POST['token']) && !empty($_POST['token']))
        $token = $_POST['token'];
    if(isset($_POST['email']) && !empty($_POST['email']))
        $email = $_POST['email'];
    if(isset($_POST["password"]))
        $password = trim($_POST["password"]);
    $mysqli->query("UPDATE users SET pass='$password' WHERE mail='$email'");
    header("Location: ../views/login.php");
}
?>