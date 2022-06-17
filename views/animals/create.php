<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/chenil.css">
    <title>Ajout animal</title>
</head>
<body>
    <ul>
        <li><a href="index.php?ctlr=animals&action=index">Animaux</a></li>
        <li><a href="index.php?ctlr=people&action=index">Propriétaires</a></li>
        <li><a href="index.php?ctlr=sejours&action=index">Séjours</a></li>
        <li><a href="index.php?ctlr=board&action=index">Tableau de bord</a></li>
    </ul>
    <div id="form">
    <form action="index.php" method="post">
        <input type="hidden" name="ctlr" value="animals">
        <input type="hidden" name="action" value="store">

        <label for="animal-name">Nom de l'animal: </label>
        <input id="animal-name" type="text" name="nom" style="text-transform: capitalize;" value="">
        <?php if(isset($_SESSION['error']['name'])): ?><b><?php echo $_SESSION['error']['name'] ?></b><?php endif; ?>
        <br>
        <label for="animal-gender">Sexe de l'animal: </label>
        <select id="animal-gender" type="text" name="sexe" value="">
            <option value="Mâle">Mâle</option>
            <option value="Femelle">Femelle</option>
        </select>
        <?php if(isset($_SESSION['error']['sexe'])): ?><b><?php echo $_SESSION['error']['sexe'] ?></b><?php endif; ?>
        <br>
        <label for="animal-steri">Stérilisé: </label>
        <input type="checkbox" id="animal-steri" name="sterilise" value="1">
        <?php if(isset($_SESSION['error']['steri'])): ?><b><?php echo $_SESSION['error']['steri'] ?></b><?php endif; ?>
        <br>
        <label for="animal-chip">N° de puce: </label>
        <input id="animal-chip" type="text" name="puce" value="">
        <?php if(isset($_SESSION['error']['chip'])): ?><b><?php echo $_SESSION['error']['chip'] ?></b><?php endif; ?>
        <br>
        <label for="animal-type">Type de l'animal: </label>
        <select id="animal-type" type="text" name="type" value="">
            <option value="Chat">Chat</option>
            <option value="Chien">Chien</option>
            <option value="Oiseau">Oiseau</option>
        </select>
        <?php if(isset($_SESSION['error']['type'])): ?><b><?php echo $_SESSION['error']['type'] ?></b><?php endif; ?>
        <br>
        <label for="animal-proprio">Propriétaire de l'animal</label>
        <select name="person_id" id="animal-proprio">
            <?php foreach($people as $person): ?>
                <option value="<?= $person->id ?>"><?= $person->prenom ?> <?= $person->nom; ?></option>
            <?php endforeach; ?>       
        </select>
        <?php if(isset($_SESSION['error']['person'])): ?><b><?php echo $_SESSION['error']['person'] ?></b><?php endif; ?>
        <br>
        <input type="submit" value="Enregistrer l'animal">
    </form>
    </div>
</body>
</html>

<?php session_destroy(); ?>
