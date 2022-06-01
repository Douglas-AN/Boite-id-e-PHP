<?php
include 'header.php';

if (isset($_GET['id'])) {
    $handle = fopen('idea.csv', 'r');
    while (!feof($handle)) {
        $line = fgets($handle);
        if ($line[0] != $_GET["id"])
            file_put_contents('fichier_final.csv', $line, FILE_APPEND);
    }
    fclose($handle);
    rename('fichier_final.csv', 'idea.csv');
    header('Location: home.php');
}

include 'footer.php';
?>