create table usuario (
id serial not null,
login varchar(30) not null unique,
senha varchar(255) not null,
nome varchar(255) not null);

alter table usuario 
add constraint pk_usuario
primary key(id);

insert into usuario(login, senha, nome) values ('krohn','123','Alexandre Krohn');
insert into usuario(login, senha, nome) values ('alexandre','123','Alexandre K.');
insert into usuario(login, senha, nome) values ('god','123','God account');

insert into usuario(login, senha, nome) values ('joao','123','João da Silva');
insert into usuario(login, senha, nome) values ('maria','123','Maria da Silva');
insert into usuario(login, senha, nome) values ('megan','123','Megan da Silva');


create table marca (
id serial not null,
nome varchar(60) not null,
descricao varchar(255),
primary key(id)
);

insert into marca(nome, descricao) values ('volkswagen','Das Auto');
insert into marca(nome, descricao) values ('chevrolet','Find New Roads');
insert into marca(nome, descricao) values ('bmw','Sheer Driving Pleasure');
insert into marca(nome, descricao) values ('Lamborghini','Dare to live more');

create table veiculo (
id serial not null,
nome varchar(60) not null,
placa char(7) not null,
cor varchar(20),
marca_id int,
primary key(id)
);

insert into veiculo(nome, placa, cor, marca_id) values ('vectra','abc1234','cinza', 2);
insert into veiculo(nome, placa, cor, marca_id) values ('gol','dfg7532','preto', 1);
insert into veiculo(nome, placa, cor, marca_id) values ('328i','ert8412','branco', 3);
insert into veiculo(nome, placa, cor, marca_id) values ('venom','cgr146','laranja', 4);


alter table veiculo
add constraint fk_veiculo_marca
foreign key (marca_id)
references marca(id); 

select *
from usuario;

select *
from marca;

select *
from veiculo;




