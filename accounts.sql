drop database if exists accounts;
create database accounts;
use accounts;

create table utenti (
    cf char(16) not null primary key,
    nome varchar(30) not null,
    cognome varchar(30) not null,
    username varchar(30) not null UNIQUE,
    password varchar(50) not null
)