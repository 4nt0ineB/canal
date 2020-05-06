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
    $contenuIndex = $db->query("SELECT * FROM p_accueil");
    $txt = $contenuIndex->fetchAll();
    ?>

    <div id="slideshow">
      <div class="slide-wrapper">
        <div class="slide">
          <h1 class="slide-number"><?php echo $txt[0][$_SESSION["lang"]]; ?></h1>
        </div>
        <div class="slide">
          <h1 class="slide-number"><?php echo $txt[1][$_SESSION["lang"]]; ?></h1>
        </div>
        <div class="slide">
          <h1 class="slide-number"><?php echo $txt[2][$_SESSION["lang"]]; ?></h1>
        </div>
        <div class="slide">
          <h1 class="slide-number"><?php echo $txt[3][$_SESSION["lang"]]; ?></h1>
        </div>
      </div>
    </div>

    <div class="left">
      <div class="box_left">
        <div class="box_title"><?php echo $txt[4][$_SESSION["lang"]]; ?></div>
        <h2><span style="font-weight: 200;"><span style="font-weight: 400;"></span><?php echo $txt[5][$_SESSION["lang"]]; ?></span></h2>
      </div>
    </div>
    <div class="right">
      <div class="box_right">
        <div class="box_title" style="
    background: rgb(66,66,66); /* Old browsers */
    background: -moz-linear-gradient(top, rgb(66,66,66) 0%, rgb(51,51,51) 100%); /* FF3.6-15 */
    background: -webkit-linear-gradient(top, rgb(66,66,66) 0%,rgb(51,51,51) 100%); /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(to bottom, rgb(66,66,66) 0%,rgb(51,51,51) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    border-bottom: 3px solid rgb(38, 38, 38);"><?php echo $txt[6][$_SESSION["lang"]]; ?></div>
        <?php
        $json = file_get_contents('https://www.prevision-meteo.ch/services/json/toulouse');
        $json = json_decode($json);
        ?>
        <center>
          <h3><?php echo $txt[7][$_SESSION["lang"]]; ?><u><?php echo $json->city_info->name; ?></u></h3>
          <ul style="list-style: none;margin-block-start: 0;padding-inline-start: 0;">
            <li><span><?php echo $json->fcst_day_0->day_short; ?> (<FONT color="blue"><?php echo $json->fcst_day_0->tmin; ?>°C</FONT> / <FONT color="red"><?php echo $json->fcst_day_0->tmax; ?>°C</FONT>)</span><br><small style="vertical-align: 10px;"><?php echo $json->fcst_day_0->condition; ?> </small><img src="<?php echo $json->fcst_day_0->icon; ?>" width="32" height="32" /></li>
            <hr>
            <li><span><?php echo $json->fcst_day_1->day_short; ?> (<FONT color="blue"><?php echo $json->fcst_day_1->tmin; ?>°C</FONT> / <FONT color="red"><?php echo $json->fcst_day_1->tmax; ?>°C</FONT>)</span><br><small style="vertical-align: 10px;"><?php echo $json->fcst_day_1->condition; ?> </small><img src="<?php echo $json->fcst_day_1->icon; ?>" width="32" height="32" /></li>
            <hr>
            <li><span><?php echo $json->fcst_day_2->day_short; ?> (<FONT color="blue"><?php echo $json->fcst_day_2->tmin; ?>°C</FONT> / <FONT color="red"><?php echo $json->fcst_day_2->tmax; ?>°C</FONT>)</span><br><small style="vertical-align: 10px;"><?php echo $json->fcst_day_2->condition; ?> </small><img src="<?php echo $json->fcst_day_2->icon; ?>" width="32" height="32" /></li>
          </ul>
        </center>
      </div>
    </div>

    <div class="left">
      <div class="box_left">
        <div class="box_title"><?php echo 'Carte du canal' ?></div>
        <iframe width="100%" height="400px" frameborder="0" allowfullscreen src="//umap.openstreetmap.fr/fr/map/carte-sans-nom_454223?scaleControl=false&miniMap=false&scrollWheelZoom=true&zoomControl=true&allowEdit=false&moreControl=false&searchControl=null&tilelayersControl=null&embedControl=null&datalayersControl=null&onLoadPanel=undefined&captionBar=false#9/43.2382/2.5076"></iframe>
        <!-- <a href="//umap.openstreetmap.fr/fr/map/carte-sans-nom_454223"></a>  LIEN POUR OUVRIR LA MAP JE SAVAIS PAS OU LE METTRE ALORS AU CAS OU -->
      </div>
    </div>

    <div class="left">
      <div class="box_left">
        <div class="box_title"><?php echo 'Aidez nous à améliorer votre expérience' ?></div>
        <a href="survey.php" style="text-decoration: none;">
          <div class="button-survey">Formulaire</div>
        </a>
      </div>
    </div>




    <div class="clear"></div>


    <?php include("includes/footer.php"); ?>