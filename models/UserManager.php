<?php

/**
 * Classe UserManager pour gérer les requêtes liées aux users et à l'authentification.
 */

class UserManager extends AbstractEntityManager
{
    /**
     * Récupère un user par son login.
     * @param string $login
     * @return ?User
     */
    public function getUserByLogin(string $login): ?User
    {
        $sql    = "SELECT * FROM user WHERE login = :login";
        $result = $this->db->query($sql, ['login' => $login]);
        $user   = $result->fetch();
        if ($user) {
            return new User($user);
        }
        return null;
    }

    /**
     * Enregistre un user dans la bdd
     * @param array le name, login et password de l'utilisateur qu'on veut créer
     * @return void
     */
    public function createUser(array $params = []): void
    {
        $sql = "INSERT INTO `user` (`role`, `name`, `login`, `password`, `picture`, `date_creation`)
                VALUES (:role, :name, :login, :password, :picture, NOW())";

        $this->db->query($sql, [
            ':role'     => 1,
            ':name'     => $params[0],
            ':login'    => $params[1],
            ':password' => password_hash($params[2], PASSWORD_DEFAULT),
            ':picture'  => 'none',
        ]);
    }
}
