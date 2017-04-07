<?php
	$prof = $_GET['prof'];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
    <div class="col-lg-4 col-lg-offset-4 form">
        <h1>Demande de rdv</h1>
        <form class="" action="confirm.php?prof=<?=$prof?>" method="post">
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group">
                        <input type="text" class="form-control" aria-describedby="basic-addon1" placeholder="Prenom" name="prenom">
                    </div>
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="input-group">
                        <input type="text" class="form-control" aria-describedby="basic-addon1" placeholder="Nom" name="nom">
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <br>
            <input type="text" class="form-control" name ="email" placeholder="Email" aria-describedby="basic-addon1"><br>
            <textarea placeholder="Objet" aria-describedby="basic-addon1" class="form-control" rows="4" name="objet"></textarea><br>
            <a href="./confirm.php">
                <input type="submit" class="btn btn-primary" value="Submit">
            </a>
      </form>
    </div>

  </body>
</html>
