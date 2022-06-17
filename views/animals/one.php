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
    <ul>
        <li><a href="index.php?ctlr=animals&action=index">Animaux</a></li>
        <li><a href="index.php?ctlr=people&action=index">Propriétaires</a></li>
        <li><a href="index.php?ctlr=sejours&action=index">Séjours</a></li>
        <li><a href="index.php?ctlr=board&action=index">Tableau de bord</a></li>
    </ul>
    <h2><?= $animal->nom; ?></h2>
    <p>Sexe: <?= $animal->sexe ?></p>
    <p>Stérilisé: <?php if($animal->sterilise == 1): ?>Oui <?php else: ?> Non</p><?php endif; ?>
    <p>Numéro de puce: <?= $animal->puce ?></p>
    <p>Type de l'animal: <?= $animal->type ?></p>
    <div id=updateDelete>
    <form action="index.php" method="GET">
        <input type="hidden" name="ctlr" value="animals">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?= $animal->id; ?>">
        <input type="submit" value="Modifier">
    </form>        
    
    <form action="index.php" method="POST">
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
        <button class="infosone">Autres animaux de <?= $animal->person->prenom ?> <?= $animal->person->nom ?></button>
        <h4 id='titleotheranimals'></h4>
        <div id="infosone">
        <ul id="listotheranimals">

            <?php foreach($animal->person->animals as $other_animal): ?>
            <?php if ($other_animal->nom !== $animal->nom): ?>
                <li><a href="index.php?ctlr=animals&action=show&id=<?= $other_animal->id; ?>"><?= $other_animal->nom ?></a></li>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
        </ul>

</body>
</html>