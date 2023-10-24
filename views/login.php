<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <main>
    <form action="" method="post">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" placeholder="exemple : DUPONT47" value="<?= @$_POST['username'] ?>">
        <?php if (isset($formErrors['username'])) { ?>
            <p class="error"><?= $formErrors['username'] ?></p>
        <?php } ?>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="exemple : Jean1234">
        <?php if (isset($formErrors['password'])) { ?>
            <p class="error"><?= $formErrors['password'] ?></p>
        <?php } ?>

        <input type="submit" value="Connexion">
    </form></main>
</body>

</html>