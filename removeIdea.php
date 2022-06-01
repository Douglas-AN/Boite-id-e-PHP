<?php
include 'header.php';

if (isset($_GET['id'])) {

    unset($App->TabIdea[$_GET["id"]]);
    $App->TabIdea = array_values($App->TabIdea);
    $App->SaveJson();

    header("Location: home.php");
}

include 'footer.php';
?>