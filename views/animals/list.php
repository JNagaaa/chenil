<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Animaux</title>
</head>
<body>
   <ul>
       <li><a href="index.php?ctlr=animals&action=index">Animaux</a></li>
       <li><a href="index.php?ctlr=people&action=index">Propriétaires</a></li>
       <li><a href="index.php?ctlr=sejours&action=index">Séjours</a></li>
   </ul>
    <?php if (isset($animals)): ?>
        <ul>
            <?php foreach($animals as $animal): ?>
                <li><a href="index.php?ctlr=animals&action=show&id=<?= $animal->id; ?>"><?= $animal->nom; ?></a>
                    <a href="index.php?ctlr=animals&action=edit&id=<?= $animal->id; ?>">MODIF</a>
                    <form action="index.php" method="POST">
                        <input type="hidden" name="ctlr" value="animals">
                        <input type="hidden" name="action" value="destroy">
                        <input type="hidden" name="id" value="<?= $animal->id; ?>">
                        <input type="submit" value="SUPPR">
                    </form>
                </li>
            <?php endforeach; ?>
            <a href="index.php?ctlr=animals&action=create">CREATE</a>
        </ul>
    <?php endif; ?>
</body>
</html>