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
   <?php
   $allSejours = [];
   $allSejoursDates = [];
   ?>

    <?php if (isset($sejours) && !empty($sejours)): ?>
        <ul>
            <?php foreach($sejours as $sejour): ?>
                <?php if(!in_array($sejour->date, $allSejoursDates, true)): array_push($allSejoursDates, $sejour->date); array_push($allSejours, $sejour); endif; endforeach; ?>
                <?php //if(in_array($sejour->date, $allSejoursDates)):  ?>
                <?php foreach($allSejours as $oneSejour): ?>
                <li><a href="index.php?ctlr=sejours&action=show&id=<?= $oneSejour->id; ?>"><?= $oneSejour->date; ?></a>
                    <form action="index.php" method="POST">
                        <input type="hidden" name="ctlr" value="sejours">
                        <input type="hidden" name="action" value="destroy">
                        <input type="hidden" name="id" value="<?= $sejour->id; ?>">
                        <input type="submit" value="SUPPR">
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a href="index.php?ctlr=sejours&action=create">CREATE</a>
</body>
</html>