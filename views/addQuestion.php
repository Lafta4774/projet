<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer question</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <main>
    <form action="" method="post">
        <label for="title">Titre de question</label>
        <input type="text" name="title" id="title" placeholder="Posez votre question ici" value="<?= @$_POST['title'] ?>">
        <?php if (isset($formErrors['title'])) { ?>
            <p class="error"><?= $formErrors['title'] ?></p>
        <?php } ?>

        <label for="categories">Catégorie</label>
        <select name="categories" id="categories">
            <?php foreach ($categoriesList as $c) { ?>
                <option value="<?= $c->id ?>"><?= $c->name ?></option>
            <?php } ?>
        </select>

        <label for="content">Description</label>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <?php if (isset($formErrors['content'])) { ?>
            <p class="error"><?= $formErrors['content'] ?></p>
        <?php } ?>

        <input type="submit" value="Envoyer">
    </form></main>
</body>

</html>