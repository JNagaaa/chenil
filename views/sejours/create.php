<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/chenil.css">
    <title><?= $sejour->date; ?></title>
</head>
<body>
    <ul>
        <li><a href="index.php?ctlr=animals&action=index">Animaux</a></li>
        <li><a href="index.php?ctlr=people&action=index">Propriétaires</a></li>
        <li><a href="index.php?ctlr=sejours&action=index">Séjours</a></li>
        <li><a href="index.php?ctlr=board&action=index">Tableau de bord</a></li>
    </ul>
    <form action="index.php" method="post">
        <input type="hidden" name="ctlr" value="sejours">
        <input type="hidden" name="action" value="store">

        <label for="sejour-date">Date du séjour: </label>
        <input id="sejour-date" type="date" name="date" value="false">
        <?php if(isset($_SESSION['error']['date'])) : ?><b><p style="color:red">Veuillez saisir une date valide</p></b><?php endif; ?>
        <?php if(isset($_SESSION['error']['number'])) : ?><b><p style="color:red">Le chenil est déjà complet pour cette date</p></b><?php endif; ?>
        <?php if(isset($_SESSION['error']['doublon'])) : ?><b><p style="color:red">Animal déjà enregistré à cette date</p></b><?php endif; ?>

        <br>
        <label for="sejour-animal">Animal concerné: </label>
        <select name="animal_id" id="sejour-animal">
            <?php foreach($animals as $animal): ?>
                <option value="<?= $animal->id ?>"><?= $animal->nom; ?></option>
            <?php endforeach; ?>       
        </select>
        <br>
        <input type="submit" value="Créer le séjour">
    </form>
</body>
</html>
<?php var_dump($_SESSION); session_destroy(); ?>