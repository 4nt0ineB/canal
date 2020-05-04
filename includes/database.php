<?php
// connexion à la base abastos de sqletud

define('HOST', 'sql7.freemysqlhosting.net');
define('DB_NAME', 'sql7337700');
define('USER', 'sql7337700');
define('PASS', '6WznURBcPi');

try {
    $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
    $db->exec("set names utf8");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection to database failed";
}
