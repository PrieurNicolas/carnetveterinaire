<?php 
    session_start();
    require_once 'config.php';
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();

    $idreq = $data['id'];
?>
<!doctype html>
<html lang="fr">
<head>
<style>@import url(style.css);</style>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dossier</title>
</head>
<body>
<header id="web-header">
        <nav id="navbar">
            <ul>
                <li><a href="./">Accueil</a></li>
                <li><a href="./#parentpropos">À propos</a></li>
                <li><a href="./logcli.php">Connexion</a></li>
                <li><a href="./ #daron">Me contacter</a></li>
            </ul>
        </nav>
    </header>
<button onclick="window.location.href = '/CarnetVeterinaire';">Page de dossiers</button>
<div>
    <form action="">
    <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=carnetveto;charset=utf8', 'root', 'root');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
        ?>
        <h1>Dossier</h1>
        <p><label for="dossier">Choisir un client : </label>
            <select name="dossier" required>
                <?php
                $requete = $bdd->query('SELECT * FROM client;');
                while($resultat = $requete->fetchObject()) {
                    echo '<option value="'.$resultat->idcli.'">'.$resultat->nomcli." ".$resultat->prenomcli.'</option>';
                }
                $requete->closeCursor();
    ?>
</div><br>
<div><button onclick="window.location.href = '/CarnetVeterinaire';">Page de dossiers</button></div>

</body>
</html>