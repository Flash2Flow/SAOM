<?php
require './lib/db.php';

$data = $_POST;

if( isset($_SESSION['logged_user'])) {
header('Location: /');
}

if( isset($data['submit_drop']))
{
	$errors = array();

	if ( $data['email'] == '' )
		{
			$errors[] = 'Введите email';
		}

	if ( empty($errors) )
		{
			$email = R::findOne('users', 'email = ?', array($data['email']));
			if ( $email )
			{
				$str=rand();
				$result = md5($str);

				$drop_mail->access_drop = '0';
				R::store($drop_mail);

				$drop_mail->access_drop = $result;
				R::store($drop_mail);
							//curl cardinal
				$token = 'ac01a9a846016b13e1249040c3bb1c3e';
				$url = 'https://cardinal1saom.herokuapp.com/api?0c83f57c786a0b4a39efab23731c7ebc='.$email->email.'&3c6e0b8a9c15224a8228b9a98ca1531d='.$token.'&c1a8a39a96d32cac85fd7bca0d50830b='.$result;
				$curl = curl_init();
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($curl, CURLOPT_VERBOSE, 1);
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_POST, true);

				$result = curl_exec($curl);
				$decoded = json_decode($result, true);

				if ( $decoded['StatusRequest'] == '201')
					{
					echo '<div style="color:green;">Письмо было отправлено на вашу почту</div><hr>';
					}

				if ( $decoded['StatusRequest'] == '401')
					{
					echo '<div style="color:red;">Неудачная попытка авторизация</div><hr>';
					}


			
			}else
			{
				$errors[] = 'Указанный email не найден';
			}
		}

			if( ! empty($errors))
				{
					echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
				}

}

if( isset($data['submit_auth']))
	{
		$errors = array();
		$user = R::findOne('users', 'login = ?', array($data['login']));
		if( $user )
			{
				if( password_verify($data['password'], $user->password) )
					{
						$_SESSION['logged_user'] = $user;
						echo '<div style="color: green;">Аuthorization complited</div><hr>';
					} else
				{
				$errors[] = 'Password not true';
			}
	} else
	{
		$errors[] = 'User not found';
	}

	if( ! empty($errors))
		{
			echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
		}
}
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

  <form class="forma" action="join.php" method="post">

      <div class="container">
      <h1 class="title_form">Вход в личный кабинет</h1>

      <div class="join_login">
        <div class="blocked_login">
          <i class="fas fa-sign-in-alt but" ></i>
        <input type="text" placeholder="Введите логин" name="login">
      </div>
    </div>

    <div class="join_password">
      <div class="blocked_password">
        <i class="fas fa-unlock-alt but"></i>
        <input type="password" placeholder="Введите пароль" name="password">
      </div>
    </div>
      </div>
      <button class="btn" name="submit_auth">Вход</button>
      <a href="#repass" class="repassword" id="btn1">Забыли пароль?</a>

      <div id="text" class="repas">
				<form class="repas" action="join.php" method="post">
        <button id="btn2">X</button>
        <h1 class="int">В разработке</h1>


        <input type="email" placeholder="Введите email" class="relog" name="email">

          <button class="pas" name="submit_drop">Сменить пароль</button>
					</form>
      </div>
    </form>






<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script type="text/javascript" src="http://yastatic.net/jquery/2.1.1/jquery.min.js"></script>
<script src="join/script/script.js"></script>
</body>

</html>
