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
  ?></div><div class="col-sm-3"><form class="search form-inline" name="search" method="post"><div class="container-1"><span class="icon" onclick="document.location.href = 'searchPage.php?query=' + $('#search').val();"><i class="fa fa-search"></i></span><input type="search" id="search" name="search" placeholder="Пошук..."></div></form></div></div></div></section><?php  include '../php/db.php';;
  error_reporting(E_ALL);
  $mysqli = new mysqli($link,$username,$password,$dbname);
  $mysqli->query("SET NAMES 'utf8'");
  if(isset($_GET['token']) && !empty($_GET['token'])){
      $token = $_GET['token'];
  }else{
  exit("<p><strong>Помилка!</strong> Відсутній перевірковий код.</p>");
  }
  if(isset($_GET['email']) && !empty($_GET['email'])){
      $email = $_GET['email'];
  }else{
      exit("<p><strong>Помилка!</strong> Відсутній Email.</p>");
  }
  $query_select_user = $mysqli->query("SELECT reset_password_token FROM users WHERE mail = '".$email."'");
  if(($row = $query_select_user -> fetch_assoc()) != false){
      if($query_select_user -> num_rows == 1){
          if($token == $row['reset_password_token']){
           echo '<div class="container" style="margin-top: 30px">
                      <p style="font-size: 18px; font-weight: bold"> Змініть пароль </p>
                      <br>
                      <form action="../php/updatePass.php" method="post">
                          <input type="password" class="form-control" style="width:30%" name="password" placeholder="Новий пароль" required/></br>
                          <input type="password" class="form-control" style="width:30%" name="confirm_password" placeholder="Підтвердіть пароль" required/></br>
                          <input type="hidden" name="token" value="'.$token.'">
                          <input type="hidden" name="email" value="'.$email.'">
                          <input type="submit" name="set_new_password" value="Змінити пароль" class="btn btn-success" />
                      </form>
                  </div>
                  ';
          }else{
              exit("<p><strong>Помилка!</strong> Невірний код.</p>");
          }
      }else{
          exit("<p><strong>Помилка!</strong> Такий користувач не зареєстрований </p>");
      }
  }
?></body></html>