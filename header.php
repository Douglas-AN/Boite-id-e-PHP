<?php
// include 'login.php';
include 'class.php';

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Boite à idée</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link href="./styles/style.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="home.php">Home</a>
    </div>
  </nav>
  <div class="container-xl">
    <div class="button-container">
      <?php
      if (isset($_SESSION["id"])) {
      ?>
        <button id="addIdea" type="button" class="btn btn-outline-primary">Ajouter une idée</button>
        <button id="myIdea" type="button" class="btn btn-outline-primary">Mes idées</button>
        <button id="logout" type="button" class="btn btn-outline-primary">Se déconnecter</button>
      <?php
      } else {
      ?>
        <button id="login" type="button" class="btn btn-outline-primary">Se connecter</button>
        <button id="signup" type="button" class="btn btn-outline-primary">Créer un compte</button>
      <?php

      }
      ?>
    </div>