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
    $contenuArticle = $db->query("SELECT * FROM p_article");
    $txt = $contenuArticle->fetchAll();

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
      $id = $_GET["id"];
      $article = $db->query("SELECT * FROM articles WHERE id = $id;")->fetch();
    }
    ?>

    <div class="left">
      <div class="box_left" style="box-shadow: 0 0 5px rgba(0, 0, 0, 0.1) inset;">
        <div class="box_title">
          <?php
          if (isset($errorMessage)) {
            echo $txt[3][$_SESSION["lang"]];
          } else {
            echo $article["titre"];
          ?>

        </div>

        <div class="more_infos">

          <div class="text">
            <?php echo $txt[4][$_SESSION["lang"]]; ?> <b><?php echo edit_date_format($article["date"]); ?></b><br>
            <i><?php echo $txt[5][$_SESSION["lang"]]; ?> : Inconnue</i>
          </div>
          <div class="social">
            <a class="facebook" title="Partager" target="_blank" href="#"></a>
            <a class="twitter" title="Tweeter" target="_blank" href="#"></a>
          </div>
          <div style="clear:both;"></div>
        </div>

        <div class="content">
          <p><?php echo $article["contenu"]; ?></p>
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
    </div>
    <div class="right">
      <div class="box_right">


        <div class="box_title black">categ</div>

        <center>
          test
        </center>
      </div>
    </div>


    <div class="clear"></div>


    <?php include("includes/footer.php"); ?>