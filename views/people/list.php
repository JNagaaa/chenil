<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/chenil.css">
    <title>Propriétaires</title>
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
    <?php if (isset($people) && !empty($people)): ?>
        <h2 id="title">Propriétaires enregistrés:</h2>
        <ul>
            <?php foreach($people as $person): ?>
                <li><a href="index.php?ctlr=people&action=show&id=<?= $person->id; ?>"><?= $person->prenom ?> <?= $person->nom; ?></a></li><br>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>Aucun propriétaire n'est encore enregistré</p>
    <?php endif; ?>
    <?php if(isset($_SESSION['key'])): ?>
        <b><p style="color:red">Supprimez d'abord les animaux du propriétaire</p></b>
    <?php endif; ?>
    <div id="form">
    <form action="index.php" method="GET">
        <input type="hidden" name="ctlr" value="people">
        <input type="hidden" name="action" value="create">
        <input id="submit" type="submit" value="Ajouter un propriétaire">
    </form>
    </div>
    <br>
    <?php session_destroy(); ?>
</main>
</body>
</html>