CREATE DATABASE bistrot;

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

create table video

(

  vid_oid int auto_increment

    primary key,

  vid_link varchar(1000) null

)

;

insert into carte (car_oid) VALUES (1);

insert into carte (car_oid) VALUES (2);

insert into carte (car_oid) VALUES (3);

insert into plat (pla_oid) VALUES (1);

insert into plat (pla_oid) VALUES (2);

insert into plat (pla_oid) VALUES (3);

insert into events_restau (eve_oid) VALUES (1);

insert into events_restau (eve_oid) VALUES (2);

insert into video (vid_oid) VALUES (1);

