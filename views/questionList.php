<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de questions</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <main>
        <div class="question-container">
    <?php foreach ($questionList as $q) { ?>
        <div class="question">
            <h2><?= $q->title ?></h2>
            <p><?= $q->date ?></p>
            <p><?= $q->name ?></p>
            <p><?= $q->username ?></p>
            <p><?= $q->content ?></p>
            <a class="questionbtn" href="../controllers/singleQuestionController.php?id=<?= $q->id ?>">Voir la question</a>
        </div>
    <?php } ?></div>
    </main>
</body>

</html>