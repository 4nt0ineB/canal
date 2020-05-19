<head>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/galerie-nature.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css">
</head>
<style type="text/css">
	body{background-image: none;background-color: #fff;}
</style>


<?php
session_start();
	include("database.php");

	$nb_photos = $db->query("SELECT * FROM galerie_photos;")->rowCount();

	$random_pic = rand(1,$nb_photos);

	$select_random_pic = $db->query("SELECT * FROM galerie_photos WHERE id=$random_pic;")->fetch();

	$lang = $_SESSION["lang"];

?>

<div class="gallery-image">

                    <a href="<?php echo $select_random_pic["url"]; ?>" data-fancybox data-caption="&lt;b&gt;<?php echo $select_random_pic[$lang]; ?>">
                        <div class="img-box">
                            <img src="<?php echo $select_random_pic["url"]; ?>" alt="" />
                            <div class="transparent-box">
                                <div class="caption">
                                    <p><?php echo $select_random_pic[$lang]; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
 </div>

 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>	