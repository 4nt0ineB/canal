<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Website - Canal du Midi</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/language.css">
    <link rel="stylesheet" href="css/slideshow.css">
  </head>
  <body>
    <div id="container">

    <?php include('includes/header.php'); ?>

    <?php include('includes/menu.php'); ?>

    <div id="slideshow">
      <div class="slide-wrapper">
        <div class="slide"><h1 class="slide-number">The Canal du Midi, an architectural marvel</h1></div>
        <div class="slide"><h1 class="slide-number">Organize a family outing on the Canal du Midi !</h1></div>
        <div class="slide"><h1 class="slide-number">Discover its history through our website</h1></div>
        <div class="slide"><h1 class="slide-number">Take advantage of our travel tips !</h1></div>
      </div>
    </div>

<div class="left">
<div class="box_left">
	<div class="box_title">Welcome to the Canal du Midi website !</div>
 <h2><span style="font-weight: 200;">Built during the 17th century, the Canal du Midi is a French navigation canal. It designates the part built from Toulouse to S&egrave;te, the southern part of the Canal des Deux-Mers which connects the Atlantic Ocean to the Mediterranean Sea. Considered as one of the greatest works of its time, it constitutes a real economic and political stake revolutionizing the navigation in the territory and the routing of the goods, by a revival in the river transport of the South of the Old R&eacute;gime.</span></h2>
  </div>
</div>
<div class="right">
  <div class="box_right">


    <div class="box_title" style="
    background: rgb(66,66,66); /* Old browsers */
    background: -moz-linear-gradient(top, rgb(66,66,66) 0%, rgb(51,51,51) 100%); /* FF3.6-15 */
    background: -webkit-linear-gradient(top, rgb(66,66,66) 0%,rgb(51,51,51) 100%); /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(to bottom, rgb(66,66,66) 0%,rgb(51,51,51) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    border-bottom: 3px solid rgb(38, 38, 38);"
    >Weather</div>
<?php
$json = file_get_contents('https://www.prevision-meteo.ch/services/json/toulouse');
$json = json_decode($json);
?>
<center>
<h3>Weather forecast for the city of : <u><?php echo $json->city_info->name; ?></u></h3>
<ul style="list-style: none;margin-block-start: 0;padding-inline-start: 0;">
 <li><span><?php echo $json->fcst_day_0->day_short; ?> (<FONT color="blue"><?php echo $json->fcst_day_0->tmin; ?>°C</FONT> / <FONT color="red"><?php echo $json->fcst_day_0->tmax; ?>°C</FONT>)</span><br><small style="vertical-align: 10px;"><?php echo $json->fcst_day_0->condition; ?> </small><img src="<?php echo $json->fcst_day_0->icon; ?>"width="32" height="32" /></li><hr>
<li><span><?php echo $json->fcst_day_1->day_short; ?> (<FONT color="blue"><?php echo $json->fcst_day_1->tmin; ?>°C</FONT> / <FONT color="red"><?php echo $json->fcst_day_1->tmax; ?>°C</FONT>)</span><br><small style="vertical-align: 10px;"><?php echo $json->fcst_day_1->condition; ?> </small><img src="<?php echo $json->fcst_day_1->icon; ?>"width="32" height="32" /></li><hr>
<li><span><?php echo $json->fcst_day_2->day_short; ?> (<FONT color="blue"><?php echo $json->fcst_day_2->tmin; ?>°C</FONT> / <FONT color="red"><?php echo $json->fcst_day_2->tmax; ?>°C</FONT>)</span><br><small style="vertical-align: 10px;"><?php echo $json->fcst_day_2->condition; ?> </small><img src="<?php echo $json->fcst_day_2->icon; ?>"width="32" height="32" /></li>
 </ul>
</center>
    </div>
</div>


<div class="clear"></div>


<?php include("includes/footer.php");?>
