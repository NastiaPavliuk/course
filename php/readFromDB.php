<?php
include "db.php";
function readFromDb($mysqli,$isDistinct,$whatselected,$from,$where = null)
{
    $mysqli->query("SET NAMES 'utf8'");
    $data = array();
    $sql = "SELECT ";
    if($isDistinct) $sql .= "DISTINCT ";
    for( $i = 0 ; $i<count($whatselected)-1; $i++) {
        $sql .= $whatselected[$i] . ", ";
    }
    $sql .= $whatselected[count($whatselected)-1]." ";
    $sql .= "FROM " . $from . " ";
    if( $where != null)
        $sql .= "WHERE " . $where . "ORDER BY name COLLATE utf8_unicode_ci";
    $result = $mysqli->query($sql);
    $data = $result->fetch_all();
    return $data;
}

function Left_Join($table, $matching)
{
    $join = $table ." ON ";
    foreach ($matching as $key => $value) {
        $join .= $key ."=". $value;
    }
    return $join;
}

?>