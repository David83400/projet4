<?php ob_start(); ?>
<?php $this->title = 'Jean Forteroche | Messagerie' ?>
<div class="container">
    <?php if (isset($_SESSION['flash']))
    { ?>
    <?php foreach($_SESSION['flash'] as $type => $success): ?>
    <div class="alert-flash">
        <h2><?= $success; ?></h2>
    <?php endforeach; ?>
    <?php unset($_SESSION['flash']); ?>
    </div>
    <?php } ?>
    <section id="messaging">
        <p><a href="index.php?action=admin">Retour à la page d'administration</a></p>
        <article>
            <div class="row">  
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <header class="text-center">
                                <h1>Liste des messages reçus</h1>
                            </header>
                            <table class="table table-striped table-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <?php
                                        if ((isset($message['flagMessage'])) && ($message['flagMessage'] == 1))
                                        {
                                        ?>
                                        <?php
                                        } ?>
                                        <th scope="col">Pseudo</th>
                                        <th scope="col">Membre depuis</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Envoyé le</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($messages as $message): ?>
                                    <tr>
                                        <th scope="col"><?= $message['userPseudo'] ?>
                                        <?php
                                        if ((isset($message['flagMessage'])) && ($message['flagMessage'] == 1))
                                        {
                                        ?><span class="alert alert-danger">Nouveau</span>
                                        <?php
                                        } ?>
                                        </th>
                                        <td><?= $message['inscriptionFrDate'] ?></td>
                                        <td><?= substr($message['userMessage'], 0, 25) ?></td>
                                        <td><?= $message['messageFrDate'] ?></td>
                                        <td>
                                            <a class="editer" href="index.php?action=editMessaging&id=<?= $message['idMessage'] ?>">éditer</a>
                                            <a onclick="return confirm('Voulez vous vraiment supprimer ce contenu ?');" href="index.php?action=deleteMessage&id=<?= $message['idMessage'] ?>">supprimer</a>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>
</div>