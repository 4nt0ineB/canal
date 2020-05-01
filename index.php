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

    <?php include('includes/header.php'); ?>

    <?php include('includes/menu.php'); ?>

    <div id="slideshow">
      <div class="slide-wrapper">
        <div class="slide"><h1 class="slide-number">Le Canal du Midi, une merveille architecturale</h1></div>
        <div class="slide"><h1 class="slide-number">Organisez une sortie en famille sur le Canal du Midi !</h1></div>
        <div class="slide"><h1 class="slide-number">Découvrez son histoire à travers notre site</h1></div>
        <div class="slide"><h1 class="slide-number">Profitez de nos conseils voyages !</h1></div>
      </div>
    </div>

<div class="left">
<div class="box_left">
	<div class="box_title">Bienvenue sur le site du Canal du Midi !</div>
  <h2><span style="font-weight: 200;"><span style="font-weight: 400;">Construit pendant le XVII&egrave;me si&egrave;cle le canal du Midi est un canal de navigation fran&ccedil;ais. Il d&eacute;signe la partie r&eacute;alis&eacute;e de Toulouse &agrave; S&egrave;te, partie sud du canal des Deux-Mers qui permet de relier l&rsquo;oc&eacute;an Atlantique &agrave; la mer M&eacute;diterran&eacute;e. Consid&eacute;r&eacute; comme l&rsquo;un des plus grands ouvrages de son temps, il constitue un v&eacute;ritable enjeu &eacute;conomique et politique r&eacute;volutionnant la navigation dans le territoire et l'acheminement des marchandises, par un renouveau dans le transport fluvial du Midi de l&rsquo;Ancien r&eacute;gime.</span></span></h2>
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
    >Météo</div>
<?php
$json = file_get_contents('https://www.prevision-meteo.ch/services/json/toulouse');
$json = json_decode($json);
?>
<center>
<h3>Prévisions météo pour la ville de : <u><?php echo $json->city_info->name; ?></u></h3>
<ul style="list-style: none;margin-block-start: 0;padding-inline-start: 0;">
 <li><span><?php echo $json->fcst_day_0->day_short; ?> (<FONT color="blue"><?php echo $json->fcst_day_0->tmin; ?>°C</FONT> / <FONT color="red"><?php echo $json->fcst_day_0->tmax; ?>°C</FONT>)</span><br><small style="vertical-align: 10px;"><?php echo $json->fcst_day_0->condition; ?> </small><img src="<?php echo $json->fcst_day_0->icon; ?>"width="32" height="32" /></li><hr>
<li><span><?php echo $json->fcst_day_1->day_short; ?> (<FONT color="blue"><?php echo $json->fcst_day_1->tmin; ?>°C</FONT> / <FONT color="red"><?php echo $json->fcst_day_1->tmax; ?>°C</FONT>)</span><br><small style="vertical-align: 10px;"><?php echo $json->fcst_day_1->condition; ?> </small><img src="<?php echo $json->fcst_day_1->icon; ?>"width="32" height="32" /></li><hr>
<li><span><?php echo $json->fcst_day_2->day_short; ?> (<FONT color="blue"><?php echo $json->fcst_day_2->tmin; ?>°C</FONT> / <FONT color="red"><?php echo $json->fcst_day_2->tmax; ?>°C</FONT>)</span><br><small style="vertical-align: 10px;"><?php echo $json->fcst_day_2->condition; ?> </small><img src="<?php echo $json->fcst_day_2->icon; ?>"width="32" height="32" /></li>
 </ul>
</center>
    </div>
</div>


<div class="clear"></div>


<?php include("includes/footer.php"); ?>
