Drop Database if exists `tom_troc`;
Create Database if not exists `tom_troc`;
Use `tom_troc`;

Drop Table if exists `User`;
Create Table if not exists `User` (
`id` int NOT NULL AUTO_INCREMENT,
`role` int NOT NULL,
`name` varchar(255) NOT NULL,
`login` varchar(255) NOT NULL,
`password` varchar(255) NOT NULL,
`picture` varchar(255) NOT NULL,
`date_creation` datetime NOT NULL,
PRIMARY KEY (`id`)
);

INSERT INTO `user` (`id`, `role`, `name`, `login`, `password`, `picture`,`date_creation`) VALUES
(1, 1, 'UserTest', 'user@test.fr', '$2y$10$OefkCWfcDo.GKgFS2qmFYuITgzdDsrBp67p2.IrJOutZ9ptcsKCb.', 'none', '2023-09-06 16:29:40'),
(2, 0, 'AdminTest', 'Admin@test.fr', '$2y$10$OefkCWfcDo.GKgFS2qmFYuITgzdDsrBp67p2.IrJOutZ9ptcsKCb.', 'none', '2023-09-06 16:29:40');

Drop Table if exists `Livre`;
Create Table if not exists `Livre` (
`id` int NOT NULL AUTO_INCREMENT,
`photo` varchar(255) NOT NULL,
`titre` varchar(255) NOT NULL,
`auteur` varchar(255) NOT NULL,
`description` text NOT NULL,
`disponibilite` varchar(12) NOT NULL,
`id_proprietaire` int references Utilisateur.id,
`id_locataire` int references Utilisateur.id,
PRIMARY KEY (`id`)
);

Drop Table if exists `Message`;
Create Table if not exists `Message` (
`id` int NOT NULL AUTO_INCREMENT,
`message` text NOT NULL,
`disponibilite` varchar(12) NOT NULL,
`id_emetteur` int references Utilisateur.id,
`id_receveur` int references Utilisateur.id,
`date_creation` datetime NOT NULL,
`date_message` datetime NOT NULL,
PRIMARY KEY (`id`)
);
