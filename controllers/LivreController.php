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
 * Fonction recherche du formulaire la page Nos Livres à l'échange.
 * @return void
 */
    public function searchBooks(): void
    {
        $search = Utils::request("search");

        $livreManager = new LivreManager();
        $livres       = $livreManager->searchLivres($search);

        $view = new View("Nos Livres");
        $view->render("allLivre", ['livres' => $livres]);
    }

/**
 * Affiche la page détail d'un livre.
 * @return void
 */
    public function detailBook(): void
    {
        $id = Utils::request("id", -1);

        // On trouve le livre.
        $livreManager = new LivreManager();
        $livre        = $livreManager->getLivreById($id);

        // On trouve le proprietaire
        $userManager = new UserManager();
        $user        = $userManager->getUserById($livre->getIdProprietaire());

        $view = new View("Fiche de lecture");
        $view->render("detailLivre", [
            'livre' => $livre,
            'user'  => $user,
        ]);
    }
}
