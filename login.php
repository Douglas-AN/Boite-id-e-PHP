<?php
include 'header.php';

if (isset($_POST['submitAuth'])) {
    if (isset($_POST['pseudo']) || isset($_POST['mdp'])) {
        $pseudo = $_POST['pseudo'];
        $mdp = $_POST['mdp'];
        foreach ($App->TabUser as $index => $objUser) {
            $mdp_confirm = password_verify($mdp, $objUser->Mdp);
            if ($objUser->Pseudo == $pseudo && $mdp_confirm == 1) {
                $sessNom = $objUser->Pseudo;
                $sessPrenom = $objUser->Prenom;
                $sessUserId = $objUser->Id;
                
            }
        }
    }
    $_SESSION['nom'] = $sessNom;
    $_SESSION['prenom'] = $sessPrenom;
    $_SESSION['id'] = $sessUserId;
    setcookie('id', $sessUserId);
    
    header('Location: home.php');

}

?>
<!-- 
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>

<body>
    <br />
    <div class="container">
        <h2 align="center">Exercice form inscription</h2>
        <br />
        <div class="col-md-6" style="margin:0 auto; float:none;">
            <form method="post">
                <h3 align="center">Login</h3>
                <br />
                <?php //echo $error; 
                ?>
                <div class="form-group">
                    <label>Enter votre pseudo</label>
                    <input type="text" name="pseudo" placeholder="pseudo" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Confirmer votre mot de passe</label>
                    <input type="password" name="mdp" class="form-control" placeholder="Mot de passe" />
                </div>
                <div>
                    <input type="checkbox" name="remember_me" id="remember_me" value="">
                    <label for="remmber_me">Remember me</label>
                </div>
                <div class="form-group" align="center">
                    <input type="submit" name="submit" class="btn btn-info" value="Submit" />
                </div>
            </form>
        </div>
    </div>
</body>

</html> -->