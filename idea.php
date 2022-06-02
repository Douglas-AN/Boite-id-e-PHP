<?php
include 'header.php';

if (isset($_GET["id"])) {
    foreach ($App->TabIdea as $index => $objIdea) {
        if ($index == $_GET["id"]) {
        ?>
            <h1><?php echo $objIdea->Title ?></h1>
            <div id="idea<?php echo $index ?>" class="card mb-3">
                <img src="<?php echo $objIdea->Image ?>" class="card-img-top">
                <div class="card-padding">
                    <!-- <h5 class="card-title">Card title</h5> -->
                    <p class="card-text"><?php echo $objIdea->Text ?></p>
                    <ul class="">
                        <li>Vote</li>
                    </ul>
                    <p><small class="text-muted">Créé le <?php echo $objIdea->Date->date ?></small></p>
                    <p><small class="text-muted"></small>Ajouté par <?php echo $_SESSION['prenom'];?>&nbsp;<?php echo $_SESSION['nom']; ?></p>
                </div>
                <?php
                if (isset($_SESSION['id'])) {
                ?>
                    <a href="editIdea.php?idea=<?php echo $index ?>" class="editIdea card-link">Editer</a>
                    <a href="removeIdea.php?idea=<?php echo $index ?>" class="removeIdea card-link">Retirer</a>
                <?php
                }
                ?>
            </div>
        <?php
        }
    }
} else {
    header("Location: home.php");
}
?>

<?php
include 'footer.php';
?>