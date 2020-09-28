<?php
define('HOST', '*******');
define('DB_NAME', '*******');
define('USER', '*******');
define('PASS', '*******');

define('CAPTCHA_KEY',"6Lcvb_cUAAAAACt0_rt2evFprt8vnZNBscLnQXWX"); 
define('CAPTCHA_SECRET_KEY',"6Lcvb_cUAAAAAM-JVO2wuSokTHB_0IciuNWU6dWa");

/* API KEY TRANSLATION */
define("KEY_TRANSLATION", "trnsl.1.1.20200513T201756Z.6896cddb8b6c8f22.2a79ad549df8ea96e738d19df21f8e7eba76a715");

try {
    $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
    $db->exec("set names utf8");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection to database failed";
}
