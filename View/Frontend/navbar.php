<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapse_target">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php"><i class="fas fa-home"></i><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=author">L'auteur</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=books">Les romans</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=episodes">Billet simple</a>
            </li>
            <?php
            if (isset($_SESSION['userPseudo']))
            {
            ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=contact">Contact</a>
            </li>
            <?php
            }
            ?>
        </ul>
    </div>
    <?php
    if (isset($_SESSION['userPseudo']))
    {
    ?>
    <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <?= $_SESSION['userPseudo'] ?>
        </button>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="index.php?action=profil">Mon profil</a>
            <a class="dropdown-item" href="index.php?action=deconnect">Se déconnecter</a>
        </div>
    </div>
    <?php
    }
    else
    {
    ?>
    <div class="connexion">
        <a href="index.php?action=connexion">Se connecter</a>
    </div>
    <?php
    }
    ?>
</nav>