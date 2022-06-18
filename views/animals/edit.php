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
        <fieldset>
            <legend>Veuillez rentrer les informations</legend>
        <input type="hidden" name="id" value="<?= $animal->id ?>">
        <input type="hidden" name="ctlr" value="animals">
        <input type="hidden" name="action" value="update">
        <label for="animal-name">Nom de l'animal: </label>
        <input id="animal-name" type="text" name="nom" value="<?= $animal->nom; ?>"> 
        <?php if(isset($_SESSION['error']['name'])): ?><b><?php echo $_SESSION['error']['name'] ?></b><?php endif; ?>
        <br>
        <br>
        <label for="animal-gender">Sexe de l'animal: </label>
        <select id="animal-gender" type="text" name="sexe" value="<?= $animal->sexe ?>">
            <option value="Mâle">Mâle</option>
            <option value="Femelle">Femelle</option>
        </select>
        <?php if(isset($_SESSION['error']['sexe'])): ?><b><?php echo $_SESSION['error']['sexe'] ?></b><?php endif; ?>
        <br>
        <br>
        <label for="animal-steri">Stérilisé: </label>
        <input id="animal-steri" type="checkbox" name="sterilise" <?php if($animal->sterilise == 1){echo "checked='checked'";} ?> value="1">
        <?php if(isset($_SESSION['error']['steri'])): ?><b><?php echo $_SESSION['error']['steri'] ?></b><?php endif; ?>
        <br>
        <br>
        <label for="animal-chip">N° de puce: </label>
        <input id="animal-chip" type="text" name="puce" value="<?= $animal->puce; ?>">
        <?php if(isset($_SESSION['error']['chip'])): ?><b><?php echo $_SESSION['error']['chip'] ?></b><?php endif; ?>
        <br>
        <br>
        <label for="animal-birth">Date de naissance: </label>
        <input type="date" id="animal-birth" name="naissance" value="<?= $animal->naissance ?>">
        <?php if(isset($_SESSION['error']['date'])): ?><b><?php echo $_SESSION['error']['date'] ?></b><?php endif; ?>
        <br>
        <br>
        <label for="animal-type">Type de l'animal: </label>
        <select id="animal-type" type="text" name="type" value="<?= $animal->type ?>">
            <option value="Chat">Chat</option>
            <option value="Chien">Chien</option>
            <option value="Oiseau">Oiseau</option>
        </select>
        <?php if(isset($_SESSION['error']['type'])): ?><b><?php echo $_SESSION['error']['type'] ?></b><?php endif; ?>
        <br>
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
        <?php if(isset($_SESSION['error']['person'])): ?><b><?php echo $_SESSION['error']['person'] ?></b><?php endif; ?>
        <br>
        <br>
        <input id="submit" type="submit" value="Modifier">
        </fieldset>
    </form>
    </div>
</main>
</body>
</html>
<?php session_destroy(); ?>