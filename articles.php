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
    $query_count = $db->query("SELECT compteur FROM stats WHERE page=\"articles\";")->fetch();
    $count = $query_count["compteur"];
    $db->query("UPDATE stats SET compteur=$count+1 WHERE page=\"articles\";");
    ?>

    <div class="left">
      <div class="box_left">
        <div class="box_title"><?php echo $txt[0][$_SESSION["lang"]]; ?></div>
        <h2><span style="font-weight: 200;"><span style="font-weight: 400;"></h2>

        <?php 

        if (!isset($_GET["id"])) {

          echo "<p>";
          echo $txt[1][$_SESSION["lang"]];
          echo "</p>";

        } else {

          $id = $_GET["id"];

          if (empty($id)) {
            echo "<p>";
            echo $txt[1][$_SESSION["lang"]];
            echo "</p>";
          } else {
            echo "<p>Articles that matches with : ";
            echo htmlspecialchars($id);
            echo "</p><hr>";
          }
        } ?>


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