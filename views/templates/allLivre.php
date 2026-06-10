<div class="blocCentral">
    <h2>Nos livres à l’échange</h2>

    <div class="livreAjouter">
        <?php foreach ($livres as $livre) {?>
            <a href="#">
                <article class="card">
                    <img src="./pictures/books/<?php echo $livre->getPhoto() ?>" alt="Image d'un livre"/>
                    <div class="card-content">
                        <div class="card-txt">
                            <h3 class="card-title"><?php echo $livre->getTitre() ?></h3>
                            <p class="card-author"><?php echo $livre->getAuteur() ?></p>
                            <p class="greyTxt">Vendu par : <?php echo $livre->getProprietaireName() ?></p>
                        </div>
                    </div>
                </article>
            </a>
        <?php }?>
    </div>

</div>