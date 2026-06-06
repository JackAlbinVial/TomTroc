<?php

/**
 * Classe qui gère les Livres.
 */
class LivreManager extends AbstractEntityManager
{
    /**
     * Récupère tous les livres disponibles.
     * @return array : un tableau d'objets Livre.
     */
    public function getAllLivresAvailable(): array
    {
        $sql = "SELECT Livre.*
                FROM Livre
                WHERE Livre.disponibilite = TRUE
                ORDER BY Livre.dateAjout";

        $result = $this->db->query($sql);
        $livres = [];
        while ($livre = $result->fetch()) {
            $livres[] = new Livre($livre);
        }
        return $livres;
    }

    /**
     * Récupère tous les livres d'un utilisateur.
     * @param int $idUser
     * @return array : un tableau d'objets Livre.
     */
    public function getAllLivresByIdUser(int $idUser): array
    {
        $sql = "SELECT Livre.*
                FROM Livre
                WHERE Livre.idProprietaire = :idUser
                ORDER BY Livre.dateAjout";

        $result = $this->db->query($sql, ['idUser' => $idUser]);
        $livres = [];
        while ($livre = $result->fetch()) {
            $livres[] = new Livre($livre);
        }
        return $livres;
    }

    /**
     * Compte tous les livres d'un utilisateur.
     * @param int $idUser
     * @return int :le nombre de Livres.
     */
    public function countAllLivresByUser(int $idUser): int
    {
        $sql = "SELECT COUNT(*)
                FROM Livre
                WHERE Livre.idProprietaire = :idUser";

        $result = $this->db->query($sql, ['idUser' => $idUser]);

        $row = $result->fetch();

        return (int) $row['COUNT(*)'];
    }

    /**
     * Récupère un livre par son id.
     * @param int $id : l'id du livre.
     * @return Livre|null : un objet Livre ou null si le livre n'existe pas.
     */
    public function getLivreById(int $id): ?Livre
    {
        $sql    = "SELECT * FROM Livre WHERE id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $livre  = $result->fetch();
        if ($livre) {
            return new Livre($livre);
        }
        return null;
    }

    /**
     * Modifie un livre.
     * @param Livre $livre : livre à modifier.
     * @return void
     */
    public function updateLivre(Livre $livre): void
    {
        $sql = "UPDATE livre
                SET photo = :photo,
                    titre = :titre,
                    auteur = :auteur,
                    description = :description,
                    disponibilite = :disponibilite,
                WHERE id = :id";

        $this->db->query($sql, [
            'photo'         => $livre->getPhoto(),
            'titre'         => $livre->getTitre(),
            'auteur'        => $livre->getAuteur(),
            'description'   => $livre->getDescription(),
            'disponibilite' => $livre->getDisponibilite(),
            'id'            => $livre->getId(),
        ]);
    }

    /**
     * Ajoute ou modifie un livre.
     * @param Livre $livre : le livre à ajouter ou modifier.
     * @return void
     */
    public function addOrUpdateLivre(Livre $livre): void
    {
        if ($livre->getId() == -1) {
            $this->addLivre($livre);
        } else {
            $this->updateLivre($livre);
        }
    }

    /**
     * Ajoute un livre.
     * @param Livre $livre : le livre à ajouter.
     * @return void
     */
    public function addLivre(Livre $livre): void
    {
        $sql = "INSERT
                INTO Livre (photo, titre, auteur, description, disponibilite, idProprietaire, idLocataire, dateAjout)
                VALUES (:photo, :titre, :auteur, :description, :disponibilite, :idProprietaire, 0, NOW())";
        $this->db->query($sql, [
            'photo'          => $livre->getPhoto(),
            'titre'          => $livre->getTitre(),
            'auteur'         => $livre->getAuteur(),
            'description'    => $livre->getDescription(),
            'disponibilite'  => $livre->getDisponibilite(),
            'idProprietaire' => $livre->getIdProprietaire(),
        ]);
    }

    /**
     * Supprime un livre.
     * @param int $id : l'id du livre à supprimer.
     * @return void
     */
    public function deleteLivre(int $id): void
    {
        $sql = "DELETE FROM Livre WHERE id = :id";
        $this->db->query($sql, ['id' => $id]);
    }
}
