<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Site web - Canal du Midi</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/language.css">
    <link rel="stylesheet" href="css/slideshow.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css">
    <style>
        .button-survey {
            width: 200px;
            height: 15px;
        }
    </style>
</head>

<body>
    <div id="container">

        <?php
        include('includes/header.php');
        include('includes/menu.php');
        //ON RECUP LA TRAD DE LA PAGE
        $contenuIndex = $db->query("SELECT * FROM p_naviguer");
        $txt = $contenuIndex->fetchAll();

        // statistiques
        $query_count = $db->query("SELECT compteur FROM stats WHERE page=\"naviguer\";")->fetch();
        $count = $query_count["compteur"];
        $db->query("UPDATE stats SET compteur=$count+1 WHERE page=\"naviguer\";");
        ?>



        <div class="left">
            <div class="box_left">
                <div class="box_title"><?php echo $txt[7][$_SESSION["lang"]]; ?></div>

                <div class="menu_wrapper">
                    <ul class="menu_page">
                        <li class="rubrique-drop"><a href="#DISPOSITIONS-REGLEMENTAIRES"><?php echo $txt[8][$_SESSION["lang"]]; ?></a>
                            <div class="dropdown-content">
                                <a href="#reglesroute"><?php echo $txt[9][$_SESSION["lang"]]; ?></a>
                                <a href="#reglesnavigation"><?php echo $txt[10][$_SESSION["lang"]]; ?></a>
                                <a href="#vitessenavigation"><?php echo $txt[11][$_SESSION["lang"]]; ?></a>
                                <a href="#passagesretrecis"><?php echo $txt[12][$_SESSION["lang"]]; ?></a>
                                <a href="#stationnementbateaux"><?php echo $txt[13][$_SESSION["lang"]]; ?></a>
                                <a href="#stationnementproximite"><?php echo $txt[14][$_SESSION["lang"]]; ?></a>
                                <a href="#stationnementnui"><?php echo $txt[15][$_SESSION["lang"]]; ?></a>
                                <a href="#stationnementlong"><?php echo $txt[16][$_SESSION["lang"]]; ?></a>
                            </div>
                        </li>&nbsp;|&nbsp;

                        <li class="rubrique-drop"><a href="#conseilnavigation"><?php echo $txt[17][$_SESSION["lang"]]; ?></a>
                            <div class="dropdown-content">
                                <a href="#audepart"><?php echo $txt[18][$_SESSION["lang"]]; ?></a>
                                <a href="#encoursderoute"><?php echo $txt[19][$_SESSION["lang"]]; ?></a>
                                <a href="#cohabitation"><?php echo $txt[20][$_SESSION["lang"]]; ?></a>
                            </div>

                        </li>&nbsp;|&nbsp;

                        <li class="rubrique-drop"><a href="#passageecluse"><?php echo $txt[21][$_SESSION["lang"]]; ?></a>
                            <div class="dropdown-content">
                                <a href="#prioritepassage"><?php echo $txt[22][$_SESSION["lang"]]; ?></a>
                                <a href="#eclusesautomatisees"><?php echo $txt[23][$_SESSION["lang"]]; ?></a>
                            </div>

                        </li>&nbsp;|&nbsp;

                        <li><a href="#permisetpeages"><?php echo $txt[24][$_SESSION["lang"]]; ?></a></li>&nbsp;|&nbsp;
                        <li><a href="#renseignementspratiques"><?php echo $txt[25][$_SESSION["lang"]]; ?></a></li>
                    </ul>
                </div>

                <?php echo $txt[0][$_SESSION["lang"]]; ?>

            </div>
        </div>

        <div class="right">
            <div class="box_right">
                <div class="box_title black"><?php echo $txt[3][$_SESSION["lang"]]; ?></div>

                <center>
                    <div class="button-survey" style="width:150px;"><a href="http://www.vnf.fr/calculitinerairefluvial/app/Main.html" style="text-decoration: none;color:inherit;" target="_blank"><?php echo $txt[6][$_SESSION["lang"]]; ?></a></div>

                </center>
            </div>
        <br>
            <div class="box_right">
                <div class="box_title black">Source</div>

                <center>
                    <p><?php echo $txt[4][$_SESSION["lang"]]; ?></p>
                    <div class="button-survey" style="width:150px;"><a href="http://plaisancefluviale.fr/document/vnf/guide_canal_2mers.pdf" style="text-decoration: none;color:inherit;" target="_blank"><?php echo $txt[5][$_SESSION["lang"]]; ?></a></div>

                </center>
            </div>

        <br>

              <div class="box_right">
        <div class="box_title black"><?php 
        if ($_SESSION["lang"] == "fr"){
          echo "Une image de notre galerie";
         } else if ($_SESSION["lang"] == "en"){
          echo "An image from our gallery";
         } else if ($_SESSION["lang"] == "es"){
          echo "Una imagen de nuestra galería";
         }
         ?></div>
      

        <center>
          <iframe src="includes/iframe_galerie.php" scrolling="no" frameborder="0" ></iframe>
          <hr>
          <a href="galerie.php">
          <?php 
          if ($_SESSION["lang"] == "fr"){
            echo "Voir notre galerie";
           } else if ($_SESSION["lang"] == "en"){
            echo "See our gallery";
           } else if ($_SESSION["lang"] == "es"){
            echo "Vea nuestra galería";
           }
           ?></a>
        </center>
      </div>
    
      <br>

<div class="box_right">
    <div class="box_title black"><?php
                                  if ($_SESSION["lang"] == "fr") {
                                    echo "Nos réseaux sociaux";
                                  } else if ($_SESSION["lang"] == "en") {
                                    echo "Our social medias";
                                  } else if ($_SESSION["lang"] == "es") {
                                    echo "Nuestras redes sociales";
                                  }
                                  ?></div>

    <center style="margin-top:5px;">
    <a href="https://www.facebook.com/Canal-du-Midi-M%C3%A9diation-Culturelle-et-Num%C3%A9rique-106766767743771" target="_blank" class="socialmedia"><i class="devicon-facebook-plain" style="font-size:34px;"></i></a>
    <a href="https://twitter.com/DuCulturelle" target="_blank" class="socialmedia"><i class="devicon-twitter-plain" style="font-size:30px;"></i></a>
    </center>
  </div>
</div>


        <div class="clear"></div>


        <?php include("includes/footer.php"); ?>