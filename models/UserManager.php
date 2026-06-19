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
     * Récupère un user par son Id.
     * @param int $idUser
     * @return ?User
     */
    public function getUserById(int $idUser): ?User
    {
        $sql    = "SELECT * FROM user WHERE id = :id";
        $result = $this->db->query($sql, ['id' => $idUser]);
        $user   = $result->fetch();
        if ($user) {
            return new User($user);
        }
        return null;
    }

    /**
     * Récupère une origine temporelle d'un user depuis son id.
     * @param int $idUser
     * @return string
     */
    public function getUserSeniorityById(int $idUser): string
    {
        $sql    = "SELECT User.date_creation FROM user WHERE id = :id";
        $result = $this->db->query($sql, ['id' => $idUser]);
        $row    = $result->fetch();

        $bddDate = new DateTime($row['date_creation']);
        $nowDate = new DateTime("now");

        $diff = $bddDate->diff($nowDate);

        if ($diff->y > 0) {
            return "membre depuis {$diff->y} an(s)";
        } elseif ($diff->m > 0) {
            return "membre depuis {$diff->m} mois";
        } else {
            return "membre depuis {$diff->d} jours";
        }
    }

    /**
     * Enregistre un user dans la bdd
     * @param array le name, login et password de l'utilisateur qu'on veut créer
     * @return void
     */
    public function createUser(array $params = []): void
    {
        $sql = "INSERT INTO `user` ( `name`, `login`, `password`, `picture`, `date_creation`)
                VALUES ( :name, :login, :password, :picture, NOW())";

        $this->db->query($sql, [
            ':name'     => $params[0],
            ':login'    => $params[1],
            ':password' => password_hash($params[2], PASSWORD_DEFAULT),
            ':picture'  => 'none.png',
        ]);
    }

    /**
     * Enregistre un user dans la bdd
     * @param array le name, login et password de l'utilisateur qu'on veut créer
     * @return void
     */
    public function editUser(array $params = []): void
    {
        $sql = "UPDATE User
                SET name = :name , login = :login , password = :password
                WHERE id = :id ";

        $this->db->query($sql, [
            ':id'       => $params[0],
            ':name'     => $params[1],
            ':login'    => $params[2],
            ':password' => $params[3],
        ]);
    }

/**
 * Modifie la photo d'un utilisateur
 * @param array l'id de utilisateur qu'on veut modifier et le nom du fichier photo.
 * @return void
 */
    public function updatePhoto(int $userId, string $filename): void
    {
        $sql = "UPDATE user SET picture = :picture WHERE id = :id";

        $stmt = $this->db->query($sql, [
            ':id'      => $userId,
            ':picture' => $filename,
        ]);
    }
}
