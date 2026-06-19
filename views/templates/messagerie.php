<div class="messagerieBlocDroit">
    <div class="messagerieBlocTitre">
        <h1>Messagerie</h1>
    </div>

<?php foreach ($conversations as $conversation) {?>
     <a href="index.php?action=message&idSender=<?php echo $conversation->getIdEnvoyeur() ?>">
        <article class="card" style="width: 200px; height: 200px; overflow: hidden;">
            <div class="blocImage">
                <img src="./pictures/users/<?php echo $conversation->getEnvoyeurPicture(); ?>"
                     style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
            </div>
            <div class="blocNameDate">
                <h6><?php echo $conversation->getEnvoyeurName(); ?></h6>
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

</div>