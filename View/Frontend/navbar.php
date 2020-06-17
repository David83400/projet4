<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse">
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
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=contact">Contact</a>
        </li>
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
