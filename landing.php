<?php
session_start();
require_once 'config.php';
if (!isset($_SESSION['user'])) {
    header('Location:index.php');
    die();
}
$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();

//V recuperation de l'id de l'utilisateur connecté V//
$idreq = $data['id'];
$pdoStat = $bdd->query('SELECT * FROM dossier WHERE idcli = ' . $idreq . ' ORDER BY iddossier desc');
$executeIsOk = $pdoStat->execute();
$dossiers = $pdoStat->fetchAll();
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    </link>
    <title>Espace Membre</title>
</head>

<body>
    <header id="web-header">
        <nav id="navbar">
            <ul>
                <li><a href="./">Accueil</a></li>
                <li><a href="./">À propos</a></li>
                <li><a href="./">Me contacter</a></li>
                <li><a href="./deconnexion.php">Deconnexion</a></li>
            </ul>
        </nav>
    </header>
    <div class="hero3">
        <div class="content2">
            <div class="divdoss">
                <div class="text-center">
                    <h1 class="p-5">Bonjour, <?php echo $data['prenom']; ?> !</h1>
                    <p class="p-5">Dossier :</p>

                    <?php foreach ($dossiers as $dossier) : ?>
                        <p class="pdoss">Nom du chien : <?= $dossier['nomchien'] ?> - Observation : <?= $dossier['observation'] ?><br>Date de la consultation : <?= $dossier['dateconsul'] ?> - Date du prochain vaccin : <?= $dossier['dateprovac'] ?></p>
                        <hr>
                    <?php endforeach; ?>

                </div>
            </div>

        </div>
    </div>
</body>

</html>