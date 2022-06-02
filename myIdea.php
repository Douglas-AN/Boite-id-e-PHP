<?php
include 'header.php';
?>
<h1>Mes Idées</h1>

<div class="row row-cols-1 row-cols-md-3 contain-card">
    <?php
    foreach ($App->TabIdea as $index => $objIdea) {
        if (isset($_SESSION['id'])) {
        ?>
            <div id="idea<?php echo $index ?>" class="card mb-3">
                <img src="<?php echo $objIdea->Image ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $objIdea->Title ?></h5>
                    <p class="card-text"><?php echo $objIdea->Text ?></p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Vote</li>
                    </ul>
                    <!-- <p class="card-text"><small class="text-muted">Créé le <?php //echo $objIdea->Date->date ?></small></p>
                    <p class="card-text"><small class="text-muted"></small></p> -->
                </div>
                <?php
                if (isset($_SESSION['id'])) {
                ?>
                    <a href="editIdea.php?id=<?php echo $index ?>" class="editIdea card-link">Editer</a>
                    <a href="removeIdea.php?id=<?php echo $index ?>" class="removeIdea card-link">Retirer</a>
                <?php
                }
                ?>
            </div>
        <?php
        }
    }
    ?>
</div>

<?php
include 'footer.php';
?>