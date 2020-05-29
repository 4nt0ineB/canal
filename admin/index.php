<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Panel administrateur - Canal du Midi</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/language.css">
  <link rel="stylesheet" href="../css/slideshow.css">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
	<div id="container">
	<?php

	include('includes/header.php');
	include('includes/menu.php');


	if(!isset($_SESSION["admin"])) // si l'user est pas log 
	  {
	    header("location:login.php"); // redirection
	  } 

  $query = "SELECT page,compteur FROM stats WHERE page!=\"record\""; // select column
  $aresult = $db->query($query);

	?>

<div class="left">
      <div class="box_left">
        <div class="box_title">Bienvenue <u><?php echo $row["login"]; ?></u> sur le panel</div>
    
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
                ['page','compteur'],
                <?php
                    while($row = $aresult->fetch()){
                        echo "['".strtoupper($row["page"])."', ".$row["compteur"]."],";
                    }
                ?>
               ]);

        var options = {
          title: 'Statistiques visites pages'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <div id="piechart" style="width: 100%; height: 400px;"></div>

    <hr>

    <h2>Statistiques des visites</h2>

    <p><u>Nombre de visiteurs aujourd'hui :</u> 
    <?php 

    $visiteurs = $db->query("SELECT * FROM visiteurs");

    $aujourdhui = new DateTime("today"); 
    $count = 0;

    while ($results = $visiteurs->fetch()){
      $date = $results["lastLogin"];
      $DateVisite = new DateTime($date); //2016-10-27

      if ($aujourdhui <= $DateVisite){
        $count++;
      }
    }

    echo $count;echo' visites';
    ?>

<br>
  <u>Record de visiteurs sur un jour :</u> 
  <?php 

    $visiteurs = $db->query("SELECT * FROM stats WHERE page=\"record\";")->fetch();
    
    if ($count > $visiteurs["compteur"]){
      $db->query("UPDATE stats SET compteur=$count WHERE page=\"record\";");
    }

    echo $visiteurs["compteur"];echo' visites';
    ?>
<br>
    <u>Nombre de consultations depuis la création du site :</u> 
    <?php 

    $visiteurs = $db->query("SELECT * FROM visiteurs");
    $count = 0;

    while ($results = $visiteurs->fetch()){
        $count+=$results["compteur"]; 
    }

    echo $count;echo' visites';
    ?>

<br>
    <u>Nombre de visiteurs différents depuis la création du site :</u> 
    <?php 

    $visiteurs = $db->query("SELECT * FROM visiteurs");

    echo $visiteurs->rowCount();echo' visiteurs';
    ?>



    </p>
      </div>
</div>
     <?php include("includes/aside.php"); ?>


    <div class="clear"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <?php include("includes/footer.php"); ?>