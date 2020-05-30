<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Panel administrateur - Canal du Midi</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/language.css">
  <link rel="stylesheet" href="../css/slideshow.css">
  <script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
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
  $categories = $db->query("SELECT * FROM articles_categories;");
	?>

	<div class="left">
      <div class="box_left">
        <div class="box_title">Éditer l'article : <?php echo $article_results["titre"]; ?></div>

  <?php
  if(isset($_REQUEST['send'])) // si le formulaire est envoyé avec le bouton send
  {
    $titre = str_replace('"','\"',$_REQUEST["title"]);
    $contenu = str_replace('"','\"',$_REQUEST["content"]);

    if (isset($_REQUEST["categorie"])){
      $categorie = $_REQUEST["categorie"];
    } else {
      $categorie = $article_results["categorie"];
    }
    
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
       $db->query("UPDATE articles SET titre=\"$titre\", contenu=\"$contenu\", categorie=\"$categorie\" WHERE id=$id;");   // on créer la demande dans la BDD
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
        <label><u>Titre :</u></label><input type="text" name="title" value="<?php echo htmlspecialchars($article_results["titre"],ENT_QUOTES); ?>"><br>
        <label><u>Catégorie de l'article :</u></label>

        <select name="categorie">
            <option value="<?php echo $article_results["categorie"]; ?>" selected disabled><?php echo $article_results["categorie"]; ?></option>

             <?php while ($results = $categories->fetch()) : ?>
            <option value="<?php echo $results["fr"]; ?>"><?php echo $results["fr"]; ?></option>
            <?php endwhile; ?>
        </select>
        <br>

        <label><u>Contenu :</u></label>

        <textarea name="content"><?php echo $article_results["contenu"]; ?></textarea>
        <script>
          CKEDITOR.replace('content', {
      extraPlugins: 'embed,autoembed,image2',
      height: 500,

      // Load the default contents.css file plus customizations for this sample.
      contentsCss: [
        'http://cdn.ckeditor.com/4.14.0/full-all/contents.css',
        'https://ckeditor.com/docs/vendors/4.14.0/ckeditor/assets/css/widgetstyles.css'
      ],
      // Setup content provider. See https://ckeditor.com/docs/ckeditor4/latest/features/media_embed
      embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',

      // Configure the Enhanced Image plugin to use classes instead of styles and to disable the
      // resizer (because image size is controlled by widget styles or the image takes maximum
      // 100% of the editor width).
      image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],
      image2_disableResizer: true
    });
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