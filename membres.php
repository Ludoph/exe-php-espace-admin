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
    <title>Membres</title>
</head>

<body>
    <h1>Membres</h1>
    <?php
    $recupUsers = $bdd->query('SELECT * FROM membres');
    while ($user = $recupUsers->fetch()) {
        // echo $user['pseudo'];
    ?>
        <p><?= $user['pseudo']; ?> <a href="bannir.php?id=<?= $user['id']; ?>">Bannir le membre</a></p>
    <?php
    }
    ?>
    <a href="index.php">Retour</a><br>
</body>

</html>