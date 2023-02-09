
CREATE TABLE Users (
idUser INT NOT NULL AUTO_INCREMENT,
idType INT(1) DEFAULT 1,
firstName varchar(50) DEFAULT NULL,
lastName varchar(50) DEFAULT NULL,
birthdayDate date DEFAULT NULL,
genre char(1) DEFAULT NULL,
email varchar(100) DEFAULT NULL,
token varchar(20) CHARACTER SET utf8 DEFAULT NULL,
emailValidation INT(1) DEFAULT 0,
password varchar(300) DEFAULT NULL,
dateCreated datetime DEFAULT NULL,
dateModified datetime DEFAULT NULL,
status INT(1) NOT NULL DEFAULT 0,
nif VARCHAR(255) NOT NULL,
PRIMARY KEY (idUser)
);
INSERT INTO `users` (`idType`, `firstName`, `lastName`, `birthdayDate`, `genre`, `email`, `token`, `emailValidation`, `password`, `dateCreated`, `dateModified`, `status`, `nif`) VALUES
(2, 'Filipe', 'Ferreira', '1987-06-12', 'M', 'filipecbr@gmail.com', 'c4b0df2812', 1, '1111', '2023-02-07 11:40:06', NULL, 1, '25545884112');
INSERT INTO `users` (`idType`, `firstName`, `lastName`, `birthdayDate`, `genre`, `email`, `token`, `emailValidation`, `password`, `dateCreated`, `dateModified`, `status`, `nif`) VALUES
(2, 'Abel', 'Araujo', '1987-06-12', 'M', 'abel.araujo@startwithus.com', 'c4b0df2812', 1, '1111', '2023-02-07 11:40:06', NULL, 1, '25545284112');
INSERT INTO `users` (`idType`, `firstName`, `lastName`, `birthdayDate`, `genre`, `email`, `token`, `emailValidation`, `password`, `dateCreated`, `dateModified`, `status`, `nif`) VALUES
(2, 'Alberta', 'Rodrigues', '1977-06-12', 'F', 'alberta.rodrigues@startwithus.com', 'c4b0df2812', 1, '1111', '2023-02-07 11:40:06', NULL, 1, '25445884112');
INSERT INTO `users` (`idType`, `firstName`, `lastName`, `birthdayDate`, `genre`, `email`, `token`, `emailValidation`, `password`, `dateCreated`, `dateModified`, `status`, `nif`) VALUES
(2, 'Owner1', 'Owner1', '1977-06-12', 'F', 'owner1@startwithus.com', 'c4b0df2812', 1, '1111', '2023-02-07 11:40:06', NULL, 1, '25445884112');
INSERT INTO `users` (`idType`, `firstName`, `lastName`, `birthdayDate`, `genre`, `email`, `token`, `emailValidation`, `password`, `dateCreated`, `dateModified`, `status`, `nif`) VALUES
(2, 'Owner2', 'Owner2', '1977-06-12', 'F', 'owner2@startwithus.com', 'c4b0df2812', 1, '1111', '2023-02-07 11:40:06', NULL, 1, '25445884112');
INSERT INTO `users` (`idType`, `firstName`, `lastName`, `birthdayDate`, `genre`, `email`, `token`, `emailValidation`, `password`, `dateCreated`, `dateModified`, `status`, `nif`) VALUES
(2, 'Angel1', 'Angel1', '1977-06-12', 'M', 'angel1@startwithus.com', 'c4b0df2812', 1, '1111', '2023-02-07 11:40:06', NULL, 1, '25445884112');
INSERT INTO `users` (`idType`, `firstName`, `lastName`, `birthdayDate`, `genre`, `email`, `token`, `emailValidation`, `password`, `dateCreated`, `dateModified`, `status`, `nif`) VALUES
(2, 'Angel2', 'Angel2', '1977-06-12', 'M', 'angel2@startwithus.com', 'c4b0df2812', 1, '1111', '2023-02-07 11:40:06', NULL, 1, '25445884112');


CREATE TABLE Projects (
idProject INT NOT NULL AUTO_INCREMENT,
projectName VARCHAR(255) NOT NULL,
idOwner INT NOT NULL,
initialDate DATE NOT NULL,
summaryDescription VARCHAR(255) NOT NULL,
extendedDescription TEXT NOT NULL,
raiseObjective DECIMAL(10,2) NOT NULL,
expertNeeds VARCHAR(255) NOT NULL,
PRIMARY KEY (idProject),
FOREIGN KEY (idOwner) REFERENCES Users(idUser)
);
INSERT INTO `projects`(`idOwner`, `projectName`, `initialDate`, `summaryDescription`, `extendedDescription`, `raiseObjective`, `expertNeeds`) VALUES ('9',  'Nome do Projecto 1',   '2023-02-07 11:40:06','Descrição Sumária do Projeto do Owner 1','Descrição extensiva do projeto Owner 1]','10000','N');
INSERT INTO `projects`(`idOwner`, `projectName`, `initialDate`, `summaryDescription`, `extendedDescription`, `raiseObjective`, `expertNeeds`) VALUES ('9',  'Nome do Projecto 2',   '2023-02-07 11:40:06','Descrição Sumária do segundo Projeto Owner 1','Descrição extensiva do segundo projeto Owner 1','20000','N');
INSERT INTO `projects`(`idOwner`, `projectName`, `initialDate`, `summaryDescription`, `extendedDescription`, `raiseObjective`, `expertNeeds`) VALUES ('10', 'Nome do Projecto 3',   '2023-02-07 11:40:06','Descrição Sumária do Projeto do Owner 2','Descrição extensiva do projeto do Owner 2','35000','N');
CREATE TABLE Projects_Comparticipation (
id INT NOT NULL AUTO_INCREMENT,
idProject INT NOT NULL,
idUser INT NOT NULL,
value DECIMAL(10,2) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (idProject) REFERENCES Projects(idProject),
FOREIGN KEY (idUser) REFERENCES Users(idUser)
);
INSERT INTO `projects_comparticipation`(`idProject`, `idUser`, `value`) VALUES ('2','6','2000');

CREATE TABLE Projects_FullReaders (
idProject INT NOT NULL,
idUser INT NOT NULL,
FinalDate DATE NOT NULL,
PRIMARY KEY (idProject,idUser),
FOREIGN KEY (idProject) REFERENCES Projects(idProject),
FOREIGN KEY (idUser) REFERENCES Users(idUser)
);
INSERT INTO `projects_fullreaders`(`idProject`, `idUser`, `FinalDate`) VALUES ('2','6','2023-04-07 11:40:06');
INSERT INTO `projects_fullreaders`(`idProject`, `idUser`, `FinalDate`) VALUES ('3','6','2023-04-07 11:40:06');



CREATE TABLE Experts (
id INT NOT NULL AUTO_INCREMENT,
idProject INT NOT NULL,
idExpert INT NOT NULL,
expertTitle VARCHAR(255) NOT NULL,
smallDescription VARCHAR(255) NOT NULL,
extendedDescription TEXT NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (idProject) REFERENCES Projects(idProject)
);
INSERT INTO `experts`(`idProject`, `idExpert`, `expertTitle`, `smallDescription`, `extendedDescription`) VALUES ('2','2','WebDesigner','Criação de Site estático','Criação de site estático com 4 páginas');
CREATE TABLE Messages (
id INT NOT NULL AUTO_INCREMENT,
idProject INT NOT NULL,
idAction int Not NULL,
idSender INT NOT NULL,
idReceiver INT NOT NULL,
sendDate DATE NOT NULL,
type VARCHAR(255) NOT NULL,
proposalValue DECIMAL(10,2) NOT NULL,
proposalPercentage DECIMAL(5,2) NOT NULL,
counterProposalValue DECIMAL(10,2) NOT NULL,
counterProposalPercentage DECIMAL(5,2) NOT NULL,
Accept TINYINT(1) NOT NULL,
PaymentConfirmed TINYINT(1) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (idProject) REFERENCES Projects(idProject),
FOREIGN KEY (idSender) REFERENCES Users(idUser),
FOREIGN KEY (idReceiver) REFERENCES Users(idUser)
);
INSERT INTO `messages`(`idProject`, `idAction`, `idSender`, `idReceiver`, `sendDate`, `type`, `proposalValue`, `proposalPercentage`, `counterProposalValue`, `counterProposalPercentage`, `Accept`, `PaymentConfirmed`) VALUES ('2','6','6','6','2023-01-07 11:40:06','','1000','5','','','0','0');
INSERT INTO `messages`(`idProject`, `idAction`, `idSender`, `idReceiver`, `sendDate`, `type`, `proposalValue`, `proposalPercentage`, `counterProposalValue`, `counterProposalPercentage`, `Accept`, `PaymentConfirmed`) VALUES ('2','4','6','6','2023-01-010 11:40:06','','1000','5','2000','5','0','0');
INSERT INTO `messages`(`idProject`, `idAction`, `idSender`, `idReceiver`, `sendDate`, `type`, `proposalValue`, `proposalPercentage`, `counterProposalValue`, `counterProposalPercentage`, `Accept`, `PaymentConfirmed`) VALUES ('2','4','6','6','2023-01-15 11:40:06','','2000','5','','','1','1');
INSERT INTO `messages`(`idProject`, `idAction`, `idSender`, `idReceiver`, `sendDate`, `type`, `proposalValue`, `proposalPercentage`, `counterProposalValue`, `counterProposalPercentage`, `Accept`, `PaymentConfirmed`) VALUES ('3','6','6','6','2023-01-15 11:40:06','','2000','5','','','1','1');


