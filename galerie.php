<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Site web - Canal du Midi</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/language.css">
  <link rel="stylesheet" href="css/slideshow.css">
  <link rel="stylesheet" href="css/galerie-nature.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css">
</head>

<body>
  <div id="container">

    <?php
    include('includes/header.php');
    include('includes/menu.php');

    $contenu = $db->query("SELECT * FROM p_galerie");
    $txt = $contenu->fetchAll();

    // statistiques
    $query_count = $db->query("SELECT compteur FROM stats WHERE page=\"galerie\";")->fetch();
    $count = $query_count["compteur"];
    $db->query("UPDATE stats SET compteur=$count+1 WHERE page=\"galerie\";");
    ?>
      <div class="box_left" style="width: 1208px;box-sizing: border-box;">
        <div class="box_title"><?php echo $txt[0][$_SESSION["lang"]]; ?></div>

            <div class="gallery-image">

                    <a href="https://live.staticflickr.com/477/32142762862_5837007fc8_b.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[1][$_SESSION["lang"]]; ?>">
                        <div class="img-box">
                            <img src="https://live.staticflickr.com/477/32142762862_5837007fc8_b.jpg" alt="" />
                            <div class="transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[1][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>


                    <a href="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Canal_du_midi.jpg/800px-Canal_du_midi.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[2][$_SESSION["lang"]]; ?>">
                        <div class="img-box">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Canal_du_midi.jpg/800px-Canal_du_midi.jpg" alt="" />
                            <div class="transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[2][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="https://upload.wikimedia.org/wikipedia/commons/8/8d/Trebes_Canal_du_Midi.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[3][$_SESSION["lang"]]; ?>">
                        <div class="img-box">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/8/8d/Trebes_Canal_du_Midi.jpg" alt="" />
                            <div class="transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[3][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>


                    <a href="https://live.staticflickr.com/457/32292276345_77b2429241_b.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[4][$_SESSION["lang"]]; ?>">
                        <div class="img-box">
                            <img src="https://live.staticflickr.com/457/32292276345_77b2429241_b.jpg" alt="" />
                            <div class="transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[4][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>


                    <a href="https://live.staticflickr.com/1913/44253266774_972c06249d_b.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[5][$_SESSION["lang"]]; ?>">
                        <div class="img-box">
                            <img src="https://live.staticflickr.com/1913/44253266774_972c06249d_b.jpg" alt="" />
                            <div class="transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[5][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="https://upload.wikimedia.org/wikipedia/commons/3/35/%C3%89cluse%2C_canal_du_midi_%28AGDE%2CFR34%29.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[6][$_SESSION["lang"]]; ?>">
                        <div class="img-box">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/3/35/%C3%89cluse%2C_canal_du_midi_%28AGDE%2CFR34%29.jpg" alt="" />
                            <div class="transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[6][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="https://upload.wikimedia.org/wikipedia/commons/2/25/%C3%89cluse_de_Villedubert_-_Canal_du_Midi_-_04.JPG" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[7][$_SESSION["lang"]]; ?>">
                        <div class="img-box">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/2/25/%C3%89cluse_de_Villedubert_-_Canal_du_Midi_-_04.JPG" alt="" />
                            <div class="transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[7][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="https://upload.wikimedia.org/wikipedia/commons/0/0d/Canal_du_Midi_01.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[8][$_SESSION["lang"]]; ?>">
                        <div class="img-box">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/0/0d/Canal_du_Midi_01.jpg" alt="" />
                            <div class="transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[8][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>

            </div>

            <p><small><i>* <?php echo $txt[9][$_SESSION["lang"]]; ?>.</i></small></p>

 </div>




    <div class="clear"></div>

    <?php include("includes/footer.php"); ?>