#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: admin
#------------------------------------------------------------
DROP database if exists bistrot;
CREATE DATABASE bistrot;
USE bistrot;

CREATE TABLE admin(
  adm_oid  int (11) Auto_increment  NOT NULL ,
  adm_nick Varchar (25) ,
  adm_pwd  Varchar (100) ,
  PRIMARY KEY (adm_oid ) ,
  UNIQUE (adm_nick ,adm_pwd )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: carte
#------------------------------------------------------------

CREATE TABLE carte(
  car_oid   int (11) Auto_increment  NOT NULL ,
  car_title Varchar (50) ,
  car_img   Blob ,
  adm_oid   Int ,
  PRIMARY KEY (car_oid )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: events
#------------------------------------------------------------

CREATE TABLE events(
  eve_oid   int (11) Auto_increment  NOT NULL ,
  eve_title Varchar (50) ,
  eve_img   Blob ,
  adm_oid   Int ,
  PRIMARY KEY (eve_oid )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: images
#------------------------------------------------------------

CREATE TABLE images(
  img_oid   int (11) Auto_increment  NOT NULL ,
  img_num   Int ,
  img_title Varchar (50) ,
  img_desc  Varchar (500) ,
  img_img   Blob ,
  adm_oid   Int ,
  PRIMARY KEY (img_oid ) ,
  UNIQUE (img_num )
)ENGINE=InnoDB;

ALTER TABLE carte ADD CONSTRAINT FK_carte_adm_oid FOREIGN KEY (adm_oid) REFERENCES admin(adm_oid);
ALTER TABLE events ADD CONSTRAINT FK_events_adm_oid FOREIGN KEY (adm_oid) REFERENCES admin(adm_oid);
ALTER TABLE images ADD CONSTRAINT FK_images_adm_oid FOREIGN KEY (adm_oid) REFERENCES admin(adm_oid);