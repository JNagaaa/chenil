<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $sejour->date; ?></title>
</head>
<body>
    <h2><?= $sejour->date; ?></h2>
    <?php if ($sejour->animal) {  ?>
        <h4><?= $sejour->animal->nom; ?></h4>
        <?php foreach($sejour->animals as $animals): ?>
           <?php if (isset($other_sejour->date) && !empty($other_sejour->date) && $other_sejour->date !== $sejour->date) {  ?>
               <p><?= $other_sejour->date ?></p>
               <?php } ?>

               <?php  ?>
        <?php endforeach; ?>
    <?php }else{ ?>
        <h4>Pas d'autres séjours de prévu...</h4>
    <?php } ?>
</body>
</html>