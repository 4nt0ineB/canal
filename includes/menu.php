<?php // ON RECUP LA TRAD DE LA NAVBAR
$contNavbar = $db->query("SELECT * FROM navbar");
$txtNav = $contNavbar->fetchAll();
$nrow = ($_SESSION["lang"] == "fr") ? 0 : 1; // c'est une table chelou du coup faut connaître les id
?>

<div id="navbar">
  <ul>
    <li><a href="index.php"><?php echo $txtNav[$nrow]["t1"]; ?></a></li> |
    <li><a href="#"><?php echo $txtNav[$nrow]["t2"]; ?></a></li> |
    <li><a href="quisommesnous.php"><?php echo $txtNav[$nrow]["t3"]; ?></a></li> |
    <li><a href="histoire.php"><?php echo $txtNav[$nrow]["t4"]; ?></a></li> |
    <li><a href="#"><?php echo $txtNav[$nrow]["t5"]; ?></a></li> |
    <li class="rubrique-drop"><a href="javascript:void(0)"><?php echo $txtNav[$nrow]["t6"]; ?></a>

      <div class="dropdown-content">
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
      </div>

    </li> |
    <li><a href="nature.php"><?php echo $txtNav[$nrow]["t7"]; ?></a></li>
    <li>
      <FONT color="#33a0ff"><?php echo $_SESSION["lang"]; ?></FONT>
    </li>
  </ul>
</div>