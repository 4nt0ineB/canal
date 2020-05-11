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


    if (!isset($_SESSION["admin"])) // si l'user est pas log 
    {
      header("location:login.php"); // redirection
    }

    $article = $db->query("SELECT * FROM articles");

    if (isset($_GET['delete'])) {
            $idDel = $_GET['delete'];
            $db->query("DELETE FROM articles WHERE id=$idDel");
    }

    ?>

    <div class="left">
      <div class="box_left">
        <div class="box_title">Liste des articles</div>

        <?php while ($results = $article->fetch()) : ?>
          <div class="article_summup">
            <div class="left">
              <h1><?php echo $results["titre"]; ?></h1><br>
              <span>Écrit par <b><?php echo $results["auteur"]; ?></b> <?php echo edit_date_format($results["date"]); ?></span>
            </div>

            <div class="right">
              <a href="../voir_article.php?id=<?php echo $results["id"]; ?>" class="bouton green" target="_blank">Voir</a>
              <a href="edit_article.php?id=<?php echo $results["id"]; ?>" class="bouton yellow">Éditer</a>
              <a href="articles.php?delete=<?php echo $results["id"]; ?>" class="bouton red">Supprimer</a>
            </div>
            <div style="clear:both;"></div>
          </div>
        <?php endwhile; ?>



      </div>
    </div>
    <?php include("includes/aside.php"); ?>


    <div class="clear"></div>

    <?php include("includes/footer.php"); ?>