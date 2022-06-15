<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $sejour->date; ?></title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="hidden" name="ctlr" value="sejours">
        <input type="hidden" name="action" value="store">

        <label for="sejour-date">Date du séjour: </label>
        <input id="sejour-date" type="date" name="date" value="">
        <?php if(isset($_SESSION['error']['date'])) : ?><b><p style="color:red">Veuillez saisir une date valide</p></b><?php endif; ?>
        <?php if(isset($_SESSION['error']['number'])) : ?><b><p style="color:red">Le chenil est déjà complet pour cette date</p></b><?php endif; ?>

        <br>
        <label for="sejour-animal">Animal concerné: </label>
        <select name="animal_id" id="sejour-animal">
            <?php foreach($animals as $animal): ?>
                <option value="<?= $animal->id ?>"><?= $animal->nom; ?></option>
            <?php endforeach; ?>       
        </select>
        <input type="submit">
    </form>
</body>
</html>
<?php var_dump($_SESSION); session_destroy(); ?>
