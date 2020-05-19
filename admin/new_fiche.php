<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Panel administrateur - Canal du Midi</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/language.css">
    <link rel="stylesheet" href="../css/slideshow.css">
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
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

        ?>


        <?php
        if (isset($_REQUEST['send'])) // si le formulaire est envoyé avec le bouton send
        {
            extract($_POST);
            $auteur = strip_tags($row["login"]); // on stock les variables reçues
            $titre = strip_tags($_REQUEST["title"]);
            $contenu = $_REQUEST["content"];
            try {
                if (empty($titre) || strlen($titre) < 3) { // si le titre est vide ou inférieur a 3 caractères
                    $errorRequestMessage[] = "Merci de saisir un titre valide";
                }

                if (empty($contenu)) { // si le msg est vide
                    $errorRequestMessage[] = "Merci de saisir un article valide";
                } else if (!isset($errorRequestMessage)) // si aucune erreur :
                {
                    $insert_request = $db->prepare("INSERT INTO fiches VALUES (DEFAULT, :miniature, :titre, :adresse, :code_postal, :localite, :description, :tag, :tag2);");   // on créer la demande dans la BDD

                    if ($insert_request->execute(array(
                        'miniature' => $mini,
                        'titre' => strip_tags($title), 'adresse' => strip_tags($adresse),
                        'code_postal' => strip_tags($code_postal), 'localite' => strip_tags($localite),
                        'description' => $content, 'tag' => strip_tags($tag), 'tag2' => strip_tags($tag2)
                    ))) {

                        $goodRequestMessage = "L'article a été créé avec succès. Redirection..."; // message de succès
                        header("refresh:1; index.php");
                    }
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        ?>


        <div class="left">
            <div class="box_left">
                <div class="box_title">Créer un nouvel article</div>


                <?php
                if (isset($errorRequestMessage)) {
                    foreach ($errorRequestMessage as $errorrequest) {
                ?>
                        <div class="error"><?php echo $errorrequest; ?></div>
                    <?php
                    }
                }
                if (isset($goodRequestMessage)) {
                    ?>
                    <div class="success">
                        <?php echo $goodRequestMessage; ?>
                    </div>
                <?php
                }
                ?>

                <form method="POST">
                    <p>
                        <label><u>Titre :</u></label><input type="text" name="title" placeholder="Titre de l'article" required><br>
                        <label><u>Miniature :</u></label><input type="text" name="mini" placeholder="Lien de la miniature" required><br>
                        <label><u>Tag1 :</u></label> <select type="text" name="tag" required>
                            <option>Choisir un tag</option>
                            <?php
                            $dispoTag = $db->query("SELECT * FROM tags WHERE type=\"categorie\";");
                            while ($t = $dispoTag->fetch()) {
                                echo '<option value="' . $t['fr'] . '">' . $t['fr'] . '</option>';
                            }
                            ?>
                        </select> <label><u>Tag2 :</u></label> <select type="text" name="tag2" required>
                            <option>Choisir un tag</option>
                            <?php
                            $dispoTag = $db->query("SELECT * FROM tags WHERE type!=\"categorie\";");
                            while ($t = $dispoTag->fetch()) {
                                echo '<option value="' . $t['fr'] . '">' . $t['fr'] . '</option>';
                            }
                            ?>
                        </select><br>
                        <label><u>Adresse :</u></label><input type="text" name="adresse" placeholder="Adresse du lieu" required><br>
                        <label><u>Code Postal :</u></label><input type="text" name="code_postal" placeholder="Code postal du lieu" required><br>
                        <label><u>Localite :</u></label><input type="text" name="localite" placeholder="Ville du lieu" required><br>
                        <label><u>Description :</u></label>

                        <textarea name="content"></textarea>
                        <script>
                            CKEDITOR.replace('content');
                        </script>

                        <br>
                        <input class="bouton green" type="submit" name="send" value="Poster la fiche">

                    </p>
                </form>

                <br>

            </div>

        </div>
        <?php include("includes/aside.php"); ?>


        <div class="clear"></div>

        <?php include("includes/footer.php"); ?>