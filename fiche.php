<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Site web - Canal du Midi</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/language.css">
</head>

<body>
    <div id="container">

        <?php
        include('includes/header.php');
        include('includes/menu.php');
        //ON RECUP LA FICHE
        if (isset($_GET['id'])){
        	$i = $_GET['id'];
        }

        // statistiques
        $query_count = $db->query("SELECT compteur FROM stats WHERE page=\"fiche\";")->fetch();
        $count = $query_count["compteur"];
        $db->query("UPDATE stats SET compteur=$count+1 WHERE page=\"fiche\";");

        if (!isset($i)){
        	$errorMessage = "Merci de sélectionner une fiche.";
        } else if (empty($i)){
        	$errorMessage = "Merci de sélectionner une fiche correcte.";
        } else if (!is_numeric($i)){
			$errorMessage = "Merci de sélectionner une fiche correcte.";
        } else {
        	$fiche = $db->query("SELECT * FROM fiches WHERE id=$i")->fetch();
        }

        if (isset($errorMessage)){
        	echo '<p>'.$errorMessage.'</p>';
        	die;
        }
        ?>

        <div class="left">
            <div class="box_left">
                <div class="box_title"><?php echo $fiche['titre']; ?></div>
                <br>
                <?php echo '<img src="' . $fiche['miniature'] . '" style="width: 250px;">'; ?>
                <hr>
                <p><?php echo $fiche['description']; ?></p>

            </div>
            <div style="clear:both;"></div>
        </div>

        <div class="right">
            <div class="box_right">
                <div class="box_title black"><?php echo 'Auké'; ?></div>

                <center>

                </center>
            </div>
        </div>



        <div class="clear"></div>

        <?php include("includes/footer.php"); ?>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/list.js/1.0.0/list.min.js'></script>
        <script src="./js/table.js"></script>