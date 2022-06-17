<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $person->prenom; ?> <?= $person->nom; ?></title>
    <link rel="stylesheet" href="css/chenil.css">
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
<h2 id="title"><?= $person->prenom; ?> <?= $person->nom ?></h2>
<p>Date de naissance: <?= str_replace('-', '/', date('d-m-Y', strtotime($person->naissance))) ?></p>
<p>Adresse mail: <?= $person->mail ?></p>
<p>Numéro de téléphone: 0<?= substr($person->telephone, 0, 3) . "/" . substr($person->telephone,3, 2) . "." . substr($person->telephone,5,2) . "." . substr($person->telephone,7); ?></p>
<div id="updateDelete">
<form action="index.php" method="GET">
        <input type="hidden" name="ctlr" value="people">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?= $person->id; ?>">
        <input type="submit" value="Modifier">
    </form>        
    
    <form onsubmit="return confirm('Voulez-vous vraiment supprimer ce propriétaire?');" action="index.php" method="POST">
        <input type="hidden" name="ctlr" value="people">
        <input type="hidden" name="action" value="destroy">
        <input type="hidden" name="id" value="<?= $person->id; ?>">
        <input type="submit" value="Supprimer">
    </form>
    </div>
    <ul>
        <?php if($person->animals): ?>
        <h3>Animaux de ce propriétaire:</h3>
        <?php foreach($person->animals as $animal): ?>
            <li><a href="index.php?ctlr=animals&action=show&id=<?= $animal->id; ?>"><?= $animal->nom ?></a></li>
        <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</main>
</body>
</html>  