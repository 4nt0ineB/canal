<?php

/**
 * Minimal class autoloader
 *
 * @param string $class Full qualified name of the class
 */
function miniAutoloader($class)
{
    $class = str_replace('\\', '/', $class);
    require __DIR__ . '/includes/' . $class . '.php';
}

// If the Composer autoloader exists, use it. If not, use our own as fallback.
$composerAutoloader = __DIR__ . '/../vendor/autoload.php';
if (is_readable($composerAutoloader)) {
    require $composerAutoloader;
} else {
    spl_autoload_register('miniAutoloader');
}

use Translate\Translator;
use Translate\Exception;

?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Site web - Canal du Midi</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/language.css">
    <link rel="stylesheet" href="css/slideshow.css">


</head>

<body>
    <div id="container">

        <?php
        include('includes/header.php');
        include('includes/menu.php');
        //ON RECUP LA TRAD DE LA PAGE
        $contenuIndex = $db->query("SELECT * FROM p_accueil");
        $txt = $contenuIndex->fetchAll();

        // statistiques
        $query_count = $db->query("SELECT compteur FROM stats WHERE page=\"index\";")->fetch();
        $count = $query_count["compteur"];
        $db->query("UPDATE stats SET compteur=$count+1 WHERE page=\"index\";");

        // articles
        $articles = $db->query("SELECT * FROM articles ORDER BY date DESC LIMIT 1");

        // get ip
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) { // récupérer l'ip du visiteur de différentes manières
            //ip depuis protocole internet HTTP
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // sinon ip depuis proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        if (isset($ip)) {
            $user_exists = $db->query("SELECT * FROM visiteurs WHERE ip=\"$ip\"");

            $ip_query = $user_exists->fetch();
            $count_ip = $ip_query["compteur"];

            if ($user_exists->rowCount() == 0) {
                $db->query("INSERT INTO visiteurs VALUES (NULL, \"$ip\", 1, NOW(), NOW());");
            } else {
                $db->query("UPDATE visiteurs SET compteur=$count_ip+1, lastLogin=NOW() WHERE ip=\"$ip\";");
            }
        }
        ?>



        <div class="left">
            <div class="box_left">
                <div class="box_title">
                    <p>404</p>
                </div>
                <p>Not found</p>
            </div>
        </div>
        <div class="right">
            <div class="box_right">
                <div class="box_title black"><?php echo $txt[6][$_SESSION["lang"]]; ?></div>

                <center>
                    <h3><?php echo $txt[7][$_SESSION["lang"]]; ?><u>Toulouse</u></h3>
                    <ul style="list-style: none;margin-block-start: 0;padding-inline-start: 0;">
                        <li><?php include("includes/meteo.php"); ?></li>
                    </ul>
                </center>
            </div>
        </div>










        <div class="clear"></div>


        <?php include("includes/footer.php"); ?>