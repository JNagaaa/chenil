<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $sejour->date; ?></title>
    <link rel="stylesheet" href="css/chenil.css">
</head>
<body>
<main role="main">
<header>
    <h1 class="header">L'Escale Canine</h1>
</header>

<nav>
  <ul class="nav">
    <li class="nav"><a href="index.php?ctlr=home&action=index">Accueil</a></li>
    <li class="nav"><a href="index.php?ctlr=animals&action=index">Animaux</a></li>
    <li class="nav"><a href="index.php?ctlr=people&action=index">Propriétaires</a></li>
    <li class="nav"><a href="index.php?ctlr=sejours&action=index">Séjours</a></li>
    <li class="nav"><a href="index.php?ctlr=board&action=index">Tableau de bord</a></li>
  </ul>
</nav>
<?php 
$allSejoursDates = [];
$allSejours = Sejour::all();
foreach($allSejours as $sejourObject){
    array_push($allSejoursDates, $sejourObject->date);
}
$nbSejoursByDate = array_count_values($allSejoursDates);
?>
<h2 id="title">Date: <?= $sejour->date; ?> (<?= $nbSejoursByDate[$sejour->date]; ?>/10 places occupées)</h2>
<?php if(isset($listAnimals) && !empty($listAnimals)): ?>
    <?php $animalsToPrint = Sejour::where('date', $sejour->date); ?>
    <?php foreach ($animalsToPrint as $animalToPrint) : ?>
        <li><a href="index.php?ctlr=animals&action=show&id=<?= $animalToPrint->animal->id; ?>"><?= $animalToPrint->animal->nom ?></a>
            <form onsubmit="return confirm('Voulez-vous vraiment annuler le séjour de <?= $animalToPrint->animal->nom ?>?');" action="index.php" method="POST">
                <input type="hidden" name="ctlr" value="sejours">
                <input type="hidden" name="action" value="destroy">
                <input type="hidden" name="id" value="<?= $animalToPrint->id; ?>">
                <input type="submit" value="Annuler le séjour">
            </form>
        </li>
        <br>
    <?php endforeach; ?>
<?php endif; ?>
</main>       
</body>
</html>