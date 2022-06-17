<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Séjours</title>
    <link rel="stylesheet" href="css/chenil.css">
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
    if(isset($allSejoursDatesForNumber) && !empty($allSejoursForNumber)){
        foreach($allSejoursForNumber as $sejourForNumber){
            array_push($allSejoursDatesForNumber, $sejourForNumber->date);
        }
        $nbSejoursByDate = array_count_values($allSejoursDatesForNumber);
    }
   ?>
    <h3>Séjours planifiés:</h3>
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
    <?php else : ?>
        <p>Aucun séjour n'a encore été planifié</p>
    <?php endif; ?>
    <button><a href="index.php?ctlr=sejours&action=create">Planifier un séjour</a></button>
</body>
</html>