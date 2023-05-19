<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin', 'root', 'root');
if (!$_SESSION['mdp']) {
    header('location: connexion.php');
}



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
</head>

<body>
    <h1 align="center">Articles</h1>
    <?php
    $recupArticles = $bdd->query('SELECT * FROM articles');
    while ($article = $recupArticles->fetch()) {
    ?>
        <div class="article">
            <h1><?= $article['titre']; ?></h1>
            <br>
            <p><?= $article['contenu']; ?></p>
            <br>
            <a href="supprimer-articles.php?id=<?= $article['id']; ?>">
                <button>Supprimer cet article</button>
            </a>
            <a href="modifier-articles.php?id=<?= $article['id']; ?>">
                <button>Modifier cet article</button>
            </a>

        </div>
    <?php
    }
    ?>
    <a href="index.php">Retour</a><br>
</body>

</html>