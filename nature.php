<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="Uutf-8">
    <title>Site web - Canal du Midi</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/language.css">
    <link rel="stylesheet" href="css/slideshow.css">
    <link rel="stylesheet" href="css/galerie-nature.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css">
</head>

<body>
    <div id="container">
        <?php include('includes/header.php'); ?>
        <?php include('includes/menu.php'); ?>

        <?php // ON RECUP TOUT LE CONTENU TEXTUEL 
        $contenu = $db->query("SELECT * FROM p_nature");
        $txt = $contenu->fetchAll();

        // statistiques
        $query_count = $db->query("SELECT compteur FROM stats WHERE page=\"nature\";")->fetch();
        $count = $query_count["compteur"];
        $db->query("UPDATE stats SET compteur=$count+1 WHERE page=\"nature\";");
        ?>

        <div class="left">
            <div class="box_left">
                <div class="box_title"> <?php echo $txt[3][$_SESSION["lang"]]; ?> </div>
                <h2><?php echo $txt[0][$_SESSION["lang"]]; ?></h2>
                <p><?php echo $txt[2][$_SESSION["lang"]]; ?></p>
                <p><?php echo $txt[4][$_SESSION["lang"]]; ?></p>
                <div class="gallery-image">
                    <a href="https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/P1280621_Paris_V_Jardin_des_Plantes_Micocoulier_rwk.jpg/450px-P1280621_Paris_V_Jardin_des_Plantes_Micocoulier_rwk.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[7][$_SESSION["lang"]]; ?>">
                        <div class="img-box">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/P1280621_Paris_V_Jardin_des_Plantes_Micocoulier_rwk.jpg/450px-P1280621_Paris_V_Jardin_des_Plantes_Micocoulier_rwk.jpg" alt="" />
                            <div class="transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[7][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>


                    <a href="https://zupimages.net/up/20/19/253n.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[8][$_SESSION["lang"]]; ?>">
                        <div class="img-box">
                            <img src="https://zupimages.net/up/20/19/253n.jpg" alt="" />
                            <div class="transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[8][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>


                    <a href="https://zupimages.net/up/20/19/re9i.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[9][$_SESSION["lang"]]; ?>">
                        <div class="img-box">
                            <img src="https://zupimages.net/up/20/19/re9i.jpg" alt="" />
                            <div class="transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[9][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://cdn.pixabay.com/photo/2019/04/10/20/51/poplars-4118191_960_720.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[10][$_SESSION["lang"]]; ?>">
                        <div class="img-box">
                            <img src="https://cdn.pixabay.com/photo/2019/04/10/20/51/poplars-4118191_960_720.jpg" alt="" />
                            <div class="transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[10][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://zupimages.net/up/20/19/a981.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[11][$_SESSION["lang"]]; ?>">
                        <div class="img-box">
                            <img src="https://zupimages.net/up/20/19/a981.jpg" alt="" />
                            <div class="transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[11][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://zupimages.net/up/20/19/27ao.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[12][$_SESSION["lang"]]; ?>">
                        <div class="img-box">
                            <img src="https://zupimages.net/up/20/19/27ao.jpg" alt="" />
                            <div class="transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[12][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


                <h2><?php echo $txt[1][$_SESSION["lang"]]; ?></h2>
                <p><?php echo $txt[5][$_SESSION["lang"]]; ?></p>
                <p><?php echo $txt[6][$_SESSION["lang"]]; ?></p>
                <div class="gallery-image">
                    <a href="https://cdn.pixabay.com/photo/2019/02/12/23/27/fish-3993416_960_720.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[13][$_SESSION["lang"]]; ?>">
                        <div class="img-box">

                            <img src="https://cdn.pixabay.com/photo/2019/02/12/23/27/fish-3993416_960_720.jpg">

                            <div class="transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[13][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://cdn.pixabay.com/photo/2017/06/30/03/24/carp-2457084_960_720.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[14][$_SESSION["lang"]]; ?>">
                        <div class="img-box">

                            <img src="https://cdn.pixabay.com/photo/2017/06/30/03/24/carp-2457084_960_720.jpg" alt="" />
                            <div class="transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[14][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>

                        </div>
                    </a>
                    <a href="https://upload.wikimedia.org/wikipedia/commons/thumb/0/00/Brochet.jpg/800px-Brochet.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[15][$_SESSION["lang"]]; ?>">
                        <div class="img-box">

                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/00/Brochet.jpg/800px-Brochet.jpg" alt="" />
                            <div class="transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[15][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>

                        </div>
                    </a>
                    <a href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Sandre_%28Sander_lucioperca%29.jpg/800px-Sandre_%28Sander_lucioperca%29.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[16][$_SESSION["lang"]]; ?>">
                        <div class="img-box">

                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Sandre_%28Sander_lucioperca%29.jpg/800px-Sandre_%28Sander_lucioperca%29.jpg" alt="" />
                            <div class="transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[16][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>

                        </div>
                    </a>
                    <a href="https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Egli_%28Perca_fluviatilis%29.jpg/800px-Egli_%28Perca_fluviatilis%29.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[17][$_SESSION["lang"]]; ?>">
                        <div class="img-box">

                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Egli_%28Perca_fluviatilis%29.jpg/800px-Egli_%28Perca_fluviatilis%29.jpg" alt="" />
                            <div class=" transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[17][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>

                        </div>
                    </a>
                    <a href="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Silurus_glanis_02.jpg/800px-Silurus_glanis_02.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[18][$_SESSION["lang"]]; ?>">
                        <div class="img-box">

                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Silurus_glanis_02.jpg/800px-Silurus_glanis_02.jpg" alt="" />
                            <div class=" transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[18][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>

                        </div>
                    </a>
                    <a href="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/Ichthyologie%3B_ou%2C_Histoire_naturelle_des_poissons_%28Plate_88%29_%287064440191%29.jpg/800px-Ichthyologie%3B_ou%2C_Histoire_naturelle_des_poissons_%28Plate_88%29_%287064440191%29.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[19][$_SESSION["lang"]]; ?>">
                        <div class="img-box">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/Ichthyologie%3B_ou%2C_Histoire_naturelle_des_poissons_%28Plate_88%29_%287064440191%29.jpg/800px-Ichthyologie%3B_ou%2C_Histoire_naturelle_des_poissons_%28Plate_88%29_%287064440191%29.jpg" alt="" />
                            <div class=" transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[19][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://cdn.pixabay.com/photo/2014/12/11/07/49/eel-563941_960_720.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[20][$_SESSION["lang"]]; ?>">
                        <div class="img-box">
                            <img src="https://cdn.pixabay.com/photo/2014/12/11/07/49/eel-563941_960_720.jpg" />
                            <div class=" transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[20][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/Lamproie_Planer57.jpg/1200px-Lamproie_Planer57.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[21][$_SESSION["lang"]]; ?>">
                        <div class="img-box">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/Lamproie_Planer57.jpg/1200px-Lamproie_Planer57.jpg" alt="" />
                            <div class=" transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[21][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://upload.wikimedia.org/wikipedia/commons/thumb/a/af/Alosa_alosa.jpg/800px-Alosa_alosa.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[22][$_SESSION["lang"]]; ?>">
                        <div class="img-box">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/af/Alosa_alosa.jpg/800px-Alosa_alosa.jpg" alt="" />
                            <div class=" transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[22][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Ragondin_%28Myocastor_coypus%29_%2839%29.jpg/800px-Ragondin_%28Myocastor_coypus%29_%2839%29.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[23][$_SESSION["lang"]]; ?>">
                        <div class="img-box">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Ragondin_%28Myocastor_coypus%29_%2839%29.jpg/800px-Ragondin_%28Myocastor_coypus%29_%2839%29.jpg" alt="" />
                            <div class=" transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[23][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://live.staticflickr.com/3104/3207317876_7032776277_b.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[24][$_SESSION["lang"]]; ?>">
                        <div class="img-box">
                            <img src="https://live.staticflickr.com/3104/3207317876_7032776277_b.jpg" alt="" />
                            <div class=" transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[24][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://live.staticflickr.com/5511/10577707366_496f4bde76_b.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[25][$_SESSION["lang"]]; ?>">
                        <div class="img-box">
                            <img src="https://live.staticflickr.com/5511/10577707366_496f4bde76_b.jpg" alt="" />
                            <div class=" transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[25][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="https://p0.piqsels.com/preview/799/191/811/common-moorhen-grunfu%C3%9Figes-pond-chicken-moorhen-chicken.jpg" data-fancybox data-caption="&lt;b&gt;<?php echo $txt[26][$_SESSION["lang"]]; ?>">
                        <div class="img-box">
                            <img src="https://p0.piqsels.com/preview/799/191/811/common-moorhen-grunfu%C3%9Figes-pond-chicken-moorhen-chicken.jpg" alt="" />
                            <div class=" transparent-box">
                                <div class="caption">
                                    <p><?php echo $txt[26][$_SESSION["lang"]]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


            </div>
        </div>


        <div class="clear"></div>


        <?php include("includes/footer.php"); ?>