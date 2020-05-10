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

    // statistiques
    $query_count = $db->query("SELECT compteur FROM stats WHERE page=\"index\";")->fetch();
    $count = $query_count["compteur"];
    $db->query("UPDATE stats SET compteur=$count+1 WHERE page=\"index\";");


    // get ip
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){ // récupérer l'ip du visiteur de différentes manières
        //ip depuis protocole internet HTTP
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        // sinon ip depuis proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    if (isset($ip)){
      $user_exists = $db->query("SELECT * FROM visiteurs WHERE ip=\"$ip\"");

      if ($user_exists->rowCount() == 0){
        $db->query("INSERT INTO visiteurs VALUES (NULL, \"$ip\");");
      }
    }
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
        <p><?php echo $txt[5][$_SESSION["lang"]]; ?></p>
      </div>
    </div>
    <div class="right">
      <div class="box_right">
        <div class="box_title black"><?php echo $txt[6][$_SESSION["lang"]]; ?></div>
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
      <br>
      <div class="box_left">
        <div class="box_title"><?php echo $txt[11][$_SESSION["lang"]]; ?></div>
        <iframe width="100%" height="400px" frameborder="0" allowfullscreen src="//umap.openstreetmap.fr/fr/map/free-canal-du-midi-france-cycling-map_455373?scaleControl=false&miniMap=false&scrollWheelZoom=true&zoomControl=true&allowEdit=false&moreControl=true&searchControl=null&tilelayersControl=false&embedControl=false&datalayersControl=null&onLoadPanel=none&captionBar=false&fullscreenControl=true&locateControl=false&measureControl=false&editinosmControl=false#9/43.4380/2.2192"></iframe>
      </div>
    </div>
    <div class="right">
      <br>
      <div class="box_right">
        <div class="box_title black"><?php echo $txt[8][$_SESSION["lang"]]; ?></div>
        <center>
          <p><?php echo $txt[9][$_SESSION["lang"]]; ?></p>
          <div class="button-survey"><a href="survey.php" style="text-decoration: none;color:inherit;"><?php echo $txt[10][$_SESSION["lang"]]; ?></a></div>
        </center>
      </div>
    </div>

    <div class="left">
      <br>
      <div class="box_left">
        <div class="box_title"><?php echo $txt[4][$_SESSION["lang"]]; ?></div>
        <center>
          <iframe width="100%" height="400" src="https://www.youtube-nocookie.com/embed/z3fi7o5MOMQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>




    <div class="clear"></div>


    <?php include("includes/footer.php"); ?>