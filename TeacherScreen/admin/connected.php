<?php
    session_start();
    include('../fonctions.inc.php');

      $email = $_POST['email'];
      $_SESSION['email'] = $_POST['email'];
      $mdp = $_POST['mdp'];
      $access = connexion($email, $mdp);
      if($access == false){
        header('Location: connexion.php');
      } else {

      $_SESSION['email'] = $email;
      if(isset($_POST['remove'])){
        remove_msg($_SESSION['email']);
      }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
  <button style="float:right; margin:1% 2%;" class="btn btn-default">
    <a href="./connected.php?LOGOUT" style="text-decoration:none;">Deconnexion</a>
  </button>

  <div class="col-lg-4 col-lg-offset-4">
    <form class="" action="msg.php" method="post">
      <div class="input-group" style="margin-top:250px;">
        <input type="text" class="form-control" placeholder="Message" name="message">
        <span class="input-group-btn">
          <input class="btn btn-default" type="submit"/>
        </span>
      </div> <br>

      <span class= "col-lg-12 col-lg-offset-3 " >
        <?php echo "Message : "; display_msg($email);  } ?>

        <br><br>
      </span>
        <input type="submit" class="btn btn-default col-lg-offset-4" value="Remove" name="remove" >
    </form>
  </div>


  </body>
</html>
