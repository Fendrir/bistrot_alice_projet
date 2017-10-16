<<<<<<< HEAD
#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
DROP database if exists bistrot;
CREATE DATABASE bistrot;
USE bistrot;

#------------------------------------------------------------
# Table: admin
#------------------------------------------------------------

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
=======
Create database bistrot;

use bistrot;

create table admin
(
  adm_oid int auto_increment
    primary key,
  adm_nick varchar(25) null,
  adm_pwd varchar(100) null,
  constraint adm_nick
  unique (adm_nick, adm_pwd)
)
;

create table carte
(
  car_oid int auto_increment
    primary key,
  car_title varchar(50) null,
  car_img varchar(500) null,
  car_alt varchar(500) null
)
;

create table events_restau
(
  eve_oid int auto_increment
    primary key,
  eve_title varchar(50) null,
  eve_img varchar(500) null,
  eve_alt varchar(500) null,
  adm_oid int null,
  constraint FK_events_adm_oid
  foreign key (adm_oid) references admin (adm_oid)
)
;

create index FK_events_adm_oid
  on events_restau (adm_oid)
;

create table plat
(
  pla_oid int auto_increment
    primary key,
  pla_title varchar(50) null,
  pla_img varchar(500) null,
  pla_alt varchar(200) null,
  adm_oid int null,
  constraint FK_carte_adm_oid
  foreign key (adm_oid) references admin (adm_oid)
)
;

create index FK_carte_adm_oid
  on plat (adm_oid)
;

>>>>>>> 726eb1977eb33eeb784c2cb4ec5a9f778422568c
