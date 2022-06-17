<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/chenil.css">
    <title>Animaux</title>
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
   <?php if(isset($_SESSION['error'])): ?><b><p style="color:red">Les informations que vous avez tenté de modifier ne sont pas valides (<?php if(isset($_SESSION['error']['name'])): ?>nom<?php endif; if(count($_SESSION['error']) == 2): ?>, <?php endif; if(isset($_SESSION['error']['chip'])): ?>puce<?php endif; ?>)</p></b><?php endif; ?>
    <h2 id="title">Animaux enregistrés:</h2>
    <?php if (isset($animals) && !empty($animals)): ?>
        <ul>
            <?php foreach($animals as $animal): ?>
                <li><a href="index.php?ctlr=animals&action=show&id=<?= $animal->id; ?>"><?= $animal->nom; ?></a></li><br>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>Aucun animal n'est encore enregistré!</p>
    <?php endif; ?>
    <?php if(isset($_SESSION['key'])): ?>
        <b><p style="color:red">Supprimez d'abord les séjours affiliés à l'animal</p></b>
    <?php endif; ?>
    <div id="form">
    <form action="index.php" method="GET">
        <input type="hidden" name="ctlr" value="animals">
        <input type="hidden" name="action" value="create">
        <input id="submit" type="submit" value="Ajouter un animal">
    </form>
    </div>
    <br> 
    <?php session_destroy(); ?>
</main>
</body>
</html>