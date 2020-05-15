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
    // ON RECUP LA TRAD DE LA PAGE
    $contenuML = $db->query("SELECT * FROM p_mentionslegales");
    $txt = $contenuML->fetchAll();

    // statistiques
    $query_count = $db->query("SELECT compteur FROM stats WHERE page=\"quisommesnous\";")->fetch();
    $count = $query_count["compteur"];
    $db->query("UPDATE stats SET compteur=$count+1 WHERE page=\"quisommesnous\";");
    ?>

    <div class="left">
      <div class="box_left">
        <div class="box_title"><?php echo $txt[0][$_SESSION["lang"]]; ?></div>

<?php echo $txt[1][$_SESSION["lang"]]; ?>

 </div>
    </div>
    <div class="right">
      <div class="box_right">
        <div class="box_title black"><?php echo $txt[2][$_SESSION["lang"]]; ?></div>
        <center>
          <a href="https://www.univ-gustave-eiffel.fr/" target="_blank"><img src="img/logo_univ_gustave_eiffel_bleu.png" style="margin:5px;width:250px;" alt=""></a>
          <br>
          <i>Université Gustave Eiffel</i>
          <hr>
          <a href="https://ovh.com/" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/26/Logo-OVH.svg/1024px-Logo-OVH.svg.png" style="margin:5px;width:210px;" alt=""></a>
          <br>
          <i>OVH</i>
        </center>
      </div>
    </div>


    <div class="clear"></div>

    <?php include("includes/footer.php"); ?>