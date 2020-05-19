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
    $composerAutoloader = __DIR__.'/../vendor/autoload.php';
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

    <div id="slideshow">
      <div class="slide-wrapper">
        <div class="slide">
          <h1 class="slide-number"><?php echo $txt[0][$_SESSION["lang"]]; ?></h1>
        </div>
        <div class="slide">
          <h1 class="slide-number"><?php echo $txt[1][$_SESSION["lang"]]; ?></h1>
        </div>
        <div class="slide">
          <h1 class="slide-number"><?php echo $txt[2][$_SESSION["lang"]]; ?></h1>
        </div>
        <div class="slide">
          <h1 class="slide-number"><?php echo $txt[3][$_SESSION["lang"]]; ?></h1>
        </div>
      </div>
    </div>

    <div class="left">
      <div class="box_left">
        <div class="box_title"><?php echo $txt[4][$_SESSION["lang"]]; ?></div>
        <p><?php echo $txt[5][$_SESSION["lang"]]; ?></p>
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

    <div class="left">
      <br>
      <div class="box_left">
        <div class="box_title"><?php echo $txt[11][$_SESSION["lang"]]; ?></div>
        <iframe width="100%" height="400px" frameborder="0" allowfullscreen src="//umap.openstreetmap.fr/fr/map/free-canal-du-midi-france-cycling-map_455373?scaleControl=false&miniMap=false&scrollWheelZoom=true&zoomControl=true&allowEdit=false&moreControl=true&searchControl=null&tilelayersControl=false&embedControl=false&datalayersControl=null&onLoadPanel=none&captionBar=false&fullscreenControl=true&locateControl=false&measureControl=false&editinosmControl=false#9/43.4380/2.2192"></iframe>
      </div>
    </div>
    <div class="right">
      <br>
      <div class="box_right">
        <div class="box_title black"><?php echo $txt[8][$_SESSION["lang"]]; ?></div>
        <center>
          <p><?php echo $txt[9][$_SESSION["lang"]]; ?></p>
          <div class="button-survey"><a href="survey.php" style="text-decoration: none;color:inherit;"><?php echo $txt[10][$_SESSION["lang"]]; ?></a></div>
        </center>
      </div>
    </div>

    <?php

  


    while ($a = $articles->fetch()) {
      echo '
      <div class="right">
      <br>
      <div class="box_right">
        <div class="box_title black">'; echo $txt[12][$_SESSION["lang"]]; echo'</div>';

    $string = strip_tags($a['contenu']);
    if (strlen($string) > 500) {

    // truncate string
    $stringCut = substr($string, 0, 500);
    $endPoint = strrpos($stringCut, ' ');
    $id = $a['id'];

    //if the string doesn't contain any space then it will cut without word basis.
    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
    $viewmore = $txt[13][$_SESSION["lang"]];

    $lang = $_SESSION["lang"];
    $titre = $a['titre'];

    if ($lang != "fr"){ // si le site n'est pas en version française
      try {
                $key = KEY_TRANSLATION;
                $translator = new Translator($key);
                $texte = html_entity_decode($string);
                $string = $translator->translate($texte, "fr-$lang");
                $titre = $translator->translate($titre, "fr-$lang");
              } catch (Exception $e) {
                // handle exception
      }
    }

    $string .= "... <a href=\"voir_article.php?id=$id\">$viewmore</a>";

    }
      echo "<br><center><b><a href=\"voir_article.php?id=$id\">".$titre.'</a></b></center><hr>';
      echo '<p>'.$string.'</p></div></div>';
    }

    ?>

    <div class="left">
      <br>
      <div class="box_left">
        <div class="box_title"><?php echo $txt[4][$_SESSION["lang"]]; ?></div>
        <center>
          <iframe width="100%" height="400" src="https://www.youtube-nocookie.com/embed/z3fi7o5MOMQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </center>
      </div>
    </div>

    <div class="right">
      <br>
            <div class="box_right">
        <div class="box_title black"><?php 
        if ($_SESSION["lang"] == "fr"){
          echo "Une image de notre galerie";
         } else if ($_SESSION["lang"] == "en"){
          echo "An image from our gallery";
         } else if ($_SESSION["lang"] == "es"){
          echo "Una imagen de nuestra galería";
         }
         ?></div>
      

        <center>
          <iframe src="includes/iframe_galerie.php" scrolling="no" frameborder="0" ></iframe>
          <hr>
          <a href="galerie.php">
          <?php 
          if ($_SESSION["lang"] == "fr"){
            echo "Voir notre galerie";
           } else if ($_SESSION["lang"] == "en"){
            echo "See our gallery";
           } else if ($_SESSION["lang"] == "es"){
            echo "Vea nuestra galería";
           }
           ?></a>
        </center>
      </div>

    </div>

  




    <div class="clear"></div>


    <?php include("includes/footer.php"); ?>