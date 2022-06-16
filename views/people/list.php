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
   <?php
    if(isset($_SESSION['error'])): ?>
        <b><p style="color:red">Les informations que vous avez tenté de modifier ne sont pas valides</p></b>
    <?php endif; ?>
    <?php if (isset($people) && !empty($people)): ?>
        <ul>
            <?php foreach($people as $person): ?>
                <li><a href="index.php?ctlr=people&action=show&id=<?= $person->id; ?>"><?= $person->prenom ?> <?= $person->nom; ?></a>

                    <form action="index.php" method="POST">
                        <input type="hidden" name="ctlr" value="people">
                        <input type="hidden" name="action" value="destroy">
                        <input type="hidden" name="id" value="<?= $person->id; ?>">
                        <input type="submit" value="SUPPR">
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="index.php?ctlr=people&action=create">CREATE</a>
    <?php endif; ?>
    <?php session_destroy(); ?>
</body>
</html>