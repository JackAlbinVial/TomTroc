<div class="messagerieBlocDroit">

    <div class="messagerieListe">
        <div class="messagerieBlocTitre">
            <h2>Messagerie</h2>
        </div>

        <?php foreach ($conversations as $conversation) {?>
            <?php
                if ($conversation->getIdEnvoyeur() == $_SESSION['idUser']) {
                    $nomInterlocuteur   = $conversation->getReceveurName();
                    $photoInterlocuteur = $conversation->getReceveurPicture();
                    $idInterlocuteur    = $conversation->getIdReceveur();
                } else {
                    $nomInterlocuteur   = $conversation->getEnvoyeurName();
                    $photoInterlocuteur = $conversation->getEnvoyeurPicture();
                    $idInterlocuteur    = $conversation->getIdEnvoyeur();
                }
                ?>
            <a href="index.php?action=message&idSender=<?php echo $idInterlocuteur; ?>">
                <article class="conv <?php echo($interlocuteur && $interlocuteur->getId() == $idInterlocuteur) ? 'conv-active' : '' ?>">
                    <div class="blocImage">
                        <img src="./pictures/users/<?php echo $photoInterlocuteur ?>"/>
                    </div>
                    <div class="blocNameDateMessage">
                        <div class="blocNameDate">
                            <h6><?php echo $nomInterlocuteur; ?></h6>
                            <p><?php echo $conversation->getDateMessage()->format('H:i'); ?></p>
                        </div>
                        <p class="messageGris"><?php echo mb_strimwidth($conversation->getMessage(), 0, 30, '...'); ?></p>
                    </div>
                </article>
            </a>
        <?php }?>
    </div>

    <div class="chatColonne">
        <?php if ($interlocuteur) {?>
            <div class="chatHeader">
                <img src="./pictures/users/<?php echo $interlocuteur->getPicture(); ?>"/>
                <h6><?php echo $interlocuteur->getName(); ?></h6>
            </div>

        <div class="chatMessages">
            <?php if (! empty($messages)) {?>
                <?php foreach ($messages as $message) {?>
                    <?php if ($message->getIdEnvoyeur() == $interlocuteur->getId()) {?>
                        <div class="messageRecu">
                            <div class="blocImageDate">
                                <img src="./pictures/users/<?php echo $message->getEnvoyeurPicture(); ?>"/>
                                <p><?php echo $message->getDateMessage()->format('d.m H:i'); ?></p>
                            </div>
                            <div class="blocMessageText">
                                <p><?php echo $message->getMessage(); ?></p>
                            </div>
                        </div>
                    <?php } else {?>
                        <div class="messageEnvoye">
                            <div class="blocImageDate">
                                <p><?php echo $message->getDateMessage()->format('d.m H:i'); ?></p>
                            </div>
                            <div class="blocMessageText">
                                <p><?php echo $message->getMessage(); ?></p>
                            </div>
                        </div>
                    <?php }?>
                <?php }?>
            <?php }?>
        </div>

        <div class="formMessage">
            <form action="index.php?action=sendMessage" method="POST">
                <input type="text" name="message" id="message" placeholder="Tapez votre message ici">
                <input type="hidden" name="interlocutorId" value="<?php echo $interlocuteur->getId(); ?>">
                <input type="hidden" name="userId" value="<?php echo $_SESSION['idUser'] ?>">
                <button class="submit">Envoyer</button>
            </form>
        </div>
    </div>
    <?php } else {?>
        <div class="chatEmpty">
            <p>Sélectionnez une conversation pour commencer à discuter.</p>
        </div>
    <?php }?>

</div>