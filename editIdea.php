<?php
include 'header.php';

if (isset($_POST['edit'])) {
    $update = "";
    $row = 1;
    //on stocke en variable le séparateur de csv utilisé
    $separator = ",";

    if (($handle = fopen("idea.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            $row++;
            if ($data[0] == $_GET["id"]) {
                $data[2] = $_POST["titre"];
                $data[3] = $_POST["description"];
                $data[4] = $_POST["image"];
            }
            $update .= implode($separator, $data) . "\r\n";
        }
        fclose($handle);
    }
    //on ouvre le fichier en ecriture et on le met à jour
    $ouvre = fopen("idea.csv", "w+");
    fwrite($ouvre, $update);
    fclose($ouvre);

    header('Location: home.php');
}

?>
<h1>Editer votre idée</h1>
<?php
if (isset($_GET["id"]) && isset($_SESSION['pseudo'])) {
    $row = 1;
    if (($handle = fopen("idea.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            $row++;
            if ($data[0] == $_GET["id"]) {
            ?>
                <form method="post" id="form-edit" class="contain-card">
                    <p><?php echo $_SESSION['pseudo']; ?></p>
                    <div class="form-group">
                        <label>Titre de l'idée</label>
                        <input type="text" name="titre" value="<?php echo $data[2] ?>" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Ajouter une image</label>
                        <img id="img-edit" src="<?php echo $data[4] ?>">
                        <input type="text" name="image" class="form-control" value="<?php echo $data[4] ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" name="description" class="form-control" rows="5" cols="33"><?php echo $data[3] ?></textarea>
                    </div>
                    <div class="form-group" align="center">
                        <input type="submit" name="edit" class="btn btn-info" value="Mettre à jour" />
                    </div>
                </form>
            <?php
            }
        }
        fclose($handle);
    }
    //compare le get avec le resultat de while sur le .csv, recupere la ligne et on continue puis on l'affiche, si on ne trouve pas l'id, faire un retour
} else {
    header("Location: home.php");
}
?>

<?php
include 'footer.php';
?>