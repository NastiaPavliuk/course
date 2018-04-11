<?php
include 'db.php';
error_reporting(E_ALL);
$mysqli = new mysqli($link,$username,$password,$dbname);
$mysqli->query("SET NAMES 'utf8'");
if(isset($_GET['name'])) {
    $name = $_GET['name'];
    $dataSt = readStudent($mysqli,array('*'),"name=$name");
}
//header('Location: student-card.php');

function readStudent($mysqli, $whatselected, $where){
    $mysqli->query("SET NAMES 'utf8'");
    $data = array();
    $sql = "SELECT ";
    for( $i = 0 ; $i<count($whatselected)-1; $i++) {
        $sql .= $whatselected[$i] . ", ";
    }
    $sql .= $whatselected[count($whatselected)-1]." ";
    $sql .= "FROM student ";
    if( $where != null)
        $sql .= "WHERE " . $where;
    $result = $mysqli->query($sql);
    $data = $result->fetch_all();
    return $data;
}
