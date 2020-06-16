<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Site web - Canal du Midi</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/language.css">
    <link rel="stylesheet" href="css/slideshow.css">
</head>

<body>
    <div id="container">

        <?php
        include('includes/header.php');
        include('includes/menu.php');
        //ON RECUP LA TRAD DE LA PAGE
        $contenuIndex = $db->query("SELECT * FROM p_survey");
        $txt = $contenuIndex->fetchAll();

        // statistiques
        $query_count = $db->query("SELECT compteur FROM stats WHERE page=\"survey\";")->fetch();
        $count = $query_count["compteur"];
        $db->query("UPDATE stats SET compteur=$count+1 WHERE page=\"survey\";");
        ?>



        <div class="left">
            <div class="box_left">
                <div class="box_title"><?php echo $txt[0][$_SESSION["lang"]]; ?></div>

                <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScdO9fvuSN63zamZaOe33NH2v8uBUJ9KV5wh6cXjWUbyYW1pg/viewform?embedded=true" width="100%" height="1050" frameborder="0" marginheight="0" marginwidth="0">Chargement…</iframe>
            </div>
        </div>

        <div class="right">
            <div class="box_right">
            <div class="box_title black"><?php echo $txt[1][$_SESSION["lang"]]; ?></div>
                <center>
                    <h3><?php echo $txt[2][$_SESSION["lang"]]; ?><u>Toulouse</u></h3>
                    <ul style="list-style: none;margin-block-start: 0;padding-inline-start: 0;">
                        <li><?php include("includes/meteo.php"); ?></li>
                    </ul>
                </center>
            </div>
        </div>


        <div class="clear"></div>


        <?php include("includes/footer.php"); ?>