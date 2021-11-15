# teste-para-estagio

# SCRIPT DO BANCO DE DADOS
create database teste;
use teste;
create table lista_pessoas (id int not null primary key auto_increment, email varchar(100) not null unique key, nome varchar (100) not null);
create table sorteio (parum int not null, pardois int not null);
