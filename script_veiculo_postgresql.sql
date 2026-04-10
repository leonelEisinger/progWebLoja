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

insert into cliente(login, senha, nome, telefone, email, cartaoCredito) values ('krohn','123','Alexandre Krohn', '5554999999999', 'email@email.com', '1234567890654321');
insert into cliente(login, senha, nome, telefone, email, cartaoCredito) values ('teste','321','Teste da Silva', '5252988889999', 'testesilva@email.com', '1597532684159753');

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

insert into endereco(rua, numero, complemento, bairro, cep, cidade, estado) values ('Rua principal', '12345', 'Universidade', 'UCS', '65000100', 'Caxias do sul', 'RS');
insert into endereco(rua, numero, complemento, bairro, cep, cidade, estado) values ('Teste', '999', 'casa', 'Pio x', '11111111', 'Caxias do sul', 'RS');

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

insert into fornecedor(nome, descricao, telefone, email) values ('fornceAlgo', 'Fornecedor que fornece algo', '5554999889988', 'fornecealgo@email.com.br');
insert into fornecedor(nome, descricao, telefone, email) values ('entregaAlgo', 'Entrega algo', '5150955775577', 'entregaAlgo@email.com.br');

create table produto (
	id serial not null,
	nome varchar(60) not null,
	descricao varchar(255) not null,
	foto varchar(255) not null,
	
	primary key(id)
);

select *
from produto;

insert into produto(nome, descricao, foto) values ('Chave', 'Abre algo', '');
insert into produto(nome, descricao, foto) values ('Roda', 'Apenas Gira', '');

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

insert into estoque(produto_id, qtd, preco) values (1, 3, 25.0);
insert into estoque(produto_id, qtd, preco) values (2, 1, 150.0);

create table pedido (
	numero serial not null,
	dataPedido date not null,
	dataEntrega date not null,
	situacao varchar(10) not null,
	primary key(numero)
);

select *
from pedido;

insert into pedido(dataPedido, dataEntrega, situacao) values('20/02/2019','25/02/2019','ENTREGUE');
insert into pedido(dataPedido, dataEntrega, situacao) values('31/08/2030','25/02/2030','CANCELADO');

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

insert into itemPedido(pedido_id, produto_id, quantidade, preco) values(1,2,1, 160.0);
insert into itemPedido(pedido_id, produto_id, quantidade, preco) values(2,1,3, 100.0);


