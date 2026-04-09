create table marca (
id int not null auto_increment,
nome varchar(60) not null,
descricao varchar(255),
primary key(id)
);

create table veiculo (
id int not null auto_increment,
nome varchar(60) not null,
placa char(7) not null,
cor varchar(20),
marca_id int,
primary key(id)
);

alter table veiculo
add constraint fk_veiculo_marca
foreign key (marca_id)
references marca(id); 
