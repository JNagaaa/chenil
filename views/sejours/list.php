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
    <li><a href="index.php?ctlr=board&action=index">Tableau de bord</a></li>
    </ul>
   <?php
   $allSejours = [];
   $allSejoursDates = [];

   $allSejoursDatesForNumber = [];
    $allSejoursForNumber = Sejour::all();
    foreach($allSejoursForNumber as $sejourForNumber){
        array_push($allSejoursDatesForNumber, $sejourForNumber->date);
    }
    $nbSejoursByDate = array_count_values($allSejoursDatesForNumber);
   ?>

    <?php if (isset($sejours) && !empty($sejours)): ?>
        <ul>
            <?php foreach($sejours as $sejour): ?>
                <?php if(!in_array($sejour->date, $allSejoursDates, true)): array_push($allSejoursDates, $sejour->date); array_push($allSejours, $sejour); endif; endforeach; ?>
                <?php foreach($allSejours as $oneSejour): ?>
                <li>
                    <p><a href="index.php?ctlr=sejours&action=show&id=<?= $oneSejour->id; ?>"><?= $oneSejour->date; ?></a> (<?= $nbSejoursByDate[$oneSejour->date]; ?>/10 places occupées)</p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a href="index.php?ctlr=sejours&action=create">CREATE</a>
</body>
</html>