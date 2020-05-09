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
    include('../includes/menu.php');
    // ON RECUP LA TRAD DE LA PAGE
    /*
    $contenuLogin = $db->query("SELECT * FROM p_login");
    $txt = $contenuLogin->fetchAll();*/
    ?>

    <div class="left">
      <div class="box_left">
        <div class="box_title">Connexion au panel administrateur</div>

        <center>
          <form>
            <input type="text" name="login">
            <br>
            <input type="password" name="pass">
            <br>
            <input type="submit" name="send">
          </form>
        </center>

      </div>
    </div>
    <div class="right">
      <div class="box_right">
        <div class="box_title black">bonjour</div>
        <center>
          <a href="https://www.univ-gustave-eiffel.fr/" target="_blank"><img src="../img/logo_univ_gustave_eiffel_bleu.png" style="margin:5px;width:250px;" alt=""></a>
          <br>
          <i>Université Gustave Eiffel</i>
        </center>
      </div>
    </div>


    <div class="clear"></div>

    <?php include("includes/footer.php"); ?>