<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <main>
    <a href="logoutController.php">Déconnexion</a>
    <form action="" method="post">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" placeholder="exemple : DUPONT47" value="<?= @$userInfo->username ?>">
        <?php if (isset($formErrors['username'])) { ?>
            <p class="error"><?= $formErrors['username'] ?></p>
        <?php } ?>

        <input type="submit" name="updateUsername" value="Modifier">
    </form>
    <form action="" method="post">
        <label for="email">Adresse email</label>
        <input type="email" name="email" id="email" placeholder="exemple : a@b.c" value="<?= @$userInfo->email ?>">
        <?php if (isset($formErrors['email'])) { ?>
            <p class="error"><?= $formErrors['email'] ?></p>
        <?php } ?>

        <input type="submit" name="updateEmail" value="Modifier">
    </form>
    <form action="" method="post">
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

        <input type="submit" name="updatePassword" value="Modifier">
    </form>
    <button class="deletebtn" id="open-delete-modal">Supprimer</button>
    <div id="modal-container">
        <div id="modal">
            <span class="close-btn">&times;</span>
            <p>Êtes-vous sûr de vouloir supprimer votre compte?</p>
            <button id="cancel">Annuler</button>
            <form class="delete-modal" action="" method="post">
                <button id="confirm" name="confirmDelete">Confirmer</button>
            </form>
        </div>
    </div></main>
    <script src="../assets/js/script.js"></script>
</body>

</html>