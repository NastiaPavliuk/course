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
  ?></div><div class="col-sm-3"><form class="search form-inline" name="search" method="post"><div class="container-1"><span class="icon" onclick="document.location.href = 'searchPage.php?query=' + $('#search').val();"><i class="fa fa-search"></i></span><input type="search" id="search" name="search" placeholder="Пошук..."></div></form></div></div></div></section><?php include '../php/db.php'; include '../php/readFromDB.php'; include '../php/doUsersTable.php'; include '../php/changeAccess.php'; $mysqli = new mysqli($link,$username,$password,$dbname); ?><div class="container"><div id="back-top"><a href="#header">Top</a></div><div id="accessTable"><?php  if(isset($_SESSION['register']) == "Admin"){
      $data = readFromDb($mysqli,false,array('name','mail','groupNum','access'),'users');
      echo "<p style='font-size: 28px; margin: 35px 0 25px 0;'>Таблиця користувачів</p>";
      echo doUsersTable(array("Iм'я","Email","Номер групи","Доступ"),$data);
  }
  else echo "<p style='margin-top: 30px; font-size: 26px;'>Для доступу до сторінки увійдіть як адміністратор</p>";
?></div></div></body></html>