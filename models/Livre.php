<?php
/**
 * Entité Livre, un livre est défini par les champs suivants :
 * id, photo, titre, auteur, description, disponibilite,
 * dateAjout, idProprietaire, idLocataire
 */
class Livre extends AbstractEntity
{
    private string $photo        = "";
    private string $titre        = "";
    private string $auteur       = "";
    private string $description  = "";
    private bool $disponibilite  = false;
    private ?DateTime $dateAjout = null;
    private int $idProprietaire  = 0;

    /**
     * Setter pour la photo.
     * @param string $photo
     */
    public function setPhoto(string $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * Getter pour la photo.
     * @return string
     */
    public function getPhoto(): string
    {
        return $this->photo;
    }

    /**
     * Setter pour le titre.
     * @param string $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * Getter pour le titre.
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * Setter pour l'auteur'.
     * @param string $auteur
     */
    public function setAuteur(string $auteur): void
    {
        $this->auteur = $auteur;
    }

    /**
     * Getter pour l'auteur'.
     * @return string
     */
    public function getAuteur(): string
    {
        return $this->auteur;
    }

    /**
     * Setter pour la description.
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * Getter pour la description.
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Setter pour la disponibilite.
     * @param bool $disponibilite
     */
    public function setDisponibilite(bool $disponibilite): void
    {
        $this->disponibilite = $disponibilite;
    }

    /**
     * Getter pour la disponibilite.
     * @return string
     */
    public function getDisponibilite(): string
    {
        $disponibilite = $this->disponibilite;

        if ($disponibilite) {
            return 'disponible';
        } else {
            return 'non dispo.';
        }
    }

    /**
     * Setter pour la date d'ajout. Si la date est une string, on la convertit en DateTime.
     * @param string|DateTime $dateAjout
     * @param string $format : le format pour la convertion de la date si elle est une string.
     */
    public function setDateAjout(string | DateTime $dateAjout, string $format = 'Y-m-d H:i:s'): void
    {
        if (is_string($dateAjout)) {
            $dateAjout = DateTime::createFromFormat($format, $dateAjout);
        }
        $this->dateAjout = $dateAjout;
    }

    /**
     * Getter pour la date d'ajout.
     * @return DateTime
     */
    public function getDateAjout(): DateTime
    {
        return $this->dateCreation;
    }

    /**
     * Setter pour l'idProprietaire.
     * @param int $idProprietaire
     */
    public function setIdProprietaire(int $idProprietaire): void
    {
        $this->idProprietaire = $idProprietaire;
    }

    /**
     * Getter pour l'idProprietaire.
     * @return int
     */
    public function getIdProprietaire(): int
    {
        return $this->idProprietaire;
    }

}
