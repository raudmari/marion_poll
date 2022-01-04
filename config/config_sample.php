<?php

// Andmebaasi ühendused

define('HOST', 'localhost'); // serveri nimi
define('USERNAME', 'siia DB kasutajanimi'); // kasutajanimi
define('PASSWORD', 'siia DB sisenemie parool'); // PHPMyAdmin parool
define('DBNAME', 'siia DB nimi'); // Andmebaasi nimi

$dsn = 'mysql:host=' . HOST . ';dbname=' . DBNAME;
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); // veateadete kättesaamiseks