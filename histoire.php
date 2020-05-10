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

    // statistiques
    $query_count = $db->query("SELECT compteur FROM stats WHERE page=\"histoire\";")->fetch();
    $count = $query_count["compteur"];
    $db->query("UPDATE stats SET compteur=$count+1 WHERE page=\"histoire\";");
     ?>

    <?php include('includes/menu.php'); ?>

    <div class="left">
      <div class="box_left">
        <?php
        if ($_SESSION["lang"] == "en") {
        ?>
          <div class="box_title">History</div>
          <div>

            <iframe src='https://cdn.knightlab.com/libs/timeline3/latest/embed/index.html?source=1yKctDhDbvetccU06hBtzabNwxzthHLNnHuIYcLbuXb4&font=Default&lang=en&initial_zoom=5&width=100%&height=100%' width='100%' height='900px' webkitallowfullscreen mozallowfullscreen allowfullscreen frameborder='0'></iframe>
          <?php
        } elseif ($_SESSION["lang"] == "fr") {
          ?>
            <div class="box_title">Histoire</div>
            <div>
              <iframe src=https://cdn.knightlab.com/libs/timeline3/latest/embed/index.html?source=1PPw-xPYOxIyyWKbhg2-iR-suQlJ2D1rqmD95vQWxC-4&font=Default&lang=fr&initial_zoom=1&width=100%&height=100%' width='100%' height='900px' frameborder='0'></iframe>
            <?php
          }
            ?>
            </div>

          </div>
      </div>
      <div class="right">
        <div class="box_right">


          <div class="box_title black">
            <?php
            if ($_SESSION["lang"] == "en") {
              echo "Want to know more?";
            } elseif ($_SESSION["lang"] == "fr") {
              echo "Vous voulez en savoir plus ?";
            }
            ?>
          </div>
          <center><br>
            <?php
            if ($_SESSION["lang"] == "en") {
              echo "<a href=\"https://fr.wikipedia.org/wiki/Canal_du_Midi\" target=\"_blank\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/8/80/Wikipedia-logo-v2.svg/220px-Wikipedia-logo-v2.svg.png\" style=\"width:90px;\"></a><br>
              More details on the Wikipedia page labeled <b>\"quality article\"</b> !";
            } elseif ($_SESSION["lang"] == "fr") {
              echo "<a href=\"https://fr.wikipedia.org/wiki/Canal_du_Midi\" target=\"_blank\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/8/80/Wikipedia-logo-v2.svg/220px-Wikipedia-logo-v2.svg.png\" style=\"width:90px;\"></a><br>
              Plus de détails sur la page Wikipédia classée <b>\"article de qualité\"</b> !";
            }
            ?>
          </center>
        </div>
      </div>


      <div class="clear"></div>


      <?php include("includes/footer.php"); ?>