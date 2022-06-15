<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Animaux</title>
</head>
<body>
   <ul>
       <li><a href="index.php?ctlr=animals&action=index">Animaux</a></li>
       <li><a href="index.php?ctlr=people&action=index">Propriétaires</a></li>
       <li><a href="index.php?ctlr=sejours&action=index">Séjours</a></li>
   </ul>
   <?php if(isset($_SESSION['error'])): ?><b><p style="color:red">Les informations que vous avez tenté de modifier ne sont pas valides (<?php if(isset($_SESSION['error']['name'])): ?>nom<?php endif; if(count($_SESSION['error']) == 2): ?>, <?php endif; if(isset($_SESSION['error']['chip'])): ?>puce<?php endif; ?>)</p></b><?php endif; ?>

    <?php if (isset($animals) && !empty($animals)): ?>
        <ul>
            <?php foreach($animals as $animal): ?>
                <li><a href="index.php?ctlr=animals&action=show&id=<?= $animal->id; ?>"><?= $animal->nom; ?></a>
                    <a href="index.php?ctlr=animals&action=edit&id=<?= $animal->id; ?>">Modifier</a>
                    <form action="index.php" method="POST">
                        <input type="hidden" name="ctlr" value="animals">
                        <input type="hidden" name="action" value="destroy">
                        <input type="hidden" name="id" value="<?= $animal->id; ?>">
                        <input type="submit" value="Supprimer">
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="index.php?ctlr=animals&action=create">Ajouter</a>
    <?php endif; ?>
    <?php var_dump($_POST); session_destroy(); ?>
</body>
</html>