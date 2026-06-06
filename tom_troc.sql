Drop Database if exists `tom_troc`;
Create Database if not exists `tom_troc`;
Use `tom_troc`;

Drop Table if exists `User`;
Create Table if not exists `User` (
`id` int NOT NULL AUTO_INCREMENT,
`name` varchar(255) NOT NULL,
`login` varchar(255) NOT NULL,
`password` varchar(255) NOT NULL,
`picture` varchar(255) NOT NULL,
`date_creation` datetime NOT NULL,
PRIMARY KEY (`id`)
);

INSERT INTO `user` (`id`, `name`, `login`, `password`, `picture`,`date_creation`) VALUES
(1, 'nathalire', 'nathalire@mail.com', '$2y$10$OefkCWfcDo.GKgFS2qmFYuITgzdDsrBp67p2.IrJOutZ9ptcsKCb.', 'nathalire.jpg', '2025-06-06 16:29:40'),
(2, 'Alexlecture', 'Alexlecture@mail.com', '$2y$10$OefkCWfcDo.GKgFS2qmFYuITgzdDsrBp67p2.IrJOutZ9ptcsKCb.', 'Alexlecture.jpg', '2025-06-06 16:29:40'),
(3, 'Sas634', 'Sas634@mail.com', '$2y$10$OefkCWfcDo.GKgFS2qmFYuITgzdDsrBp67p2.IrJOutZ9ptcsKCb.', 'Sas634.jpg', '2025-06-06 16:29:40');

Drop Table if exists `Livre`;
Create Table if not exists `Livre` (
`id` int NOT NULL AUTO_INCREMENT,
`photo` varchar(255) NOT NULL,
`titre` varchar(255) NOT NULL,
`auteur` varchar(255) NOT NULL,
`description` text NOT NULL,
`disponibilite` boolean,
`dateAjout` datetime NOT NULL,
`idProprietaire` int references User.id,
PRIMARY KEY (`id`)
);

INSERT INTO `Livre` (`id`,`photo`,`titre`,`auteur`,`description`,`disponibilite`,`dateAjout`,`idProprietaire`) VALUES
(1,'Kinkfolk_Table.jpg','Kinkfolk Table','Nathan Williams','LoremIpsum Dolor Sit Amet', 1,'2025-06-06 16:29:40', 1),
(2,'Kinkfolk_Table.jpg','Kinkfolk Table','Nathan Williams','LoremIpsum Dolor Sit Amet', 1,'2025-06-06 16:29:40', 1),
(3,'Kinkfolk_Table.jpg','Kinkfolk Table','Nathan Williams','LoremIpsum Dolor Sit Amet', 1,'2025-06-06 16:29:40', 1),
(4,'Kinkfolk_Table.jpg','Kinkfolk Table','Nathan Williams','LoremIpsum Dolor Sit Amet', 1,'2025-06-06 16:29:40', 1);

Drop Table if exists `Message`;
Create Table if not exists `Message` (
`id` int NOT NULL AUTO_INCREMENT,
`message` text NOT NULL,
`disponibilite` varchar(12) NOT NULL,
`read` boolean NOT NULL,
`id_emetteur` int references Utilisateur.id,
`id_receveur` int references Utilisateur.id,
`date_message` datetime NOT NULL,
PRIMARY KEY (`id`)
);
