<div class="blocCentral">
    <div class="blocHead">
    <h2>Nos livres à l’échange</h2>
    <form action="index.php" method="GET">
        <input type="hidden" name="action" value="searchBook">
        <i class="fi fi-rr-search"></i>
        <input type="text" name="search" id="search" placeholder="Rechercher un livre" required>
        <button class="submit" style="display: none;"></button>
    </form>

    <div class="livreAjouter">
        <?php foreach ($livres as $livre) {?>
            <a href="#">
                <article class="card" style="height:250px; width: 50%;">
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
</div>