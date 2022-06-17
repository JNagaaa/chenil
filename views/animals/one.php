<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="scripts/script.js"></script>
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
    <h2 id="title"><?= $animal->nom; ?></h2>
    <p>Sexe: <?= $animal->sexe ?></p>
    <p>Stérilisé: <?php if($animal->sterilise == 1): ?>Oui <?php else: ?> Non</p><?php endif; ?>
    <p>Numéro de puce: <?= $animal->puce ?></p>
    <p>Date de naissance: <?= $animal->naissance ?></p>
    <p>Type de l'animal: <?= $animal->type ?></p>
    <div id=updateDelete>
    <form action="index.php" method="GET">
        <input type="hidden" name="ctlr" value="animals">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?= $animal->id; ?>">
        <input type="submit" value="Modifier">
    </form>        
    
    <form onsubmit="return confirm('Voulez-vous vraiment supprimer cet animal?');" action="index.php" method="POST">
        <input type="hidden" name="ctlr" value="animals">
        <input type="hidden" name="action" value="destroy">
        <input type="hidden" name="id" value="<?= $animal->id; ?>">
        <input type="submit" value="Supprimer">
    </form>
    </div>
    <h3>Séjours planifiés: </h3>
    <?php if($animal->sejours) : ?>
    <?php foreach($animal->sejours as $otherSejour): ?>
               <li><a href="index.php?ctlr=sejours&action=show&id=<?= $otherSejour->id; ?>"><?= $otherSejour->date; ?></a></li>
               <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun séjour de prévu pour <?= $animal->nom; ?>. <a href="index.php?ctlr=sejours&action=create">En planifier un</a>
                <?php endif; ?>

    <br>
    <?php
    include('../models/entities/Strategy.php');
    if($animal->type == "Chat"){
        $cat = new Cat();
        echo"<p>";$cat->speak(); $cat->size(); $cat->location();echo"</p>";
    }else if($animal->type == "Chien"){
        $dog = new Dog();
        $dog->speak(); $dog->size(); $dog->location();
    }else if($animal->type == "Oiseau"){
        $bird = new Bird();
        $bird->speak(); $bird->size(); $bird->location();
    }
    ?>

    <?php if ($animal->person): ?>
        <h3>Propriétaire: <a href="index.php?ctlr=people&action=show&id=<?= $animal->person->id ?>"><?= $animal->person->prenom; ?> <?= $animal->person->nom ?></h3></a>
        <?php else: false; ?>
    <?php endif; ?>
        <h3>Autres animaux de ce propriétaire:</h3>
            <?php foreach($animal->person->animals as $other_animal): ?>
            <?php if ($other_animal->nom !== $animal->nom): ?>
                <li><a href="index.php?ctlr=animals&action=show&id=<?= $other_animal->id; ?>"><?= $other_animal->nom ?></a></li>
            <?php else: ?>
                <p>Pas d'autre animal</p>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
        </ul>
</main>
</body>
</html>