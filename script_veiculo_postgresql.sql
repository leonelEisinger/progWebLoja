create table cliente (
	id serial not null,
	login varchar(30) not null unique,
	senha varchar(255) not null,
	nome varchar(255) not null,
	telefone varchar(13) not null,
	email varchar(100) not null,
	cartaoCredito varchar(16) not null

	primary key(id)
);

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

create table fornecedor (
id serial not null,
nome varchar(60) not null,
descricao varchar(255),
telefone varchar(13) not null,
email varchar(100),
primary key(id)
);

create table produto (
id serial not null,
nome varchar(60) not null,
placa char(7) not null,
cor varchar(20),
marca_id int,
primary key(id)
);

create table estoque (
	id serial not null,
	id_produto int not null,
	qtd int,
	preco double precision,
	
	primary key(id)
	foreign key (produto_id) references produto(id)
)

create table pedido (
	numero serial not null,
	dataPedido date not null,
	dataEntrega date not null,
	situacao varchar(10) not null,
	primary key(id),
);


create table itemPedido(
 id serial not null,
 pedido_id int,
 produto_id int,
 quantidade int,
 preco double precision,

 foreign key (pedido_id) references pedido(id),
 foreign key (produto_id) references produto(id)
);



select *
from usuario;

select *
from marca;

select *
from veiculo;

insert into cliente(login, senha, nome) values ('krohn','123','Alexandre Krohn');
insert into cliente(login, senha, nome) values ('alexandre','123','Alexandre K.');
insert into cliente(login, senha, nome) values ('god','123','God account');



