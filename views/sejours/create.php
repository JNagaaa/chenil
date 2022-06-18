<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/chenil.css">
    <title><?= $sejour->date; ?></title>
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
    <h2 id="title">Planification d'un séjour</h2>
    <div id="form">
        <form action="index.php" method="post">
            <fieldset>
                <legend>Veuillez rentrer les informations</legend>
            <input type="hidden" name="ctlr" value="sejours">
            <input type="hidden" name="action" value="store">

            <label for="sejour-date">Date du séjour: </label>
            <input type="date" id="sejour-date" name="date" value="">
            <?php if(isset($_SESSION['error']['date'])): ?><b><?php echo $_SESSION['error']['date'] ?></b><?php endif; ?>
            <?php if(isset($_SESSION['error']['number'])) : ?><b><p style="color:red">Le chenil est déjà complet pour cette date</p></b><?php endif; ?>
            <?php if(isset($_SESSION['error']['doublon'])) : ?><b><p style="color:red">Animal déjà enregistré à cette date</p></b><?php endif; ?>
            <br>
            </br>
            <label for="sejour-animal">Animal concerné: </label>
            <select name="animal_id" id="sejour-animal">
                <?php foreach($animals as $animal): ?>
                    <option value="<?= $animal->id ?>"><?= $animal->nom; ?></option>
                <?php endforeach; ?>       
            </select>
            <?php if(isset($_SESSION['error']['animal'])): ?><b><?php echo $_SESSION['error']['animal'] ?></b><?php endif; ?>
            <br>
            <br>
            <input id="submit" type="submit" value="Créer le séjour">
            </fieldset>
        </form>
    </nav>
    <?php session_destroy(); ?>
</main>
</body>
</html>
