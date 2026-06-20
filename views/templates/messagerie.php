<div class="messagerieBlocDroit">
    <div class="messagerieBlocTitre">
        <h1>Messagerie</h1>
    </div>

<?php foreach ($conversations as $conversation) {?>

<?php
    if ($conversation->getIdEnvoyeur() == $_SESSION['idUser']) {
    // Si user connecté a envoyé le dernier message
    // → l'interlocuteur est le RECEVEUR
    $nomInterlocuteur   = $conversation->getReceveurName();
    $photoInterlocuteur = $conversation->getReceveurPicture();
    $idInterlocuteur    = $conversation->getIdReceveur();
    } else {
    // Si c'est l'autre qui a envoyé le dernier message
    // → l'interlocuteur est l'ENVOYEUR
    $nomInterlocuteur   = $conversation->getEnvoyeurName();
    $photoInterlocuteur = $conversation->getEnvoyeurPicture();
    $idInterlocuteur    = $conversation->getIdEnvoyeur();
    }
    ?>

     <a href="index.php?action=message&idSender=<?php echo $idInterlocuteur; ?>">
        <article class="card" style="width: 200px; height: 200px; overflow: hidden;">
            <div class="blocImage">
                <img src="./pictures/users/<?php echo $photoInterlocuteur ?>"
                     style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
            </div>
            <div class="blocNameDate">
                <h6><?php echo $nomInterlocuteur; ?></h6>
                <p><?php echo $conversation->getDateMessage()->format('d.m H:i'); ?></p>
            </div>
            <p class="messageGris"><?php echo mb_strimwidth($conversation->getMessage(), 0, 30, '...'); ?></p>
        </article>
    </a>
<?php }?>

<div>
    <?php if ($interlocuteur) {?>
        <div class="chatHeader">
            <img src="./pictures/users/<?php echo $interlocuteur->getPicture(); ?>"
                 style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
            <h6><?php echo $interlocuteur->getName(); ?></h6>
        </div>
    <?php }?>

    <?php if (! empty($messages)) {?>
        <?php foreach ($messages as $message) {?>
            <?php if ($message->getIdEnvoyeur() == $interlocuteur->getId()) {?>
                <div class="blocImageDate" style="width: 200px; height: 200px; overflow: hidden;">
                    <img src="./pictures/users/<?php echo $message->getEnvoyeurPicture(); ?>"
                         style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                    <p><?php echo $message->getDateMessage()->format('d.m H:i'); ?></p>
                </div>
                <div class="blocMessageText">
                    <p><?php echo $message->getMessage(); ?></p>
                </div>
            <?php } else {?>
                <div class="blocImageDate" style="width: 200px; height: 200px; overflow: hidden;">
                    <p><?php echo $message->getDateMessage()->format('d.m H:i'); ?></p>
                </div>
                <div class="blocMessageText">
                    <p><?php echo $message->getMessage(); ?></p>
                </div>
            <?php }?>
        <?php }?>
    <?php }?>

    <div class="formMessage">
        <form action="index.php?action=sendMessage" method="POST">
            <input type="text" name="message" id="message" placeholder="Tapez votre message ici">
            <input type="hidden" name="interlocutorId" value="<?php echo $interlocuteur->getId(); ?>">
            <input type="hidden" name="userId" value="<?php echo $_SESSION['idUser'] ?>">
            <button class="submit">Envoyer</button>
        </form>
    </div>

</div>