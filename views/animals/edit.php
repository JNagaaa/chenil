<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $animal->nom; ?></title>
</head>
<body>
 <form action="index.php" method="post">
   <input type="hidden" name="id" value="<?= $animal->id ?>">
   <input type="hidden" name="ctlr" value="animals">
   <input type="hidden" name="action" value="update">
   
   <label for="animal-name">Nom de l'animal: </label>
   <input id="animal-name" type="text" name="nom" value="<?= $animal->nom; ?>">
   
   <label for="animal-gender">Sexe de l'animal: </label>
   <select id="animal-gender" type="text" name="sexe" value="<?= $animal->type ?>">
    <option value="Mâle">Mâle</option>
    <option value="Femelle">Femelle</option>
    </select>

   <label for="animal-steri">Stérilisé: </label>
   <input id="animal-steri" type="checkbox" name="sterilise" value="1">

   <label for="animal-chip">N° de puce: </label>
   <input id="animal-chip" type="text" name="puce" value="<?= $animal->puce; ?>">

   <label for="animal-type">Type de l'animal: </label>
   <select id="animal-type" type="text" name="type" value="<?= $animal->type ?>">
    <option value="Chat">Chat</option>
    <option value="Chien">Chien</option>
    <option value="Oiseau">Oiseau</option>
    </select>

   <label for="animal-proprio">Propriétaire de l'animal: </label>
   <select name="person_id" id="animal-proprio">
        <?php foreach($people as $person): ?>
           <?php if ($animal->person && $person->id == $animal->person->id): ?>
               <option selected value="<?= $person->id ?>"><?= $person->prenom; ?> <?= $person->nom; ?></option>
           <?php else: ?>
               <option value="<?= $person->id ?>"><?= $person->prenom ?> <?= $person->nom; ?></option>
           <?php endif; ?>
           <?php endforeach; ?>       
   </select>
   <input type="submit">
    </form>
</body>
</html>
