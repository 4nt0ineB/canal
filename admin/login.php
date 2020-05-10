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
    // ON RECUP LA TRAD DE LA PAGE
    /*
    $contenuLogin = $db->query("SELECT * FROM p_login");
    $txt = $contenuLogin->fetchAll();*/

    // statistiques
    $query_count = $db->query("SELECT compteur FROM stats WHERE page=\"login_admin\";")->fetch();
    $count = $query_count["compteur"];
    $db->query("UPDATE stats SET compteur=$count+1 WHERE page=\"login_admin\";");
    ?>

    <div class="left">
      <div class="box_left">
        <div class="box_title">Connexion au panel administrateur</div>
  <?php

if(isset($_SESSION["admin"])) // si une session est déjà lancée
{
 header("location: index.php"); // redirection vers l'index
}

  if(isset($_REQUEST['send'])) //si le formulaire est envoyé avec un clic bouton -> "submitBtnLogin"
  {
   $login = strip_tags($_REQUEST["login"]);
   $password  = strip_tags($_REQUEST["pass"]);

   if(empty($login)){ // si le nom est vide
    $errorMsg[]="Veuillez saisir le login administrateur"; // on inscrit un message d'erreur dans un tableau (si il y en a plusieurs)
   }

   else if(empty($password)){ // si le mdp est vide
    $errorMsg[]="Veuillez saisir le mot de passe administrateur"; // on inscrit un message d'erreur dans un tableau (si il y en a plusieurs)
   }
   else
   {
    try
    {
     $select_registered_users=$db->prepare("SELECT * FROM admins WHERE login=:login"); // on selectionne les utilisateurs avec ce pseudo ou cet email
     $select_registered_users->execute(array(':login'=>$login)); // et on execute la requete avec les champs rentrés par l'utilisateur
     $row=$select_registered_users->fetch(PDO::FETCH_ASSOC); // avec la methode de recherche

     if($select_registered_users->rowCount() > 0) // si la requête compte plus de zéro lignes alors
     {
      if($login==$row["login"]) // on vérifie si la ligne est bien égale avec le pseudo et l'email rentré par l'utilisateur
      {
       if(password_verify($password, $row["password"])) // on compare le mdp encrypté stocké en base de donné et le mdp rentré par l'utilisateur
       {
        $_SESSION["admin"] = $row["id"]; // on démarre une session avec l'id user_login qui correspondra a l'id de l'adherent
        $loginMsg = "Connecté avec succès ! Redirection...";  // on initialise un message de succès
        header("refresh:2; index.php");   // après 2 secondes on redirige l'utilisateur sur la page d'index
       }
       else // si la vérification du mot de passe échoue
       {
        $errorMsg[]="Mauvais mot de passe"; // on inscrit un msg d'erreur
       }
      }
      else // si la comparaison avec l'entrée de l'utilisateur et la db echoue
      {
       $errorMsg[]="Mauvais login"; // on inscrit un msg d'erreur
      }
     }
     else // si la comparaison avec l'entrée de l'utilisateur et la db echoue
     {
      $errorMsg[]="Mauvais login";// on inscrit un msg d'erreur
     }
    }
    catch(PDOException $e)
    {
     $e->getMessage();
    }
   }
  }
?>


        <center>
          <br>


          <?php
            if(isset($errorMsg)) // si le tableau errorMsg est initialisé
            {
             foreach($errorMsg as $error) // pour chaque ligne du tableau on initalise une variable
             {
             ?>
              <div class="error">
               <?php echo $error // on affiche la variable ; ?>
              </div>
                <?php
             }
            }
            if(isset($loginMsg)) // si un message de succès est initialisé
            {
            ?>
             <div class="success">
              <?php echo $loginMsg; // on affiche ce message ?>
             </div>
            <?php
            }
            ?>

          <span>Pour accéder à cette zone restreinte, vous devez vous connecter</span>
          <hr>
          <form method="post">
            <input type="text" name="login" placeholder="Login" readonly="readonly">
            <br>
            <input type="password" name="pass" placeholder="Mot de passe">
            <br>
            <input class="bouton green" type="submit" name="send" value="Connexion">
          </form>
        </center>

      </div>
    </div>
    <div class="right">
      <div class="box_right">
        <div class="box_title black">Une création</div>
        <center>
          <a href="https://www.univ-gustave-eiffel.fr/" target="_blank"><img src="../img/logo_univ_gustave_eiffel_bleu.png" style="margin:5px;width:250px;" alt=""></a>
          <br>
          <i>Université Gustave Eiffel</i><br>
          <b>DUT Informatique 1ère année</b>
        </center>
      </div>
    </div>


    <div class="clear"></div>

    <?php include("includes/footer.php"); ?>
    <script>
        $(function() { // disable autocomplete
                setTimeout(function() {
                    $('input[name="login"]').prop('readonly', false);
                }, 50);
            });
    </script>