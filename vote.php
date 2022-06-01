<?php
include 'header.php';

if (isset($_GET['id']) && isset($_SESSION['pseudo'])) {
    $update = "";
    $row = 1;
    //on stocke en variable le séparateur de csv utilisé
    $separator = ",";

    if (($handle = fopen("idea.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            $row++;
            if ($data[0] == $_GET["id"]) {
                array_push($data[5], $_SESSION["pseudo"]);
                echo $data[5];
            }
            $update .= implode($separator, $data) . "\r\n";
        }
        fclose($handle);
    }
    //on ouvre le fichier en ecriture et on le met à jour
    $ouvre = fopen("idea.csv", "w+");
    fwrite($ouvre, $update);
    fclose($ouvre);

    //header('Location: home.php');
}

include 'footer.php';
?>