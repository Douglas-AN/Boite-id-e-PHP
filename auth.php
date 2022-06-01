<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form authentification</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<?php
session_start();
?>

<body>
    <h1 align="center">Dashboard</h1>
    <div class="form-group" align="center">
        <?php
        if (isset($_SESSION["prenom"]) || isset($_SESSION["nom"])) {
        ?>
            <a id="logout" class="btn btn-info" href="logout.php">Logout</a>
        <?php
        } else {
        ?>
            <a id="signup" class="btn btn-info" href="signup.php">Signup</a>
            <a id="login" class="btn btn-info" href="login.php">Login</a>
        <?php
        }
        ?>
    </div>

    <?php

    if (!isset($_SESSION["prenom"]) || !isset($_SESSION["nom"])) {
        //header("Location: login.php");
        exit();
    }
    echo '<br><br>';
    if (isset($_SESSION["prenom"])) {
        echo 'ID de session (récupéré via $_COOKIE) : '
            . $_COOKIE['PHPSESSID'] . '<br>';
        echo 'Bonjour ' . $_SESSION['nom'] . ' ' . $_SESSION['prenom'] . '';
    } else {
        echo 'Vous êtes déconecté !';
    }

    ?>
</body>

</html>