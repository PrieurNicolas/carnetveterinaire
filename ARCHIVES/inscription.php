<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    </link>
    <title>Connexion</title>
</head>

<body>
    <header id="web-header">
        <nav id="navbar">
            <ul>
                <li><a href="./">Accueil</a></li>
                <li><a href="./">À propos</a></li>
                <li><a href="./">Me contacter</a></li>
                <li><a href="./logcli.php">Connexion</a></li>
            </ul>
        </nav>
    </header>

    <div class="hero2">
        <div class="content2">
            <div class="divlog2">
                <div class="login-form">
                    <?php
                    if (isset($_GET['reg_err'])) {
                        $err = htmlspecialchars($_GET['reg_err']);

                        switch ($err) {
                            case 'success':
                    ?>
                                <div class="alert alert-success">
                                    <strong>Succès</strong> inscription réussie !
                                </div>
                            <?php
                                break;

                            case 'password':
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Erreur</strong> mot de passe différent
                                </div>
                            <?php
                                break;

                            case 'email':
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Erreur</strong> email non valide
                                </div>
                            <?php
                                break;

                            case 'email_length':
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Erreur</strong> email trop long
                                </div>
                            <?php
                                break;

                            case 'nom_length':
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Erreur</strong> nom trop long
                                </div>
                            <?php
                            case 'already':
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Erreur</strong> compte deja existant
                                </div>
                    <?php

                        }
                    }
                    ?>

                    <form action="inscription_traitement.php" method="post">
                        <h2 class="text-center">Inscription</h2>
                        <div class="form-group">
                            <input type="text" name="nom" class="form-control" placeholder="Nom" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="text" name="prenom" class="form-control" placeholder="Prenom" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                        </div>
                    </form>
                    <btn class="btn"><a href="logcli.php">connexion</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>