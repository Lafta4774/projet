<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $singleQuestion->title ?></title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <main>
        <form action="" method="post">
            <label for="title">Titre de question</label>
            <input type="text" name="title" id="title" placeholder="Posez votre question ici" value="<?= @$singleQuestion->title ?>">
            <?php if (isset($formErrors['title'])) { ?>
                <p class="error"><?= $formErrors['title'] ?></p>
            <?php } ?>

            <label for="categories">Catégorie</label>
            <select name="categories" id="categories">
                <?php foreach ($categoriesList as $c) { ?>
                    <option value="<?= $c->id ?>" <?= $c->id == $singleQuestion->id_categories ? 'selected' : '' ?>><?= $c->name ?></option>
                <?php } ?>
            </select>

            <label for="content">Description</label>
            <textarea name="content" id="content" cols="30" rows="10"><?= @$singleQuestion->content ?></textarea>
            <?php if (isset($formErrors['content'])) { ?>
                <p class="error"><?= $formErrors['content'] ?></p>
            <?php } ?>

            <input type="submit" name="update" value="Modifier">
            </form>
            <button class="deletebtn" id="open-delete-modal">Supprimer</button>
            <div id="modal-container">
                <div id="modal">
                    <span class="close-btn">&times;</span>
                    <p>Êtes-vous sûr de vouloir supprimer cette question?</p>
                    <button id="cancel">Annuler</button>
                    <form class="delete-modal" action="../controllers/modifyQuestionController.php?id=<?= @$_GET['id'] ?>" method="post">
                        <button id="confirm" name="confirmDelete">Confirmer</button>
                    </form>
                </div>
            </div>
    </main>
    <script src="../assets/js/script.js"></script>
</body>

</html>