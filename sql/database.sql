create database ItalianoDb;

CREATE TABLE `profile` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` text  NOT NULL,
  `role` enum('user','admin','staff') NOT NULL,
  PRIMARY KEY (`id`)
);


CREATE TABLE status (
id int NOT null AUTO_INCREMENT,
    profileId int not null,
    token varchar(15),
    PRIMARY KEY(id)

);

CREATE TABLE ip(
    id INT AUTO_INCREMENT NOT NULL,
    ipAdress VARCHAR(255),
    browser varchar(255),
    os varchar(255),
    device varchar(255),
    loginAt TIMESTAMP,
    profileId text,
    PRIMARY KEY (id)
);

CREATE TABLE bookTable(
id int not null AUTO_INCREMENT,
    name varchar(255),
    phone int(15),
    email varchar(255),
    persons int(10),
    date varchar(250),
    info text,
    make timestamp,
    PRIMARY KEY (id)
    
);
