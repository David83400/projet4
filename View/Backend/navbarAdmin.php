<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse">
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
<div class="dropdown">
    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <?= $_SESSION['userPseudo'] ?>
    </button>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="index.php?action=profilAdmin">Mon profil</a>
        <a class="dropdown-item" href="index.php?action=deconnect">Se déconnecter</a>
    </div>
</div>