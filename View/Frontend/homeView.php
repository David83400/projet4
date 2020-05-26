<?php $this->title = 'Jean Forteroche | Blog officiel' ?>

<section id="slider">
  <div></div>
  <div>
      <a href="#"><h2>Un récit jubilatoire rempli d'amour et de partage</h2></a>
  </div>
  <div></div>
</section>
<section>
  <article>
    <h3>Chers visiteurs,</h3>
    <p>J'ai voulu partager avec vous l'écriture de mon nouveau roman dans son format numérique épisode après épisode. Nous pourrons ainsi voyager ensemble dans des contrées merveilleuses. Vous partagerez avec moi les aventures extraordinaires de Balthazar en Alaska.
    Bonne lecture à vous tous.
    </p>
    <p>Jean Forteroche</p>
  </article>
</section>
<?php foreach ($lastEpisode as $lastEpisode): ?>
<article>
  <header>
    <a href="<?= "index.php?action=episode&id=" . htmlspecialchars($lastEpisode['id']) ?>">
      <h1><?= htmlspecialchars($lastEpisode['title']) ?></h1>
    </a>
    <p>Publié par Jean Forteroche le <?= htmlspecialchars($lastEpisode['creationFrDate']) ?></p>
  </header>
  <p><?= htmlspecialchars(substr($lastEpisode['content'], 0, 250)) . ' ...' . '<a href="#">lire la suite</a>' ?></p>
</article>
<?php endforeach; ?>
<section>
  <h2>Mes derniers récits</h2>
  <ul>
    <li>
      <figure>
        <a href="#"><img src="Public/images/aLaRechercheDuBonheur.png" alt="livre de Jean Forteroche" /></a>
        <figcaption>

        </figcaption>
      </figure>
    </li>
    <li>
      <figure>
        <a href="#"><img src="Public/images/elleALaPecheMamie.png" alt="livre de Jean Forteroche" /></a>
        <figcaption>

        </figcaption>
      </figure>
    </li>
    <li>
      <figure>
        <a href="#"><img src="Public/images/elleEstDailleurs.png" alt="livre de Jean Forteroche" /></a>
        <figcaption>

        </figcaption>
      </figure>
    </li>
    <li>
      <figure>
        <a href="#"><img src="Public/images/jeLaimeAMourir.png" alt="livre de Jean Forteroche" /></a>
        <figcaption>

        </figcaption>
      </figure>
    </li>
    <li>
      <figure>
        <a href="#"><img src="Public/images/leHurlement.png" alt="livre de Jean Forteroche" /></a>
        <figcaption>

        </figcaption>
      </figure>
    </li>
    <li>
      <figure>
        <a href="#"><img src="Public/images/jeLuiDiraiDesMotsBleus.png" alt="livre de Jean Forteroche" /></a>
        <figcaption>

        </figcaption>
      </figure>
    </li>
    <li>
      <figure>
        <a href="#"><img src="Public/images/jiraiTeDecrocherLaLune.png" alt="livre de Jean Forteroche" /></a>
        <figcaption>

        </figcaption>
      </figure>
    </li>
    <li>
      <figure>
        <a href="#"><img src="Public/images/laTeteDansLesEtoiles.png" alt="livre de Jean Forteroche" /></a>
        <figcaption>

        </figcaption>
      </figure>
    </li>
    <li>
      <figure>
        <a href="#"><img src="Public/images/lesRevesDeSophie.png" alt="livre de Jean Forteroche" /></a>
        <figcaption>

        </figcaption>
      </figure>
    </li>
    <li>
      <figure>
        <a href="#"><img src="Public/images/unTangoAHuwan.png" alt="livre de Jean Forteroche" /></a>
        <figcaption>

        </figcaption>
      </figure>
    </li>
    <li>
      <figure>
        <a href="#"><img src="Public/images/vousEtesTresBeau.png" alt="livre de Jean Forteroche" /></a>
        <figcaption>

        </figcaption>
      </figure>
    </li>
    <li>
      <figure>
        <a href="#"><img src="Public/images/wilfriedEtLesLucioles.png" alt="livre de Jean Forteroche" /></a>
        <figcaption>

        </figcaption>
      </figure>
    </li>
  </ul>
</section>
