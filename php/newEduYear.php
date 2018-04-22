<?php
if(isset($_GET['newYear'])){
$myErr = "";
$data = array();
$mysqli = new mysqli($link,$username,$password,$dbname);
$mysqli->query("SET NAMES 'utf8'");

/*602*/
$mysqli->query("
            DELETE FROM student WHERE groupNum = '602';
        ");
$mysqli->query("
            UPDATE users
            SET groupNum = '' 
            WHERE groupNum = '602';
        ");

/*502*/
$mysqli->query("
            UPDATE student
            SET groupNum = '602' 
            WHERE groupNum = '502';
        ");
$mysqli->query("
            UPDATE users
            SET groupNum = '602' 
            WHERE groupNum = '502';
        ");

/*402*/
$mysqli->query("
            DELETE FROM student WHERE groupNum = '402';
        ");
$mysqli->query("
            UPDATE users
            SET groupNum = '' 
            WHERE groupNum = '402';
        ");

/*422*/
$mysqli->query("
            DELETE FROM student WHERE groupNum = '422';
        ");
$mysqli->query("
            UPDATE users
            SET groupNum = '' 
            WHERE groupNum = '422';
        ");

/*322*/
$mysqli->query("
            UPDATE student
            SET groupNum = '422' 
            WHERE groupNum = '322';
        ");
$mysqli->query("
            UPDATE users
            SET groupNum = '422' 
            WHERE groupNum = '322';
        ");

/*302*/
$mysqli->query("
            UPDATE student
            SET groupNum = '402' 
            WHERE groupNum = '302';
        ");
$mysqli->query("
            UPDATE users
            SET groupNum = '402' 
            WHERE groupNum = '302';
        ");

/*202*/
$mysqli->query("
            UPDATE student
            SET groupNum = '302' 
            WHERE groupNum = '202';
        ");
$mysqli->query("
            UPDATE users
            SET groupNum = '302' 
            WHERE groupNum = '202';
        ");

/*102*/
$mysqli->query("
            UPDATE student
            SET groupNum = '202' 
            WHERE groupNum = '102';
        ");
$mysqli->query("
            UPDATE users
            SET groupNum = '202' 
            WHERE groupNum = '102';
        ");


    header('Location: students-list.php');
}









?>