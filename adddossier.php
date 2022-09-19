<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=carnetveto;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


$sql = $bdd->prepare('INSERT INTO dossier(idcli, nomchien, observation, dateprovac) VALUES (:cli, :nom, :obs, :datepv);');


$sql->bindValue(':cli', $_POST['choix'] , PDO::PARAM_STR);
$sql->bindValue(':nom', $_POST['nomchien'], PDO::PARAM_STR);
$sql->bindValue(':obs', $_POST['observation'], PDO::PARAM_STR);
$sql->bindValue(':datepv', $_POST['dateprovac'], PDO::PARAM_STR);

$sql->execute();
header('Location: veterinairedoss.php');
