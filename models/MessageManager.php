<?php
/**
 * Classe MessageManager pour gérer les requêtes liées aux messages.
 */

class MessageManager extends AbstractEntityManager
{
    /**
     * Récupère tous les messages et les trie en fonction de l'id du correspondant
     * @param int $idUser : l'id de l'utilisateur connecté
     * @return array : un tableau de messages
     */
    public function getAllConversationByIdUser(int $idUser): array
    {
        $sql = "SELECT Message.*,
                envoyeur.name AS envoyeurName,
                envoyeur.picture AS envoyeurPicture,
                receveur.name AS receveurName,
                receveur.picture AS receveurPicture
                FROM Message
                JOIN User AS envoyeur ON Message.idEnvoyeur = envoyeur.id
                JOIN User AS receveur ON Message.idReceveur = receveur.id
                WHERE Message.id IN (
                    SELECT MAX(id)
                    FROM Message
                    WHERE idEnvoyeur = :idUser
                    OR idReceveur = :idUser
                    GROUP BY
                    LEAST(idEnvoyeur, idReceveur),
                    GREATEST(idEnvoyeur, idReceveur)
                )
                ORDER BY Message.dateMessage DESC";

        $result        = $this->db->query($sql, ['idUser' => $idUser]);
        $conversations = [];
        while ($conversation = $result->fetch()) {
            $conversations[] = new Message($conversation);
        }
        return $conversations;
    }

    /**
     * Récupère tous les messages d'un seul correspondant et les trie en fonction de la date
     * @param int $idSender : l'id du correspondant
     * @param int $idUser : l'id de l'utilisateur connecté
     * @return array : un tableau de messages
     */
    public function getAllMessageByIdSender(int $idUser, int $idSender): array
    {
        $sql = "SELECT Message.*,
                envoyeur.name AS envoyeurName,
                envoyeur.picture AS envoyeurPicture
                FROM Message
                JOIN User AS envoyeur ON Message.idEnvoyeur = envoyeur.id
                WHERE (Message.idEnvoyeur = :idSender AND Message.idReceveur = :idUser)
                OR (Message.idEnvoyeur = :idUser AND Message.idReceveur = :idSender)
                ORDER BY Message.dateMessage ASC";

        $result = $this->db->query($sql, [
            'idUser'   => $idUser,
            'idSender' => $idSender,
        ]);

        $messages = [];
        while ($message = $result->fetch()) {
            $messages[] = new Message($message);
        }
        return $messages;
    }

    /**
     * Enregistre des messages dans la bdd.
     * @param int $idReciever : l'id du correspondant
     * @param int $idUser : l'id de l'utilisateur connecté
     * @return void
     */
    public function sendMessage(int $idUser, int $idReceveur, string $message): void
    {
        $sql = "INSERT INTO `Message` (`message`, `idEnvoyeur`, `idReceveur`, `dateMessage`)
                VALUES ( :message, :idEnvoyeur, :idReceveur, NOW())";

        $this->db->query($sql, [
            ':message'    => $message,
            ':idEnvoyeur' => $idUser,
            ':idReceveur' => $idReceveur,
        ]);
    }
}
