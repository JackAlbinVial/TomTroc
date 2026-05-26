<?php

/**
 * Entité User : un user est défini par son id, un login et un password.
 */
class User extends AbstractEntity
{
    private int $role;
    private string $name;
    private string $login;
    private string $password;
    private string $picture;
    private ?DateTime $dateCreation = null;

/**
 * Setter pour le role.
 * @param int $role
 */public function setRole(int $role): void
    {
        $this->role = $role;
    }

/**
 * Getter pour le role.
 * @return int
 */
    public function getRole(): int
    {
        return $this->role;
    }

/**
 * Setter pour le name.
 * @param string $name
 */public function setName(string $name): void
    {
        $this->name = $name;
    }

/**
 * Getter pour le name.
 * @return string
 */
    public function getName(): string
    {
        return $this->Name;
    }

/**
 * Setter pour le login.
 * @param string $login
 */public function setLogin(string $login): void
    {
        $this->login = $login;
    }

/**
 * Getter pour le login.
 * @return string
 */
    public function getLogin(): string
    {
        return $this->login;
    }

/**
 * Setter pour le password.
 * @param string $password
 */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

/**
 * Getter pour le password.
 * @return string
 */
    public function getPassword(): string
    {
        return $this->password;
    }

/**
 * Setter pour la photo.
 * @param string $picture
 */public function setPicture(string $picture): void
    {
        $this->picture = $picture;
    }

/**
 * Getter pour la photo.
 * @return string
 */
    public function getPicture(): string
    {
        return $this->picture;
    }

/**
 * Setter pour la date de création. Si la date est une string, on la convertit en DateTime.
 * @param string|DateTime $dateCreation
 * @param string $format : le format pour la convertion de la date si elle est une string.
 * Par défaut, c'est le format de date mysql qui est utilisé.
 */
    public function setDateCreation(string | DateTime $dateCreation, string $format = 'Y-m-d H:i:s'): void
    {
        if (is_string($dateCreation)) {
            $dateCreation = DateTime::createFromFormat($format, $dateCreation);
        }
        $this->dateCreation = $dateCreation;
    }

/**
 * Getter pour la date de création.
 * Grâce au setter, on a la garantie de récupérer un objet DateTime.
 * @return DateTime
 */
    public function getDateCreation(): DateTime
    {
        return $this->dateCreation;
    }
}
