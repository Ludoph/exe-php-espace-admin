<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin', 'root', 'root');
if (!$_SESSION['mdp']) {
    header('location: connexion.php');
}
if (isset($_POST['envoi'])) {
    if (!empty($_POST['titre']) and !empty($_POST['contenu'])) {
        $titre = htmlspecialchars($_POST['titre']);
        $contenu = nl2br(htmlspecialchars($_POST['contenu']));
        $insererArticle = $bdd->prepare('INSERT INTO articles(titre, contenu) VALUES (?, ?)');
        $insererArticle->execute(array($titre, $contenu));
        echo "Votre article a bien été envoyé";
    } else {
        echo "Veuillez remplir tous les champs...";
    }
}

?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artcicle</title>
</head>

<body>
    <form method="POST" action="">
        <input type="text" name="titre" placeholder="Ecrivez votre titre"><br>
        <textarea name="contenu" col="50" row="50" placeholder="Ecrivez votre article"></textarea><br>
        <input type="submit" name="envoi">
        <br>
        <a href="index.php">Retour</a><br>
    </form>
</body>

</html>