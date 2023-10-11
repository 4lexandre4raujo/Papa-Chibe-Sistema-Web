create database pizzariadb;

use pizzariadb;

create table tb_pizzaria
(
	cdpizzaria int auto_increment primary key,
    bairro varchar(100) not null,
    endereco varchar(100) not null,
    cidade varchar(30) not null,
    estado varchar(20) not null
);

create table tb_funcionario
(
	cdfuncionario int auto_increment primary key,
    nome varchar(100) not null,
    sobrenome varchar(100) not null,
    telefone varchar(15) not null,
    cep varchar(9),
    estado varchar(40),
    cidade varchar(40),
    bairro varchar(80),
    endereco varchar(80),
    numero int,
    complemento varchar (80),
    email varchar(60) not null,
    senha varchar(120) not null,
    cdcargo int
);

create table tb_cargo
(
	cdcargo int auto_increment primary key,
    nome varchar(45) not null
);

create table tb_produto
(
	cdproduto int auto_increment primary key,
    nome varchar(100) not null,
    ingrediente varchar(120) not null,
    valor decimal not null,
    categoriaid int,
    disponibilidade boolean default false not null
);

create table tb_cliente
(
	cdcliente int auto_increment primary key,
    nome varchar(100) not null,
    sobrenome varchar(100) not null,
    telefone varchar(15) not null,
    cep varchar(9),
    estado varchar(40),
    cidade varchar(40),
    bairro varchar(80),
    endereco varchar(80),
    numero int not null,
    complemento varchar (80),
    email varchar(60) not null,
    senha varchar(120) not null
);

create table tb_categoria
(
	cdcategoria int auto_increment primary key,
    nome varchar(100) not null
);

create table tb_pedido
(
	idpedido int auto_increment primary key,
    cdproduto int not null,
    quantidade int not null,
    cdcliente int not null
);

alter table tb_funcionario add foreign key(cdcargo) references tb_cargo(cdcargo);
alter table tb_pedido add foreign key(cdproduto) references tb_produto(cdproduto);
alter table tb_pedido add foreign key(cdcliente) references tb_cliente(cdcliente);
