<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/chenil.css">
    <title>Ajout propriétaire</title>
</head>
<body>
    <ul>
        <li><a href="index.php?ctlr=animals&action=index">Animaux</a></li>
        <li><a href="index.php?ctlr=people&action=index">Propriétaires</a></li>
        <li><a href="index.php?ctlr=sejours&action=index">Séjours</a></li>
        <li><a href="index.php?ctlr=board&action=index">Tableau de bord</a></li>
    </ul>
  <form action="index.php" method="post">
    <input type="hidden" name="ctlr" value="people">
    <input type="hidden" name="action" value="store">
    <?php if(isset($_SESSION['error']['doublon'])): ?><b><p style="color:red">Ce propriétaire est déjà enregistré</p></b><?php endif; ?>

    <label for="person-name">Nom du propriétaire: </label>
    <input id="person-name" type="text" name="nom" style="text-transform: capitalize;" value="">
    <?php if(isset($_SESSION['error']['name'])): ?><b><p style="color:red">Veuillez saisir un nom valide</p></b><?php endif; ?>
    <br>
    <label for="person-surname">Prénom du propriétaire: </label>
    <input id="person-surname" type="text" name="prenom" style="text-transform: capitalize;" value="">
    <?php if(isset($_SESSION['error']['lastname'])): ?><b><p style="color:red">Veuillez saisir un prénom valide</p></b><?php endif; ?>
    <br>
    <label for="person-birth">Date de naissance: </label>
    <input type="date" id="person-birth" name="naissance" value="">
    <?php if(isset($_SESSION['error']['date'])): ?><b><p style="color:red">Veuillez sélectionner une date valide</p></b><?php endif; ?>
    <br>
    <label for="person-mail">Adresse mail: </label>
    <input id="person-mail" type="text" name="mail" value="">
    <?php if(isset($_SESSION['error']['mailerror'])): ?><b><p style="color:red">Veuillez saisir une adresse mail valide</p></b><?php endif; ?>
    <br>
    <label for="person-phone">Numéro de téléphone belge: </label>
    <input type="number" id="person-phone" name="telephone" value="">
    <?php if(isset($_SESSION['error']['phone'])): ?><b><p style="color:red">Veuillez saisir un numéro de téléphone (belge) valide</p></b><?php endif; ?>
    <br>
    <input type="submit" value="Enregistrer">
  </form>
</body>
</html>
<?php session_destroy(); ?>
