CREATE DATABASE if not exists schwarzesBrett;

use schwarzesBrett;

CREATE TABLE if not exists inserent(inserentennummer int primary key not null, name char(50), email varchar(255), nummer char(15));

CREATE TABLE if not exists rubrikzuordnung(id int primary key not null, anzeigenummer int, rubriknummer int, foreign key (anzeigenummer) references anzeige(anzeigenummer), foreign key (rubriknummer) references anzeigerubrik(rubriknummer));

CREATE TABLE if not exists anzeige(anzeigenummer int primary key not null, anzeigetext varchar(255), anzeigeueberschrift char(50), anzeigedatum date, inseretennummer int, Foreign key (inseretennummer) references inserent(inserentennummer));

CREATE TABLE if not exists anzeigerubrik(rubriknummer int primary key not null, bezeichnung char(100));
