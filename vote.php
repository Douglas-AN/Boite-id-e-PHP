<?php
include 'header.php';

if (isset($_GET['id']) && isset($_SESSION['id'])) {
    
    if ($App->TabIdea[$_GET["id"]]->UserVote == NULL) {
        header('Location: home.php');
    } else 
    if (in_array($_SESSION["id"], $App->TabIdea[$_GET["id"]]->UserVote[0])) {
        foreach ($App->TabIdea[$_GET["id"]]->UserVote as $key => $value) {
            if ($value[0] == $_SESSION["id"] && $value[1] != $_GET["like"]) {
                $App->TabIdea[$_GET["id"]]->UserVote[$key][1] = $_GET["like"];
            }
        }
    } else {
        $tabVote = array($_SESSION["id"], $_GET["like"]);
        array_push($App->TabIdea[$_GET["id"]]->UserVote, $tabVote);
    }
    $App->SaveJson();
    header('Location: home.php');
}

include 'footer.php';
