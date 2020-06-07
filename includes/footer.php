<footer>
<a href="https://www.univ-gustave-eiffel.fr/" target="_blank"><img src="img/logo_univ_gustave_eiffel_blanc_rvb.png" alt="Logo Université Gustave Eiffel"></a>
<img src="img/mcn.png" alt="Logo MCN">
<a href="https://whc.unesco.org/fr/list/" target="_blank"><img src="img/unesco.png" alt="Logo UNESCO"></a>
<?php
         if ($_SESSION["lang"] == "en") {
            echo "<a href=\"./files/Presentation__Forum_UNESCO__anglais.pdf\" target=\"_blank\"><img src=\"img/forumunesco.png\" alt=\"Logo FORUM UNESCO\"></a>";
        } elseif ($_SESSION["lang"] == "fr") {
            echo "<a href=\"./files/Presentation_Forum_UNESCO___francais.pdf\" target=\"_blank\"><img src=\"img/forumunesco.png\" alt=\"Logo FORUM UNESCO\"></a>";
        } elseif ($_SESSION["lang"] == "es") {
            echo "<a href=\"./files/Presentation__Forum_UNESCO__anglais.pdf\" target=\"_blank\"><img src=\"img/forumunesco.png\" alt=\"Logo FORUM UNESCO\"></a>";
        }
  ?>
<a href="https://anr.fr/" target="_blank"><img src="img/anr.png"></a>
<a href="https://www.icomos.org/" target="_blank"><img src="img/icomos.png"></a>
<div class="legals">
	<?php
         if ($_SESSION["lang"] == "en") {
            echo "<a href=\"mentionslegales.php\">Legal notices</a>";
        } elseif ($_SESSION["lang"] == "fr") {
            echo "<a href=\"mentionslegales.php\">Mentions légales</a>";
        } elseif ($_SESSION["lang"] == "es") {
            echo "<a href=\"mentionslegales.php\">Aviso legal</a>";
        }
  ?>
<br>
  <?php
           if ($_SESSION["lang"] == "en") {
              echo "<a href=\"./admin\">Admin panel</a>";
          } elseif ($_SESSION["lang"] == "fr") {
              echo "<a href=\"./admin\">Panel administrateur</a>";
          } elseif ($_SESSION["lang"] == "es") {
              echo "<a href=\"./admin\">Panel de administración</a>";
          }
    ?>
	
</div>


</footer>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/language.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>	
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-167803260-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-167803260-1');
	</script>


  </body>
</html>
