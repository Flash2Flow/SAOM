<?php
require './lib/db.php';

$login = $_GET['login'];
$password = $_GET['password'];
if(empty($login) || empty($password)) {
	exit('Empty login or password');
}


$is_logged = false;

$user = R::findOne('users', 'login = ?', array($login));
		if ( $user )
        {
          if ( password_verify($password, $user->password) )
			{
				$is_logged = true;
			}
        }


echo($is_logged ? 'OK:' . $user['login'] : 'Incorrect login or password');
?>
