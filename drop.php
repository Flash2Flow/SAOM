<?php
require './lib/db.php';

if( isset($_SESSION['logged_user'])) {
    header('Location: /');
    }

$access_drop = $_GET["c1a8a39a96d32cac85fd7bca0d50830b"];
$email = $_GET["0c83f57c786a0b4a39efab23731c7ebc"];

$data = $_POST;
$drop = R::findOne('users', 'email = ?', array($email);
if( $drop )
    {
        if ( $drop->access_drop == $access_drop )
        {
            ?>
            <!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="join/css/iconsfont.css">
  <link rel="stylesheet" href="join/css/style.css">
  <link rel="shortcut icon" href="main/image/logo.png" type="image/png">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,700;1,160&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <title>SAOM | Вход</title>
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
			<li><a class="menu__nav" href="join.php">Вход</a></li>
          </ul>

        </div>
      </div>
  </header>

      <div class="repas">
		<form class="repas" action="drop.php" method="post">
            <h1 class="int">Сброс пароля</h1>
            <input type="text" placeholder="Введите новый пароль" class="relog" name="password">
            <button class="pas" name="submit_drop">Сменить пароль</button>
		</form>
      </div>






<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
</body>

</html>

            <?php

        }else
        {
            header('Location: /');
        }
    }

    if( isset($data['submit_drop']))
    {
        $errors = array();

        
	    if ( $data['password'] == '' )
            {
                $errors[] = 'Введите пароль';
            }


        if(mb_strlen($data['password']) < 3 || mb_strlen($data['password']) > 20)
            {
                $errors[] = "Недопустимая длина пароля";
            }

        if (preg_match('/^[а-я].*$/i', $data['password']))
			{
    			$errors[] = "Запрет русских символов в стране, куда лезешь?";
			}

        if ( empty($errors) )
            {
                $drop->password = password_hash($data['password'], PASSWORD_DEFAULT);
                R::store($drop);
                echo '<div style="color:dreen;">Вы успешно сбросили пароль!<a style="color:white;" href="join.php">Войти</a></div><hr>';
            }else
            {
                echo '<div id="errors" style="color:red;">' .array_shift($errors). '</div><hr>';
            }
    }
?>
