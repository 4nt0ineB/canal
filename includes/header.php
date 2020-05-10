<?php
date_default_timezone_set('Europe/Paris');
session_start();
include 'functions.inc.php';
include 'database.php';
if (isset($_POST["recup_language"])) {

  if ($_POST["recup_language"] == "en") {
    $_SESSION["lang"] = "en";
    $_SESSION["otherlanguages"] = ["fr", "es"];
  } else if ($_POST["recup_language"] == "es") {
    $_SESSION["lang"] = "es";
    $_SESSION["otherlanguages"] = ["fr", "en"];
  } else if ($_POST["recup_language"] == "fr") {
    $_SESSION["lang"] = "fr";
    $_SESSION["otherlanguages"] = ["en", "es"];
  }
} else if (!isset($_SESSION["lang"])) {
  $_SESSION["lang"] = "fr";
  $_SESSION["otherlanguages"] = ["en", "es"];
}

?>
<form method="POST" id="choix1"> <input type="hidden" name="recup_language" value="<?php echo $_SESSION["otherlanguages"][0]; ?>" /> </form>
<form method="POST" id="choix2"> <input type="hidden" name="recup_language" value="<?php echo $_SESSION["otherlanguages"][1]; ?>" /> </form>

<div id="header">
  <div id="search">
    <form action="recherche.php" method="POST">
      <?php
         if ($_SESSION["lang"] == "en") {
            echo "<input type=\"text\" id=\"searchbar\" name=\"search\" minlength=\"4\" size=\"10\" placeholder=\"Search...\">";
        } elseif ($_SESSION["lang"] == "fr") {
            echo "<input type=\"text\" id=\"searchbar\" name=\"search\" minlength=\"4\" size=\"10\" placeholder=\"Recherche...\">";
        }
      ?>
      <input type="image" src="./img/loupe.png" style="position: relative;top: 3px;left: -30px;">
    </form>
  </div>
  <div id="language">

    <div id="lang_selector" class="language-dropdown">
      <label for="toggle" class="lang-flag lang-<?php echo $_SESSION["lang"]; ?>" title="Sélectionnez votre language">
        <span class="flag"></span>
      </label>
      <ul class="lang-list">
        <li class="lang lang-<?php echo $_SESSION["otherlanguages"][0]; ?> selected" title="<?php echo $_SESSION["otherlanguages"][0]; ?>">
          <span class="flag"></span>
        </li>
        <li class="lang lang-<?php echo $_SESSION["otherlanguages"][0]; ?>" title="<?php echo $_SESSION["otherlanguages"][0]; ?>">
          <a href='#' onclick='document.getElementById("choix1").submit()'><span class="flag"></span></a>
        </li>
        <li class="lang lang-<?php echo $_SESSION["otherlanguages"][1]; ?>" title="<?php echo $_SESSION["otherlanguages"][1]; ?>">
          <a href='#' onclick='document.getElementById("choix2").submit()'><span class="flag"></span></a>
        </li>
      </ul>
    </div>

  </div>
  <div id="logo"><a href="index.php"><img src="img/logo.png" style="width: 30%;"></a></div>

  <?php
     if ($_SESSION["lang"] == "en") {
        echo "<div id=\"slug\">World Heritage of Humanity</div>";
    } elseif ($_SESSION["lang"] == "fr") {
        echo "<div id=\"slug\">Patrimoine Mondial de l'Humanité</div>";
    }
  ?>

</div>