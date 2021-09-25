<?php

//include module
require './lib/db.php';

//if session save, show login
if( isset($_SESSION['logged_user']))
{
  echo '<div style="color:black;"><a style="color:white;">На данный момент личный кабинет находится в разработке, ожидайте новостей</a></div><hr>';
}

//echo $_SESSION['logged_user']->login;


?>


<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="main/css/iconsfont.css">
  <link rel="stylesheet" href="main/css/style.css">
  <link rel="shortcut icon" href="main/image/logo.png" type="image/png">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,700;1,160&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <title>SAOM | Главная</title>
</head>

<body>

  <header>
      <div class="header__inner">
        <div class="nav">

<a class="img" href="index.php"><img src="./main/image/logo.png" alt=""></a>

          <ul class="menu">
            <li><a class="menu__nav" href="https://donate.saom.online/">Донат</a></li>
            <li><a class="menu__one" href="index.php">Главная</a></li>
            <li><a class="menu__two" href="https://saom.online/index.php">Форум</a></li>
            <?php
						if( isset($_SESSION['logged_user'])) {

							echo '<li><a class="menu__nav" href="out.php">Выход</a></li>';
						}else
						{
								echo '<li><a class="menu__nav" href="join.php">Вход</a></li>';
						}
						?>
          </ul>

        </div>
      </div>
  </header>

  <intro >
    <div class="container">
      <div class="intro">
        <h1 class="promo">SWORD ART ONLINE MINECRAFT</h1>

        <p class="info">
        Ролевой игровой сервер по жанру <strong class="sto">Мастера меча онлайн</strong>.<br>
        Окунись в виртуальный режим игры и начни своё приключение из разных классов.<br>
        На сервере имеется множество классов, боёвки, прокачки персонажа и его навыков.<br>
        <strong class="stt">Мы ждём именно тебя, присоединяйся к нам.</strong><br>
      </p>
      </div>

      <!--btn_one-->
        <button class="btn_one">
<i class="fas fa-play but_one"></i>
          <a href="#start" class="link_one">Начать играть</a>
        </button>
        <!--btn_two-->
      <button class="btn_two">
        <i class="fas fa-sign-in-alt but_two"></i>
        <a href="signup.php"class="link_two">Зарегистрироваться</a>
      </button>
    </div>

    <div class="start_game" id="start">
      <h1 class="start">Как начать играть?</h1>
      <!--Линейки-->
      <div class="line_one">
      <p class="info_one"> -
          <a href="https://register.saom.online/launcher/SAOM.zip" target="_blank" class="down">Скачайте</a>
        папку с лаунчером и разархивируйте его в любое место.</p>
      </div>
      <div class="line_two">
        <p class="info_two"> - Запустите установленный .exe файл лаунчера и скачайте на любой диск.</p>
      </div>
      <div class="line_three">
        <p class="info_three"> - Запустите установленный лаунчер и начните игру!</p>
      </div>

      <div class="tipes_one">
      <span class="iconify" data-icon="feather:download"
          style="
          position: absolute;
            color: white;
            width: 70px;
            height: 70px;

            top: 20px;
            left: 30px;
          "
        ></span>
      </div>
      <div class="tipes_two">
        <span class="iconify" data-icon="akar-icons:file"
          style="
          position: absolute;
            color: white;
            width: 70px;
            height: 70px;
            top: 20px;
            left: 30px;
          "
        ></span>
      </div>
      <div class="tipes_three">
        <span class="iconify" data-icon="healthicons:i-documents-accepted-outline"
        style="
        position: absolute;
          color: white;
          width: 70px;
          height: 70px;

          top: 20px;
          left: 30px;
        ">
        </span>
      </div>

      <div class="container">
      <h1 class="warn">ВАЖНО</h1>
      <p class="warn_info">Если при установки лаунчера у вас появилась проблема то обратитесь за помощью на
        <a class="forum" href="https://saom.online/index.php?forums/%D0%A7%D0%B0%D1%81%D1%82%D1%8B%D0%B5-%D0%B2%D0%BE%D0%BF%D1%80%D0%BE%D1%81%D1%8B.18/" target="_blank">форуме.</a>
      </p>
      <div class="first_line"></div>

      <p class="attention">
        <h1 class="ogl_one">РЕКОМЕНДУЕМЫЕ МИНИМАЛЬНЫЕ СИСТЕМНЫЕ ТРЕБОВАНИЯ К ПК:</h1><br>
        <h1 class="ogl_two">Видеокарта встроенная:<br></h1>
        <h1 class="info_tw">- Intel HD Graphics 4000 (Ivy Bridge)<br>
        - AMD Radeon R5 series (Kaveri line) with OpenGL 4.41<br>
      </h1>
      <h1 class="ogl_three">Видеокарта дискретная:<br></h1>
       <h1 class="info_thr">- Nvidia GeForce 400 Series<br>
       - AMD Radeon HD 7000 series with OpenGL 4.4<br>
      </h1>
      <h1 class="ogl_fthout">Процессор:<br></h1>
      <h1 class="info_fth">- Intel Core i2<br>
      - AMD A5<br>
      </h1>
      <h1 class="ogl_five">Оперативная память:<br></h1>
      <h1 class="info_fi">- 3 GB<br>
      </h1>
      <h1 class="ogl_six">Жесткий диск:</h1>
       <h1 class="info_si">~ 5 Gb
     </h1>
      </p>
    </div>
    </div>
  </intro>

  <footer>
    <div class="footer">
      <a href="https://vk.com/goldenfx" class="dev" target="_blank">Developed .shot</a>
      <h1 class="social">Наши соц.сети:</h1>
      <a href="https://www.youtube.com/channel/UCCKaf25zZNu7bQ2j8rSt6eA" target="_blank">
        <i class="fab fa-youtube youtube"></i>
      </a>
      <a href="https://vk.com/saom_project" target="_blank">
        <i class="fab fa-vk vk"></i>
      </a>
        <a href="https://discord.gg/fn8xQEuGK6" target="_blank">
          <i class="fab fa-discord discord"></i>
          </a>
      <img class="footerpng" src="./main/image/footer.png" alt="">
      <h1 class="shield">Все права защищены
        <a class="shieldd" href="index.php">SAOM</a>
    </div>
  </footer>

<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="main/scrippt/script.js"></script>
</body>
</html>
