CREATE TABLE UserType (
id INT NOT NULL AUTO_INCREMENT,
type INT NOT NULL,
description VARCHAR(100) NOT NULL,
PRIMARY KEY (id)
);
INSERT INTO `usertype`(`id`, `type`,`description`) VALUES ('1','0','Admin');
INSERT INTO `usertype`(`id`, `type`,`description`) VALUES ('2','1','Owner');
INSERT INTO `usertype`(`id`, `type`,`description`) VALUES ('3','1','User');

CREATE TABLE Users (
idUser INT NOT NULL AUTO_INCREMENT,
idType INT(1) DEFAULT 3,
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
PRIMARY KEY (idUser),
FOREIGN KEY (idType) REFERENCES UserType(id)
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
FOREIGN KEY (idOwner) REFERENCES Users(idUser)
);
CREATE TABLE Projects_Comparticipation (
id INT NOT NULL AUTO_INCREMENT,
idProject INT NOT NULL,
idUser INT NOT NULL,
value DECIMAL(10,2) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (idProject) REFERENCES ProjectsFinal(idProject),
FOREIGN KEY (idUser) REFERENCES Users(idUser)
);
CREATE TABLE Projects_FullReaders (
idProject INT NOT NULL,
idUser INT NOT NULL,
FinalDate DATE NOT NULL,
PRIMARY KEY (idProject,idUser),
FOREIGN KEY (idProject) REFERENCES ProjectsFinal(idProject),
FOREIGN KEY (idUser) REFERENCES Users(idUser)
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
FOREIGN KEY (idProject) REFERENCES ProjectsFinal(idProject),
FOREIGN KEY (idSender) REFERENCES Users(idUser),
FOREIGN KEY (idReceiver) REFERENCES Users(idUser)
);
