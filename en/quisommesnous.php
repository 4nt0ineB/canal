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

<style>
.profile_picture{
  width: 174px;
  height:230px;
  display: inline-block;
  border: 2px solid black;
  margin: 5px auto;
  box-shadow: 0px 2px 3px 0px black;
}
.label_picture {
  margin: 5px auto;
  width: 174px;
  display: inline-block;
  font-weight: bold;
}
.label_role {
  margin: 5px auto;
  width: 174px;
  display: inline-block;
  font-style: italic;
  font-size: 15px;
}
</style>

<div class="left">
<div class="box_left">
	<div class="box_title">Who are we ?</div>

<center>
<div class="profile_picture">
  <!-- easter egg https://cdn.discordapp.com/attachments/648445316269342721/662363770164871181/IMG_0175.JPG -->
  <img src="img/brian.jpg" style="height:230px;width:174px;" alt="">
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

<div class="label_role">Project Leader</div>
<div class="label_role">Communication Officer</div>
<div class="label_role">Development Officer</div>
<div class="label_role">Content Researcher</div>

</center>

<h2>Presentation</h2>
<p>
We are 4 students in DUT Informatique at the University Gustave Eiffel located in Champs-sur-Marne (77420) who work on projects initiated by our communication professor within the framework of tutored projects.
Our aim is to develop this site so that it can best inform the visitor about the Canal du Midi.
<br>
This project required a lot of work during our first year of the DUT Informatique.
</p>

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
    >Our university</div>
<center>
  <a href="https://www.univ-gustave-eiffel.fr/" target="_blank"><img src="img/logo_univ_gustave_eiffel_bleu.png" style="margin:5px;width:250px;" alt=""></a>
  <br>
  <i>Université Gustave Eiffel</i>
</center>
    </div>
</div>


<div class="clear"></div>

<?php include("includes/footer.php"); ?>
