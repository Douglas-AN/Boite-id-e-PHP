<?php
session_start();
if (!file_exists("user.csv") || !is_readable("user.csv")) {
    echo "Erreur fichier";
} else {
    if (isset($_COOKIE['pseudo']) && isset($_COOKIE['mdp'])) {
        echo 'Vous êtes déja identifié <br>';
        echo 'Pseudo : '.$_COOKIE['pseudo'].'<br>';
        echo 'Mot de passe : '.$_COOKIE['mdp'].'<br>';
        //header('Location: auth.php');
        //header('Location: home.php');
    } else {
        if (isset($_POST['submitAuth'])) {
            if (isset($_POST['pseudo']) || isset($_POST['mdp'])) {
                $pseudo = $_POST['pseudo'];
                $mdp = $_POST['mdp'];
                $row = 1;
                if (($file_open = fopen("user.csv", "r")) !== FALSE) {
                    while (($data = fgetcsv($file_open, 1000, ",")) !== FALSE) {
                        $num = count($data);
                        $row++;
                        $nom = $data[1];
                        $prenom = $data[2];
                        if ($data[3] == $pseudo) {
                            $comfirm_password = password_verify($mdp, $data[4]);
                            if ($comfirm_password == true) {
                                echo 'ok';
                            } else {
                                echo 'Votre mot de passe est incorrect';
                            }
                        } else {
                            echo "Vous n'êtes pas inscrit.";
                            header('Location: signup.php');
                        }
                    }
                    fclose($file_open);
                }
            }
            if(isset($_POST['remember_me']))
            {
                setcookie('pseudo', $pseudo, time()+3600*24, '/', '', true, true);
                setcookie('mdp', $mdp, time()+3600*24, '/', '', true, true);
            }
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['nom'] = $nom;
            //header('Location: auth.php');
            header('Location: home.php');
        }   
    }
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