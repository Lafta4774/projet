<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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

        <label for="email">Adresse email</label>
        <input type="email" name="email" id="email" placeholder="exemple : a@b.c" value="<?= @$_POST['email'] ?>">
        <?php if (isset($formErrors['email'])) { ?>
            <p class="error"><?= $formErrors['email'] ?></p>
        <?php } ?>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="exemple : Jean1234" value="<?= @$_POST['password'] ?>">
        <?php if (isset($formErrors['password'])) { ?>
            <p class="error"><?= $formErrors['password'] ?></p>
        <?php } ?>

        <label for="password">Confirmer MDP</label>
        <input type="password" name="confirmPassword" id="password" placeholder="exemple : Jean1234" value="<?= @$_POST['confirmPassword'] ?>">
        <?php if (isset($formErrors['confirmPassword'])) { ?>
            <p class="error"><?= $formErrors['confirmPassword'] ?></p>
        <?php } ?>

        <input type="submit" value="S'inscrire">
    </form></main>
</body>

</html>