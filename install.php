<?php

require('config/config.php'); // faili sisu, mis on config kausta konfig failis

try {
    $connection = new PDO('mysql:host=' . HOST, USERNAME, PASSWORD, $options); // ühendus andmebaasiga
    $connection->exec('SET NAMES utf8'); // SQL lause, et täpitähed oleksid loetavad
    $sql = file_get_contents('config/init_poll.sql'); // Faili sisu loetakse muutujasse (SQL)  
    $connection->exec($sql); // Reaalselt teeb andmebaasi, tabli ja lisab kirjed

    echo '<p>Andmebaas ja tabel questions ja answers on loodud edukalt.</p>';
    echo '<a href="index.php">Avalehele</a>';
} catch (PDOException $error) {
    echo $error->getMessage();  // süsteemne veateade
}