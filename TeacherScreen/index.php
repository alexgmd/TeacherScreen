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
            color:black;
          }
          img{
            width: 100px;
    	      height: 100px;
          }
        </style>
      </head>

      <body>

    <div class="demo-layout-transparent mdl-layout mdl-js-layout">
      <header class="mdl-layout__header mdl-layout__header--transparent">
        <div class="mdl-layout__header-row">
          <!-- Title -->
          <!--<span class="mdl-layout-title">TeacherScreen</span>-->
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
          <div class="page-content">
            <br><br><br>
            <div >
              <p id="title">Bienvenue sur TeacherScreen!</p><br/>
              <p id="subtitle">Une Web App qui permet de lier les professeurs et les élèves de l'ESILV</p>
              <script src="js/jquery.min.js"></script>
              <script src="js/bootstrap.min.js"></script>
            </div>
            <br>
            <img src="img/logo.png" alt="logo" />
          </div>
      </main>
    </div>
  </body>
</html>
