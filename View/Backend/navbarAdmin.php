<button class="navbar-toggler" data-toggle="collapse" data-target="#collapseAdmin_target">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="collapseAdmin_target">
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="index.php?action=admin">Administration<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=editEpisode">Editer un épisode</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=messaging">Messagerie</a>
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
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="index.php?action=profilAdmin">Mon profil</a>
        <a class="dropdown-item" href="index.php?action=deconnect">Se déconnecter</a>
    </div>
</div>
<?php
}
?>