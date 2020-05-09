<?php // ON RECUP LA TRAD DE LA NAVBAR
/*
$contNavbar = $db->query("SELECT * FROM navbar");
$txtNav = $contNavbar->fetchAll();
$nrow = ($_SESSION["lang"] == "fr") ? 0 : 1; // c'est une table chelou du coup faut connaître les id*/
?>

<div id="navbar">
  <ul>
    <li><a href="../index.php">Retour au site</a></li> |
    <li><a href="./logout.php">Déconnexion</a></li>
  </ul>
</div>