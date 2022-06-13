<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Séjours</title>
</head>
<body>
   <ul>
        <li><a href="index.php?ctlr=animals&action=index">Animaux</a></li>
        <li><a href="index.php?ctlr=people&action=index">Propriétaires</a></li>
        <li><a href="index.php?ctlr=sejours&action=index">Séjours</a></li>
   </ul>
    <?php if (isset($sejours)): ?>
        <ul>
            <?php foreach($sejours as $sejour): ?>
                <li><a href="index.php?ctlr=sejours&action=show&id=<?= $sejour->id; ?>"><?= $sejour->date; ?></a>
                    <form action="index.php" method="POST">
                        <input type="hidden" name="ctlr" value="sejours">
                        <input type="hidden" name="action" value="destroy">
                        <input type="hidden" name="id" value="<?= $sejour->id; ?>">
                        <input type="submit" value="SUPPR">
                    </form>
                </li>
            <?php endforeach; ?>
            <a href="index.php?ctlr=sejours&action=create">CREATE</a>
        </ul>
    <?php endif; ?>
</body>
</html>