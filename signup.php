<?php
include 'header.php';

//session_start();
function uniqidReal($lenght = 13) {
    // uniqid gives 13 chars, but you could adjust it to your needs.
    if (function_exists("random_bytes")) {
        $bytes = random_bytes(ceil($lenght / 2));
    } elseif (function_exists("openssl_random_pseudo_bytes")) {
        $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
    } else {
        throw new Exception("no cryptographically secure random function available");
    }
    return substr(bin2hex($bytes), 0, $lenght);
}


$error = '';
$nom = '';
$prenom = '';
$pseudo = '';
$mdp = '';
$mdp_confirm = '';
$id = uniqidReal();

function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

if (isset($_POST["submit"])) {
    if (empty($_POST["nom"])) {
        $error .= '<p><label class="text-danger">Le nom est obligatoire</label></p>';
    } else {
        $nom = clean_text($_POST["nom"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $nom)) {
            $error .= '<p><label class="text-danger">Seulement les lettres et espaces sont acceptés</label></p>';
        }
    }
    if (empty($_POST["prenom"])) {
        $error .= '<p><label class="text-danger">Les prénom est obligatoire</label></p>';
    } else {
        $prenom = clean_text($_POST["prenom"]);
    }
    if (empty($_POST["pseudo"])) {
        $error .= '<p><label class="text-danger">Le pseudo est obligatoire</label></p>';
    } else {
        $pseudo = clean_text($_POST["pseudo"]);
    }
    if (empty($_POST["mdp"])) {
        $error .= '<p><label class="text-danger">Le mot de passe est obligatoire</label></p>';
    } else {
        $mdp = clean_text($_POST["mdp"]);
        // if (!preg_match("", $mdp)) {
        //     $error .= '<p><label class="text-danger">Mot de passe non conforme</label></p>';
        // }
    }
    if (empty($_POST["mdp_confirm"]))
    {
        $error .= '<p><label class="text-danger">La confirmation de mot de passe est obligatoire</label></p>';
    } else {
        $mdp_confirm = clean_text($_POST["mdp_confirm"]);
    }
    if ($mdp !== $mdp_confirm)
    {
        $error .= '<p><label class="text-danger">Les mots de passes sont différents</label></p>';
    }

    $mdp_confirm = password_hash($mdp_confirm, PASSWORD_DEFAULT);

    $objUser = new User();
    $objUser->Nom = $nom;
    $objUser->Prenom = $prenom;
    $objUser->Pseudo = $pseudo;
    $objUser->Mdp = $mdp_confirm;
    $objUser->Id = $id;

    $App->addUser($objUser);
    $App->SaveJson();

    $id_session = session_id();
    header('Location: home.php');
}
?>
<h1 align="center">Créer un compte</h3>
<div class="container"> 
    <form method="post" id="form-signup">
        <?php echo $error; ?>
        <div class="form-group">
            <label>Enter votre nom</label>
            <input type="text" name="nom" placeholder="Nom" class="form-control" value="<?php if (isset($_POST['submit'])){echo $nom;} ?>" />
        </div>
        <div class="form-group">
            <label>Enter votre prénom</label>
            <input type="text" name="prenom" class="form-control" placeholder="Prenom" value="<?php if (isset($_POST['submit'])){echo $prenom;}?>" />
        </div>
        <div class="form-group">
            <label>Entrer votre pseudo</label>
            <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" value="<?php if (isset($_POST['submit'])){echo $pseudo;} ?>" />
        </div>
        <div class="form-group">
            <label>Entrer votre mot de passe</label>
            <input type="password" name="mdp" class="form-control" placeholder="Mot de passe" value="<?php if (isset($_POST['submit'])){echo $mdp;} ?>"  />
        </div>
        <div class="form-group">
            <label>Confirmer votre mot de passe</label>
            <input type="password" name="mdp_confirm" class="form-control" placeholder="Mot de passe" value="<?php if (isset($_POST['submit'])){echo $mdp_confirm;} ?>" />
        </div>
        <div class="form-group" align="center">
            <input type="submit" name="submit" class="btn btn-info" value="Submit" />
        </div>
    </form>        
</div>

<?php 
include 'footer.php';
?>