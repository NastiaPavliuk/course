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
  ?></div><div class="col-sm-3"><form class="search form-inline" name="search" method="post"><div class="container-1"><span class="icon" onclick="document.location.href = 'searchPage.php?query=' + $('#search').val();"><i class="fa fa-search"></i></span><input type="search" id="search" name="search" placeholder="Пошук..."></div></form></div></div></div></section><?php include '../php/readStudentFromDB.php'?>
<?php include '../php/updateStudent.php'?>
<?php include '../php/addStudentToDB.php'?>
<?php include '../php/deleteStudent.php'?>
<?php include '../php/makeSelect.php'?><div class="container"><?php if(isset($_SESSION['register'])) echo "<form id='card' method='post'>"; else echo "<div id='card'>"?><div class="student-info"><?php  if(isset($_GET['add']))
      echo '<input type="text" name="name" class="form-control name" placeholder="Прізвище, ім\'я, по-батькові*" required value="">';
  else foreach ($dataSt as $dt)
      if($_SESSION['register'] == "Admin" || (isset($_SESSION['register']) && $groupAccess == $dt[4]))
          echo "<input type='text' name='name' class='form-control name' value=\"$dt[1]\">";
      else echo "<span class='name'>$dt[1]</span>";?><?php if(!isset($_SESSION['register'])){  $course = strval($dt[4]{0});
  echo "<span class='studing'>$course курс</span>";}?></div><div class="main-info"><div class="mail-block"><span class="label">Пошта:</span><?php  if(isset($_GET['add']))
      echo "<input type='text' name='mail' class='form-control mail'value=''>";
  else foreach ($dataSt as $dt)
      if($_SESSION['register'] == "Admin" || (isset($_SESSION['register']) && $groupAccess == $dt[4]))
          echo "<input type='text' name='mail' class='form-control mail' value=\"$dt[2]\">";
      else echo "<span class='mail'>$dt[2]</span>";?></div><div class="phone-block"><span class="label">Телефон:</span><?php  if(isset($_GET['add']))
      echo "<input type='text' name='phone' class='form-control phone' value=''>";
  else foreach ($dataSt as $dt)
      if($_SESSION['register'] == "Admin" || (isset($_SESSION['register']) && $groupAccess == $dt[4]))
          echo "<input type='text' name='phone' class='form-control phone' value=\"$dt[3]\">";
      else echo "<span class='phone'>$dt[3]</span>";?></div></div><div class="information"><h1>Анкетнi данi</h1><div id="information"><div class="row"><div class="col-sm-6"><div class="row"><div class="col-sm-6"><span class="label">Дата народження:</span></div><div class="col-sm-6"><?php  if(isset($_GET['add']))
      echo "<input type='date' name='dateOfBirth' class='form-control dateOfBirth' value=''>";
  else foreach ($dataSt as $dt)
      if($_SESSION['register'] == "Admin" || (isset($_SESSION['register']) && $groupAccess == $dt[4]))
          echo "<input type='date' name='dateOfBirth' class='form-control dateOfBirth' value=\"$dt[6]\">";
      else echo "<span class='dateOfBirth'>$dt[6]</span>";?></div></div><div class="row"><div class="col-sm-6"><span class="label">Сайт:</span></div><div class="col-sm-6"><?php  if(isset($_GET['add']))
      echo "<input type='text' name='webSite' class='form-control webSite' value=''>";
  else foreach ($dataSt as $dt)
      if($_SESSION['register'] == "Admin" || (isset($_SESSION['register']) && $groupAccess == $dt[4]))
          echo "<input type='text' name='webSite' class='form-control webSite' value=\"$dt[16]\">";
      else echo "<span class='webSite'>$dt[16]</span>";?></div></div><div class="row"><div class="col-sm-6"><span class="label">Номер групи*:</span></div><div class="col-sm-6"><?php  if(isset($_GET['add']))
      if($_SESSION['register'] == "Admin")
          echo makeSelect('none',false);
      else echo makeSelect($_SESSION['register'],true);
  else foreach ($dataSt as $dt)
      if($_SESSION['register'] == "Admin")
          echo  makeSelect($dt[4]);
      else if($_SESSION['register']==$dt[4])
          echo "<input type='text' value=$dt[4] class='form-control' disabled name='groupNum'>";
      else echo "<span class='groupNum'>$dt[4]</span>";?></div></div><div class="row"><div class="col-sm-6"><span class="label">Статус:</span></div><div class="col-sm-6"><?php  if(isset($_GET['add']))
      echo "<input type='text' name='status' class='form-control status' value=''>";
  else foreach ($dataSt as $dt)
      if($_SESSION['register'] == "Admin" || (isset($_SESSION['register']) && $groupAccess == $dt[4]))
          echo "<input type='text' name='status' class='form-control status' value=\"$dt[5]\">";
      else echo "<span class='status'>$dt[5]</span>";?></div></div><div class="row"><div class="col-sm-6"><span class="label">Домашня адреса:</span></div><div class="col-sm-6"><?php  if(isset($_GET['add']))
      echo "<input type='text' name='address' class='form-control address' value=''>";
  else foreach ($dataSt as $dt)
      if($_SESSION['register'] == "Admin" || (isset($_SESSION['register']) && $groupAccess == $dt[4]))
          echo "<input type='text' name='address' class='form-control address' value=\"$dt[7]\">";
      else echo "<span class='address'>$dt[7]</span>";?></div></div><div class="row"><div class="col-sm-6"><span class="label">Номер кiмнати в гуртожитку:</span></div><div class="col-sm-6"><?php  if(isset($_GET['add']))
      echo "<input type='text' name='numberOfRoom' class='form-control numberOfRoom' value=''>";
  else foreach ($dataSt as $dt)
      if($_SESSION['register'] == "Admin" || (isset($_SESSION['register']) && $groupAccess == $dt[4]))
          echo "<input type='text' name='numberOfRoom' class='form-control numberOfRoom' value=\"$dt[8]\">";
      else echo "<span class='numberOfRoom'>$dt[8]</span>";?></div></div></div><div class="col-sm-6"><div class="row"><div class="col-sm-6"><span class="label">ЗОШ, яку закiнчив:</span></div><div class="col-sm-6"><?php  if(isset($_GET['add']))
      echo "<input type='text' name='school' class='form-control school' value=''>";
  else foreach ($dataSt as $dt)
      if($_SESSION['register'] == "Admin" || (isset($_SESSION['register']) && $groupAccess == $dt[4]))
          echo "<input type='text' name='school' class='form-control school' value=\"$dt[9]\">";
      else echo "<span class='school'>$dt[9]</span>";?></div></div><div class="row"><div class="col-sm-6"><span class="label">ПIБ директора:</span></div><div class="col-sm-6"><?php  if(isset($_GET['add']))
      echo "<input type='text' name='nameOfDirector' class='form-control nameOfDirector' value=''>";
  else foreach ($dataSt as $dt)
      if($_SESSION['register'] == "Admin" || (isset($_SESSION['register']) && $groupAccess == $dt[4]))
          echo "<input type='text' name='nameOfDirector' class='form-control nameOfDirector' value=\"$dt[10]\">";
      else echo "<span class='nameOfDirector'>$dt[10]</span>";?></div></div><div class="row"><div class="col-sm-6"><span class="label">Мови програмування:</span></div><div class="col-sm-6"><?php  if(isset($_GET['add']))
      echo "<input type='text' name='proLang' class='form-control proLang' value=''>";
  else foreach ($dataSt as $dt)
      if($_SESSION['register'] == "Admin" || (isset($_SESSION['register']) && $groupAccess == $dt[4]))
          echo "<input type='text' name='proLang' class='form-control proLang' value=\"$dt[11]\">";
      else echo "<span class='proLang'>$dt[11]</span>";?></div></div><div class="row"><div class="col-sm-6"><span class="label">Досягнення:</span></div><div class="col-sm-6"><?php  if(isset($_GET['add']))
      echo "<input type='text' name='achievement' class='form-control achievement' value=''>";
  else foreach ($dataSt as $dt)
      if($_SESSION['register'] == "Admin" || (isset($_SESSION['register']) && $groupAccess == $dt[4]))
          echo "<input type='text' name='achievement' class='form-control achievement' value=\"$dt[12]\">";
      else echo "<span class='achievement'>$dt[12]</span>";?></div></div><div class="row"><div class="col-sm-6"><span class="label">Iнтереси:</span></div><div class="col-sm-6"><?php  if(isset($_GET['add']))
      echo "<input type='text' name='interest' class='form-control interest' value=''>";
  else foreach ($dataSt as $dt)
      if($_SESSION['register'] == "Admin" || (isset($_SESSION['register']) && $groupAccess == $dt[4]))
          echo "<input type='text' name='interest' class='form-control interest' value=\"$dt[13]\">";
      else echo "<span class='interest'>$dt[13]</span>";?></div></div><div class="row"><div class="col-sm-6"><span class="label">Пропозицiї:</span></div><div class="col-sm-6"><?php  if(isset($_GET['add']))
      echo "<input type='text' name='suggestions' class='form-control suggestions' value=''>";
  else foreach ($dataSt as $dt)
      if($_SESSION['register'] == "Admin" || (isset($_SESSION['register']) && $groupAccess == $dt[4]))
          echo "<input type='text' name='suggestions' class='form-control suggestions' value=\"$dt[14]\">";
      else echo "<span class='suggestions'>$dt[14]</span>";?></div></div><div class="row"><div class="col-sm-6"><span class="label">Iнформацiя про батькiв:</span></div><div class="col-sm-6"><?php  if(isset($_GET['add']))
      echo "<textarea name='parentsInfo' class='form-control parentsInfo' rows='10'></textarea>";
  else foreach ($dataSt as $dt)
      if($_SESSION['register'] == "Admin" || (isset($_SESSION['register']) && $groupAccess == $dt[4]))
          echo "<textarea name='parentsInfo' class='form-control parentsInfo' rows='10'>$dt[15]</textarea>";
      else echo "<span class='parentsInfo'>$dt[15]</span>";?></div></div></div></div></div></div><?php  if(isset($_GET['add']))
      echo "<button type='submit' name='addStudent' class='btn btn-success'>Додати</button>";
  else if($_SESSION['register'] == "Admin" || (isset($_SESSION['register']) && $groupAccess == $dt[4])){
      echo "<button type='submit' name='updateStudent' class='btn btn-warning'>Редагувати</button>";
      echo "<button type='submit' name='deleteStudent' class='btn btn-danger'>Видалити</button>";
}
?><?php if(isset($_SESSION['register'])) echo "</form>"; else echo "</div>";?></div></body></html>