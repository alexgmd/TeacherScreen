<?php include("fonctions.inc.php"); ?>

<!DOCTYPE html>
<html>

  <head>
    <title>TeacherScreen</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Lato:300i,400" rel="stylesheet">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
      .demo-layout-transparent {
        background: url('img/pulv2.jpg') center / cover;
      }
      .demo-layout-transparent .mdl-layout__header,
      .demo-layout-transparent .mdl-layout__drawer-button {
        color: white;
      }
      body{
        color:white;
      }
      img{
        width: 100px;
        height: 100px;
      }

      .edt a:link{
        text-decoration:none;
      }
      .roundedImage{
        overflow:hidden;
        -webkit-border-radius:50px;
        -moz-border-radius:50px;
        border-radius:50px;
        width:90px;
        height:90px;
        text-align: center;
      }
    </style>
  </head>

  <body>

<div class="demo-layout-transparent mdl-layout mdl-js-layout">
  <header class="mdl-layout__header mdl-layout__header--transparent">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">TeacherScreen</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation -->
      <nav class="mdl-navigation">
        <a href="index.php" class="mdl-navigation__link">Accueil</a>
        <a href="salle.php" class="mdl-navigation__link">L405</a>
        <a href="about.php" class="mdl-navigation__link">About</a>
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">TeacherScreen</span>
    <nav class="mdl-navigation">
      <a href="index.php" class="mdl-navigation__link">Accueil</a>
      <a href="salle.php" class="mdl-navigation__link">L405</a>
      <a href="about.php" class="mdl-navigation__link">About</a>
    </nav>
  </div>
  <main class="mdl-layout__content">


  <!-- VIGNETTES -->

      <div class="page-content">
        <br/><br/><br/><br/>
        <div class="container-fluid">
          <div class="row">
          <?php foreach($liste_intervenants as $int => $inter) {
            if (isset($inter['ical_key'])) { ?>
              <a href="./agenda.php?prof=<?=$int?>" style="color: white; text-decoration: none;">
             <?php  } ?>
            <div class="col-sm-4 col-lg-4 col-md-4">
              <center>
              <div class="card" style="background-color: rgba(130,130,130,0.8); width:70%; margin-top:5vh; padding-bottom:1px;">
                <div class="card-block">
                  <h3 class="card-title"><?php echo $inter['nom']; ?></h3>
                  <center>
                    <div class="roundedImage">
                      <img src=<?php echo $inter['img']; ?> alt="photo"/>
                    </div>
                  </center>
                  <h5 class="card-text"><?php display_msg($inter['email']) ?></h5>
                  <h5 class="card-text">
                    <?php
                    if (!isset($inter['ical_key'])) { ?>
                   <font color='green'><b>Disponible</b></font>
                     <?php
                       } else {
                          $occupe = etat_occupation_intervenant($inter);
                         if($occupe == 'Disponible') { ?>
                       <font color=green><b><?php echo $occupe ?></b></font>
                     <?php } else { ?>
                       <font color="#FF2B2B"><b><?php echo $occupe ?></b></font>
                     <?php } } ?>
                  </h5>
                </div>
              </div>
            </center>
            </div>
  <?php } ?>
</div>
</div>

  </main>
</div>
</body>
</html>
