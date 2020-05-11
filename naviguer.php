<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Site web - Canal du Midi</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/language.css">
    <link rel="stylesheet" href="css/slideshow.css">

    <style>
        .button-survey {
            width: 200px;
            height: 15px;
        }

        strong {
            color: #b84f15;
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

                        <li class="rubrique-drop"><a href="passageecluse"><?php echo $txt[21][$_SESSION["lang"]]; ?></a>
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
                <div class="box_title black"><?php echo $txt[1][$_SESSION["lang"]]; ?></div>
                <?php
                $json = file_get_contents('https://www.prevision-meteo.ch/services/json/toulouse');
                $json = json_decode($json);
                ?>
                <center>
                    <h3><?php echo $txt[2][$_SESSION["lang"]]; ?><u><?php echo $json->city_info->name; ?></u></h3>
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
        <div class="right">
            <div class="box_right">
                <div class="box_title black"><?php echo $txt[3][$_SESSION["lang"]]; ?></div>

                <center>
                    <div class="button-survey" style="width:150px;"><a href="http://www.vnf.fr/calculitinerairefluvial/app/Main.html" style="text-decoration: none;color:inherit;" target="_blank"><?php echo $txt[6][$_SESSION["lang"]]; ?></a></div>

                </center>
            </div>
        </div>
        <div class="right">
            <div class="box_right">
                <div class="box_title black">Source</div>

                <center>
                    <p><?php echo $txt[4][$_SESSION["lang"]]; ?></p>
                    <div class="button-survey" style="width:150px;"><a href="http://plaisancefluviale.fr/document/vnf/guide_canal_2mers.pdf" style="text-decoration: none;color:inherit;" target="_blank"><?php echo $txt[5][$_SESSION["lang"]]; ?></a></div>

                </center>
            </div>
        </div>


        <div class="clear"></div>


        <?php include("includes/footer.php"); ?>