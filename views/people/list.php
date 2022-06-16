<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Propriétaires</title>
</head>
<body>
    <ul>
        <li><a href="index.php?ctlr=animals&action=index">Animaux</a></li>
        <li><a href="index.php?ctlr=people&action=index">Propriétaires</a></li>
        <li><a href="index.php?ctlr=sejours&action=index">Séjours</a></li>
        <li><a href="index.php?ctlr=board&action=index">Tableau de bord</a></li>
    </ul>
   <?php if(isset($_SESSION['error'])): ?>
        <b><p style="color:red">Les informations que vous avez tenté de modifier ne sont pas valides</p></b>
    <?php endif; ?>
    <?php if (isset($people) && !empty($people)): ?>
        <h3>Propriétaires:</h3>
        <ul>
            <?php foreach($people as $person): ?>
                <li><a href="index.php?ctlr=people&action=show&id=<?= $person->id; ?>"><?= $person->prenom ?> <?= $person->nom; ?></a></li><br>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>Aucun propriétaire n'est encore enregistré</p>
    <?php endif; ?>
    <?php if(isset($_SESSION['key'])): ?>
        <b><p style="color:red">Supprimez d'abord les animaux du propriétaire</p></b>
    <?php endif; ?>
    <button><a href="index.php?ctlr=people&action=create">Ajouter</a></button>
    <?php session_destroy(); ?>
</body>
</html>