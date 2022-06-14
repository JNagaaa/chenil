<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $person->nom; ?></title>
</head>
<body>
    <a href="http://chenil/index.php?ctlr=people&action=index">Retour à la liste des propriétaires</a>
    <h2><?= $person->prenom; ?> <?= $person->nom ?></h2>
<p>Date de naissance: <?= $person->naissance ?></p>
<p>Adresse mail: <?= $person->mail ?></p>
<p>Numéro de téléphone: 0<?= $person->telephone ?></p>

    <ul>
        <?php if($person->animals): ?>
        <h3>Animaux:</h3>
        <?php foreach($person->animals as $animal): ?>
            <li><a href="index.php?ctlr=animals&action=show&id=<?= $animal->id; ?>"><?= $animal->nom ?></a></li>
        <?php endforeach; ?>
        <?php endif; ?>
    </ul>
    <a href="index.php?ctlr=people&action=edit&id=<?= $person->id; ?>">Modifier ce propriétaire</a>

</body>
</html>
  