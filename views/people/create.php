<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajout propriétaire</title>
</head>
<body>
 <form action="index.php" method="post">
   <input type="hidden" name="ctlr" value="people">
   <input type="hidden" name="action" value="store">
   
   <label for="person-name">Nom du propriétaire: </label>
   <input id="person-name" type="text" name="nom" style="text-transform: capitalize;" value="">
   
   <label for="person-surname">Prénom du propriétaire: </label>
   <input id="person-surname" type="text" name="prenom" style="text-transform: capitalize;" value="">
  
   <label for="person-birth">Date de naissance: </label>
   <input type="date" id="person-birth" name="naissance" value="">
  
   <label for="person-mail">Adresse mail: </label>
   <input id="person-mail" type="text" name="mail" value="">
   
   <label for="person-phone">Numéro de téléphone: </label>
   <input type="number" id="person-phone" name="telephone" value="">

   <input type="submit" value="Envoyer">
   </form>
</body>
</html>
