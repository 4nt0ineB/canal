<?php // ON RECUP LA TRAD DE LA NAVBAR

$contNavbar = $db->query("SELECT * FROM navbar");
$txtNav = $contNavbar->fetchAll();
if ($_SESSION["lang"] == "fr"){
  $nrow = 0;
} else if($_SESSION["lang"] == "en"){
  $nrow = 1;
} else if($_SESSION["lang"] == "es"){
  $nrow = 2;
}
if (isset($_SESSION["admin"])){
?>

<div id="navbar">
  <ul>
    <li><a href="../index.php">Retour au site</a></li> |
    <li><a href="./logout.php">Déconnexion</a></li>
  </ul>
</div>

<?php

} else {

  ?>

<div id="navbar">
<ul>
    <li><a href="../index.php"><?php echo $txtNav[$nrow]["t1"]; ?></a></li> |
    <li class="rubrique-drop"><a href="#"><?php echo $txtNav[$nrow]["t5"]; ?><img src="../img/down.png" style="vertical-align: middle;margin-left: 7px;margin-right: -10px;"></a>
      <div class="dropdown-content">
        <a href="../histoire.php"><?php echo $txtNav[$nrow]["t4"]; ?></a>
        <a href="../nature.php"><?php echo $txtNav[$nrow]["t7"]; ?></a>
      </div>
    </li> |
    <li><a href="../naviguer.php"><?php echo $txtNav[$nrow]["t8"]; ?></a></li> |
    <li class="rubrique-drop"><a href="#"><?php echo $txtNav[$nrow]["t9"]; ?><img src="../img/down.png" style="vertical-align: middle;margin-left: 7px;margin-right: -10px;"></a>
      <div class="dropdown-content">
        <a href="../lieux.php?tf=logement"><?php echo $txtNav[$nrow]["t10"]; ?></a>
        <a href="../lieux.php?tf=restauration"><?php echo $txtNav[$nrow]["t11"]; ?></a>
        <a href="../lieux.php?tf=loisir"><?php echo $txtNav[$nrow]["t12"]; ?></a>
      </div>
    </li> |
    <li><a href="../articles.php"><?php echo $txtNav[$nrow]["t2"]; ?></a></li> |
    <li><a href="../quisommesnous.php"><?php echo $txtNav[$nrow]["t3"]; ?></a></li> |
    <li><a href="../galerie.php"><?php echo $txtNav[$nrow]["t13"]; ?></a></li>
  </ul>
</div>

<?php
  }
?>