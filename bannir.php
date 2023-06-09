<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin', 'root', 'root');
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $getid = $_GET['id'];
    $recupUser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
    $recupUser->execute(array($getid));
    if ($recupUser->rowCount() > 0) {
        $bannirUser = $bdd->prepare('DELETE FROM membres WHERE id = ?');
        $bannirUser->execute(array($getid));
        header('location: membres.php');
    } else {
        echo "Aucun membres n'a été trouvé";
    }
} else {
    echo "L'identifiant n'a pas été récupéré.";
}
