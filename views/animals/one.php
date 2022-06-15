<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $animal->nom; ?></title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="scripts/script.js"></script>
</head>
<body>
    <a href="http://chenil/index.php?ctlr=animals&action=index">Retour à la liste des animaux</a>
    <h2><?= $animal->nom; ?></h2>
    <p>Sexe: <?= $animal->sexe ?></p>
    <p>Stérilisé: <?php if($animal->sterilise == 1): ?>Oui <?php else: ?> Non</p><?php endif; ?>
    <p>Numéro de puce: <?= $animal->puce ?></p>
    <p>Type de l'animal: <?= $animal->type ?></p>
    <h4>Séjours de <?= $animal->nom ?>: </h4>
    <?php if($animal->sejours) : ?>
    <?php foreach($animal->sejours as $otherSejour): ?>
               <li><a href="index.php?ctlr=sejours&action=show&id=<?= $otherSejour->id; ?>"><?= $otherSejour->date; ?></a></li>
               <?php //endif; ?>
               <?php endforeach; ?>
            <?php else: ?>
                <?php echo "Test"; ?>
                <?php endif; ?>

    <br>
    <?php
    include('../models/entities/Strategy.php');
    if($animal->type == "Chat"){
        $cat = new Cat();
        $cat->speak(); $cat->size(); $cat->location();
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