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
    email varchar(60) not null,
    senha varchar(120) not null,
    cdcargo int
);

insert into tb_funcionario (nome, sobrenome, telefone, email, senha) values ('Ivo', 'Miranda', '91984188928', 'ivo@gmail.com', 'ecaa4d8c5a5c28349de16842b273a4b9');
-- senha=ivomiranda2023

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
    numero int,
    complemento varchar (80),
    email varchar(60) not null,
    senha varchar(120) not null
);

insert into tb_cliente (nome, sobrenome, telefone, email, senha) values ('Alexandre', 'Araújo', '91984188928', 'alexandre@gmail.com', '7599636975073a6f9238316cd7856663');
-- senha=alexandrearaujo2023

-- create table tb_cargo
-- (
-- 	cdcargo int auto_increment primary key,
--     nome varchar(45) not null
-- );

create table tb_produto
(
	cdproduto int auto_increment primary key,
    nome varchar(100) not null,
    ingrediente varchar(120) not null,
    valor decimal(4,2) not null,
    categoriaid int,
    disponibilidade boolean default false not null
);

insert into tb_produto (nome, valor, ingrediente, disponibilidade, categoriaid) values ('Pizza Calabresa', 85.90, 'Calabresa', true, 1);
insert into tb_produto (nome, valor, ingrediente, disponibilidade, categoriaid) values ('Pizza Portuguesa', 85.90, 'Pimentão, Queijo, Ovo', true, 1);
insert into tb_produto (nome, valor, ingrediente, disponibilidade, categoriaid) values ('Pizza de Queijo Cuia', 85.90, 'Queijo Cuia', true, 1);
insert into tb_produto (nome, valor, ingrediente, disponibilidade, categoriaid) values ('Pizza de Camarão com Queijo Cuia', 77.48, 'Camarão com Queijo Cuia', true, 1);
insert into tb_produto (nome, valor, ingrediente, disponibilidade, categoriaid) values ('Pizza Filé com Fritas', 84.98, 'Filé com Fritas', true, 1);
insert into tb_produto (nome, valor, ingrediente, disponibilidade, categoriaid) values ('Pizza Filé com Queijo Cuia', 84.98, 'Filé com Queijo Cuia', true, 1);
insert into tb_produto (nome, valor, ingrediente, disponibilidade, categoriaid) values ('Pizza Brotão de Oreo e M&M', 85.90, 'Oreo e M&M', true, 1);
insert into tb_produto (nome, valor, ingrediente, disponibilidade, categoriaid) values ('Pizza Romeu e Julieta', 85.90, 'Queijo com Goiabada', true, 1);
insert into tb_produto (nome, valor, ingrediente, disponibilidade, categoriaid) values ('Calzone de Charque', 85.90, 'Charque', true, 2);
insert into tb_produto (nome, valor, ingrediente, disponibilidade, categoriaid) values ('Calzone de Camarão Rosa', 85.90, 'Camarão Rosa', true, 2);
insert into tb_produto (nome, valor, ingrediente, disponibilidade, categoriaid) values ('Calzone de Filé', 29.98, 'Filé', true, 2);
insert into tb_produto (nome, valor, ingrediente, disponibilidade, categoriaid) values ('Hambúrguer Camarão com Jambu', 85.90, 'Camarão com Jambu', true, 1);

create table tb_item_pedido
(
	id int auto_increment primary key,
    pedido_id int,
    produto_id int,
    nome_produto varchar(120) not null,
    preco decimal(4,2) not null,
    quantidade int,
    subtotal decimal(4,2) not null
);

-- create table tb_pedido
-- (
-- 	id int auto_increment primary key,
--     enderecoid int,
--     produtoid int
-- );

create table tb_pedido
(
	id int auto_increment primary key,
    endereco int,
    telefone varchar(120) not null,
    total decimal(4,2) not null,
    data_pedido timestamp
);


create table tb_endereco
(
	cdendereco int auto_increment primary key,
    endereco varchar(8),
    numero int not null,
    bairro varchar(80),
    complemento varchar (80),
    cep varchar(9),
    cidade varchar(40),
    clienteid int
);

create table tb_categoria
(
	cdcategoria int auto_increment primary key,
    nome varchar(100) not null
);

insert into tb_categoria (cdcategoria, nome) values (1, 'Pizza');
insert into tb_categoria (cdcategoria, nome) values (2, 'Calzone');
insert into tb_categoria (cdcategoria, nome) values (3, 'Hambúrguer');
insert into tb_categoria (cdcategoria, nome) values (4, 'Bebida');

-- create table tb_pedido
-- (
-- 	idpedido int auto_increment primary key,
--     cdproduto int not null,
--     quantidade int not null,
--     cdcliente int not null
-- );

-- alter table tb_funcionario add foreign key(cdcargo) references tb_cargo(cdcargo);
-- alter table tb_pedido add foreign key(cdproduto) references tb_produto(cdproduto);
-- alter table tb_pedido add foreign key(cdcliente) references tb_cliente(cdcliente);

