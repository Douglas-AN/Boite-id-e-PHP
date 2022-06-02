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