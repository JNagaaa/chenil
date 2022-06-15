<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $sejour->date; ?></title>
</head>
<body>
<a href="http://chenil/index.php?ctlr=sejours&action=index">Retour à la liste des séjours</a>
    <h2>Date: <?= $sejour->date; ?></h2>
    <?php if(isset($listAnimals) && !empty($listAnimals)): ?>
        <?php foreach ($listAnimals as $sejourAnimal) : ?>
            <li><a href="index.php?ctlr=animals&action=show&id=<?= $sejourAnimal->animal->id; ?>"><?= $sejourAnimal->animal->nom ?></a>
            <form action="index.php" method="POST">
                        <input type="hidden" name="ctlr" value="sejours">
                        <input type="hidden" name="action" value="destroy">
                        <input type="hidden" name="id" value="<?= $sejour->id; ?>">
                        <input type="submit" value="SUPPR">
                    </form>
            </li>
            <?php endforeach; endif; ?>
            
</body>
</html>