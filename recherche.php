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
            echo "<p>Articles that matches with : ";
            echo htmlspecialchars($search);
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