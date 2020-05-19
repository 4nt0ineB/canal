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

    $date = date('Y-m-d H:i:s');

    $categories = $db->query("SELECT * FROM articles_categories;");
    ?>


  <?php
  if(isset($_REQUEST['send'])) // si le formulaire est envoyé avec le bouton send
  {
    $auteur = strip_tags($row["login"]); // on stock les variables reçues
    $titre = strip_tags($_REQUEST["title"]);
    $contenu = $_REQUEST["content"];
    $categorie = $_REQUEST["categorie"];
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
       $insert_request=$db->prepare("INSERT INTO articles VALUES (NULL, :titre, :auteur, :contenu, NOW(), :categorie);");   // on créer la demande dans la BDD

       if($insert_request->execute(array(':titre'=>$titre, ':auteur'=>$auteur, ':contenu'=>$contenu, ':categorie'=>$categorie))){

        $goodRequestMessage="L'article a été créé avec succès. Redirection..."; // message de succès
        header("refresh:1; index.php");
       }
      }
     }
     catch(PDOException $e)
     {
      echo $e->getMessage();
     }
    }
   ?>


<div class="left">
      <div class="box_left">
        <div class="box_title">Créer un nouvel article</div>
        

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
        <label><u>Auteur :</u></label><input type="text" name="author" value="<?php echo $row["login"]; ?>" readonly="readonly"><br>
        <label><u>Date :</u></label><input type="text" name="date" value="<?php echo $date; ?>" readonly="readonly"><br>
        <label><u>Titre :</u></label><input type="text" name="title" placeholder="Titre de l'article"><br>

        <label><u>Catégorie de l'article :</u></label>

		<select name="categorie">
		    <option selected disabled>Catégorie</option>

		     <?php while ($results = $categories->fetch()) : ?>
		    <option value="<?php echo $results["fr"]; ?>"><?php echo $results["fr"]; ?></option>
		    <?php endwhile; ?>
		</select>
		<br>

        <label><u>Contenu :</u></label>



        <textarea name="content"></textarea>
        <script>
          CKEDITOR.replace( 'content' );
       </script>

        <br>
        <input class="bouton green" type="submit" name="send" value="Poster l'article">

            </p>
          </form>

        <br>
       
        </div>

</div>
    <?php include("includes/aside.php"); ?>


    <div class="clear"></div>

    <?php include("includes/footer.php"); ?>

  
