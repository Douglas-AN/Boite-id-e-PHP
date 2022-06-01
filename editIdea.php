<?php
include 'header.php';

if (isset($_POST['edit']) && !empty($_POST)) {

    $App->TabIdea[$_GET["id"]]->Title=$_POST["titre"];
    $App->TabIdea[$_GET["id"]]->Text=$_POST["description"];
    $App->TabIdea[$_GET["id"]]->Image=$_POST["image"];
    $App->SaveJson();

    header("Location: home.php");
}

?>
<h1>Editer votre idée</h1>
<?php
if (isset($_GET["id"]) && isset($_SESSION['pseudo'])) {
    foreach ($App->TabIdea as $index => $objIdea) {
        if ($index == $_GET["id"]) {
?>
            <form method="post" id="form-edit" class="contain-card">
                <p><?php echo $_SESSION['pseudo']; ?></p>
                <p><?php echo $objIdea->Date ?></p>
                <div class="form-group">
                    <label>Titre de l'idée</label>
                    <input type="text" name="titre" value="<?php echo $objIdea->Title ?>" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Ajouter une image</label>
                    <img id="img-edit" src="<?php echo $objIdea->Image ?>">
                    <input type="text" name="image" class="form-control" value="<?php echo $objIdea->Image ?>" />
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" name="description" class="form-control" rows="5" cols="33"><?php echo $objIdea->Text ?></textarea>
                </div>
                <div class="form-group" align="center">
                    <input type="submit" name="edit" class="btn btn-info" value="Mettre à jour" />
                </div>
            </form>
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