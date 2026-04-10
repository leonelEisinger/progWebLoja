create table cliente (
	id serial not null,
	login varchar(30) not null unique,
	senha varchar(255) not null,
	nome varchar(255) not null,
	telefone varchar(13) not null,
	email varchar(100) not null,
	cartaoCredito varchar(16) not null,

	primary key(id)
);

select *
from cliente;

create table endereco (
	id serial not null,
	rua varchar(255),
	numero varchar(5),
	complemento varchar(15),
	bairro varchar(255),
	cep varchar(8),
	cidade varchar(255),
	estado varchar(255),

	primary key(id)
);

select *
from endereco;

create table fornecedor (
	id serial not null,
	nome varchar(60) not null,
	descricao varchar(255),
	telefone varchar(13) not null,
	email varchar(100),
	
	primary key(id)
);

select *
from fornecedor;

create table produto (
	id serial not null,
	nome varchar(60) not null,
	placa char(7) not null,
	cor varchar(20) not null,
	marca_id int not null,
	
	primary key(id)
);

select *
from produto;

create table estoque (
	id serial not null,
	produto_id int not null,
	qtd int not null,
	preco double precision not null,
	
	primary key(id),
	foreign key (produto_id) references produto(id)
)

select *
from estoque;

create table pedido (
	numero serial not null,
	dataPedido date not null,
	dataEntrega date not null,
	situacao varchar(10) not null,
	primary key(numero)
);

select *
from pedido;

create table itemPedido(
 id serial not null,
 pedido_id int not null,
 produto_id int not null,
 quantidade int not null,
 preco double precision not null,

 foreign key (pedido_id) references pedido(numero),
 foreign key (produto_id) references produto(id)
);


select *
from itemPedido;



insert into cliente(login, senha, nome) values ('krohn','123','Alexandre Krohn');
insert into cliente(login, senha, nome) values ('alexandre','123','Alexandre K.');
insert into cliente(login, senha, nome) values ('god','123','God account');



