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
(3, 'Sas634', 'Sas634@mail.com', '$2y$10$OefkCWfcDo.GKgFS2qmFYuITgzdDsrBp67p2.IrJOutZ9ptcsKCb.', 'Sas634.jpg', '2025-06-06 16:29:40'),
(4, 'user', 'user@mail.com', '$2y$10$OefkCWfcDo.GKgFS2qmFYuITgzdDsrBp67p2.IrJOutZ9ptcsKCb.', 'none.png', '2025-06-06 16:29:40');

Drop Table if exists `Livre`;
Create Table if not exists `Livre` (
`id` int NOT NULL AUTO_INCREMENT,
`photo` varchar(255) NOT NULL,
`titre` varchar(255) NOT NULL,
`auteur` varchar(255) NOT NULL,
`description` text NOT NULL,
`disponibilite` varchar(13) NOT NULL,
`dateAjout` datetime NOT NULL,
`idProprietaire` int references User.id,
PRIMARY KEY (`id`)
);

INSERT INTO `Livre` (`id`,`photo`,`titre`,`auteur`,`description`,`disponibilite`,`dateAjout`,`idProprietaire`) VALUES
(1,'Kinkfolk_Table.jpg','Kinkfolk Table','Nathan Williams','LoremIpsum Dolor Sit Amet', 'disponible','2025-06-06 16:29:40', 1),
(2,'Kinkfolk_Table.jpg','Kinkfolk Table','Nathan Williams','LoremIpsum Dolor Sit Amet', 'disponible','2025-06-06 16:29:40', 1),
(3,'Kinkfolk_Table.jpg','Kinkfolk Table','Nathan Williams','LoremIpsum Dolor Sit Amet', 'disponible','2025-06-06 16:29:40', 1),
(4,'Kinkfolk_Table.jpg','Kinkfolk Table','Nathan Williams','LoremIpsum Dolor Sit Amet', 'disponible','2025-06-06 16:29:40', 1);

Drop Table if exists `Message`;
Create Table if not exists `Message` (
`id` int NOT NULL AUTO_INCREMENT,
`message` text NOT NULL,
`read` boolean NOT NULL,
`idEnvoyeur` int references User.id,
`idReceveur` int references User.id,
`dateMessage` datetime NOT NULL,
PRIMARY KEY (`id`)
);

INSERT INTO `Message` (`id`,`message`,`read`,`idEnvoyeur`,`idReceveur`,`dateMessage`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', true, 4, 2,'2025-08-21 15:44:00'),
(2, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', false, 2, 4,'2025-08-21 15:48:00'),
(3, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', true, 1, 4,'2025-08-21 20:08:00'),
(4, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', true, 3, 4,'2025-08-21 15:08:00');
