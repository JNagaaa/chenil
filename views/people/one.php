<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $person->prenom; ?> <?= $person->nom; ?></title>
    <link rel="stylesheet" href="css/chenil.css"></head>
<body>
    <ul>
        <li><a href="index.php?ctlr=animals&action=index">Animaux</a></li>
        <li><a href="index.php?ctlr=people&action=index">Propriétaires</a></li>
        <li><a href="index.php?ctlr=sejours&action=index">Séjours</a></li>
        <li><a href="index.php?ctlr=board&action=index">Tableau de bord</a></li>
    </ul>
<h2><?= $person->prenom; ?> <?= $person->nom ?></h2>
<p>Date de naissance: <?= str_replace('-', '/', date('d-m-Y', strtotime($person->naissance))) ?></p>
<p>Adresse mail: <?= $person->mail ?></p>
<p>Numéro de téléphone: 0<?= substr($person->telephone, 0, 3) . "/" . substr($person->telephone,3, 2) . "." . substr($person->telephone,5,2) . "." . substr($person->telephone,7); ?></p>

    <ul>
        <?php if($person->animals): ?>
        <h3>Animaux:</h3>
        <?php foreach($person->animals as $animal): ?>
            <li><a href="index.php?ctlr=animals&action=show&id=<?= $animal->id; ?>"><?= $animal->nom ?></a></li>
        <?php endforeach; ?>
        <?php endif; ?>
    </ul>
    <form action="index.php" method="GET">
        <input type="hidden" name="ctlr" value="people">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?= $person->id; ?>">
        <input type="submit" value="Modifier">
    </form>        
    
    <form action="index.php" method="POST">
        <input type="hidden" name="ctlr" value="people">
        <input type="hidden" name="action" value="destroy">
        <input type="hidden" name="id" value="<?= $person->id; ?>">
        <input type="submit" value="Supprimer">
    </form>
</body>
</html>
<?php var_dump($_SESSION); ?>
  