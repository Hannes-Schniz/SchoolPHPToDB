CREATE DATABASE if not exists schwarzesBrett;

use schwarzesBrett;

CREATE TABLE if not exists inserent(inserentennummer int primary key not null auto_increment, name char(50), email varchar(255), nummer char(15));

CREATE TABLE if not exists anzeige(anzeigenummer int primary key not null auto_increment, anzeigetext varchar(255), anzeigeueberschrift char(50), anzeigedatum date, inseretennummer int, Foreign key (inseretennummer) references inserent(inserentennummer));

CREATE TABLE if not exists anzeigerubrik(rubriknummer int primary key not null auto_increment, bezeichnung char(100));

CREATE TABLE if not exists rubrikzuordnung(id int primary key not null auto_increment, anzeigenummer int, rubriknummer int, foreign key (anzeigenummer) references anzeige(anzeigenummer), foreign key (rubriknummer) references anzeigerubrik(rubriknummer));

