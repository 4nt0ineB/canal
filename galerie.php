<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Site web - Canal du Midi</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/language.css">
  <link rel="stylesheet" href="css/slideshow.css">
  <link rel="stylesheet" href="css/galerie-nature.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css">
</head>

<body>
  <div id="container">

    <?php
    include('includes/header.php');
    include('includes/menu.php');

    // statistiques
    $query_count = $db->query("SELECT compteur FROM stats WHERE page=\"galerie\";")->fetch();
    $count = $query_count["compteur"];
    $db->query("UPDATE stats SET compteur=$count+1 WHERE page=\"galerie\";");

    $lang = $_SESSION["lang"];
    $galerie = $db->query("SELECT * FROM galerie_photos;");
    ?>
      <div class="box_left" style="width: 1208px;box-sizing: border-box;">
        <div class="box_title">
            <?php 
        if ($_SESSION["lang"] == "fr"){
          echo "Galerie photo";
         } else if ($_SESSION["lang"] == "en"){
          echo "Photo gallery";
         } else if ($_SESSION["lang"] == "es"){
          echo "Galería de fotos";
         }
         ?></div>

            <div class="gallery-image">


                    <?php while ($results = $galerie->fetch()): ?>

                    <a href="<?php echo $results["url"]; ?>" data-fancybox data-caption="&lt;b&gt;<?php echo $results[$lang]; ?>">
                        <div class="img-box">
                            <img src="<?php echo $results["url"]; ?>" alt="" />
                            <div class="transparent-box">
                                <div class="caption">
                                    <p><?php echo $results[$lang]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <?php endwhile; ?>

            </div>

            <p><small><i>* <?php 
        if ($_SESSION["lang"] == "fr"){
          echo "Toutes les photos utilisées sont libres de droit.";
         } else if ($_SESSION["lang"] == "en"){
          echo "All photos used are free of copyright.";
         } else if ($_SESSION["lang"] == "es"){
          echo "Todas las fotos utilizadas están libres de derechos de autor.";
         }
         ?></i></small></p>

 </div>




    <div class="clear"></div>

    <?php include("includes/footer.php"); ?>