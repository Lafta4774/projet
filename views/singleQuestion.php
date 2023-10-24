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
    <div>
        <h1><?= $singleQuestion->title ?></h1>
        <p><?= $singleQuestion->date ?></p>
        <p><?= $singleQuestion->name ?></p>
        <p><?= $singleQuestion->username ?></p>
        <p><?= $singleQuestion->content ?></p>
        <?php if ($_SESSION['user']['id'] == $singleQuestion->id_users) { ?>
            <a class="questionbtn" href="../controllers/modifyQuestionController.php?id=<?= $_GET['id'] ?>">Modifier la question</a>
        <?php } ?>
    </div></main>
</body>

</html>