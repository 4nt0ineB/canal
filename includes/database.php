<?php
// connexion à la base abastos de sqletud

define('HOST', '51.210.15.73');
define('DB_NAME', 'canal');
define('USER', 'debian2');
define('PASS', 'zibaldone52');

try {
    $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
    $db->exec("set names utf8");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection to database failed";
}
