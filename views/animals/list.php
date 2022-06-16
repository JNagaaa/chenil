<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Animaux</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php?ctlr=animals&action=index">Animaux</a></li>
            <li><a href="index.php?ctlr=people&action=index">Propriétaires</a></li>
            <li><a href="index.php?ctlr=sejours&action=index">Séjours</a></li>
            <li><a href="index.php?ctlr=board&action=index">Tableau de bord</a></li>
        </ul>
    </nav>
   <?php if(isset($_SESSION['error'])): ?><b><p style="color:red">Les informations que vous avez tenté de modifier ne sont pas valides (<?php if(isset($_SESSION['error']['name'])): ?>nom<?php endif; if(count($_SESSION['error']) == 2): ?>, <?php endif; if(isset($_SESSION['error']['chip'])): ?>puce<?php endif; ?>)</p></b><?php endif; ?>
    <h3>Animaux:</h3>
    <?php if (isset($animals) && !empty($animals)): ?>
        <ul>
            <?php foreach($animals as $animal): ?>
                <li><a href="index.php?ctlr=animals&action=show&id=<?= $animal->id; ?>"><?= $animal->nom; ?></a></li><br>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>Aucun animal n'est encore enregistré!</p>
    <?php endif; ?>
    <?php if(isset($_SESSION['key'])): ?>
        <b><p style="color:red">Supprimez d'abord les séjours affiliés à l'animal</p></b>
    <?php endif; ?>
    <button><a href="index.php?ctlr=animals&action=create">Ajouter</a></button>
    <?php session_destroy(); ?>
</body>
</html>