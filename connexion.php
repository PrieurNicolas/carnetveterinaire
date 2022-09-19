<?php
session_start();
require_once 'config.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $email = strtolower($email);

    $check = $bdd->prepare('SELECT id, nom, email, password, token FROM utilisateurs WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();


    if ($row > 0) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (password_verify($password, $data['password'])) {
                if ($data['token'] == '6700850587590d8033939114b54d110af05bafd1d167dfb7251b8d628299de1a3ed87ccb25891467f304faf93360fe58f11ecb1456a58dfa78bad403db550ecd') {
                    $_SESSION['user'] = $data['token'];
                    header('Location: veterinairedoss.php');
                    die();
                } else {
                    $_SESSION['user'] = $data['token'];
                    header('Location: landing.php');
                    die();
                }
            } else {
                header('Location: logcli.php?login_err=password');
                die();
            }
        } else {
            header('Location: logcli.php?login_err=email');
            die();
        }
    } else {
        header('Location: logcli.php?login_err=already');
        die();
    }
} else {
    header('Location: logcli.php');
    die();
}
