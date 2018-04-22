<?php
include 'db.php';
error_reporting(E_ALL);
$mysqli = new mysqli($link,$username,$password,$dbname);
$mysqli->query("SET NAMES 'utf8'");

if(isset($_GET['query']))
{
    $query = trim($_GET['query']);
    //$query = mysql_real_escape_string($query);
    $query = htmlspecialchars($query);

    if (!empty($query))
    {
        if (strlen($query) < 3) {
            $dataSearch = '<p>Занадто коротки пошуковий запит.</p>';
        } else if (strlen($query) > 128) {
            $dataSearch = '<p>Занадто довгий пошуковий запит.</p>';
        } else {
            $result = $mysqli->query("SELECT name
                  FROM student WHERE name LIKE '%$query%' ORDER BY name COLLATE utf8_unicode_ci") ;

            if(count($result)>0)
                $dataSearch = $result->fetch_all();
            else $dataSearch = $result;
        }
    } else {
        $dataSearch = '<p>Задано пустий пошуковий запит.</p>';
    }
}
?>