use figuras;

DELIMITER $
CREATE PROCEDURE newClient(
	in nombre_c varchar(25),
    in app_c varchar(25),
    in apm_c varchar(25),
    in phone_c varchar(10),
    
    in mail_c varchar(60),
    in pass_c varchar(20)
)
begin
	declare lastID int;
    set lastID = 0;
	insert into person(nombre, app, apm, fecha_nac, phone) values(nombre_c, app_c, apm_c, '1900-1-1', phone_c);
    SET lastID = LAST_INSERT_ID();
    insert into users(id_user, mail, pass, foto, tipo) values (lastID, mail_c, pass_c, 'noImage.jpg', '2');
end
$

DELIMITER $
CREATE PROCEDURE newPresupuesto(
	in sol int,
    in med varchar(25),
    in pos char(1),
    in tipo varchar(90),
    in aca varchar(30),
    in pin varchar(30),
    in pz int,
    in price decimal(7,2),
    in com mediumtext
)
begin
	INSERT INTO presupuestos (solicito, medidas, posicion, tipo_uso, acabado, pintura, piezas, precio, comentarios) VALUES
    (sol, med, pos, tipo, aca, pin, pz, price, com);
end
$