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

$idreq = $data['token'];
if ($data['token'] != '6700850587590d8033939114b54d110af05bafd1d167dfb7251b8d628299de1a3ed87ccb25891467f304faf93360fe58f11ecb1456a58dfa78bad403db550ecd') {
    header('Location:index.php');
    die();
}
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    </link>
    <title>Carnet de Santé - Vétérinaire</title>
</head>

<body>
    <header id="web-header">
        <nav id="navbar">
            <ul>
                <li><a href="./">Accueil</a></li>
                <li><a href="#parentpropos">À propos</a></li>
                <li><a href="#daron">Me contacter</a></li>
                <li><a href="./deconnexion.php">Deconnexion</a></li>
            </ul>
        </nav>
    </header>

    <div class="hero2">
        <div class="content2">
            <div class="divlog">
                <div class="div1">
                    
                        <?php
                        try {
                            $bdd = new PDO('mysql:host=localhost;dbname=carnetveto;charset=utf8', 'root', 'root');
                        } catch (Exception $e) {
                            die('Erreur : ' . $e->getMessage());
                        }
                        ?>
                        <h1>Dossier</h1>
                <form method="post" action="adddossier.php">
                <select name="choix">
                    <?php
                    $requete = $bdd->query('SELECT * FROM utilisateurs WHERE id <> 0;');
                    while ($resultat = $requete->fetchObject()) {
                        echo '<option value="' . $resultat->id . '">' . $resultat->nom . " " . $resultat->prenom . '</option>';
                    }
                    $requete->closeCursor();
                    ?>
                </select>

                        <p><label for="nomchien">Nom du chien : <input required type="text" name="nomchien" placeholder="Nom du chien"></label></p>
                        <p><label class="labeladddoss" for="observation">Observation : <br> <textarea class="inputadddoss" required type="text" name="observation" placeholder="Observation"></textarea></label></p>
                        <p><label for="dateprovac">Date de du prochain vaccin : <input required type="date" name="dateprovac"></label></p>

                        <input type="submit" name="Envoyer" value="Valider">
                    </form>
                </div>
                <div><button onclick="window.location.href = 'veterinairecli.php';">Ajouter un client</button></div>
            </div>
        </div>


</body>

</html>