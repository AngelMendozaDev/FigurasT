/****************
* Realizo: Luis Angel Mendoza Garcia
* Fecha: 12/03/2023
* Ult Modifiocacion:
*/

DROP DATABASE IF EXISTS figuras;
CREATE DATABASE IF NOT EXISTS figuras;

USE figuras;

CREATE TABLE person(
    id_person int auto_increment not null,
    nombre varchar(25) not null,
    app varchar(25) not null,
    apm varchar(25) not null,
    fecha_nac date not null,
    phone varchar(10) not null,
    primary key(id_person)
);

CREATE TABLE domicilio(
    id_dom int not null,
    calle varchar(25) not null,
    numero varchar(6) not null,
    code_post varchar(6) not null,
    municipio varchar(70) not null,
    estado varchar(20) not null,
    calle1 varchar(25) not null,
    calle2 varchar(25) not null,
    refe mediumtext not null,
    primary key(id_dom),
    foreign key (id_dom) references person(id_person)
);

CREATE TABLE users(
    id_user int not null,
    fecha_union datetime default now() not null,
    mail varchar(60) not null,
    pass varchar(20) not null,
    foto varchar(20) not null,
    tipo int not null,
    primary key(id_user),
    foreign key(id_user) references person(id_person)
);

CREATE TABLE acabados(
    id_acabado int auto_increment not null,
    n_acabado varchar(20) not null,
    primary key(id_acabado)
);

CREATE TABLE presupuesto(
    folio_pres int auto_increment not null,
    fecha_pres datetime default now(),
    usuario int not null,
    medidas varchar(25) not null,
    uso varchar(15) not null,
    acabado int not null,
    colores varchar(60) not null,
    tipo_pintura int not null,
    tipo_pieza int not null,
    numero_pz int not null,
    foto varchar(20) not null,
    comentarios mediumtext,
    primary key(folio_pres),
    foreign key(acabado) references acabados(id_acabado),
    foreign key(usuario) references users(id_user)
);

CREATE TABLE figura(
    folio_fig int auto_increment not null,
    nombre_f varchar(25) not null,
    fecha_entrega date not null,
    medidas varchar(25) not null,
    foto varchar(20) not null,
    descripcion mediumtext,
    primary key(folio_fig)
);

CREATE TABLE galery(
    folio_g int auto_increment not null,
    figura int not null,
    foto varchar(25) not null,
    primary key(folio_g),
    foreign key(figura) references figura(folio_fig) 
);

CREATE TABLE notify(
    id_notify int auto_increment not null,
    fecha_not datetime default now(),
    title varchar(20) not null,
    user_destination int not null,
    leido int not null,
    primary key(id_notify),
    foreign key (user_destination) references users(id_user)
);
