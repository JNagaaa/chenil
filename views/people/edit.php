<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/chenil.css">
    <title><?= $person->nom; ?></title>
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
    <h2 id="title">Modification du propriétaire <?= $person->prenom ?> <?= $person->nom ?></h2>
    <div id="form">
      <fieldset style="text-align: center;">
        <legend>Veuillez rentrer les informations</legend>
        <form action="index.php" method="post">
        <input type="hidden" name="id" value="<?= $person->id ?>">
        <input type="hidden" name="ctlr" value="people">
        <input type="hidden" name="action" value="update">
        <label for="person-name">Nom du propriétaire: </label>
        <input id="person-name" type="text" name="nom" style="text-transform: capitalize;" value="<?= $person->nom; ?>">
        <?php if(isset($_SESSION['error']['name'])): ?><b><?php echo $_SESSION['error']['name'] ?></b><?php endif; ?>
        <br>
        <br>
        <label for="person-surname">Prénom du propriétaire: </label>
        <input id="person-surname" type="text" name="prenom" style="text-transform: capitalize;" value="<?= $person->prenom; ?>">
        <?php if(isset($_SESSION['error']['lastname'])): ?><b><?php echo $_SESSION['error']['lastname'] ?></b><?php endif; ?>
        <br>
        <br>
        <label for="person-birth">Date de naissance: </label>
        <input id="person-birth" type="date" name="naissance" value="<?= $person->naissance; ?>">
        <?php if(isset($_SESSION['error']['date'])): ?><b><?php echo $_SESSION['error']['date'] ?></b><?php endif; ?>
        <br>
        <br>
        <label for="person-mail">Adresse mail: </label>
        <input id="person-mail" type="text" name="mail" value="<?= $person->mail; ?>">
        <?php if(isset($_SESSION['error']['mailerror'])): ?><b><?php echo $_SESSION['error']['mailerror'] ?></b><?php endif; ?>
        <br>
        <br>
        <label for="person-phone">N° de téléphone: </label>
        <input id="person-phone" type="number" name="telephone" value="<?= $person->telephone; ?>">
        <?php if(isset($_SESSION['error']['phone'])): ?><b><?php echo $_SESSION['error']['phone'] ?></b><?php endif; ?>
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