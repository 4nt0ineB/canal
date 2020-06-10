<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Site web - Canal du Midi</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/language.css">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> -->

    <link rel="stylesheet" href="css/table.css">
    <style>
        .category {
            visibility: hidden;
        }
    </style>
</head>

<body>
    <div id="container">

        <?php
        include('includes/header.php');
        include('includes/menu.php');

        if (!isset($_SESSION['tf'])) {  //tf : type de fiche
            $_SESSION['tf'] = "logement";
        }
        if (isset($_GET['tf'])) {
            $_SESSION['tf'] = $_GET['tf'];
        }

        $tf = $_SESSION['tf'];

        //ON RECUP LES FICHES
        $qFiche = $db->query("SELECT * FROM fiches WHERE tag=\"$tf\"; ");

        //ON RECUP LA TRAD
        $txt = $db->query("SELECT * FROM p_lieux")->fetchAll();

        //ON RECUP LA TRAD DES TAGS
        $tradTag = $db->query("SELECT * FROM tags WHERE type=\"$tf\";");

        // choix du bon titre de la rubrique
        if ($tf == "logement") {
            $idTitre = 0;
        } elseif ($tf == "restauration") {
            $idTitre = 1;
        } elseif ($tf == "loisir") {
            $idTitre = 2;
        }

        // statistiques
        $query_count = $db->query("SELECT compteur FROM stats WHERE page=\"lieux\";")->fetch();
        $count = $query_count["compteur"];
        $db->query("UPDATE stats SET compteur=$count+1 WHERE page=\"lieux\";");
        ?>

        <div class="left">
            <div class="box_left">
                <div class="box_title"><?php echo $txt[$idTitre][$_SESSION["lang"]]; ?></div>

                <div class="c1">
                    <br>
                    <div id="lovely-things-list">
                        <input type="text" class="search" placeholder="Search">
                        <ul class="sort-by">
                            <li class="sort btn" data-sort="name" style="border-radius: 10px;">
                                <?php if ($_SESSION['lang'] == "en") {
                                    echo 'Sort by name';
                                } elseif ($_SESSION['lang'] == "fr") {
                                    echo 'Trier par nom';
                                } ?>
                            </li>

                            <li class="sort btn" data-sort="category">
                                <?php if ($_SESSION['lang'] == "en") {
                                    echo 'Sort by category';
                                } elseif ($_SESSION['lang'] == "fr") {
                                    echo 'Trier par catégorie';
                                } ?>
                            </li>
                        </ul>
                        <ul class="filter">
                            <li class="btn" id="filter-none">
                                <?php if ($_SESSION['lang'] == "en") {
                                    echo 'Show all';
                                } elseif ($_SESSION['lang'] == "fr") {
                                    echo 'Tout';
                                } ?>
                            </li>

                            <?php
                            while ($t = $tradTag->fetch()) {
                                echo '<li class="btn" id="filter-';
                                if ($t['fr'] == "chambres d'hôtes") {
                                    echo 'chambresD';
                                } else {
                                    echo $t['fr'];
                                }
                                echo '">' . $t[$_SESSION['lang']] . '</li>';
                            }

                            ?>

                        </ul>
                        <ul class="list">
                            <?php while ($f = $qFiche->fetch()) {
                                //on utilisera le <a></a> pour faire passer en post l'id de la fiche de laquelle on souhaite voir sa description via GET
                                echo '<li>
                                    <span class="category">' . $f["tag2"] . '</span>
                                    <img src="' . $f['miniature'] . '" class="thumb">
                                    <a href="fiche.php?id=' . $f['id'] . '"><h4><span  class="name">' . $f['titre'] . '</span> </h4></a>
                                    <p class="description">' . $f["adresse"] . '<br>' . $f["code_postal"] . ' ' . $f["localite"] . '</p>
                                    
                                    </li>';
                            }

                            ?>

                        </ul>
                    </div>
                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
        <div class="right">
            <div class="box_right">
                <div class="box_title black"><?php echo $txt[3][$_SESSION["lang"]]; ?></div>
                <center>
                    <p><?php echo $txt[4][$_SESSION["lang"]]; ?></p>
                    <div class="button-survey" style="width: 250px;"><a href="http://www.rando-marche.fr/_28246_randonnees-autour-de-toulouse" style="text-decoration: none;color:inherit;">rando-marche.fr</a></div>
                    <div class="button-survey" style="width: 250px;"><a href="http://www.randogps.net/cherche/search.php?media_only=0&query=Canal+du+midi&search=1&type=and&db=0&prefix=0" style="text-decoration: none;color:inherit;">randogps.net</a></div>
                </center>
            </div>
            <br>

            <div class="box_right">
                <div class="box_title black"><?php
                                                if ($_SESSION["lang"] == "fr") {
                                                    echo "Une image de notre galerie";
                                                } else if ($_SESSION["lang"] == "en") {
                                                    echo "An image from our gallery";
                                                } else if ($_SESSION["lang"] == "es") {
                                                    echo "Una imagen de nuestra galería";
                                                }
                                                ?></div>


                <center>
                    <iframe src="includes/iframe_galerie.php" scrolling="no" frameborder="0"></iframe>
                    <hr>
                    <a href="galerie.php">
                        <?php
                        if ($_SESSION["lang"] == "fr") {
                            echo "Voir notre galerie";
                        } else if ($_SESSION["lang"] == "en") {
                            echo "See our gallery";
                        } else if ($_SESSION["lang"] == "es") {
                            echo "Vea nuestra galería";
                        }
                        ?></a>
                </center>
            </div>
        </div>




        <div class="clear"></div>

        <?php include("includes/footer.php"); ?>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/list.js/1.0.0/list.min.js'></script>
        <script src="./js/table.js"></script>