CREATE TABLE utente (
  nome varchar(30) NOT NULL,
  cognome varchar(30) NOT NULL,
  email varchar(60) NOT NULL,
  username varchar(40) NOT NULL,
  password varchar(30) NOT NULL,
  Pimage varchar(300) NOT NULL,
  PRIMARY KEY (username)
) Engine = InnoDB;

 CREATE TABLE post (
  username varchar(50) DEFAULT NULL,
  titolo varchar(40) DEFAULT NULL,
 url_img varchar(250) DEFAULT NULL
) Engine = InnoDB;

CREATE TABLE giocaconme (
  user_proprietario varchar(40) NOT NULL,
  user_main varchar(40) NOT NULL,
  titolo varchar(60) NOT NULL,
  PRIMARY KEY (user_proprietario, user_main, titolo)
) Engine = InnoDB;