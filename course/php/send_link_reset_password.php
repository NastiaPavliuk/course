<?php
include 'db.php';
error_reporting(E_ALL);
$mysqli = new mysqli($link,$username,$password,$dbname);
$mysqli->query("SET NAMES 'utf8'");
if(isset($_POST["send"])){
    $email = trim($_POST["email"]);
    $result_query_select = $mysqli->query("SELECT access FROM users WHERE mail = '".$email."'");
    if(count($result_query_select)==0){
        header("Location: ../views/resetPass.php");
        echo "<p class='mesage_error' > Дана пошта не зареєстрована</p>";
        exit();
    }
    if($result_query_select->num_rows == 1){
        while(($row = $result_query_select->fetch_assoc()) !=false){
            if((int)$row["access"] === 0){
                header("Location: ../views/resetPass.php");
                echo "<p class='mesage_error' >Дана пошта не має доступу</p>";
                exit();
            }else{
                $token=md5($email.time());
                $mysqli->query("UPDATE users SET reset_password_token='$token' WHERE mail='$email'");
                $link_reset_password = "set_new_password.php?email=$email&token=$token";
                $subject = "Відновлення пароля";
                $subject = "=?utf-8?B?".base64_encode($subject)."?=";
                $message = 'Доброго дня! <br/> <br/> Для відновлення пароля від інофрмаціїної системи "Анкетні дані студентів", перейдіть по цьому <a href="'.$link_reset_password.'">посиланню</a>.';
                $headers = "Content-type: text/html; charset=utf-8\r\n";
                if(mail($email, $subject, $message, $headers)){
                    header("Location: ../views/resetPass.php");
                    echo "<p class='success_message' >Посилання на сторінку відновлення паролю було вислано на E-mail ($email) </p>";
                    exit();
                }else{
                    header("Location: ../views/resetPass.php");
                    echo "<p class='mesage_error' >Помилка при выдправленны листа на пошту ".$email.". </p>";
                    exit();
                }

            }
        }
    }
}
?>