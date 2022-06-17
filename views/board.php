<?php
$animals = Animal::all();
$sejours = Sejour::all();
$people = Person::all();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/chenil.css">
    <title>Tableau de bord</title>
</head>
<header>
            <h1 class="header">L'Escale Canine</h1>
        </header>
<body>
    <main role="main">
        

        <nav>
        <ul class="nav">
            <li class="nav"><a href="index.php?ctlr=home&action=index">Accueil</a></li>
            <li class="nav"><a href="index.php?ctlr=animals&action=index">Animaux</a></li>
            <li class="nav"><a href="index.php?ctlr=people&action=index">Propriétaires</a></li>
            <li class="nav"><a href="index.php?ctlr=sejours&action=index">Séjours</a></li>
            <li class="nav"><a href="index.php?ctlr=board&action=index">Tableau de bord</a></li>
        </ul>
        </nav>
        <h2 id="title">Tableau de bord</h2>
        <div class="board">
        <article>
            <?php if(isset($animals) && !empty($animals)): ?>
                    <?php $nbAnimals = count($animals); ?>
                    <h3>Nous comptons pas moins de <?= $nbAnimals ?> animaux dans notre chenil:</h3>
                    <ul>
                        <?php foreach($animals as $animal): ?>
                            <p><li><a href="index.php?ctlr=animals&action=show&id=<?= $animal->id; ?>"><?= $animal->nom; ?></a> (propriétaire: <?= $animal->person->prenom ?> <?= $animal->person->nom ?>)</li></p>
                            <?php if(isset($animal->sejours[0])) : ?>
                                <p>Séjours prévus:</p>
                                <?php foreach($animal->sejours as $sejour): ?>
                                    <ul>
                                        <li><?= $sejour->date; ?></li>
                                    </ul>
                                <?php endforeach; ?> <br>
                            <?php else: ?>
                                <p>Aucun séjour de prévu</p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
            <?php endif; ?>
        </article>
        <article>
        <?php if(isset($people) && !empty($people)): ?>
            <?php $nbPeople = count($people); ?>
            <h3>A l'heure actuelle, <?= $nbPeople ?> propriétaires sont enregistrés chez nous:</h3>
            <ul>
                <?php foreach($people as $person): ?>
                    <p><li><a href="index.php?ctlr=people&action=show&id=<?= $person->id; ?>"><?= $person->prenom; ?> <?= $person->nom; ?></a></li></p>
                    <?php if(isset($person->animals[0])) : ?>
                        <p>Animaux de ce propriétaire:</p>
                        <?php foreach($person->animals as $animalPerson): ?>
                            <ul>
                                <li><?= $animalPerson->nom; ?></li>
                            </ul>
                        <?php endforeach; ?> <br>
                    <?php else: ?>
                        <p>Aucun animal appartenant à ce propriétaire</p>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        </article>
        </div>
        <?php if(isset($sejours) && !empty($sejours)) : ?>
            <?php
            $allSejoursDatesForNumber = [];
            $allSejoursForNumber = Sejour::all();
            if(isset($allSejoursDatesForNumber) && !empty($allSejoursForNumber)){
                foreach($allSejoursForNumber as $sejourForNumber){
                    array_push($allSejoursDatesForNumber, $sejourForNumber->date);
                }
                $nbSejoursByDate = array_count_values($allSejoursDatesForNumber);
            }
            $nbSejours = count($sejours);
            $allSejours = [];
            $allSejoursDates = [];
            ?>
            <?php foreach($sejours as $sejour): ?>
                <?php if(!in_array($sejour->date, $allSejoursDates, true)) : ?>
                    <?php array_push($allSejoursDates, $sejour->date); array_push($allSejours, $sejour); ?>
                <?php endif; ?>
            <?php endforeach; ?>
                <?php $nbDates = count($allSejours); ?>
            <h3><?= $nbSejours ?> séjours sont actuellement planifiés, répartis sur <?= $nbDates ?> dates:</h3>
            <ul>
                <?php foreach($allSejours as $oneSejour): ?>
                    <li>
                        <p><a href="index.php?ctlr=sejours&action=show&id=<?= $oneSejour->id; ?>"><?= $oneSejour->date; ?></a> (<?= $nbSejoursByDate[$oneSejour->date]; ?>/10 places occupées)</p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </main>
</body>
</html>
