<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $sejour->date; ?></title>
</head>
<body>
    <h2>Date: <?= $sejour->date; ?></h2>
    <?php if(isset($listAnimals) && !empty($listAnimals)): ?>
        <?php foreach ($listAnimals as $sejourAnimal) : ?>
            <li><a href="index.php?ctlr=animals&action=show&id=<?= $sejourAnimal->animal->id; ?>"><?= $sejourAnimal->animal->nom ?></a></li>
            <?php endforeach; endif; ?>
            
</body>
</html>