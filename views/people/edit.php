<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/chenil.css">
    <title><?= $person->nom; ?></title>
</head>
<body>
    <ul>
        <li><a href="index.php?ctlr=animals&action=index">Animaux</a></li>
        <li><a href="index.php?ctlr=people&action=index">Propriétaires</a></li>
        <li><a href="index.php?ctlr=sejours&action=index">Séjours</a></li>
        <li><a href="index.php?ctlr=board&action=index">Tableau de bord</a></li>
    </ul>
    <form action="index.php" method="post">
        <input type="hidden" name="id" value="<?= $person->id ?>">
        <input type="hidden" name="ctlr" value="people">
        <input type="hidden" name="action" value="update">
        <label for="person-name">Nom du propriétaire: </label>
        <input id="person-name" type="text" name="nom" style="text-transform: capitalize;" value="<?= $person->nom; ?>">
        <br>
        <label for="person-surname">Prénom du propriétaire: </label>
        <input id="person-surname" type="text" name="prenom" style="text-transform: capitalize;" value="<?= $person->prenom; ?>">
        <br>
        <label for="person-birth">Date de naissance: </label>
        <input id="person-birth" type="date" name="naissance" value="<?= $person->naissance; ?>">
        <br>
        <label for="person-mail">Adresse mail: </label>
        <input id="person-mail" type="text" name="mail" value="<?= $person->mail; ?>">
        <br>
        <label for="person-phone">N° de téléphone: </label>
        <input id="person-phone" type="number" name="telephone" value="<?= $person->telephone; ?>">
        <br>
        <input type="submit" value="Modifier">
    </form>
</body>
</html>
