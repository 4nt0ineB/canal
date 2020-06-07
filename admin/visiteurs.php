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
    include('includes/menu.php');


    if (!isset($_SESSION["admin"])) // si l'user est pas log 
    {
      header("location:login.php"); // redirection
    }

    $visiteur = $db->query("SELECT * FROM visiteurs ORDER BY lastLogin DESC LIMIT 40");

    ?>

    <style>
  .demo {
    border: 1px solid #3A3A3A;
    border-collapse: collapse;
    padding: 5px;
    width: 100%;
    margin: 15px auto;
}
  .demo th {
    border: 1px solid #3A3A3A;
    padding: 5px;
    color: #fff;
    background: #CE6700;
}
  .demo td {
    border:1px solid #3A3A3A;
    padding:5px;
    text-align: center;
  }
</style>

    <div class="left">
      <div class="box_left">
        <div class="box_title">Derniers visiteurs récents du site</div>


        <table class="demo">
  <thead>
  <tr>
    <th>IP</th>
    <th>Dernière connexion</th>
    <th>Nb de visites</th>
  </tr>
  </thead>
  <tbody>
        <?php while ($results = $visiteur->fetch()) : ?>

          <?php
          $ip = $results["ip"];
          $json = file_get_contents("http://ip-api.com/json/$ip?fields=status,country,city,zip,isp&lang=fr");
          $data = json_decode($json);
          ?>


        <tr>
          <td><b><?php echo htmlspecialchars($results["ip"]);echo'</b>'; 

          if ($data->status == "success"){
            echo ' ('; echo $data->country; echo' - '; echo $data->city; echo' / <b>'; echo $data->isp; echo'</b>)'; 
          }

          ?></td>
          <td><?php echo edit_date_format($results["lastLogin"]); ?></td>
          <td><?php echo htmlspecialchars($results["compteur"]); ?></td>
        </tr>

        <?php endwhile; ?>
  </tbody>
</table>


      </div>
    </div>
    <?php include("includes/aside.php"); ?>


    <div class="clear"></div>

    <?php include("includes/footer.php"); ?>