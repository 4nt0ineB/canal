<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="Uutf-8">
    <title>Site web - Canal du Midi</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/language.css">
    <link rel="stylesheet" href="css/slideshow.css">

</head>

<body>
    <div id="container">
        <?php include('includes/header.php'); ?>
        <?php include('includes/menu.php'); ?>

        <?php // ON RECUP TOUT LE CONTENU TEXTUEL 
        $contenu = $db->query("SELECT * FROM p_nature");
        $txt = $contenu->fetchAll();
        ?>

        <div class="left">
            <div class="box_left">
                <div class="box_title"> <?php echo $txt[3][$_SESSION["lang"]]; ?> </div>
                <h2><?php echo $txt[0][$_SESSION["lang"]]; ?></h2>
                <p><?php echo $txt[2][$_SESSION["lang"]]; ?></p>
                <p><?php echo $txt[4][$_SESSION["lang"]]; ?></p>
                <h2><?php echo $txt[1][$_SESSION["lang"]]; ?></h2>
                <p><?php echo $txt[5][$_SESSION["lang"]]; ?></p>
                <p><?php echo $txt[6][$_SESSION["lang"]]; ?></p>
            </div>
        </div>
        <div class="right">
            <div class="box_right">


                <div class="box_title" style="
    background: rgb(66,66,66); /* Old browsers */
    background: -moz-linear-gradient(top, rgb(66,66,66) 0%, rgb(51,51,51) 100%); /* FF3.6-15 */
    background: -webkit-linear-gradient(top, rgb(66,66,66) 0%,rgb(51,51,51) 100%); /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(to bottom, rgb(66,66,66) 0%,rgb(51,51,51) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    border-bottom: 3px solid rgb(38, 38, 38);">Catégorie</div>
                test
            </div>
        </div>


        <div class="clear"></div>


        <?php include("includes/footer.php"); ?>