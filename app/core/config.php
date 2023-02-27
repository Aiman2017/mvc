<?php

define('SERVER_NAME', $_SERVER['SERVER_NAME']);
const DEBUG = 0;
if (SERVER_NAME =='localhost') {

	define('DBNAME', 'mvc');
	define('USER', 'root' );
	define('PASSWORD','' );

}else {

}