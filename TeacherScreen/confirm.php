<?php
$prof = $_GET['prof'];
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$obj = $_POST['objet'];
 include("fonctions.inc.php");

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/form.css">

    <title></title>
  </head>
  <body>
    <div class="col-lg-4 col-lg-offset-4 form">

      <?php echo $prenom?>, votre message à bien été envoyé <br><br>
      <a href="./salle.php">
        <button type="button" name="button" class="btn btn-primary">Retour au menu</button>
      </a>
    </div>

    <?php /*$email = $liste_intervenants[$prof]['email'];
          sendmail($email, $obj, $nom, $prenom);*/
    ?>
  </body>
</html>
