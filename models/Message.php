<?php
/*
* Entité Message, un message est défini par les champs suivant :
*id, message, read, idEnvoyeur, idReceveur, dateMessage
*
*/
class Message extends AbstractEntity
{
    //Donnée envoyée à la Bdd
    private string $message        = "";
    private bool $read             = false;
    private int $idEnvoyeur        = 0;
    private int $idReceveur        = 0;
    private ?DateTime $dateMessage = null;

    //Donnée non envoyée à la bdd, pour eviter les doublons
    private string $envoyeurName    = "";
    private string $envoyeurPicture = "";

    /**
     * Setter pour le message.
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * Getter pour le message.
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Setter pour le read.
     * @param bool $read
     */
    public function setRead(bool $read): void
    {
        $this->read = $read;
    }

    /**
     * Getter pour le read.
     * @return bool
     */
    public function getRead(): bool
    {
        return $this->read;
    }

    /**
     * Setter pour l'idEnvoyeur.
     * @param int $idEnvoyeur
     */
    public function setIdEnvoyeur(int $idEnvoyeur): void
    {
        $this->idEnvoyeur = $idEnvoyeur;
    }

    /**
     * Getter pour l'idEnvoyeur.
     * @return int
     */
    public function getIdEnvoyeur(): int
    {
        return $this->idEnvoyeur;
    }

    /**
     * Setter pour l'idReceveur.
     * @param int $idReceveur
     */
    public function setIdReceveur(int $idReceveur): void
    {
        $this->idReceveur = $idReceveur;
    }

    /**
     * Getter pour l'idReceveur.
     * @return int
     */
    public function getIdReceveur(): int
    {
        return $this->idReceveur;
    }

    /**
     * Setter pour la date de création. Si la date est une string, on la convertit en DateTime.
     * @param string|DateTime $dateMessage
     * @param string $format : le format pour la convertion de la date si elle est une string.
     * Par défaut, c'est le format de date mysql qui est utilisé.
     */
    public function setDateMessage(string | DateTime $dateMessage, string $format = 'Y-m-d H:i:s'): void
    {
        if (is_string($dateMessage)) {
            $dateMessage = DateTime::createFromFormat($format, $dateMessage);
        }
        $this->dateMessage = $dateMessage;
    }

    /**
     * Getter pour la date de création.
     * Grâce au setter, on a la garantie de récupérer un objet DateTime.
     * @return DateTime
     */
    public function getDateMessage(): DateTime
    {
        return $this->dateMessage;
    }

    //Donnée de l'objet non envoyée à la bdd

    /**
     * Setter pour le nom de l'envoyeur
     * @param string $envoyeurName
     */
    public function setEnvoyeurName(string $envoyeurName): void
    {
        $this->envoyeurName = $envoyeurName;
    }

    /**
     * Getter pour le nom de l'envoyeur.
     * @return string
     */
    public function getEnvoyeurName(): string
    {
        return $this->envoyeurName;
    }

    /**
     * Setter pour la photo de l'envoyeur
     * @param string $envoyeurPicture
     */
    public function setEnvoyeurPicture(string $envoyeurPicture): void
    {
        $this->envoyeurPicture = $envoyeurPicture;
    }

    /**
     * Getter pour la photo de l'envoyeur.
     * @return string
     */
    public function getEnvoyeurPicture(): string
    {
        return $this->envoyeurPicture;
    }
}
