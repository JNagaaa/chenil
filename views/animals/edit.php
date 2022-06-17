<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/chenil.css">
    <title><?= $animal->nom; ?></title>
</head>
<body>
<main role="main">
<header>
        <h1 class="header">L'Escale Canine</h1>
    </header>
    
    <nav>
    <ul class="nav">
        <li class="nav"><a href="index.php?ctlr=home&action=index">Accueil</a></li>
        <li class="nav"><a href="index.php?ctlr=animals&action=index">Animaux</a></li>
        <li class="nav"><a href="index.php?ctlr=people&action=index">Propriétaires</a></li>
        <li class="nav"><a href="index.php?ctlr=sejours&action=index">Séjours</a></li>
        <li class="nav"><a href="index.php?ctlr=board&action=index">Tableau de bord</a></li>
    </ul>
</nav>
    <h2 id="title">Modification de l'animal <?= $animal->nom ?></h2>
    <div id="form">
    <form action="index.php" method="post">
        <input type="hidden" name="id" value="<?= $animal->id ?>">
        <input type="hidden" name="ctlr" value="animals">
        <input type="hidden" name="action" value="update">
        <br>
        <label for="animal-name">Nom de l'animal: </label>
        <input id="animal-name" type="text" name="nom" value="<?= $animal->nom; ?>">
        <br>
        <label for="animal-gender">Sexe de l'animal: </label>
        <select id="animal-gender" type="text" name="sexe" value="<?= $animal->sexe ?>">
            <option value="Mâle">Mâle</option>
            <option value="Femelle">Femelle</option>
        </select>
        <br>
        <label for="animal-steri">Stérilisé: </label>
        <input id="animal-steri" type="checkbox" name="sterilise" <?php if($animal->sterilise == 1){echo "checked='checked'";} ?> value="1">
        <br>
        <label for="animal-chip">N° de puce: </label>
        <input id="animal-chip" type="text" name="puce" value="<?= $animal->puce; ?>">
        <br>
        <label for="animal-type">Type de l'animal: </label>
        <select id="animal-type" type="text" name="type" value="<?= $animal->type ?>">
            <option value="Chat">Chat</option>
            <option value="Chien">Chien</option>
            <option value="Oiseau">Oiseau</option>
        </select>
        <br>
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
        <br>
        <br>
        <input type="submit" value="Modifier">
    </form>
    </div>
</main>
</body>
</html>
