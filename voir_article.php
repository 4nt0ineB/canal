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
  <script src='https://www.google.com/recaptcha/api.js'></script> 
</head>

<body>
  <div id="container">

    <?php
    include('includes/header.php');
    include('includes/menu.php');
    //ON RECUP LA TRAD DE LA PAGE
    $id = $_GET["id"];
    $contenuArticle = $db->query("SELECT * FROM p_article");
    $txt = $contenuArticle->fetchAll();
    $commentaires = $db->query("SELECT * FROM commentaires WHERE idArticle=$id;");
    $key = "trnsl.1.1.20200513T201756Z.6896cddb8b6c8f22.2a79ad549df8ea96e738d19df21f8e7eba76a715";
    // statistiques
    $query_count = $db->query("SELECT compteur FROM stats WHERE page=\"voir_article\";")->fetch();
    $count = $query_count["compteur"];
    $db->query("UPDATE stats SET compteur=$count+1 WHERE page=\"voir_article\";");


    if (!isset($_GET["id"])) {
      $errorMessage = $txt[1][$_SESSION["lang"]];
    } else if (empty($_GET["id"])) {
      $errorMessage = $txt[1][$_SESSION["lang"]];
    } else if (!is_numeric($_GET["id"])) {
      $errorMessage = $txt[2][$_SESSION["lang"]];
    }

    if (!isset($errorMessage)) {
      $article = $db->query("SELECT * FROM articles WHERE id = $id;")->fetch();
    }
    ?>

    <div class="left">

      <?php

  


  if(isset($_REQUEST['submitComment'])) // si le formulaire est envoyé avec le bouton send
  {
    $response = '';
    $g_response = $_POST['g-recaptcha-response'];
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $verifyResponse = file_get_contents($url.'?secret='.CAPTCHA_SECRET_KEY.'&response='.$g_response);
    $pseudo = strip_tags($_REQUEST["pseudo"]); // on stock les variables reçues
    $comment = $_REQUEST["comment"];
     try
     {

      if (empty($pseudo) || strlen($pseudo) < 3){ // si le titre est vide ou inférieur a 3 caractères
        $errorCommentMessage[]="Merci de saisir un pseudo supérieur à 3 caractères";
      }

      if (empty($comment) || strlen($comment) < 10){ // si le titre est vide ou inférieur a 3 caractères
        $errorCommentMessage[]="Merci de saisir un commentaire supérieur à 10 caractères";
      }

      $response_final = json_decode($verifyResponse);
        
        if(!$response_final->success) {
             $errorCommentMessage[]="Merci de valider la vérification par reCAPTCHA";
        } 
    
      else if(!isset($errorCommentMessage)) // si aucune erreur :
      {
       $insert_comment=$db->prepare("INSERT INTO commentaires VALUES (NULL, :pseudo, :comment, :idarticle, NOW());");   // on créer la demande dans la BDD

       if($insert_comment->execute(array(':pseudo'=>$pseudo, ':comment'=>$comment, ':idarticle'=>$id))){

        $goodMessage="Le commentaire a été ajouté avec succès. Raffraîchissement..."; // message de succès
        header("refresh:1; voir_article.php?id=$id");
       }
      }
     }
     catch(PDOException $e)
     {
      echo $e->getMessage();
     }
    }
   ?>


      <?php
     if(isset($errorCommentMessage))
     {
      foreach($errorCommentMessage as $error)
      {
      ?>
       <br>
       <div class="error"><?php echo $error; ?></div>
         <?php
      }
     }
     if(isset($goodMessage))
     {
     ?>
      <br>
      <div class="success">
        <?php echo $goodMessage; ?>
      </div>
     <?php
     }
     ?>

      <div class="box_left">
        <div class="box_title">
          <?php
          if (isset($errorMessage)) {
            echo $txt[3][$_SESSION["lang"]];
          } else {

            $lang = $_SESSION["lang"];
            $titre = $article["titre"];
            $categorie = $db->query("SELECT categorie FROM articles WHERE id=$id;")->fetch();
            $result_categ = $categorie["categorie"];
            $categorie_label = $db->query("SELECT $lang FROM articles_categories WHERE fr=\"$result_categ\";")->fetch();

            if ($lang != "fr"){
                try {
                  $key = KEY_TRANSLATION;
                  $translator = new Translator($key);
                  $titre = html_entity_decode(strip_tags($article["titre"], '<p><strong><hr><h2><h1><b><u><i><img>'));
                  $lang = $_SESSION["lang"];
                  $titre = $translator->translate($titre, "fr-$lang");

                } catch (Exception $e) {
                  // handle exception
                }
            }

            echo $titre;
          ?>

          <div class="comments"><?php echo $commentaires->rowCount(); ?> <?php echo $txt[14][$_SESSION["lang"]]; ?></div>
        </div>

        <div class="more_infos">

          <div class="text">
            <?php echo $txt[4][$_SESSION["lang"]]; ?> <b><?php echo edit_date_format($article["date"]); ?></b><br>
            <i><?php echo $txt[5][$_SESSION["lang"]]; ?> : <?php echo $categorie_label["$lang"]; ?></i>
          </div>
          <div class="social">
            <a class="facebook" title="Partager" target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"></a>
            <a class="twitter" title="Tweeter" target="_blank" href="http://twitter.com/share?text=Lisez cette article sur le site du Canal du Midi: &url=<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"></a>
          </div>
          <div style="clear:both;"></div>
        </div>

        <div class="content">
          <p>



            <?php 
            try {
              $translator = new Translator($key);

              $contenu = html_entity_decode(strip_tags($article["contenu"], '<p><strong><hr><h2><h1><b><u><i><img><div><iframe><center><figure><figcaption>'), ENT_QUOTES, 'UTF-8');
              $translation = $translator->translate($contenu, "fr-$lang");

            } catch (Exception $e) {
              // handle exception
            }

            if ($_SESSION["lang"] != "fr"){
              echo $translation; 
            } else {
              echo $article["contenu"];
            }

            ?></p>
        </div>

      <?php
          }
      ?>




      <?php
      if (isset($errorMessage)) {
        echo "</div>";
        echo "<p>$errorMessage</p>";
      }
      ?>


      </div>
      <br>
    <div class="box_left">
        <div class="box_title black"><?php echo $txt[8][$_SESSION["lang"]]; ?></div>

        <?php while ($results = $commentaires->fetch()) : ?>
        <p class="comment_section">
          <span class="comment_details"><?php echo $txt[13][$_SESSION["lang"]]; ?> <b><?php echo $results["pseudo"]; ?></b> <?php echo edit_date_format($results["date"]); ?></span>
          <br>
          <span class="comment_content"><?php echo preg_replace('/(<br[\s]?[\/]?>[\s]*){3,}/', '<br /><br />', nl2br(htmlspecialchars($results["commentaire"]))); ?></span>
        </p>
        <?php endwhile; ?>
        <hr>

        <p style="margin:10px;"><?php echo $txt[9][$_SESSION["lang"]]; ?></p>
          <form method="POST">
            <input type="text" name="pseudo" style="width: 100%;box-sizing: border-box;margin-bottom:7px;max-width: 850px;" placeholder="<?php echo $txt[10][$_SESSION["lang"]]; ?>" maxlength="15">
            <textarea name="comment" maxlength="200" style="width: 100%;box-sizing: border-box;margin-bottom:7px;max-width: 850px;" placeholder="<?php echo $txt[11][$_SESSION["lang"]]; ?>" onkeyup="textCounter(this,'counter',200);"></textarea><br>
            <div class="g-recaptcha" data-theme="dark" data-sitekey="<?php echo CAPTCHA_KEY; ?>" style="margin:10px"></div>    
            <input class="bouton green" type="submit" name="submitComment" value="<?php echo $txt[12][$_SESSION["lang"]]; ?>" style="margin:10px;">
          
            <input type="text" disabled  maxlength="3" size="3" value="200" id="counter" style="width: 25px;">


          </form>
    </div>



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

    <script>
    function textCounter(field,field2,maxlimit)
    {
     var countfield = document.getElementById(field2);
     if ( field.value.length > maxlimit ) {
      field.value = field.value.substring( 0, maxlimit );
      return false;
     } else {
      countfield.value = maxlimit - field.value.length;
     }
    }
    </script>
    <?php include("includes/footer.php"); ?>