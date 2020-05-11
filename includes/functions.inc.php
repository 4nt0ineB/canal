<?php
function edit_date_format($datetime){ // fonction pour eviter répétition du code pour styliser un champ de type DATETIME
  list($date, $time) = explode(" ", $datetime);
  list($hour, $min, $sec) = explode(":", $time);
  list($year, $month, $day) = explode("-", $date);
  $lastmodified = "$day/$month/$year $time";
  $months = array("January", "February", "March", "April", "May", "June",
      "July", "August", "September", "October", "November", "December");
  $mois = array("janvier", "février", "mars", "avril", "mai", "juin",
      "juillet", "août", "septembre", "octobre", "novembre", "décembre");

  if ($_SESSION["lang"] == "en") {
  	$lastmodified = "on ".$months[$month-1]." $day $year at ${hour}h${min}m${sec}s";
  } else if ($_SESSION["lang"] == "fr"){
  	$lastmodified = "le $day ".$mois[$month-1]." $year à ${hour}h${min}m${sec}s";
  }

  echo $lastmodified;
}

 ?>
