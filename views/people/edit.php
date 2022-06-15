<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $person->nom; ?></title>
</head>
<body>
 <form action="index.php" method="post">
   <input type="hidden" name="id" value="<?= $person->id ?>">
   <input type="hidden" name="ctlr" value="people">
   <input type="hidden" name="action" value="update">
   
   <label for="person-name">Nom du propriétaire: </label>
   <input id="person-name" type="text" name="nom" style="text-transform: capitalize;" value="<?= $person->nom; ?>">
   
   <label for="person-surname">Prénom du propriétaire: </label>
   <input id="person-surname" type="text" name="prenom" style="text-transform: capitalize;" value="<?= $person->prenom; ?>">

   <label for="person-birth">Date de naissance: </label>
   <input id="person-birth" type="date" name="naissance" value="<?= $person->naissance; ?>">

   <label for="person-mail">Adresse mail: </label>
   <input id="person-mail" type="text" name="mail" value="<?= $person->mail; ?>">

   <label for="person-phone">N° de téléphone: </label>
   <input id="person-phone" type="number" name="telephone" value="<?= $person->telephone; ?>">
   <input type="submit">
    </form>
</body>
</html>
