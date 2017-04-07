<?php include("fonctions.inc.php"); ?>

<!DOCTYPE html>
<html>

  <head>
    <title>TeacherScreen</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
      <div style="padding:5px; width:800px; margin:auto; border:5px solid #C6C7C7; background-color:white; -moz-border-radius:20px; -khtml-border-radius:20px; -webkit-border-radius:20px; border-radius:20px;">
      <div class="page-content">
        <ul class="demo-list-icon mdl-list">
          <li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
              <i class="material-icons mdl-list__item-icon">person</i>
              <h4>Alexia GUILLERMOND</h4>
            </span>
          </li>
          <li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
              <i class="material-icons mdl-list__item-icon">person</i>
              <h4>Marc HABIB</h4>
            </span>
          </li>
          <li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
              <i class="material-icons mdl-list__item-icon">person</i>
              <h4>Rémi JOUGLET</h4>
            </span>
          </li>
          <li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
              <i class="material-icons mdl-list__item-icon">person</i>
              <h4>Carine LEMAIRE</h4>
            </span>
          </li>
          <li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
              <i class="material-icons mdl-list__item-icon">person</i>
              <h4>Corentin SIMON</h4>
            </span>
          </li>
        </ul>
      </div>
    </div>

























  </main>
</div>
</body>
</html>
