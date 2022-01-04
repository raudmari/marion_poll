<?php

// Andmebaasi ühendused

define('HOST', 'localhost'); // serveri nimi
define('USERNAME', 'marionraudsepp'); // kasutajanimi
define('PASSWORD', 'Parool123'); // PHPMyAdmin parool
define('DBNAME', 'marionraudsepp_poll'); // Andmebaasi nimi

$dsn = 'mysql:host=' . HOST . ';dbname=' . DBNAME;
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); // veateadete kättesaamiseks