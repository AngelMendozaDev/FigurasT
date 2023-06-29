/****************
* Realizo: Luis Angel Mendoza Garcia
* Fecha: 12/03/2023
* Ult Modifiocacion:
*/

DROP DATABASE IF EXISTS figuras;
CREATE DATABASE IF NOT EXISTS figuras;

USE figuras;

CREATE TABLE usuarios(
	ID_user int auto_increment not null,
    nombre varchar(25) not null,
    app varchar(25) not null,
    apm varchar(25) not null,
    mail varchar(60) not null,
    telefono varchar(10) not null,
    pass varchar(25) not null,
    tipo int not null,
    fecha date not null,
    primary key(ID_user)
);

CREATE TABLE domicilio(
	ID_domicilio int not null,
    calle varchar(80) not null,
    cp int not null,
    primary key(ID_domicilio),
    foreign key(ID_domicilio) references usuarios(ID_user)
);

CREATE TABLE presupuestos(
	folio_pres int auto_increment not null,
    fecha_pres datetime default now(),
    solicito int not null,
    medidas varchar(25) not null,
    posicion char(1) not null,
    tipo_uso varchar(90) not null,
    acabado varchar(30) not null,
    pintura varchar(30) not null,
    piezas int not null,
    precio decimal(7,2) not null,
    comentarios mediumtext,
    primary key(folio_pres),
    foreign key(solicito) references usuarios(ID_user)
);

CREATE TABLE colores(
	id_colores int auto_increment not null,
    pres int not null,
    codigo varchar(18) not null,
    primary key(id_colores),
    foreign key(pres) references presupuestos(folio_pres)
);


CREATE TABLE pedido(
	folio_pedido int auto_increment not null,
    fecha_ped datetime default now(),
    presu int not null,
    entrega date not null,
    estado int not null,
    total decimal(7,2) not null,
    primary key(folio_pedido),
    foreign key(presu) references presupuestos(folio_pres)
);

CREATE TABLE notificaciones(
    id_not int auto_increment not null,
    fecha_not datetime default now(),
    title varchar(20) not null,
    user_destination int not null,
    leido int not null,
    primary key(id_not),
    foreign key (user_destination) references usuarios(ID_user)
);
