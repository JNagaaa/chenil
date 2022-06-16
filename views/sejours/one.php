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
        <li><a href="index.php?ctlr=board&action=index">Tableau de bord</a></li>
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
    <?php $animalsToPrint = Sejour::where('date', $sejour->date); ?>
    <?php foreach ($animalsToPrint as $animalToPrint) : ?>
        <li><a href="index.php?ctlr=animals&action=show&id=<?= $animalToPrint->animal->id; ?>"><?= $animalToPrint->animal->nom ?></a>
            <form action="index.php" method="POST">
                <input type="hidden" name="ctlr" value="sejours">
                <input type="hidden" name="action" value="destroy">
                <input type="hidden" name="id" value="<?= $animalToPrint->id; ?>">
                <input type="submit" value="Supprimer de ce séjour">
            </form>
        </li>
        <br>
    <?php endforeach; ?>
<?php endif; ?>
            
</body>
</html>