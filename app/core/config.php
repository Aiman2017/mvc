<?php
const DEBUG = 1;

if ($_SERVER['SERVER_NAME'] === 'localhost') {
    define('DBSERVER', 'mvc=');
    define('DBNAME', 'mvc_db');
    define('USER', 'root');
    define('PASSWORD', '');
    define("OPTIONS", [PDO::ERRMODE_EXCEPTION => PDO::ATTR_ERRMODE]);

    define("ROOT", 'http://localhost/mvc/public/assets/');

} else {
    define('DBSERVER', 'mysql:hostname=mvc');
    define('DBNAME', 'mvc_db');
    define('USER', 'root');
    define('PASSWORD', '');

    define("ROOT", 'https://www.mywebsite.com/assets/');
}