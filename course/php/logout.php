<?php
if(isset($_POST["logout"])){
    session_start();
    $_SESSION['user'] = null;
    session_destroy();
    header("Location: login.php");
}
?>