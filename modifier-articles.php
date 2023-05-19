<?php
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin', 'root', 'root');
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $getid = $_GET['id'];
    $recupArticle = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $recupArticle->execute(array($getid));
    if ($recupArticle->rowCount() > 0) {
        $articleInfos = $recupArticle->fetch();
        $titre = $articleInfos['titre'];
        $contenu = str_replace('<br />', '', $articleInfos['contenu']);

        if (isset($_POST['valider'])) {
            $titre_saisi = htmlspecialchars($_POST['titre']);
            $contenu_saisi = nl2br(htmlspecialchars($_POST['contenu']));

            $updateArticle = $bdd->prepare('UPDATE articles SET titre = ?, contenu = ? WHERE id = ?');
            $updateArticle->execute(array($titre_saisi, $contenu_saisi, $getid));

            header('location: articles.php');
        }
    } else {
        echo "Aucun article trouvé";
    }
} else {
    echo "Aucun identifiant trouvé";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier article</title>
</head>

<body>
    <form method="POST" action="">
        <input type="text" name="titre" value="<?= $titre; ?>">
        <br>
        <textarea name="contenu" cols="50" rows="50">
            <?= $contenu; ?>
        </textarea>
        <br>
        <input type="submit" name="valider">

    </form>
</body>

</html>