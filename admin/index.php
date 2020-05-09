<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Panel administrateur - Canal du Midi</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/language.css">
  <link rel="stylesheet" href="../css/slideshow.css">
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

	?>

<div class="left">
      <div class="box_left">
        <div class="box_title">Bienvenue <u><?php echo $row["login"]; ?></u> sur le panel</div>
        <br> Statistiques

      </div>
</div>
     <?php include("includes/aside.php"); ?>


    <div class="clear"></div>

    <?php include("includes/footer.php"); ?>