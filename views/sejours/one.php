<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $sejour->date; ?></title>
</head>
<body>
<ul>
    <li><a href="index.php?ctlr=animals&action=index">Animaux</a></li>
    <li><a href="index.php?ctlr=people&action=index">Propriétaires</a></li>
    <li><a href="index.php?ctlr=sejours&action=index">Séjours</a></li>
</ul>
<?php 
$allSejoursDates = [];
$allSejours = Sejour::all();
foreach($allSejours as $sejourObject){
    array_push($allSejoursDates, $sejourObject->date);
}
$nbSejoursByDate = array_count_values($allSejoursDates);
?>
<h2>Date: <?= $sejour->date; ?> (<?= $nbSejoursByDate[$sejour->date]; ?>/10 places occupées)</h2>
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
    <?php endforeach; ?>
<?php endif; ?>
            
</body>
</html>