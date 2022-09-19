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
            <div class="divlog">
                <?php
                if (isset($_GET['login_err'])) {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch ($err) {
                        case 'password':
                ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                        <?php
                            break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email incorrect
                            </div>
                        <?php
                            break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte non existant
                            </div>
                <?php
                            break;
                    }
                }
                ?>

                <form action="connexion.php" method="post">
                    <h2 class="text-center">Connexion</h2>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</body>

</html>