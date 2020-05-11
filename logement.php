<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Site web - Canal du Midi</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/language.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <link rel="stylesheet" href="css/table.css">
</head>

<body>
    <div id="container">

        <?php
        include('includes/header.php');
        include('includes/menu.php');
        //ON RECUP LA TRAD DE LA PAGE
        $contenuIndex = $db->query("SELECT * FROM p_survey");
        $txt = $contenuIndex->fetchAll();

        // statistiques
        $query_count = $db->query("SELECT compteur FROM stats WHERE page=\"survey\";")->fetch();
        $count = $query_count["compteur"];
        $db->query("UPDATE stats SET compteur=$count+1 WHERE page=\"survey\";");
        ?>

        <div class="left">
            <div class="box_left">
                <div class="box_title"><?php echo 'Logements'; ?></div>

                <div class="c1">
                    <br>
                    <div id="lovely-things-list">
                        <input class="search" placeholder="Chercher" />
                        <ul class="sort-by">
                            <li class="sort btn" data-sort="name">Sort by name</li>
                            <li class="sort btn" data-sort="category">Sort by category</li>
                        </ul>
                        <ul class="filter">
                            <li class="btn" id="filter-none">Show all</li>
                            <li class="btn" id="filter-games">Only show games</li>
                            <li class="btn" id="filter-beverages">Only show beverages</li>
                        </ul>
                        <ul class="list">
                            <li>
                                <img src="https://s3.amazonaws.com/imagescloud/images/cards/camping/camping-tente.jpg" class="thumb" />
                                <h4><span class="name">Monkey Island 2: LeChuck's Revenge</span> <span class="category">Game</span></h4>
                                <p class="description">Monkey Island 2: LeChuck's Revenge is an adventure game developed and published by LucasArts in 1991. It was the second game of the Monkey Island series, following The Secret...</p>
                            </li>
                            <li>
                                <img src="https://imgcy.trivago.com/c_lfill,d_dummy.jpeg,e_sharpen:60,f_auto,h_225,q_auto,w_225/itemimages/89/84/898437_v6.jpeg" class="thumb" />
                                <h4><span class="name">Good Coffee</span> <span class="category">Beverage</span></h4>
                                <p class="description">Coffee is a brewed beverage with a dark, slightly acidic flavor prepared from the roasted seeds of the coffee plant, colloquially called coffee beans.</p>
                            </li>
                            <li>
                                <img src="https://cdn-a.william-reed.com/var/wrbm_gb_food_pharma/storage/images/publications/food-beverage-nutrition/beveragedaily.com/article/2019/09/26/new-uk-trade-show-for-low-and-no-alcohol-beverages/10183430-1-eng-GB/New-UK-trade-show-for-low-and-no-alcohol-beverages_wrbm_large.jpg" class="thumb" />
                                <h4><span class="name">Full Throttle</span> <span class="category">Game</span></h4>
                                <p class="description">Full Throttle is a computer adventure game developed and published by LucasArts. It was designed by Tim Schafer, who would later go on to design the critically acclaimed titles Grim Fandango, Psychonauts and Brütal Legend.</p>
                            </li>
                            <li>
                                <img src="https://cms-assets.bookingexperts.nl/media/385/83/preprocessed.jpg" class="thumb" />
                                <h4><span class="name">Brooklyn Lager</span> <span class="category">Beverage</span></h4>
                                <p class="description">Brooklyn Brewery was started in 1987 by former Associated Press correspondent Steve Hindy and former Chemical Bank lending officer Tom Potter.</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div style="clear:both;"></div>
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


        <div class="clear"></div>

        <?php include("includes/footer.php"); ?>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/list.js/1.0.0/list.min.js'></script>
        <script src="./js/table.js"></script>