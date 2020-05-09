<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Panel administrateur - Canal du Midi</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/language.css">
  <link rel="stylesheet" href="../css/slideshow.css">
  <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
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

	if (!isset($_GET["id"]) || empty($_GET["id"])){
		echo "<p>Merci de sélectionner un article</p>";
		die;
	} else if (!is_numeric($_GET["id"])) {
		echo "<p>Merci de sélectionner un numéro d'article correct</p>";
		die;
	}

	$id = $_GET["id"];
	$article = $db->query("SELECT * FROM articles WHERE id=$id");

	if ($article->rowCount() == 0){
		echo "<p>L'article sélectionné n'existe pas</p>";
		die;
	}

	$article_results = $article->fetch();

	?>

	<div class="left">
      <div class="box_left">
        <div class="box_title">Éditer l'article : <?php echo $article_results["titre"]; ?></div>

  <?php
  if(isset($_REQUEST['send'])) // si le formulaire est envoyé avec le bouton send
  {
    $titre = strip_tags($_REQUEST["title"]);
    $contenu = $_REQUEST["content"];
     try
     {
      if (empty($titre) || strlen($titre) < 3){ // si le titre est vide ou inférieur a 3 caractères
        $errorRequestMessage[]="Merci de saisir un titre valide";
      }

      if (empty($contenu)){ // si le msg est vide
        $errorRequestMessage[]="Merci de saisir un article valide";
      }

      else if(!isset($errorRequestMessage)) // si aucune erreur :
      {
       $db->query("UPDATE articles SET titre=\"$titre\", contenu=\"$contenu\" WHERE id=$id;");   // on créer la demande dans la BDD
       $goodRequestMessage="L'article a été édité avec succès. Redirection..."; // message de succès
       header("refresh:1; index.php");
       
      }
     }
     catch(PDOException $e)
     {
      echo $e->getMessage();
     }
    }
   ?>

   <?php
     if(isset($errorRequestMessage))
     {
      foreach($errorRequestMessage as $errorrequest)
      {
      ?>
       <div class="error"><?php echo $errorrequest; ?></div>
         <?php
      }
     }
     if(isset($goodRequestMessage))
     {
     ?>
      <div class="success">
        <?php echo $goodRequestMessage; ?>
      </div>
     <?php
     }
     ?>

          <form method="POST">
            <p>
        <label><u>Auteur :</u></label><input type="text" name="author" value="<?php echo $article_results["auteur"]; ?>" readonly="readonly"><br>
        <label><u>Date :</u></label><input type="text" name="date" value="<?php echo $article_results["date"]; ?>" readonly="readonly"><br>
        <label><u>Titre :</u></label><input type="text" name="title" value="<?php echo $article_results["titre"]; ?>"><br>
        <label><u>Contenu :</u></label>

        <textarea name="content"><?php echo $article_results["contenu"]; ?></textarea>
        <script>
          CKEDITOR.replace( 'content' );
       </script>

        <br>
        <input class="bouton yellow" type="submit" name="send" value="Éditer l'article">

            </p>
          </form>

        <br>
       
        </div>

</div>
    <?php include("includes/aside.php"); ?>


    <div class="clear"></div>

    <?php include("includes/footer.php"); ?>