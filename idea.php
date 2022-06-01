<?php
include 'header.php';

if (isset($_GET["id"])) {
    $row = 1;
    $result = false;
    if (($handle = fopen("idea.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            $row++;
            if ($data[0] == $_GET["id"]) {
?>
                <h1><?php echo $data[2] ?></h1>
                <div id="idea<?php echo $data[0] ?>" class="card mb-3">
                    <img src="<?php echo $data[4] ?>" class="card-img-top">
                    <div class="card-body">
                        <!-- <h5 class="card-title">Card title</h5> -->
                        <p class="card-text"><?php echo $data[3] ?></p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Vote</li>
                        </ul>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                    <?php
                    if (isset($_SESSION['pseudo']) && $data[1] == $_SESSION['pseudo']) {
                    ?>
                        <a href="editIdea.php" class="editIdea card-link">Editer</a>
                        <a href="#" class="removeIdea card-link">Retirer</a>
                    <?php
                    }
                    ?>
                </div>
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