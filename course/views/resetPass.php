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
  ?></div><div class="col-sm-3"><form class="search form-inline" name="search" method="post"><div class="container-1"><span class="icon" onclick="document.location.href = 'searchPage.php?query=' + $('#search').val();"><i class="fa fa-search"></i></span><input type="search" id="search" name="search" placeholder="Пошук..."></div></form></div></div></div></section><div class="container"><p style="margin: 30px 0 15px 0; font-size: 18px; font-weight: bold;">Введіть Вашу пошту. На неї буде надіслано посилання для відновлення паролю.</p><p class="text_center mesage_error" id="valid_email_message" style="color: darkred;"></p><form method="post" action="../php/send_link_reset_password.php"><input class="form-control" type="email" name="email" placeholder="Email" style="width: 35%;"><input class="btn btn-success" type="submit" name="send" value="Відправити" style="margin-top: 10px;"></form></div><script type="text/javascript">  $(document).ready(function(){
  "use strict";
  //регулярное выражение для проверки email
  var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;
  var mail = $('input[name=email]');
  mail.blur(function(){
   if(mail.val() != ''){
       // Проверяем, если email соответствует регулярному выражению
       if(mail.val().search(pattern) == 0){
           // Убираем сообщение об ошибке
           $('#valid_email_message').text('');
   //Активируем кнопку отправки
$('input[type=submit]').attr('disabled', false);
}else{
   //Выводим сообщение об ошибке
$('#valid_email_message').text('Не правильный Email');
   // Дезактивируем кнопку отправки
$('input[type=submit]').attr('disabled', true);
}
}else{
$('#valid_email_message').text('Введите Ваш email');
}
});
});</script></body></html>