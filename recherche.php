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
    $contenuRecherche = $db->query("SELECT * FROM p_recherche");
    $txt = $contenuRecherche->fetchAll();

    // statistiques
    $query_count = $db->query("SELECT compteur FROM stats WHERE page=\"recherche\";")->fetch();
    $count = $query_count["compteur"];
    $db->query("UPDATE stats SET compteur=$count+1 WHERE page=\"recherche\";");
    ?>

    <div class="left">
      <div class="box_left">
        <div class="box_title"><?php echo $txt[0][$_SESSION["lang"]]; ?></div>
        <h2><span style="font-weight: 200;"><span style="font-weight: 400;"></h2>

        <?php 

        if (!isset($_POST["search"])) {

          echo "<p>";
          echo $txt[2][$_SESSION["lang"]];
          echo "</p>";

        } else {

          $search = $_POST["search"];

          if (empty($search)) {
            echo "<p>";
            echo $txt[3][$_SESSION["lang"]];
            echo "</p>";
          } else {

            /* requête recherche */
            $recherche = $db->query("SELECT * FROM articles WHERE titre LIKE \"%$search%\" OR contenu LIKE \"%$search%\";");

            echo "<p><u>";echo $txt[4][$_SESSION["lang"]];echo"</u> : ";
            echo htmlspecialchars($search);
            echo "</p><hr>";
          }
        } ?>


        <?php 
        if (isset($recherche)){
          if ($recherche->rowCount() == 0){
            echo "<center><b>";
            echo $txt[5][$_SESSION["lang"]];
            echo "</b></center>";
          } 
        

        while ($resultats = $recherche->fetch()){ ?>
          <div class="article_summup">
          <div class="left">
            <h1><?php echo $resultats["titre"]; ?></h1><br>
            <span><?php echo $txt[7][$_SESSION["lang"]]; ?> <b><?php echo edit_date_format($resultats["date"]); ?></b></span>
          </div>

          <div class="right">
            <a href="voir_article.php?id=<?php echo $resultats["id"]; ?>" class="bouton green"><?php echo $txt[6][$_SESSION["lang"]]; ?></a>
          </div>
          <div style="clear:both;"></div>
        </div>

        <?php }} ?>

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