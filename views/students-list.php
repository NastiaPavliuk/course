<?php include "../php/logout.php"?>
<?php include "../php/login.php"?>
<?php include "../php/db.php"?>
<?php include "../php/newEduYear.php"?><!DOCTYPE html><html><head><title>Анкети студентів</title><link rel="stylesheet" href="../css/bootstrap.css"><link rel="stylesheet" href="../css/bootstrap-grid.css"><link rel="stylesheet" href="../css/bootstrap-reboot.css"><link rel="stylesheet" href="../css/main.css"><link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="screen"><meta charset="utf-8"></head><body id="body"><script src="../js/jquery-3.3.1.min.js"></script><script src="../js/newEduYear.js"></script><section id="header"><div class="header"><div class="row"><div class="col-sm-9"><ul class="nav"><li class="nav-item"><a class="nav-link" href="students-list.php#1course">1 курс</a></li><li class="nav-item"><a class="nav-link" href="students-list.php#2course">2 курс</a></li><li class="nav-item"><a class="nav-link" href="students-list.php#3course">3 курс</a></li><li class="nav-item"><a class="nav-link" href="students-list.php#4course">4 курс</a></li><li class="nav-item"><a class="nav-link" href="students-list.php#5course">5 курс</a></li><li class="nav-item"><a class="nav-link" href="students-list.php#6course">6 курс</a></li><?php if(isset($_SESSION['register']) && $_SESSION['register']=="Admin")  echo '<li class="nav-item">
          <a class="nav-link" id="newYear" onclick="newYear()">Новий навчальний рік</a>
      </li>';?></ul></div><div class="col-sm-2" style="color:white; padding-top: 9px; text-align: right;"><?php if(isset($_SESSION['register']) && $_SESSION['register']!='Admin' ){      $groupAccess = $_SESSION['register'];
      if($groupAccess!="")
          echo "Куратор $groupAccess групи";
      else echo "Викладач";
      }
      else $groupAccess='admin';
  ?></div><div class="col-sm-1"><form method="post"><button name="logout"><?php if(isset($_SESSION['register'])) echo "Вийти"; else echo "Увiйти"?></button></form></div></div></div><div class="subheader"><div class="row"><div class="col-sm-9"><?php if(isset($_SESSION['register']) && $_SESSION['register']=="Admin"){      echo "<a class='btn btn-success' href = '../views/student-card.php?add=true' style='margin-left:70px'>Додати студента</a>";
      echo "<a class='btn btn-warning' href = '../views/accessPage.php' style='margin-left:20px'>Редагувати доступ</a>";}
  ?><?php if(isset($_SESSION['register']) && $_SESSION['register']!='Admin' && $_SESSION['register']!='')      echo "<a class='btn btn-success' href = '../views/student-card.php?add=true' style='margin-left: 70px'>Додати студента</a>";
  ?></div><div class="col-sm-3"><form class="search form-inline" name="search" method="post"><div class="container-1"><span class="icon" onclick="document.location.href = 'searchPage.php?query=' + $('#search').val();"><i class="fa fa-search"></i></span><input type="search" id="search" name="search" placeholder="Пошук..."></div></form></div></div></div></section><?php include '../php/db.php'; include '../php/readFromDB.php'; include '../php/doTable.php'; $mysqli = new mysqli($link,$username,$password,$dbname); ?><div class="container"><div id="back-top"><a href="#header">Top</a></div><div id="cards"><p class="course" id="1course">1 курс</p><?php $data = readFromDb($mysqli,false,array('name'),'student','groupNum="102"');$count = count($data);
if($count) {
  echo "<span class='group'> 102 група </span> <span class='count'>Кiлькiсть студентiв: $count </span>";
  echo doTable(array("Прізвище, Iм'я, По-батькові"),$data,$groupAccess);
}
?><p class="course" id="2course">2 курс</p><?php $data = readFromDb($mysqli,false,array('name'),'student','groupNum="202"');$count = count($data);
if($count) {
  echo "<span class='group'> 202 група </span> <span class='count'>Кiлькiсть студентiв: $count </span>";
  echo doTable(array("Прізвище, Iм'я, По-батькові"),$data,$groupAccess);
}
?><p class="course" id="3course">3 курс</p><?php $data = readFromDb($mysqli,false,array('name'),'student','groupNum="302"');$count = count($data);
if($count) {
  echo "<span class='group'> 302 група </span> <span class='count'>Кiлькiсть студентiв: $count </span>";
  echo doTable(array("Прізвище, Iм'я, По-батькові"),$data,$groupAccess);
}
?><?php $data = readFromDb($mysqli,false,array('name'),'student','groupNum="322"');$count = count($data);
if($count) {
  echo "<span class='group'> 322 група </span> <span class='count'>Кiлькiсть студентiв: $count </span>";
  echo doTable(array("Прізвище, Iм'я, По-батькові"),$data,$groupAccess);
}
?><p class="course" id="4course">4 курс</p><?php $data = readFromDb($mysqli,false,array('name'),'student','groupNum="402"');$count = count($data);
if($count) {
  echo "<span class='group'> 402 група </span> <span class='count'>Кiлькiсть студентiв: $count </span>";
  echo doTable(array("Прізвище, Iм'я, По-батькові"),$data,$groupAccess);
}
?><?php $data = readFromDb($mysqli,false,array('name'),'student','groupNum="422"');$count = count($data);
if($count) {
  echo "<span class='group'> 422 група </span> <span class='count'>Кiлькiсть студентiв: $count </span>";
  echo doTable(array("Прізвище, Iм'я, По-батькові"),$data,$groupAccess);
}
?><p class="course" id="5course">5 курс</p><?php $data = readFromDb($mysqli,false,array('name'),'student','groupNum="502"');$count = count($data);
if($count) {
  echo "<span class='group'> 502 група </span> <span class='count'>Кiлькiсть студентiв: $count </span>";
  echo doTable(array("Прізвище, Iм'я, По-батькові"),$data,$groupAccess);
}
?><p class="course" id="6course">6 курс</p><?php $data = readFromDb($mysqli,false,array('name'),'student','groupNum="602"');$count = count($data);
if($count) {
  echo "<span class='group'> 602 група </span> <span class='count'>Кiлькiсть студентiв: $count </span>";
  echo doTable(array("Прізвище, Iм'я, По-батькові"),$data,$groupAccess);
}
?></div></div><script src="../js/toTop.js"></script></body></html>