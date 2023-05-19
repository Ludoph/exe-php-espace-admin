<?php
session_start();
if (isset($_POST['valider'])) {
    if (!empty($_POST['pseudo']) and !empty($_POST['mdp'])) {
        $pseudo_par_defaut = 'admin';
        $mdp_par_defaut = 'admin123';

        $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
        $mdp_saisi = htmlspecialchars($_POST['mdp']);

        if ($pseudo_saisi == $pseudo_par_defaut and $mdp_saisi == $mdp_par_defaut) {
            $_SESSION['mdp'] = $mdp_saisi;
            header('Location: index.php');
        } else {
            echo 'Votre pseudo ou mot de passe est incorrect.';
        }
    } else {
        echo 'Veuillez remplir tous les champs...';
    }
}


?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Connexion Admin</h1>
    <form method="POST" action="" align="center">
        <input type="text" name="pseudo" autocomplete="off">
        <input type="password" name="mdp">
        <input type="submit" name="valider">
    </form>
</body>

</html>