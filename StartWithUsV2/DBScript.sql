CREATE TABLE UserType (
id INT NOT NULL AUTO_INCREMENT,
type INT NOT NULL,
description VARCHAR(100) NOT NULL,https://github.com/danielrei-s/startwithus_v2/blob/master/StartWithUsV2/DBScript.sql
PRIMARY KEY (id)
);
INSERT INTO `usertype`(`id`, `type`,`description`) VALUES ('1','0','Admin');
INSERT INTO `usertype`(`id`, `type`,`description`) VALUES ('2','1','Owner');
INSERT INTO `usertype`(`id`, `type`,`description`) VALUES ('3','1','User');

CREATE TABLE Users (
id INT NOT NULL AUTO_INCREMENT,
idTipo INT NOT NULL,
name VARCHAR(255) NOT NULL,
nif VARCHAR(255) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (idTipo) REFERENCES UserType(id)
);
CREATE TABLE utilizadores (
id INT NOT NULL AUTO_INCREMENT,
idTipo INT NOT NULL,
username VARCHAR(255) NOT NULL,
primeiroNome VARCHAR(255) NOT NULL,
ultimoNome VARCHAR(255) NOT NULL,
dataNascimento DATE NOT NULL,
genero VARCHAR(1) NOT NULL,
email VARCHAR(255) NOT NULL,
token VARCHAR(10) NOT NULL,
dataCriacao DATE NOT NULL,
password VARCHAR(255) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (idTipo) REFERENCES UserType(id)
);
CREATE TABLE ProjectsFinal (
idProject INT NOT NULL AUTO_INCREMENT,
idOwner INT NOT NULL,
initialDate DATE NOT NULL,
summaryDescription VARCHAR(255) NOT NULL,
extendedDescription TEXT NOT NULL,
raiseObjective DECIMAL(10,2) NOT NULL,
expertNeeds VARCHAR(255) NOT NULL,
PRIMARY KEY (idProject),
FOREIGN KEY (idOwner) REFERENCES Users(id)
);
CREATE TABLE Projects_Comparticipation (
id INT NOT NULL AUTO_INCREMENT,
idProject INT NOT NULL,
idUser INT NOT NULL,
value DECIMAL(10,2) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (idProject) REFERENCES ProjectsFinal(idProject),
FOREIGN KEY (idUser) REFERENCES Users(id)
);
CREATE TABLE Projects_FullReaders (
idProject INT NOT NULL,
idUser INT NOT NULL,
FinalDate DATE NOT NULL,
PRIMARY KEY (idProject,idUser),
FOREIGN KEY (idProject) REFERENCES ProjectsFinal(idProject),
FOREIGN KEY (idUser) REFERENCES Users(id)
);
CREATE TABLE Experts (
id INT NOT NULL AUTO_INCREMENT,
idProject INT NOT NULL,
expertTitle VARCHAR(255) NOT NULL,
smallDescription VARCHAR(255) NOT NULL,
extendedDescription TEXT NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (idProject) REFERENCES ProjectsFinal(idProject)
);
CREATE TABLE Messages (
id INT NOT NULL AUTO_INCREMENT,
idProject INT NOT NULL,
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
FOREIGN KEY (idProject) REFERENCES ProjectsFinal(idProject),
FOREIGN KEY (idSender) REFERENCES Users(id),
FOREIGN KEY (idReceiver) REFERENCES Users(id)
);
