<?php
//include module
require "rb.php";

//connect database

R::setup( 'mysql:host=localhost;dbname=cv60098_test','cv60098_test', '537003Finger' ); 


//start session on full pages
session_start();
