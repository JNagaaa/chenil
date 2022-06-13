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
