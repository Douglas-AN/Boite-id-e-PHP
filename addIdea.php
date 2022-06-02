<?php
include 'header.php';

$error = '';
$titre = '';
$description = '';
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

    // check file input
    $uploadDirectory = "uploads/";

    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['jpeg', 'jpg', 'png']; // These will be the only file extensions allowed 

    $fileName = $_FILES['fileToUpload']['name'];
    $fileSize = $_FILES['fileToUpload']['size'];
    $fileTmpName  = $_FILES['fileToUpload']['tmp_name'];
    $fileType = $_FILES['fileToUpload']['type'];
    $tmp = explode('.', $fileName);
    $fileExtension = end($tmp);

    $uploadPath = $uploadDirectory . basename($fileName);

    if (!in_array($fileExtension, $fileExtensionsAllowed)) {
        $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
    }

    if ($fileSize > 4000000) {
        $errors[] = "File exceeds maximum size (4MB)";
    }

    if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
            echo "Le fichier " . basename($fileName) . " à bien été enregistré";
        } else {
            echo "An error occurred. Please contact the administrator.";
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "These are the errors" . "\n";
        }
    }
    // end check file input

    // Add data into $App->TabIdea
    $objIdea = new Idea();
    $objIdea->Title = $titre;
    $objIdea->Text = $description;
    $objIdea->Image = $uploadPath;
    $objIdea->Date = $date;
    $objIdea->User = $_SESSION['id'];

    $App->addIdea($objIdea);
    $App->SaveJson();

    header('Location: home.php');
}
?>

<h1>Ajouter une idée</h1>
<div class="container">
    <form method="post" id="form-signup" class="contain-card" enctype="multipart/form-data">
        <?php echo $error; ?>
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
            <input type="file" name="fileToUpload" class="form-control" placeholder="Url de l'image" />
        </div>
        <div class="form-group" align="center">
            <input type="submit" name="submit" class="btn btn-info" value="Poster" />
        </div>
    </form>
</div>


<?php
include 'footer.php';
?>