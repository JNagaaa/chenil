<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Propriétaires</title>
</head>
<body>
   <ul>
        <li><a href="index.php?ctlr=animals&action=index">Animaux</a></li>
        <li><a href="index.php?ctlr=people&action=index">Propriétaires</a></li>
        <li><a href="index.php?ctlr=sejours&action=index">Séjours</a></li>
   </ul>
    <?php if (isset($people)): ?>
        <ul>
            <?php foreach($people as $person): ?>
                <li><a href="index.php?ctlr=people&action=show&id=<?= $person->id; ?>"><?= $person->prenom ?> <?= $person->nom; ?></a>
                    <a href="index.php?ctlr=people&action=edit&id=<?= $person->id; ?>">MODIF</a>
                    <form action="index.php" method="POST">
                        <input type="hidden" name="ctlr" value="people">
                        <input type="hidden" name="action" value="destroy">
                        <input type="hidden" name="id" value="<?= $person->id; ?>">
                        <input type="submit" value="SUPPR">
                    </form>
                </li>
            <?php endforeach; ?>
            <a href="index.php?ctlr=people&action=create">CREATE</a>
        </ul>
    <?php endif; ?>
</body>
</html>