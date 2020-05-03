<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Site web - Canal du Midi</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/language.css">
  <link rel="stylesheet" href="css/slideshow.css">
  <!-- link rel="stylesheet" href="./includes/timeline/timeline.css"-->

</head>

<body>
  <div id="container">
    <?php include('includes/header.php'); ?>

    <?php include('includes/menu.php'); ?>

    <div class="left">
      <div class="box_left">

        <div class="box_title">Histoire</div>
        <div>
          <iframe src='https://cdn.knightlab.com/libs/timeline3/latest/embed/index.html?source=1PPw-xPYOxIyyWKbhg2-iR-suQlJ2D1rqmD95vQWxC-4&font=Default&lang=fr&initial_zoom=1&width=100%&height=100%' width='100%' height='900px' frameborder='0'></iframe>
          <!-- TRADUCTION 
          <iframe src='https://cdn.knightlab.com/libs/timeline3/latest/embed/index.html?source=1yKctDhDbvetccU06hBtzabNwxzthHLNnHuIYcLbuXb4&font=Default&lang=en&initial_zoom=5&width=100%&height=100%' width='100%' height='900px' webkitallowfullscreen mozallowfullscreen allowfullscreen frameborder='0'></iframe>
          -->
        </div>

      </div>
    </div>
    <div class="right">
      <div class="box_right">


        <div class="box_title" style="
    background: rgb(66,66,66); /* Old browsers */
    background: -moz-linear-gradient(top, rgb(66,66,66) 0%, rgb(51,51,51) 100%); /* FF3.6-15 */
    background: -webkit-linear-gradient(top, rgb(66,66,66) 0%,rgb(51,51,51) 100%); /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(to bottom, rgb(66,66,66) 0%,rgb(51,51,51) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    border-bottom: 3px solid rgb(38, 38, 38);">Catégorie</div>
        test
      </div>
    </div>


    <div class="clear"></div>


    <?php include("includes/footer.php"); ?>