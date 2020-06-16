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
</head>

<body>
    <div id="container">

        <?php
        include('includes/header.php');
        include('includes/menu.php');
        //ON RECUP LA FICHE
        if (isset($_GET['id'])){
        	$i = $_GET['id'];
        }

        // statistiques
        $query_count = $db->query("SELECT compteur FROM stats WHERE page=\"fiche\";")->fetch();
        $count = $query_count["compteur"];
        $db->query("UPDATE stats SET compteur=$count+1 WHERE page=\"fiche\";");

        if (!isset($i)){
        	$errorMessage = "Merci de sélectionner une fiche.";
        } else if (empty($i)){
        	$errorMessage = "Merci de sélectionner une fiche correcte.";
        } else if (!is_numeric($i)){
			$errorMessage = "Merci de sélectionner une fiche correcte.";
        } else {
        	$fiche = $db->query("SELECT * FROM fiches WHERE id=$i")->fetch();
        }

        if (isset($errorMessage)){
        	echo '<p>'.$errorMessage.'</p>';
        	die;
        }
        ?>

        <div class="left">
            <div class="box_left">
                <div class="box_title"><?php echo $fiche['titre']; ?></div>
                <br>
                <?php echo '<img src="' . $fiche['miniature'] . '" style="width: 250px;">'; ?>
                <hr>
                <p>
                <?php
                  $lang = $_SESSION["lang"];
                  $description = $fiche['description'];
                    if ($lang != "fr"){ // si le site n'est pas en version française
                      try {
                                $key = KEY_TRANSLATION;
                                $translator = new Translator($key);
                                $description = html_entity_decode(strip_tags($fiche['description'], '<p><strong><hr><h2><h1><b><u><i><img><div><iframe><center><figure><figcaption>'), ENT_QUOTES, 'UTF-8');
                                $description = $translator->translate($description, "fr-$lang");
                              } catch (Exception $e) {
                                // handle exception
                      }
                    } else {
                      $description = $fiche['description'];
                    }
                ?>
                <?php echo $description; ?></p>

            </div>
            <div style="clear:both;"></div>
        </div>

        <div class="right">
        <div class="box_right">
        <div class="box_title black">
        <?php
        if ($_SESSION["lang"] == "fr") {
          echo "Météo";
        } else if ($_SESSION["lang"] == "en") {
          echo "Weather";
        } else if ($_SESSION["lang"] == "es") {
          echo "El tiempo";
        }
        ?></div>

        <center>
          <h3><?php
              if ($_SESSION["lang"] == "fr") {
                echo "Météo actuelle pour la ville de :<br>";
              } else if ($_SESSION["lang"] == "en") {
                echo "Actual weather for the city of :<br>";
              } else if ($_SESSION["lang"] == "es") {
                echo "El tiempo real para la ciudad de : <br>";
              }
              ?><u>Toulouse</u></h3>
          <ul style="list-style: none;margin-block-start: 0;padding-inline-start: 0;">
            <li><?php include("includes/meteo.php"); ?></li>
          </ul>
        </center>
      </div>

      <br>

      <div class="box_right">
      <div class="box_title black">
        <?php
        if ($_SESSION["lang"] == "fr") {
          echo "Votre avis nous intéresse";
        } else if ($_SESSION["lang"] == "en") {
          echo "Your opinion matters to us";
        } else if ($_SESSION["lang"] == "es") {
          echo "Su opinión nos importa";
        }
        ?></div>

        <center>
          <p>
          <?php
        if ($_SESSION["lang"] == "fr") {
          echo "Aidez-nous à améliorer votre expérience en remplissant un petit formulaire.";
        } else if ($_SESSION["lang"] == "en") {
          echo "Help us improve your experience by filling out a short form.";
        } else if ($_SESSION["lang"] == "es") {
          echo "Ayúdenos a mejorar su experiencia rellenando un breve formulario.";
        }
        ?>
          </p>
          <div class="button-survey"><a href="survey.php" style="text-decoration: none;color:inherit;">
          <?php
        if ($_SESSION["lang"] == "fr") {
          echo "Formulaire";
        } else if ($_SESSION["lang"] == "en") {
          echo "Form";
        } else if ($_SESSION["lang"] == "es") {
          echo "Formulario";
        }
        ?>
          </a></div>
        </center>
      </div>

      <br>

      <div class="box_right">
        <div class="box_title black"><?php
                                      if ($_SESSION["lang"] == "fr") {
                                        echo "Une image de notre galerie";
                                      } else if ($_SESSION["lang"] == "en") {
                                        echo "An image from our gallery";
                                      } else if ($_SESSION["lang"] == "es") {
                                        echo "Una imagen de nuestra galería";
                                      }
                                      ?></div>

        <center>
          <iframe src="includes/iframe_galerie.php" scrolling="no" frameborder="0"></iframe>
          <hr>
          <a href="galerie.php">
            <?php
            if ($_SESSION["lang"] == "fr") {
              echo "Voir notre galerie";
            } else if ($_SESSION["lang"] == "en") {
              echo "See our gallery";
            } else if ($_SESSION["lang"] == "es") {
              echo "Vea nuestra galería";
            }
            ?></a>
        </center>
      </div>
        </div>



        <div class="clear"></div>

        <?php include("includes/footer.php"); ?>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/list.js/1.0.0/list.min.js'></script>
        <script src="./js/table.js"></script>