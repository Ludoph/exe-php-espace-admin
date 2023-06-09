<?php
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin', 'root', 'root');
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $getid = $_GET['id'];
    $recupArticle = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $recupArticle->execute(array($getid));
    if ($recupArticle->rowCount() > 0) {
        $deleteArticle = $bdd->prepare('DELETE FROM articles WHERE id = ?');
        $deleteArticle->execute(array($getid));
        header('location: articles.php');
    } else {
        echo "Aucun article n'a été trouvé";
    }
} else {
    echo "Aucun identifiant n'a été trouvé";
}
