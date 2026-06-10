<?php
/**
 * Contrôleur général des livre.
 */

class LivreController
{
/**
 * Affiche la page d'accueil.
 * @return void
 */
    public function showHome(): void
    {
        $livreManager = new LivreManager();
        $livres       = $livreManager->getLastLivres();

        $view = new View("Accueil");
        $view->render("accueil", ['livres' => $livres]);
    }

/**
 * Affiche la page Nos Livres à l'échange.
 * @return void
 */
    public function showBooks(): void
    {
        $livreManager = new LivreManager();
        $livres       = $livreManager->getAllLivres();

        $view = new View("Nos Livres");
        $view->render("allLivre", ['livres' => $livres]);
    }

/**
 * Affiche la page Nos Livres à l'échange.
 * @return void
 */
    public function searchBooks(): void
    {
        $livreManager = new LivreManager();
        $livres       = $livreManager->getAllLivres();

        $view = new View("Nos Livres");
        $view->render("allLivre", ['livres' => $livres]);
    }
}
