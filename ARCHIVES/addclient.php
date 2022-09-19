<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=carnetveto;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


$sql = $bdd->prepare('INSERT INTO client(nomcli, prenomcli, nomchien) VALUES (:nom, :pre, :chien);');

$sql->bindValue(':nom', $_POST['nomcli'], PDO::PARAM_STR);
$sql->bindValue(':pre', $_POST['prenomcli'], PDO::PARAM_STR);
$sql->bindValue(':chien', $_POST['nomchien'], PDO::PARAM_STR);

$sql->execute();

header('Location: veterinairecli.php');
