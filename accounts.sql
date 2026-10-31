drop database if exists accounts;
create database accounts;
use accounts;

create table utenti (
    cf char(16) not null primary key,
    nome varchar(30) not null,
    cognome varchar(30) not null,
    username varchar(30) not null UNIQUE,
    password varchar(50) not null
);

create table clienti (
    iva char(11) not null primary key,
    denominazione varchar(100) not null,
    via varchar(100) not null,
    citta varchar(50) not null,
    cf char(16) not null,

    FOREIGN KEY (cf) REFERENCES utenti(cf)
);