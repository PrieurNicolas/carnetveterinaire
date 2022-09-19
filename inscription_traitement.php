<?php
require_once 'config.php';
if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);


    $check = $bdd->prepare('SELECT nom, email, password FROM utilisateurs WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    $email = strtolower($email);

    if ($row == 0) {
        if (strlen($nom) <= 30) {
            if (strlen($prenom) <= 30) {
                if (strlen($email) <= 50) {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        if ($password === $password_retype) {

                            $cost = ['cost' => 12];
                            $password = password_hash($password, PASSWORD_BCRYPT, $cost);

                            $ip = $_SERVER['REMOTE_ADDR'];

                            $insert = $bdd->prepare('INSERT INTO utilisateurs(nom, prenom, email, password, ip, token) VALUES(:nom, :prenom, :email, :password, :ip, :token)');
                            $insert->execute(array(
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'email' => $email,
                                'password' => $password,
                                'ip' => $ip,
                                'token' => bin2hex(openssl_random_pseudo_bytes(64))
                            ));
                            header('Location:veterinairecli.php?reg_err=success');
                            die();
                        } else {
                            header('Location: veterinairecli.php?reg_err=password');
                            die();
                        }
                    } else {
                        header('Location: veterinairecli.php?reg_err=email');
                        die();
                    }
                } else {
                    header('Location: veterinairecli.php?reg_err=email_length');
                    die();
                }
            } else {
                header('Location: veterinairecli.php?reg_err=prenom_length');
                die();
            }
        } else {
            header('Location: veterinairecli.php?reg_err=nom_length');
            die();
        }
    } else {
        header('Location: veterinairecli.php?reg_err=already');
        die();
    }
}
