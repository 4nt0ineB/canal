<?php
function edit_date_format($datetime){ // fonction pour eviter répétition du code pour styliser un champ de type DATETIME
  list($date, $time) = explode(" ", $datetime);
  list($hour, $min, $sec) = explode(":", $time);
  list($year, $month, $day) = explode("-", $date);
  $lastmodified = "$day/$month/$year $time";
  $months = array("janvier", "février", "mars", "avril", "mai", "juin",
      "juillet", "août", "septembre", "octobre", "novembre", "décembre");
  $lastmodified = "le $day ".$months[$month-1]." $year à ${hour}h${min}m${sec}s";
  echo $lastmodified;
}

 ?>
