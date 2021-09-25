
<?php
require './lib/db.php';

if( isset($_SESSION['logged_user'])) {
header('Location: /');
}
else
{
header('Location: /');
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="Personal/css/style.css">
  <link rel="shortcut icon" href="main/image/logo.png" type="image/png">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,700;1,160&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <title>SAOM | Личный кабинет</title>
</head>

<body>

  <header>
      <div class="header__inner">
        <div class="nav">

<a class="img" href="index.php"><img src="./main/image/logo.png" alt=""></a>

          <ul class="menu">
            <li><a class="menu__nav" href="https://donate.saom.online/" target="_blank">Донат</a></li>
            <li><a class="menu__one" href="index.php" target="_blank">Главная</a></li>
            <li><a class="menu__two" href="https://saom.online/index.php" target="_blank">Форум</a></li>
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

<intro>
  <div class="container">
    <div class="NickName">
      <h1 class="nk">NickName
<a href="#" class="repassword">(Сменить пароль)</a>
      </h1>
    </div>
    <div class="info">
      <h1 class="chapter">Характеристика</h1>
      <h1 class="number">Номер персонажа: ####</h1>
    </div>
  </div>
</intro>



</body>

</html>
