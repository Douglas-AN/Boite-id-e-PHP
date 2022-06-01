<?php
include 'header.php';

//session_start();

$error = '';
$titre = '';
$description = '';
// $pseudo = '';
$image = '';
$date = new DateTime();

function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

if (isset($_POST["submit"])) {
    if (empty($_POST["titre"])) {
        $error .= '<p><label class="text-danger">Le titre est obligatoire</label></p>';
    } else {
        $titre = clean_text($_POST["titre"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $titre)) {
            $error .= '<p><label class="text-danger">Seulement les lettres et espaces sont acceptés</label></p>';
        }
    }

    if (empty($_POST["description"])) {
        $error .= '<p><label class="text-danger">Il manque la description</label></p>';
    } else {
        $description = clean_text($_POST["description"]);
    }
    if (empty($_POST["image"])) {
        $error .= '<p><label class="text-danger">Il manque l\'url de l\'image</label></p>';
    } else {
        $image = clean_text($_POST["image"]);
    }
    // if (empty($_POST["pseudo"])) {
    //     $error .= '<p><label class="text-danger">Vous n\'êtes pas connecté</label></p>';
    // } else {
    //     $pseudo = clean_text($_POST["pseudo"]);
    // }

    $objIdea = new Idea();
    $objIdea->Title = $titre;
    $objIdea->Text = $description;
    $objIdea->Image = $image;
    $objIdea->Date = $date;

    $App->addIdea($objIdea);
    $App->SaveJson();

    if ($error == '' || isset($pseudo)) {
        //$id_session = session_id();
    }
    header('Location: home.php');
}
?>

<h1>Ajouter une idée</h1>
<div class="container">
    <form method="post" id="form-signup" class="contain-card">
        <?php echo $error; ?>
        <!-- <input type="hidden" name="pseudo" value=""> -->
        <div class="form-group">
            <label>Titre de l'idée</label>
            <input type="text" name="titre" placeholder="Titre" class="form-control" value="<?php echo (isset($_POST['submit'])) ? $titre : ''; ?>" />
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea type="text" name="description" class="form-control" placeholder="Entrer le descriptif de votre idée" rows="5" cols="33"><?php echo (isset($_POST['submit'])) ? $description : ''; ?></textarea>
        </div>
        <div class="form-group">
            <label>Ajouter une image</label>
            <input type="text" name="image" class="form-control" placeholder="Url de l'image" value="<?php echo (isset($_POST['submit'])) ? $image : ''; ?>" />
        </div>
        <div class="form-group" align="center">
            <input type="submit" name="submit" class="btn btn-info" value="Poster" />
        </div>
    </form>
</div>


<?php
include 'footer.php';
?>