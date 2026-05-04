Drop Database if exists `tom_troc`;
Create Database if not exists `tom_troc`;
Use `tom_troc`;

Drop Table if exists `Utilisateur`;
Create Table if not exists `Utilisateur` (
`id` int NOT NULL AUTO_INCREMENT,
`pseudo` varchar(255) NOT NULL,
`email` varchar(255) NOT NULL,
`motdepasse` varchar(255) NOT NULL,
`image` varchar(255) NOT NULL,
`date_creation` datetime NOT NULL,
PRIMARY KEY (`id`)
);

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
