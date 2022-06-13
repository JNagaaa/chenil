<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajout animal</title>
</head>
<body>
 <form action="index.php" method="post">
   <input type="hidden" name="ctlr" value="animals">
   <input type="hidden" name="action" value="store">
   
   <label for="animal-name">Nom de l'animal: </label>
   <input id="animal-name" type="text" name="nom" value="">
   
   <label for="animal-gender">Sexe de l'animal: </label>
   <input id="animal-gender" type="text" name="sexe" value="">
  
   <label for="animal-steri">Stérilisé: </label>
   <input type="checkbox" id="animal-steri" name="sterilise" value="1">
  
   <label for="animal-chip">N° de puce: </label>
   <input id="animal-chip" type="text" name="puce" value="">
   
   <label for="animal-proprio">Propriétaire de l'animal</label>
   <select name="person_id" id="animal-proprio">
        <?php foreach($people as $person): ?>
            <option value="<?= $person->id ?>"><?= $person->prenom ?> <?= $person->nom; ?></option>
        <?php endforeach; ?>       
   </select>
   <input type="submit">
   </form>
</body>
</html>
