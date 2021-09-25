<?php
require './lib/db.php';

if( isset($_SESSION['logged_user'])) {
header('Location: /');
}

	$data = $_POST;
	$login = $data['login'];

	if ( isset($data['submit_reg']) )
	{
		$errors = array();
		if ( trim($data['login']) == '' )
		{
			$errors[] = 'Введите логин';
		}


		if ( $data['password_1'] == '' )
		{
			$errors[] = 'Введите пароль';
		}

    	if ( $data['email'] == '' )
			{
				$errors[] = 'Введите email';
			}

		if ( $data['password_1'] != $data['password_2'] )
			{
				$errors[] = 'Повторный пароль введен не верно!';
			}

      	if(mb_strlen($data['login']) < 3 || mb_strlen($data['login']) > 20)
			{
	    		$errors[] = "Недопустимая длина логина";
    		}

        if(mb_strlen($data['email']) < 3 || mb_strlen($data['email']) > 20)
			{
	    		$errors[] = "Недопустимая длина логина";
    		}

      	if (preg_match('/^[а-я].*$/i', $login))
			{
    			$errors[] = "Запрет русских символов в стране, куда лезешь?";
			}

		if ( R::count('users', "login = ?", array($data['login'])) > 0)
			{
				$errors[] = 'Пользователь с таким логином уже существует!';
			}



		if ( empty($errors) )
			{
				$user = R::dispense('users');
				$user->login = $data['login'];
      			$user->email = $data['email'];
				$user->access_drop = '0';
				$user->password = password_hash($data['password_1'], PASSWORD_DEFAULT);
				R::store($user);
					echo '<div style="color:dreen;">Вы успешно зарегистрированы!<a href="join.php">Войти</a></div><hr>';
			}else
			{
					echo '<div id="errors" style="color:red;">' .array_shift($errors). '</div><hr>';
			}

	}

?>


<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="signup/css/style.css">
  <link rel="shortcut icon" href="main/image/logo.png" type="image/png">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,700;1,160&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <title>SAOM | Регистрация</title>
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

  <form class="forma" action="signup.php" method="post">
    <div class="container">
    	<h1 class="title_form">Создание личного кабинета</h1>
    	<div class="info">
      		<h1 class="title_info">Информация</h1>
    	</div>
        		<div class="reg">
      				<div class="blocked">
     					<input type="text" placeholder="Введите логин" name="login">
      					<h1 class="down_one">От 4 до 20 символов, A-Z, a-z, 0-9, нижнее подчёркивание</h1>
      					<input type="email" placeholder="Введите почту" name="email">
      					<h1 class="down_two">Рекомендуемые gmail и yandex</h1>
      					<input type="password" placeholder="Введите пароль" name="password_1">
      					<h1 class="down_three">От 6 до 32 символов, A-Z, a-z, 0-9</h1>
      					<input type="password" placeholder="Повторите пароль" name="password_2">
      					<h1 class="down_tho">Повторите введённый пароль в прошлой графе</h1>
    				</div>
  				</div>
    			<button class="btn" type="submit" name="submit_reg">Регистрация</button>
  	</div>
  </form>



<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="signup/script/script.js"></script>
</body>

</html>
