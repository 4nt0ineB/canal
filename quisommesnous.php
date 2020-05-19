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
    $contenuWaw = $db->query("SELECT * FROM p_waw");
    $txt = $contenuWaw->fetchAll();

    // statistiques
    $query_count = $db->query("SELECT compteur FROM stats WHERE page=\"quisommesnous\";")->fetch();
    $count = $query_count["compteur"];
    $db->query("UPDATE stats SET compteur=$count+1 WHERE page=\"quisommesnous\";");
    ?>

    <div class="left">
      <div class="box_left">
        <div class="box_title"><?php echo $txt[0][$_SESSION["lang"]]; ?></div>

        <center>
          <div class="profile_picture">
            <!-- easter egg https://cdn.discordapp.com/attachments/648445316269342721/662363770164871181/IMG_0175.JPG -->
            <img src="img/brian.jpg" style="height:230px;width:174px;image-orientation: from-image;" alt="">
          </div>

          <div class="profile_picture">
            <img src="img/jeremy.jpg" style="height:230px;width:174px;" alt="">
          </div>

          <div class="profile_picture">
            <img src="img/timothee.jpeg" style="height:230px;width:174px;" alt="">
          </div>

          <div class="profile_picture">
            <img src="img/antoine.jpg" style="height:230px;width:174px;" alt="">
          </div>
          <br>
          <div class="label_picture">Brian BABILLON&nbsp;<a href="https://www.linkedin.com/in/brian-babillon-328a021a4/" target="_blank"><img src="img/linked_in_16.png" style="vertical-align: text-bottom;"></a></div>
          <div class="label_picture">Jeremy GONTHIER&nbsp;<a href="https://www.linkedin.com/in/jeremy-gonthier-b2591a1a0/" target="_blank"><img src="img/linked_in_16.png" style="vertical-align: text-bottom;"></a></div>
          <div class="label_picture">Timothée LEFEBVRE&nbsp;<a href="https://www.linkedin.com/in/timoth%C3%A9e-lefebvre77/" target="_blank"><img src="img/linked_in_16.png" style="vertical-align: text-bottom;"></a></div>
          <div class="label_picture">Antoine BASTOS&nbsp;<a href="https://www.linkedin.com/in/antoineba6/" target="_blank"><img src="img/linked_in_16.png" style="vertical-align: text-bottom;"></a></div>

          <div class="label_role"><?php echo $txt[3][$_SESSION["lang"]]; ?></div>
          <div class="label_role"><?php echo $txt[4][$_SESSION["lang"]]; ?></div>
          <div class="label_role"><?php echo $txt[5][$_SESSION["lang"]]; ?></div>
          <div class="label_role"><?php echo $txt[6][$_SESSION["lang"]]; ?></div>

        </center>

        <h2><?php echo $txt[1][$_SESSION["lang"]]; ?></h2>
        <p>
          <?php echo $txt[2][$_SESSION["lang"]]; ?>
        </p>

        <h2><?php echo $txt[8][$_SESSION["lang"]]; ?></h2>
        <p><?php echo $txt[9][$_SESSION["lang"]]; ?></p>
        <p>
          <ul>
            <li>ETTAYEB Tewfik</li>
            <li>CESSY David</li>
            <li>REBY Yann</li>
          </ul>
        </p>
      </div>
    </div>
    <div class="right">
      <div class="box_right">
        <div class="box_title black"><?php echo $txt[7][$_SESSION["lang"]]; ?></div>
        <center>
          <a href="https://www.univ-gustave-eiffel.fr/" target="_blank"><img src="img/logo_univ_gustave_eiffel_bleu.png" style="margin:5px;width:250px;" alt=""></a>
          <br>
          <i>Université Gustave Eiffel</i>
        </center>
      </div>
    </div>


    <div class="clear"></div>

    <?php include("includes/footer.php"); ?>